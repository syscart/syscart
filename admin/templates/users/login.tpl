<div class="login-container lightmode">
    <div class="login-box animated fadeInDown">
        <div class="login-body">
            <div class="login-title"><strong><?php echo $text_login_title; ?></strong></div>
            <form action="<?php echo $site_url; ?>admin/users/login" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="<?php echo $text_username; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" class="form-control" placeholder="<?php echo $text_password; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-link btn-block"><?php echo $text_forgot; ?></a>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-info btn-block"><?php echo $text_log_in; ?></button>
                    </div>
                </div>
                <div class="login-or"><?php echo $text_or; ?></div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-info btn-block btn-google"><span
                                    class="fa fa-google-plus"></span> <?php echo $text_login_google; ?></button>
                    </div>
                </div>
                <div class="login-subtitle">
                    <?php echo $text_do_not_have_account; ?> <a href="#"><?php echo $text_create_an_account; ?></a>
                </div>
            </form>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; <?php echo date( 'Y' ); ?> systemli
            </div>
            <div class="pull-right">
                <a href="#"><?php echo $text_link_about; ?></a> |
                <a href="#"><?php echo $text_link_privacy; ?></a> |
                <a href="#"><?php echo $text_link_contact_us; ?></a>
            </div>
        </div>
    </div>

</div>