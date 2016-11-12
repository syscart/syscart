$(document).ready(function(){
    $('#select-sort-table, #select-limit').selectpicker();
    $(".icheckbox, .iradio").iCheck({checkboxClass: 'icheckbox_minimal-grey',radioClass: 'iradio_minimal-grey'});
    $('table').footable();

    $('#checkAll').on('ifToggled', function() {
        if($(this).prop('checked') == true) {
            $('.checkId').iCheck('check');
        } else {
            $('.checkId').iCheck('uncheck');
        }
    });

    $('.changeState').on('change', function(){
        var state = ($(this).prop('checked') == true) ? 1 : 0;
        $.ajax({
            method: 'POST',
            url: 'admin/catalog/category/changeState',
            dataType: 'json',
            data: {
                categoryId: $(this).attr('data'),
                state: state
            },
            beforeSend: function(){},
            complete: function(){},
            success: function(data){}
        });
    });
});