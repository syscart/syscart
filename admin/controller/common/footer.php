<?php
/**
 * @package    syscart
 *             admin/controller/common/footer.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerCommonFooter extends adminController
{
    public function index()
    {
        global $client, $sysConfig;

        $bodyModal = '<div class="col-lg-12 margin-bi30 modal-body-header">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="{{t:general.back_page}}"><span class="fa fa-level-up"></span></button>
                                    <button class="btn btn-info hidden-xs" data-toggle="tooltip" data-placement="top" title="{{t:general.refresh}}"><span class="fa fa-refresh"></span></button>
                                    <button class="btn btn-info hidden-xs" data-toggle="tooltip" data-placement="top" title="{{t:general.new_folder}}"><span class="fa fa-folder"></span></button>
                                    <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="{{t:general.one_upload}}"><span class="fa fa-upload"></span></button>
                                    <button class="btn btn-default hidden-xs" data-toggle="tooltip" data-placement="top" title="{{t:general.multi_upload}}"><span class="fa fa-cloud-upload"></span></button>
                                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="{{t:general.remove}}"><span class="fa fa-trash-o"></span></button>
                                </span>
                                <input type="text" class="form-control" placeholder="{{t:general.search}}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="top" title="{{t:general.tip_search}}"><span class="fa fa-search"></span></button>
                                </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-3 margin-bi30 modal-body-data">
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" class="form-control" placeholder="عنوان">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" class="form-control" placeholder="مفهوم تصویر">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" class="form-control" placeholder="توضیحات">
                        </div>
                      </div>
                      <div class="col-lg-9 margin-bi30 modal-body-data">
                        <div class="col-lg-2 pull-right">
                            <img src="'.$sysConfig->get('url').'/media/img/folder.png" alt="folder">
                            <p><input type="checkbox"> jsj</p>
                        </div>
                      </div>
                      <div class="col-lg-12 margin-bi30 modal-body-footer">
                        <div class="pagination pagination-sm pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li class="active"><a href="#">8</a></li>
                            <li class="disabled"><a href="#">»</a></li>
                        </div>
                      </div>';

        $modalOption = [
            'id' => 'modal-media',
            'size' => 'large',
            'title' => '{{t:general.title_modal_media}}',
            'showFooter' => false,
            'body' => $bodyModal
        ];
        
        $data['modalMedia'] = loaderController('common'.DS.'modal', 'render', $client, $modalOption);
        
        return loaderTemplate('common/footer', $data, $client);
    }
}