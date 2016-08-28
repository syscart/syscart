<div class="<?= $classContainer; ?>">
    <?= $sidebar; ?>
    <div class="page-content">
        <?= $nav.$breadcrumb.$heading_title; ?>

        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="row changeRightColomn margin-t10">
                        <div class="panel panel-info">
                            <div class="panel-heading ui-draggable-handle ui-sortable-handle">
                                <div class="col-md-4 col-xs-12 pull-right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="{{t:general.search}}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="top" title="{{t:general.tip_search}}"><span class="fa fa-search"></span></button>
                                            <button class="btn btn-warning" type="button" data-toggle="tooltip" data-placement="top" title="{{t:general.tip_remove_search}}"><span class="fa fa-eraser"></span></button>
                                            <button class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="top" title="{{t:general.tip_filter_pro}}"><span class="fa fa-filter"></span></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-xs-12 pull-left pad-rl-0">
                                    <div class="col-md-9 col-xs-12">
                                        <select class="form-control show-tick show-menu-arrow" id="setting-country" data-live-search="true">
                                            <option value="-1">{{t:general.sort_table_by}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <select class="form-control show-menu-arrow" id="setting-country">
                                            <option value="">{{t:general.all}}</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover" dir="rtl">
                                <thead>
                                    <tr>
                                        <th class="ver-mid-i text-center" style="width:1% !important;">فعال</th>
                                        <th class="ver-mid-i text-right" style="width:74% !important;">عنوان</th>
                                        <th class="ver-mid-i text-right" style="width:10% !important;">اعضا در گروه</th>
                                        <th class="ver-mid-i" style="width:15% !important;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ver-mid-i" style="text-align:center;">
                                            <label class="switch switch-small">
                                                <input type="checkbox" checked="">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td class="ver-mid-i" style="text-align:right;">نام</td>
                                        <td class="ver-mid-i" style="text-align:right;">12</td>
                                        <td class="ver-mid-i iconTable">
                                            <a href="javascript:void(0)" role="button" class="btn btn-sm btn-success table-add-sub" data-toggle="tooltip" data-placement="top" data-original-title="{{t:general.add_sub}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                                            <a href="javascript:void(0)" role="button" class="btn btn-sm btn-info table-edit" data-toggle="tooltip" data-placement="top" data-original-title="{{t:general.edit}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                            <a href="javascript:void(0)" role="button" class="btn btn-sm btn-danger table-remove" data-toggle="tooltip" data-placement="top" data-original-title="{{t:general.remove}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $logout; ?>