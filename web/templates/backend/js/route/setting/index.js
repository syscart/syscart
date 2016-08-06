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

    $('#setting_form').ajaxForm({
        dataType: 'json',
        beforeSubmit: function(){},
        uploadProgress: function(event, position, total, percentComplete) {},
        success: function(data) {
            
        },
        error: function(){}
    });

    $('#btn-save').click(function(){
        $('#setting_form').submit();
    });
});