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
                                        <input type="text" class="form-control" id="filter-name" placeholder="{{t:general.search}}" value="<?=$filter_name?>">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="top" title="{{t:general.tip_search}}" id="btn-filter-search"><span class="fa fa-search"></span></button>
                                            <button class="btn btn-warning" type="button" data-toggle="tooltip" data-placement="top" title="{{t:general.tip_remove_search}}" id="btn-filter-clear"><span class="fa fa-eraser"></span></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-xs-12 pull-left pad-rl-0">
                                    <div class="col-md-6 col-xs-12">
                                        <select class="form-control show-tick show-menu-arrow" id="filter-sort">
                                            <option value="-1">{{t:general.sort_table_by}}</option>
                                            <option value="name"<?=($sort=='name') ? ' selected' : '';?>>{{t:adminCatalogManufacturer.sort_name}}</option>
                                            <option value="countryId"<?=($sort=='countryId') ? ' selected' : '';?>>{{t:adminCatalogManufacturer.sort_country}}</option>
                                            <option value="ordering"<?=($sort=='ordering') ? ' selected' : '';?>>{{t:adminCatalogManufacturer.sort_ordering}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <select class="form-control show-tick show-menu-arrow" id="filter-order">
                                            <option value="-1">{{t:general.order_table_by}}</option>
                                            <option value="ASC"<?=($order=='ASC') ? ' selected' : '';?>>{{t:general.order_table_asc}}</option>
                                            <option value="DESC"<?=($order=='DESC') ? ' selected' : '';?>>{{t:general.order_table_desc}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <select class="form-control show-tick show-menu-arrow" id="filter-limit">
                                            <option value="-1">{{t:general.limit_table}}</option>
                                            <option value="10"<?=($limit==10) ? ' selected' : '';?>>10</option>
                                            <option value="20"<?=($limit==20) ? ' selected' : '';?>>20</option>
                                            <option value="30"<?=($limit==30) ? ' selected' : '';?>>30</option>
                                            <option value="50"<?=($limit==50) ? ' selected' : '';?>>50</option>
                                            <option value="100"<?=($limit==100) ? ' selected' : '';?>>100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover" id="table-data">
                                <thead>
                                    <tr>
                                        <th class="ver-mid-i text-center width-i1 width-m1">
                                            <input type="checkbox" class="icheckbox" id="checkAll" value="1"/>
                                        </th>
                                        <th class="ver-mid-i text-right width-i50 width-m65">{{t:adminCatalogManufacturer.column_name}}</th>
                                        <th class="ver-mid-i text-right width-i25 width-m100" data-hide="phone,tablet">{{t:adminCatalogManufacturer.column_country}}</th>
                                        <th class="ver-mid-i text-left width-i25 width-m35"></th>
                                        <th class="ver-mid-i width-i1 width-m100 text-center" data-toggle="true"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($empty)) { ?>
                                        <tr><td colspan="5" class="noDataTable">داده ای یافت نشد</td></tr>
                                    <?php } else {
                                        foreach( $dataTable as $key => $item ) { ?>
                                            <tr class="row-<?= $item['id'] ?>">
                                                <td class="ver-mid-i text-center">
                                                    <input type="checkbox" class="icheckbox checkId" name="check[]" value="<?= $item['id'] ?>"/>
                                                </td>
                                                <td class="ver-mid-i text-right fontI14 fontM11"><?= $item['name'] ?></td>
                                                <td class="ver-mid-i text-right fontI14 fontM11"><?= $item['countryName'] ?></td>

                                                <td class="ver-mid-i iconTable text-left">
                                                    <a href="admin/catalog/manufacturer/edit/<?= $item['id'] ?>" role="button" class="btn btn-sm btn-info table-edit" data-toggle="tooltip" data-placement="top" data-original-title="{{t:general.edit}}">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="javascript:void(0)" role="button" class="btn btn-sm btn-danger table-remove" data-toggle="tooltip" data-placement="top" data-original-title="{{t:general.remove}}" data-id="<?= $item['id'] ?>">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                                <td class="ver-mid-i text-right"></td>
                                            </tr>
                                            <?php
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $logout.$footer; ?>