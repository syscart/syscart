$(document).ready(function(){
    $('#select-filter-type, #select-limit').selectpicker();
    $(".iCheckbox, .iRadio").iCheck({checkboxClass: 'icheckbox_minimal-grey',radioClass: 'iradio_minimal-grey'});
    $('table').footable();

    $('#checkAll').on('ifToggled', function() {
        if($(this).prop('checked') == true) {
            $('.checkId').iCheck('check');
        } else {
            $('.checkId').iCheck('unCheck');
        }
    });
});