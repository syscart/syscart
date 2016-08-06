<div class="page-container page-mode-rtl">
    <?php echo $sidebar; ?>
    <div class="page-content">
        <?php echo $nav.$breadcrumb.$heading_title; ?>

        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    <form action="setting/index/save" method="post" enctype="multipart/form-data" id="setting_form">
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
                                <div class="tab-pane active" id="tab-public">
                                    <div class="col-md-12 col-xs-12 margin-ti15">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_site_title}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-shopping-cart"></span></span>
                                                    <input type="text" name="setting_siteTitle" class="form-control" value="<?= $site_title; ?>" placeholder="{{t:adminSetting.placeholder_site_title}}">
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_site_title}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_owner}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                    <input type="text" name="setting_owner" class="form-control" value="<?= $owner; ?>" placeholder="{{t:adminSetting.placeholder_owner}}">
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_owner}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_address}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <textarea name="setting_address" class="form-control" rows="3" placeholder="{{t:adminSetting.placeholder_address}}"><?= $address; ?></textarea>
                                                <span class="help-block">{{t:adminSetting.message_address}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_email}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">@</span>
                                                    <input type="text" name="setting_email" class="form-control" value="<?= $email; ?>" placeholder="{{t:adminSetting.placeholder_email}}">
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_email}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_tell}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                                    <input type="text" name="setting_tell" class="form-control" value="<?= $tell; ?>" placeholder="{{t:adminSetting.placeholder_tell}}">
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_tell}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_fax}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-phone-square"></span></span>
                                                    <input type="text" name="setting_fax" class="form-control" value="<?= $fax; ?>" placeholder="{{t:adminSetting.placeholder_fax}}">
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_fax}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_open}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <textarea name="setting_open" class="form-control" rows="3" placeholder="{{t:adminSetting.placeholder_open}}"><?= $open; ?></textarea>
                                                <span class="help-block">{{t:adminSetting.message_open}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_description}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <textarea name="setting_description" class="form-control" rows="3" placeholder="{{t:adminSetting.placeholder_description}}"><?= $description; ?></textarea>
                                                <span class="help-block">{{t:adminSetting.message_description}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-store">
                                    <div class="col-md-12 col-xs-12 margin-ti15">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_meta_title}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-paperclip"></span></span>
                                                    <input type="text" name="setting_metaTitle" class="form-control" value="<?= $metaTitle; ?>" placeholder="{{t:adminSetting.placeholder_meta_title}}">
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_meta_title}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_meta_description}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <textarea name="setting_metaDescription" class="form-control" rows="3" placeholder="{{t:adminSetting.placeholder_meta_description}}"><?= $metaDescription; ?></textarea>
                                                <span class="help-block">{{t:adminSetting.message_meta_description}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_meta_keyword}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <textarea name="setting_metaKeyword" class="form-control" rows="3" placeholder="{{t:adminSetting.placeholder_meta_keyword}}"><?= $metaKeyword; ?></textarea>
                                                <span class="help-block">{{t:adminSetting.message_meta_keyword}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-local">
                                    <div class="col-md-12 col-xs-12 margin-ti15">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_country}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <select name="setting_country" class="form-control show-tick show-menu-arrow" id="setting-country" data-live-search="true">
                                                    <option value="-1">{{t:general.please_select}}</option>
                                                    <?php foreach( $countries as $country ) {
                                                        $img = (isset($country['isoCode2'])) ? "<img src='".$site_url."/media/img/flags/".strtolower($country["isoCode2"]).".png' />" : "";
                                                        $selectCountry = ($countryValue == $country['id']) ? ' selected' : null;
                                                    ?>
                                                        <option value="<?= $country['id']; ?>" data-content="<?= $img.' '.$country['faName']; ?>"<?= $selectCountry; ?>><?= $country['faName']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block">{{t:adminSetting.message_country}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_zone}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <select name="setting_zone" class="form-control show-tick show-menu-arrow" id="setting-zone" data-live-search="true">
                                                    <option value="-1">{{t:general.please_select}}</option>
                                                    <?php foreach( $zones as $zone ) {
                                                        $selectZone = ($zoneValue == $zone['id']) ? ' selected' : null;
                                                        ?>
                                                        <option value="<?= $zone['id']; ?>"<?= $selectZone; ?>><?= $zone['faName']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block">{{t:adminSetting.message_zone}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_city}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <select name="setting_city" class="form-control show-tick show-menu-arrow" id="setting-city" data-live-search="true">
                                                    <option value="-1">{{t:general.please_select}}</option>
                                                    <?php foreach( $cities as $city ) {
                                                        $selectCity = ($cityValue == $city['id']) ? ' selected' : null;
                                                        ?>
                                                        <option value="<?= $city['id']; ?>"<?= $selectCity; ?>><?= $city['faName']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block">{{t:adminSetting.message_city}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_currency}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <select name="setting_currency" class="form-control show-tick show-menu-arrow" id="setting-currency" data-live-search="true">
                                                    <option value="-1">{{t:general.please_select}}</option>
                                                    <?php foreach( $currencies as $currency ) {
                                                        $selectCurrency = ($currencyValue == $currency['id']) ? ' selected' : null;
                                                        ?>
                                                        <option value="<?= $currency['id']; ?>"<?= $selectCurrency; ?>><?= $currency['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block">{{t:adminSetting.message_currency}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_length_class_id}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <select name="setting_lengthClassId" class="form-control show-tick show-menu-arrow" id="setting-lengthClassId" data-live-search="true">
                                                    <option value="-1">{{t:general.please_select}}</option>
                                                    <?php foreach( $lengthClassIds as $lengthClassId ) {
                                                        $selectLengthClassId = ($lengthClassIdValue == $lengthClassId['id']) ? ' selected' : null;
                                                        ?>
                                                        <option value="<?= $lengthClassId['id']; ?>"<?= $selectLengthClassId; ?>><?= $lengthClassId['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block">{{t:adminSetting.message_length_class_id}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_weight_class_id}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <select name="setting_weightClassId" class="form-control show-tick show-menu-arrow" id="setting-weightClassId" data-live-search="true">
                                                    <option value="-1">{{t:general.please_select}}</option>
                                                    <?php foreach( $weightClassIds as $weightClassId ) {
                                                        $selectWeightClassId = ($weightClassIdValue == $weightClassId['id']) ? ' selected' : null;
                                                        ?>
                                                        <option value="<?= $weightClassId['id']; ?>"<?= $selectWeightClassId; ?>><?= $weightClassId['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block">{{t:adminSetting.message_weight_class_id}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-option">
                                    <legend><span class="fa fa-barcode"></span> {{t:adminSetting.header_label_tab_option_product}}</legend>
                                    <div class="col-md-12 col-xs-12 margin-ti15">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_show_product_count}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_showProductCount" class="iradio" value="1"<?= ($showProductCount == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_showProductCount" class="iradio" value="0"<?= ($showProductCount == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_show_product_count}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_product_description_length}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-arrows-h"></span></span>
                                                    <input type="number" name="setting_productDescriptionLength" min="1" class="form-control" value="<?= $productDescriptionLength ?>" placeholder="{{t:adminSetting.placeholder_product_description_length}}">
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_product_description_length}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti30">
                                        <legend><span class="fa fa-comments-o"></span> {{t:adminSetting.header_label_tab_option_comment}}</legend>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti15">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_comment_status}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_commentStatus" class="iradio" value="1"<?= ($commentStatus == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_commentStatus" class="iradio" value="0"<?= ($commentStatus == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_comment_status}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_comment_guest}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_commentGuest" class="iradio" value="1"<?= ($commentGuest == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_commentGuest" class="iradio" value="0"<?= ($commentGuest == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_comment_guest}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_comment_mail}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_commentMail" class="iradio" value="1"<?= ($commentMail == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_commentMail" class="iradio" value="0"<?= ($commentMail == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_comment_mail}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti30">
                                        <legend><span class="fa fa-gift"></span> {{t:adminSetting.header_label_tab_option_voucher}}</legend>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti15">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_voucher_max}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-gift"></span></span>
                                                    <input type="number" name="setting_voucherMax" min="1" class="form-control" value="<?= $voucherMax; ?>" placeholder="{{t:adminSetting.placeholder_voucher_max}}">
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_voucher_max}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti30">
                                        <legend><span class="fa fa-usd"></span> {{t:adminSetting.header_label_tab_option_tax}}</legend>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti15">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_tax}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_tax" class="iradio" value="1"<?= ($tax == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_tax" class="iradio" value="0"<?= ($tax == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_tax}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti30">
                                        <legend><span class="fa fa-user"></span> {{t:adminSetting.header_label_tab_option_customer}}</legend>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti15">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_customer_price}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_customerPrice" class="iradio" value="1"<?= ($customerPrice == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_customerPrice" class="iradio" value="0"<?= ($customerPrice == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_customer_price}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_login_attempts}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-compass"></span></span>
                                                    <input type="number" name="setting_loginAttempts" min="1" class="form-control" value="<?= $loginAttempts; ?>" placeholder="{{t:adminSetting.placeholder_login_attempts}}">
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_login_attempts}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti15">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_customer_new_mail}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_customerNewEmail" class="iradio" value="1"<?= ($customerNewEmail == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_customerNewEmail" class="iradio" value="0"<?= ($customerNewEmail == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_customer_new_mail}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti30">
                                        <legend><span class="fa fa-list-alt"></span> {{t:adminSetting.header_label_tab_option_invoice}}</legend>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_invoice_prefix}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                                    <input type="text" name="setting_invoicePrefix" class="form-control" value="<?= $invoicePrefix; ?>" placeholder="{{t:adminSetting.placeholder_invoice_prefix}}">
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_invoice_prefix}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_cart_weight}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_cartWeight" class="iradio" value="1"<?= ($cartWeight == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_cartWeight" class="iradio" value="0"<?= ($cartWeight == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_cart_weight}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_checkout_guest}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_checkoutGuest" class="iradio" value="1"<?= ($checkoutGuest == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_checkoutGuest" class="iradio" value="0"<?= ($checkoutGuest == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_checkout_guest}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_checkout_mail}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_checkoutMail" class="iradio" value="1"<?= ($checkoutMail == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_checkoutMail" class="iradio" value="0"<?= ($checkoutMail == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_checkout_mail}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti30">
                                        <legend><span class="fa fa-code-fork"></span> {{t:adminSetting.header_label_tab_option_stock}}</legend>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti15">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_stock_display}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_stockDisplay" class="iradio" value="1"<?= ($stockDisplay == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_stockDisplay" class="iradio" value="0"<?= ($stockDisplay == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_stock_display}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti25">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminSetting.label_stock_warning}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_stockWarning" class="iradio" value="1"<?= ($stockWarning == 1) ? ' checked="checked"' : null; ?>/> {{t:general.enable}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" name="setting_stockWarning" class="iradio" value="0"<?= ($stockWarning == 0) ? ' checked="checked"' : null; ?>/> {{t:general.disable}}</label>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{t:adminSetting.message_stock_warning}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti30">
                                        <legend><span class="fa fa-group"></span> {{t:adminSetting.header_label_tab_option_affiliate}}</legend>
                                    </div>
                                    <div class="col-md-12 col-xs-12 margin-ti30">
                                        <legend><span class="fa fa-reply"></span> {{t:adminSetting.header_label_tab_option_return}}</legend>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-image">image</div>
                                <div class="tab-pane" id="tab-email">email</div>
                                <div class="tab-pane" id="tab-server">server</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $logout; ?>