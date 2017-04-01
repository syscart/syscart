function checkBoxData()
{
    $(".icheckbox, .iradio").iCheck({checkboxClass: 'icheckbox_minimal-grey',radioClass: 'iradio_minimal-grey'});

    $('#checkAll').on('ifToggled', function() {
        if($(this).prop('checked') == true) {
            $('.checkId').iCheck('check');
        } else {
            $('.checkId').iCheck('uncheck');
        }
    });
}
function filterTableManufacturer(url)
{
    url = url || 'admin/catalog/manufacturer';
    var data = {};
    if($('#filter-name').val() != '')
        data.filter_name = $('#filter-name').val();
    if($('#filter-sort').val() != '-1')
        data.sort = $('#filter-sort').val();
    if($('#filter-order').val() != '-1')
        data.order = $('#filter-order').val();
    if($('#filter-limit').val() != '-1')
        data.limit = $('#filter-limit').val();
    $.mpb('show',{value: [0,60],speed: 5});
    $.pjax({
        url: url,
        type:"GET",
        container:'#pJax-loader-json',
        data: data
    }).done(function(){
        var object = JSON.parse($('#pJax-loader-json').text());
        $.mpb('update',{value: [60,100],speed: 5, complete: function(){
            $(".mpb").fadeOut(600,function(){
                $(this).remove();
            });
        }});
        var theme = '';
        if(object.success) {
            $.each(object.dataTable, function(key) {
                var countryName = object.dataTable[key].countryName;
                var id = object.dataTable[key].id;
                var name = object.dataTable[key].name;
                theme += '<tr class="row-'+id+'">' +
                            '<td class="ver-mid-i text-center">' +
                                '<input type="checkbox" class="icheckbox checkId" name="check[]" value="'+id+'"/>' +
                            '</td>' +
                            '<td class="ver-mid-i text-right fontI14 font-xs11">'+name+'</td>' +
                            '<td class="ver-mid-i text-right fontI14 hidden-xs">'+countryName+'</td>' +
                            '<td class="ver-mid-i iconTable text-left">' +
                                '<a href="admin/catalog/manufacturer/edit/'+id+'" role="button" class="btn btn-sm btn-info table-edit" data-toggle="tooltip" data-placement="top" data-original-title="'+object.language.edit+'">' +
                                    '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>' +
                                '</a>' +
                                '<a href="javascript:void(0)" role="button" class="btn btn-sm btn-danger table-remove" data-toggle="tooltip" data-placement="top" data-original-title="'+object.language.remove+'" data-id="'+id+'">' +
                                    '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>' +
                                '</a>' +
                            '</td>' +
                        '</tr>';
            });
        } else
            theme += '<tr><td colspan="4" class="noDataTable">'+object.error+'</td></tr>';
        $('#table-data>tbody').html(theme);
        checkBoxData();
    });
}

$(document).ready(function(){
    $('#filter-sort, #filter-order, #filter-limit').selectpicker();
    checkBoxData();

    var checkNotification = true;
    $(document).on('click', '.table-remove', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        if(checkNotification) {
            checkNotification = false;
            noty({
                text: 'آیا از حذف آیتم شماره (' + id + ') مطمئن هستید؟',
                layout: 'topCenter',
                buttons: [
                    {
                        addClass: 'btn btn-success btn-clean',
                        text: 'بله',
                        onClick: function ($noty) {
                            $noty.close();
                            checkNotification = true;
                            noty({text: 'آیتم مورد نظر با موفقیت حذف گردید', layout: 'topCenter', type: 'success'});
                        }
                    }, {
                        addClass: 'btn btn-danger btn-clean',
                        text: 'خیر',
                        onClick: function ($noty) {
                            $noty.close();
                            checkNotification = true;
                        }
                    }
                ]
            });
        }
    }).on('keydown', '#filter-name', function(event){
        var keyCode = (event.keyCode ? event.keyCode : event.which);
        if (keyCode == 13) {
            filterTableManufacturer();
        }
    }).on('click', '#btn-filter-search', function(){
        filterTableManufacturer();
    }).on('change', '#filter-sort', function(){
        filterTableManufacturer();
    }).on('change', '#filter-order', function(){
        filterTableManufacturer();
    }).on('change', '#filter-limit', function(){
        filterTableManufacturer();
    }).on('click', '#btn-filter-clear', function(){
        $('#filter-name').val('');
        $('#filter-sort').val('-1');
        $('#filter-order').val('-1');
        $('#filter-limit').val('-1');
        $('#filter-sort, #filter-order, #filter-limit').selectpicker('refresh');
        filterTableManufacturer();
    });
});