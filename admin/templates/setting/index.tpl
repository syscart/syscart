<div class="page-container page-mode-rtl">
    <?php echo $sidebar; ?>
    <div class="page-content">
        <?php echo $nav.$breadcrumb.$heading_title; ?>

        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default tabs">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#tab-public" data-toggle="tab">{{t:adminSetting.tab_title_public}}</a></li>
                            <li><a href="#tab-store" data-toggle="tab">{{t:adminSetting.tab_title_store}}</a></li>
                            <li><a href="#tab-local" data-toggle="tab">{{t:adminSetting.tab_title_local}}</a></li>
                            <li><a href="#tab-option" data-toggle="tab">{{t:adminSetting.tab_title_option}}</a></li>
                            <li><a href="#tab-image" data-toggle="tab">{{t:adminSetting.tab_title_image}}</a></li>
                            <li><a href="#tab-email" data-toggle="tab">{{t:adminSetting.tab_title_email}}</a></li>
                            <li><a href="#tab-server" data-toggle="tab">{{t:adminSetting.tab_title_server}}</a></li>
                        </ul>
                        <div class="panel-body tab-content">
                            <div class="tab-pane active" id="tab-public">public</div>
                            <div class="tab-pane" id="tab-store">store</div>
                            <div class="tab-pane" id="tab-local">local</div>
                            <div class="tab-pane" id="tab-option">option</div>
                            <div class="tab-pane" id="tab-image">image</div>
                            <div class="tab-pane" id="tab-email">email</div>
                            <div class="tab-pane" id="tab-server">server</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php echo $logout; ?>