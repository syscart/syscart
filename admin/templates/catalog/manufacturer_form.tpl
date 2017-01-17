<div class="<?=$classContainer?>">
    <?=$sidebar?>
    <div class="page-content">
        <?=$nav.$breadcrumb.$heading_title?>

        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12 col-xs-12 margin-ti15">
                    <div class="col-md-12 col-xs-12 margin-ti15">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminCatalogManufacturer.label_name}}</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                    <input type="text" name="name" class="form-control" value="" placeholder="{{t:adminCatalogManufacturer.placeholder_name}}">
                                </div>
                                <span class="help-block">{{t:adminCatalogManufacturer.message_name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 margin-ti15">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminCatalogManufacturer.label_country}}</label>
                            <div class="col-md-6 col-xs-12">
                                <select name="country" class="form-control show-tick show-menu-arrow" id="country" data-live-search="true">
                                    <option value="-1">{{t:general.please_select}}</option>
                                    <?php foreach( $countries as $country ) {
                                        $img = (isset($country['isoCode2'])) ? "<img src='media/img/flags/".strtolower($country["isoCode2"]).".png' />" : "";
                                        $selectCountry = ($countryValue == $country['id']) ? ' selected' : null;
                                        ?>
                                        <option value="<?=$country['id']?>" data-content="<?=$img.' '.$country['faName']?>"<?=$selectCountry?>><?=$country['faName']?></option>
                                    <?php } ?>
                                </select>
                                <span class="help-block">{{t:adminCatalogManufacturer.message_country}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 margin-ti15">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminCatalogManufacturer.label_alias}}</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-link"></span></span>
                                    <input type="text" name="alias" class="form-control" value="" placeholder="{{t:adminCatalogManufacturer.placeholder_alias}}">
                                </div>
                                <span class="help-block">{{t:adminCatalogManufacturer.message_alias}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 margin-ti15">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label text-end">{{t:adminCatalogManufacturer.label_image}}</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-picture-o"></span></span>
                                    <input type="text" name="alias" class="form-control" value="" placeholder="{{t:adminCatalogManufacturer.placeholder_image}}">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default select-image" type="button">{{t:general.select_image}}</button>
                                        <button class="btn btn-warning delete-image" type="button"><span class="fa fa-trash"></span></button>
                                    </span>
                                </div>
                                <span class="help-block">{{t:adminCatalogManufacturer.message_image}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $logout.$footer; ?>