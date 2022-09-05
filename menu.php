    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->

    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="index">
                            <img height="100" src="<? $CFG->wwwroot ?>img/logo/kb.png" alt="" />
                            <!-- <font style="color: #185ADB;font-weight: bold; font-size: 22px; padding: 12px 0px;">&nbsp;&nbsp;KNOWLEDGE</font> -->
                            <!-- <font style="color: red; font-weight: bold; font-size: 22px;padding: 12px 0px;">&nbsp;BANK</font> -->
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item">
                                <div class="logo-area">
                                    <img width="100" height="100" src="<? $CFG->wwwroot ?>img/logo/dscm.png" alt="" />
                                    <img width="41" height="100" src="<? $CFG->wwwroot ?>img/logo/P-Albatross-Logistics.png" alt="" />
                                    <img width="65" height="100" src="<? $CFG->wwwroot ?>img/logo/TTV_Supplychain logo.png" alt="" />
                                    <img width="43" height="100" src="<? $CFG->wwwroot ?>img/logo/gdjm.png" alt="" />
                                    <img width="43" height="100" src="<? $CFG->wwwroot ?>img/logo/gdjr.png" alt="" />
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                                <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                    <div class="search-input">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" onkeypress="search(event)" />
                                    </div>
                                </div>
                            </li>
                            <? if (isset($_SESSION["user_name_en_session"])) { ?>
                                <li class="nav-item nc-al">
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="true" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-support"></i></span></a>
                                    <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                        <div class="hd-mg-tt">
                                            <h2>Your Account</h2>
                                        </div>
                                        <div class="hd-message-info">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/no-image.jpg" alt="">
                                                </div>
                                                <? if (isset($_SESSION["user_name_en_session"])) { ?>
                                                    <div class="hd-mg-ctn">
                                                        <h3><?= $_SESSION["user_name_en_session"]; ?></h3>
                                                        <h3><?= $_SESSION["user_name_th_session"]; ?></h3>
                                                        <p><?= $_SESSION["user_section_session"]; ?></p>
                                                        <p><?= $_SESSION["user_company_session"]; ?></p>
                                                    </div>
                                                <? } ?>
                                            </div>
                                        </div>
                                        <div class="hd-mg-va"><a href="#" onclick="logout_cc()">Log Out&nbsp;&nbsp;<span><i class="notika-icon notika-next"></i></span></a></div>
                                    </div>
                                </li>
                            <? } ?>
                            <? if (!isset($_SESSION["user_name_en_session"])) { ?>
                                <li class="nav-item">
                                    <a href="login-register" data-toggle="tooltip" data-placement="bottom" title="" role="button" aria-expanded="false" class="nav-link dropdown-toggle" data-original-title="Login"><i class="notika-icon notika-social" style="align-items: center;"></i></a>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#HomeM" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="index">Knowledge Bank Dashboard</a></li>
                                    </ul>
                                </li>
                                <? if (isset($_SESSION["user_name_en_session"])) { ?>
                                    <li><a data-toggle="collapse" data-target="#ManagementsM" href="#">Managements</a>
                                        <ul id="ManagementsM" class="collapse dropdown-header-top">
                                            <li><a href="upload_file">Managements Knowledge</a></li>
                                            <li><a href="list_by_user">List Knowledge by User</a></li>
                                        </ul>
                                    </li>
                                <? } ?>
                                <li><a data-toggle="collapse" data-target="#helpM" href="#">Help</a>
                                    <ul id="helpM" class="collapse dropdown-header-top">
                                        <li><a href="contact">Contact</a>
                                        </li>
                                    </ul>
                                </li>
                                <? if ((isset($_SESSION["user_name_en_session"]) && ($_SESSION['user_upload_session'] == '3'))) { ?>
                                    <li><a data-toggle="collapse" data-target="#masterD" href="#">Master Data</a>
                                        <ul id="masterD" class="collapse dropdown-header-top">
                                            <li><a href="approve">Approve</a></li>
                                            <!-- <li><a href="user_manage">User Managements</a> -->
                                        </ul>
                                    </li>
                                <? } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span id="load_client_approve"></span>
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="<? if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == "index") {
                                        echo "active";
                                    } ?>"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <? if ($_SESSION['user_upload_session'] == '3' || $_SESSION['user_upload_session'] == '1') { ?>
                            <li class="<? if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == "upload_file" || basename($_SERVER["SCRIPT_FILENAME"], '.php') == "list_by_user") {
                                            echo "active";
                                        } ?>"><a data-toggle="tab" href="#manage"><i class="notika-icon notika-draft"></i> Managements</a>
                            </li>
                        <? } ?>
                        <li class="<? if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == "contact") {
                                        echo "active";
                                    } ?>"><a data-toggle="tab" href="#help"><i class="notika-icon notika-support"></i>Help</a>
                        </li>
                        <? if ((isset($_SESSION["user_name_en_session"]) && ($_SESSION['user_upload_session']) == '3')) { ?>
                            <li class="<? if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == "approve" || basename($_SERVER["SCRIPT_FILENAME"], '.php') == "user_manage") {
                                            echo "active";
                                        } ?>"><a data-toggle="tab" href="#masterData"><i class="notika-icon notika-settings"></i> Master Data</a>
                            </li>
                        <? } ?>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in notika-tab-menu-bg animated flipInX <? if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == "index") {
                                                                                                    echo "active";
                                                                                                } ?>">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index">Knowledge Bank Dashboard</a>
                                </li>
                            </ul>
                        </div>
                        <div id="manage" class="tab-pane notika-tab-menu-bg animated flipInX <? if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == "upload_file" || basename($_SERVER["SCRIPT_FILENAME"], '.php') == "list_by_user") {
                                                                                                    echo "active";
                                                                                                } ?>">
                            <ul class="notika-main-menu-dropdown">
                                </li>
                                <li><a href="upload_file">Managements Knowledge</a>
                                </li>
                                <li><a href="list_by_user">List Knowledge by User</a></li>
                            </ul>
                        </div>
                        <div id="help" class="tab-pane notika-tab-menu-bg animated flipInX <? if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == "contact") {
                                                                                                echo "active";
                                                                                            } ?>">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="contact">Contact</a></li>
                                <li><a href="pdf_view.php?pdf1=src/manual/Knowledge Bank Application Manual-BC on Feb.pdf" target='_blank'>User Manual</a></li>
                            </ul>
                        </div>
                        <div id="masterData" class="tab-pane notika-tab-menu-bg animated flipInX <? if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == "approve" || basename($_SERVER["SCRIPT_FILENAME"], '.php') == "kb_dept_target" || basename($_SERVER["SCRIPT_FILENAME"], '.php') == "user_online") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="approve">Approve</a>
                                    <div style="align-items: center;" class="spinner41 spinner-41"></div>
                                    <div class="ntd-ctn1"><span id="count_approve"></span></div>
                                </li>
                                <!-- <li><a href="user_manage">User Managements</a></li> -->
                                <li><a href="kb_dept_target">Tagget Knowledge Managements</a></li>
                                <li><a href="user_online">User Online</a>
                                    <div style="align-items: center;left: 425px;" class="spinner41 spinner-41"></div>
                                    <div class="ntd-ctn1" style="left: 430px;" ><span id="count_online"></span></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End--
    <!-- Change btn -->
    <script>
        function search(event) {
            var key_en = event.keyCode;
            if (key_en == 13) {
                window.location.href = 'search_data'
            }
        }
    </script>
    <!--  Chat J