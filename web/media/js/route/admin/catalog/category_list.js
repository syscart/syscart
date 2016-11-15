$(document).ready(function(){
    $('#select-sort-table, #select-limit').selectpicker();
    $(".icheckbox, .iradio").iCheck({checkboxClass: 'icheckbox_minimal-grey',radioClass: 'iradio_minimal-grey'});

    $('#checkAll').on('ifToggled', function() {
        if($(this).prop('checked') == true) {
            $('.checkId').iCheck('check');
        } else {
            $('.checkId').iCheck('uncheck');
        }
    });

    $('table').footable().on('change', '.changeState', function(event){
        event.preventDefault();
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
    }).on('click', '.table-add-sub', function(event) {
        event.preventDefault();
        alert('add item');
    }).on('click', '.table-edit', function(event) {
        event.preventDefault();
        alert('edit item');
    }).on('click', '.table-remove', function(event) {
        event.preventDefault();
        alert('remove item');
    });
});