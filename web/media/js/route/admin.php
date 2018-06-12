<?php
header("Content-type: application/x-javascript");

define('syscart', true);
define('DS', DIRECTORY_SEPARATOR);

require_once('..'.DS.'..'.DS.'..'.DS.'..'.DS.'include.php');

$textSending = 'در حال ارسال';

global $sysConfig;
$cookieTime = $sysConfig->get('setting_cookieTime');
?>
$(document).ready(function(){
    var iconXNavigation = '';

    if($('#x-navigation').children('span').hasClass('fa-dedent'))
        iconXNavigation = 'fa-dedent';
    else
        iconXNavigation = 'fa-indent';

    $('#x-navigation').click(function(){
        if(iconXNavigation == 'fa-dedent') {
            iconXNavigation = 'fa-indent';
            $.cookie('x-navigation', 'close', {expires: <?= $cookieTime ?>, path: '/'});
        } else {
            iconXNavigation = 'fa-dedent';
            $.cookie('x-navigation', 'open', {expires: <?= $cookieTime ?>, path: '/'});
        }
    });

    $('.event-exit').click(function(){
        var _this = this;
        var text = $(this).text();
        $.ajax({
            method: 'POST',
            url: 'admin/common/logout/exitApp',
            dataType: 'json',
            beforeSend: function(){
                $(_this).text('<?= $textSending ?>').prop('disabled', true);
            },
            complete: function(){
                $(_this).text(text).prop('disabled', false);
            },
            success: function(data){
                if(data.success)
                    location.reload();
            }
        });
    });

    $(document).on('click', '.select-image', function(){
        $('#modal-media').modal('show');
        //$('#modal-media .modal-body').html('<center><i class="fa fa-refresh fa-spin fa-5x" aria-hidden="true"></i></center>');
        $.ajax({
            method: 'POST',
            url: 'admin/common/fileManager',
            dataType: 'json',
            beforeSend: function(){
                //$(_this).text('<?= $textSending ?>').prop('disabled', true);
            },
            complete: function(){
                //$(_this).text(text).prop('disabled', false);
            },
            success: function(data){
                if(data.success) {
                } else {
                }
            }
        });
    });

    $(document).on('click', '.delete-image', function(){
        alert('delete-image');
    });
});