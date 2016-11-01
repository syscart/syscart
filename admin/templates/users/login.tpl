<div class="login-container lightmode">
    <div class="login-box animated fadeInDown">
        <div class="login-body">
            <div class="login-title"><strong>{{t:adminLogin.text_login_title}}</strong></div>
            <form action="<?php echo $site_url; ?>admin/users/login" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" name="username" class="form-control" placeholder="{{t:adminLogin.text_username}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" name="password" class="form-control" placeholder="{{t:adminLogin.text_password}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-link btn-block">{{t:adminLogin.text_forgot}}</a>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-info btn-block">{{t:adminLogin.text_log_in}}</button>
                    </div>
                </div>
                <div class="login-or">{{t:general.or}}</div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-info btn-block btn-google">
                            <span class="fa fa-google-plus"></span> {{t:adminLogin.text_login_google}}</button>
                    </div>
                </div>
                <div class="login-subtitle">
                    {{t:adminLogin.text_do_not_have_account}} <a href="#">{{t:adminLogin.text_create_an_account}}</a>
                </div>
            </form>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; <?php echo date( 'Y' ); ?> syscart
            </div>
            <div class="pull-right">
                <a href="#">{{t:adminLogin.text_link_about}}</a> |
                <a href="#">{{t:adminLogin.text_link_privacy}}</a> |
                <a href="#">{{t:adminLogin.text_link_contact_us}}</a>
            </div>
        </div>
    </div>
</div>
<style>
    .login-container.lightmode {
        background: url("media/img/backgrounds/<?=$backgroundLoginPage?>.jpg") left top no-repeat;
    }
</style>