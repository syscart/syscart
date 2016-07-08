<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="fail" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title pull-right text-right"><span class="glyphicon glyphicon-ban-circle pull-right" style="padding: 0px 5px 17px 23px;"></span> <?php echo $text_logout; ?></div>
            <div class="mb-content">
                <p class="text-right fontS18"><?php echo $text_question; ?></p>
                <p class="text-right" style="margin-top: 15px;"><?php echo $text_note; ?></p>
            </div>
            <div class="mb-footer">
                <div class="pull-left">
                    <a href="javascript:void(0)" class="btn btn-success btn-sm"><?php echo $text_yes; ?></a>
                    <button class="btn btn-default btn-sm mb-control-close"><?php echo $text_no; ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
<audio id="audio-alert" src="<?php echo $site_url; ?>templates/backend/audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="<?php echo $site_url; ?>templates/backend/audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->
