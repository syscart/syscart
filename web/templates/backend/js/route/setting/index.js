$(document).ready(function(){
    $('#setting-country, #setting-zone, #setting-city, #setting-currency, #setting-lengthClassId, #setting-weightClassId').selectpicker();
    $(".icheckbox, .iradio").iCheck({checkboxClass: 'icheckbox_minimal-grey',radioClass: 'iradio_minimal-grey'});

    $('#setting-country').change(function(){
        $.ajax({
            method: 'POST',
            url: 'public/geography/getZoneSelect',
            data: {countryId: $(this).val()},
            dataType: 'json',
            beforeSend: function(){
                $('#setting-zone').html('<option>-----</option>').selectpicker('refresh');
            },
            success: function(data){
                if(data.success) {
                    $('#setting-zone').html(data.data).selectpicker('refresh');
                }
            }
        });
    });
    
    $('#setting-zone').change(function(){
        $.ajax({
            method: 'POST',
            url: 'public/geography/getCitySelect',
            data: {
                countryId: $('#setting-country').val(),
                zoneId: $(this).val()
            },
            dataType: 'json',
            beforeSend: function(){
                $('#setting-city').html('<option>-----</option>').selectpicker('refresh');
            },
            success: function(data){
                if(data.success) {
                    $('#setting-city').html(data.data).selectpicker('refresh');
                }
            }
        });
    });

    var percent = 0;
    $('#setting_form').ajaxForm({
        dataType: 'json',
        beforeSubmit: function() {
            percent = 5;
            $('#btn-save').children('i').removeClass('fa-save').addClass('fa-refresh').addClass('fa-spin');
            $.mpb('show',{value: [0,percent], speed: 5, state: 'warning'});
        },
        uploadProgress: function(event, position, total, percentComplete) {
            $.mpb('update',{value: [percent, percentComplete], speed: 10});
            percent = percentComplete;
        },
        success: function(data) {
            if(data.success) {
                noty({text: data.data, layout: 'topCenter', type: 'success'});
            } else {
                noty({text: data.error, layout: 'topCenter', type: 'error'});
            }
        },
        complete: function(){
            $('#btn-save').children('i').removeClass('fa-refresh').removeClass('fa-spin').addClass('fa-save');
            $.mpb('destroy');
        },
        error: function(){}
    });

    $('#btn-save').click(function(){
        $('#setting_form').submit();
    });
});