    <!-- MODALS -->
    <div class="modal fade" id="<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="<?=$titleId?>" aria-hidden="true">
        <div class="modal-dialog <?=$size?>">
            <div class="modal-content">
            <?php if($showHeader) { ?>
    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="sr-only">{{t:commonModal.close}}</span>
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="<?=$titleId?>"><?=$title?></h4>
                </div>
            <?php } ?>
    <div class="modal-body"><?=$body?></div>
            <?php if($showFooter) { ?>
            <div class="modal-footer">
                <?=$footer?>
                <?php foreach( $buttonFooter as $item => $button ) { ?>
                <button type="button" class="btn<?=$button['size']?><?=$button['color']?>"<?=$button['close']?>><?=$button['title']?></button>
                <?php } ?>
            </div>
            <?php } ?>
</div>
        </div>
    </div>
