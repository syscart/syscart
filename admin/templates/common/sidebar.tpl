<div class="page-sidebar page-sidebar-fixed scroll">
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="dashboard">syscart</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="http://localhost/syscart/web/media/img/users/avatar.png" alt="majeed mohammadian"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="http://localhost/syscart/web/media/img/users/avatar.png" alt="majeed mohammadian"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">majeed mohammadian</div>
                    <div class="profile-data-title">Web Developer/Designer</div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        <li class="xn-title">{{t:adminMenu.text_title}}</li>
        <li>
            <a href="dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">{{t:adminMenu.dashboard}}</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">{{t:adminMenu.catalog}}</span></a>
            <ul>
                <li><a href="#"><span class="fa fa-image"></span> {{t:adminMenu.catalog_product}}</a></li>
                <li><a href="#"><span class="fa fa-user"></span> {{t:adminMenu.catalog_category}}</a></li>
                <li><a href="#"><span class="fa fa-users"></span> {{t:adminMenu.catalog_manufacturer}}</a></li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.catalog_attribute}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.catalog_attribute}}</a></li>
                        <li><a href="#"><span class="fa fa-align-justify"></span> {{t:adminMenu.catalog_attribute_group}}</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.catalog_download}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.catalog_download_files}}</a></li>
                        <li><a href="#"><span class="fa fa-align-justify"></span> {{t:adminMenu.catalog_download_category}}</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">{{t:adminMenu.sale}}</span></a>
            <ul>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.sale_customer}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.sale_customer}}</a></li>
                        <li><a href="#"><span class="fa fa-align-justify"></span> {{t:adminMenu.sale_customer_group}}</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.sale_order}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.sale_order_all}}</a></li>
                        <li><a href="#"><span class="fa fa-align-justify"></span> {{t:adminMenu.sale_order_pending}}</a></li>
                        <li><a href="#"><span class="fa fa-align-justify"></span> {{t:adminMenu.sale_order_success}}</a></li>
                        <li><a href="#"><span class="fa fa-align-justify"></span> {{t:adminMenu.sale_order_cancel}}</a></li>
                        <li><a href="#"><span class="fa fa-align-justify"></span> {{t:adminMenu.sale_order_return}}</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.sale_voucher}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.sale_voucher}}</a></li>
                        <li><a href="#"><span class="fa fa-align-justify"></span> {{t:adminMenu.sale_voucher_theme}}</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.sale_payment}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.sale_payment_transaction}}</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.sale_marketing}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.sale_marketing_networker}}</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="fa fa-pencil"></span> {{t:adminMenu.sale_coupon}}</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">{{t:adminMenu.setting}}</span></a>
            <ul>
                <li><a href="setting"><span class="fa fa-cogs"></span> {{t:adminMenu.setting_base}}</a></li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.setting_user}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.setting_users}}</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">{{t:adminMenu.report}}</span></a>
            <ul>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.report_sale}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.report_sale}}</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.report_product}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.report_product}}</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.report_customer}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.report_customer}}</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> {{t:adminMenu.report_marketing}}</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-align-center"></span> {{t:adminMenu.report_marketing}}</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>