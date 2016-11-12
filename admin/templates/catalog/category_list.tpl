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
                                        <select class="form-control show-tick show-menu-arrow" id="select-sort-table" data-live-search="true">
                                            <option value="-1">{{t:general.sort_table_by}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <select class="form-control show-menu-arrow" id="select-limit">
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
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="ver-mid-i text-center width-i1 width-m1">
                                            <input type="checkbox" class="icheckbox" id="checkAll" value="1"/>
                                        </th>
                                        <th class="ver-mid-i text-right width-i74 width-m100">عنوان</th>
                                        <th class="ver-mid-i text-center width-i1 width-m100" data-hide="phone,tablet">وضعیت</th>
                                        <th class="ver-mid-i width-i15 width-m100" data-hide="phone,tablet"></th>
                                        <th class="ver-mid-i width-i1 width-m100 text-center" data-toggle="true"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( $categories as $key => $category ) { ?>
                                        <tr>
                                            <td class="ver-mid-i text-center">
                                                <?php if($category['parent'] != 0) { ?>
                                                <input type="checkbox" class="icheckbox checkId" name="check[]" value="<?=$category['id']?>"/>
                                                <?php } ?>
                                            </td>
                                            <td class="ver-mid-i text-right fontI14 fontM11"><?=$category['name']?></td>
                                            <td class="ver-mid-i text-center">
                                                <?php if($category['parent'] != 0) { ?>
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" class="changeState" value="1" data="<?=$category['id']?>" <?=($category['state']) ? 'checked' : '';?>>
                                                        <span class="changeStateClick"></span>
                                                    </label>
                                                <?php } ?>
                                            </td>

                                            <td class="ver-mid-i iconTable">
                                                <a href="javascript:void(0)" role="button" class="btn btn-sm btn-success table-add-sub" data-toggle="tooltip" data-placement="top" data-original-title="{{t:general.add_sub}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                                                <?php if($category['parent'] != 0) { ?>
                                                    <a href="javascript:void(0)" role="button" class="btn btn-sm btn-info table-edit" data-toggle="tooltip" data-placement="top" data-original-title="{{t:general.edit}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                                    <a href="javascript:void(0)" role="button" class="btn btn-sm btn-danger table-remove" data-toggle="tooltip" data-placement="top" data-original-title="{{t:general.remove}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                                <?php } ?>
                                            </td>
                                            <td class="ver-mid-i text-right"></td>
                                        </tr>
                                    <?php } ?>
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