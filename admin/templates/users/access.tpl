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
                                <div class="col-md-5 col-xs-12 pull-left pad-rl-0">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-5 col-xs-12">
                                        <select class="form-control show-tick show-menu-arrow" id="select-filter-type">
                                            <option value="-1">{{t:adminUserAccess.filter_type}}</option>
                                            <option value="organization">{{t:adminUserAccess.type_organization}}</option>
                                            <option value="department">{{t:adminUserAccess.type_department}}</option>
                                            <option value="role">{{t:adminUserAccess.type_role}}</option>
                                            <option value="link">{{t:adminUserAccess.type_link}}</option>
                                            <option value="action">{{t:adminUserAccess.type_action}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <select class="form-control show-tick show-menu-arrow" id="select-limit">
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
                                            <input type="checkbox" class="iCheckbox" id="checkAll" value="1"/>
                                        </th>
                                        <th class="ver-mid-i text-right width-i40 width-m35">{{t:adminUserAccess.colomn_type}}</th>
                                        <th class="ver-mid-i text-right width-i60 width-m65">{{t:adminUserAccess.colomn_name}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( $access as $item ) { ?>
                                        <tr>
                                            <td class="ver-mid-i text-center">
                                                <input type="checkbox" class="iCheckbox checkId" name="check[]" value="<?=$item['id']?>"/>
                                            </td>
                                            <td class="ver-mid-i text-right fontI14 fontM11"><?=$item['typeName']?></td>
                                            <td class="ver-mid-i text-right fontI14 fontM11"><?=$item['name']?></td>
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