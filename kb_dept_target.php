<?
require_once("application.php");
if (!isset($_SESSION["user_name_en_session"])) {
    header("location:login-register.php");
    die;
}
?>

<!doctype html>
<html class="no-js" lang="">

<?
require_once("js_css_header.php");
?>

<body>
    <?
    require_once("menu.php");
    ?>
    <!-- Breadcomb area Start-->
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="fa fa-bullseye"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Target Managment</h2>
                                        <p>Welcome to <span class="bread-ntd">Target Managment</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <button data-toggle="tooltip" data-placement="left" title="Add Taget" onclick="openAddTarget();" class="btn"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Invoice area Start-->
    <div class="invoice-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="invoice-wrap">
                        <!-- <div class="invoice-img">
                            <img src="img/logo/logo.png" alt="" />
                        </div> -->
                        <div class="invoice-hds-pro">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                    <div>
                                        <div class="invoice-frm">
                                            <h4 style="text-align: left;">Year Taget : </h4>
                                        </div>
                                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_year">
                                            <div class="input-group date nk-int-st">
                                                <span class="input-group-addon"></span>
                                                <input type="text" class="form-control" id="year_picker"><span id="load_client"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                    <div>
                                        <div class="invoice-frm">
                                            <h4 style="text-align: left;"> </h4>
                                        </div>

                                        <div class="breadcomb-report" style="text-align: left;">
                                            <button data-toggle="tooltip" data-placement="right" title="Refirsh" onclick="refirshAll();" class="btn"><i class="fa fa-refresh"></i></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="invoice-hs">
                                    <span>Taget Year</span>
                                    <h2><span id="spn_db_target_year_now"></span></h2>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="invoice-hs date-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                                    <span>Current Now (Wait approve)</span>
                                    <h2><span id="spn_db_target_year_current"></span></h2>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="invoice-hs wt-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                                    <span>Success Taget</span>
                                    <h2><span id="spn_db_target_year_success"></span></h2>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="invoice-hs gdt-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                                    <span>Different Total</span>
                                    <h2><span id="spn_db_target_year_diff"></span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="invoice-sp">
                                    <table class="table table-hover" id="target_table">
                                        <thead>
                                            <tr>
                                                <th style='text-align: center; vertical-align: middle;'>#</th>
                                                <th style='text-align: center; vertical-align: middle;'>Action</th>
                                                <th style='text-align: center; vertical-align: middle;'>BU</th>
                                                <th style='text-align: center; vertical-align: middle;'>Year</th>
                                                <th style='text-align: center; vertical-align: middle;'>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody style='text-align: center; vertical-align: middle;'>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="invoice-ds-int">
                                    <h2>Remarks</h2>
                                    <p>Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. </p>
                                </div>
                                <div class="invoice-ds-int invoice-last">
                                    <h2>Notika For Your Business</h2>
                                    <p class="tab-mg-b-0">Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. </p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal targets -->
    <div class="modal fade" id="tagget_modal" role="dialog">
        <div class="modal-dialog modal-large">
            <div class="modal-content">
                <form id="pdfUploadForm_update" enctype="multipart/form-data">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-flag"></i>
                                    </div>
                                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_year">
                                        <div class="input-group date nk-int-st">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" id="year_picker_insert">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <select class="selectpicker" data-live-search="true" id="select_bu" name="select_bu">
                                            <option value="" style="color: #999;" selected>Selected Dept...</option>
                                            <?
                                            $strSQL_dept_db = " SELECT [user_section] FROM [db_hrms].[dbo].[tbl_user] where user_kb_upload = '1' group by user_section";
                                            $objQuery_dept_db = sqlsrv_query($db_con, $strSQL_dept_db) or die("Error Query [" . $strSQL_dept_db . "]");
                                            while ($objResult_dept_db = sqlsrv_fetch_array($objQuery_dept_db, SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                                <option value="<?= $objResult_dept_db["user_section"]; ?>"><?= $objResult_dept_db["user_section"]; ?></option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-draft"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="number" class="form-control" id='target_num' name="target_num" placeholder="Target Number">
                                        <!-- <label class="nk-label">Othor Title</label> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="confirm_target();">Save Target</button>
                        <button type="button" class="btn btn-warning" onclick="closemodel();">Close</button>
                    </div>
            </div>
        </div>
        </from>
    </div>

    <!-- modal targets -->
    <div class="modal fade" id="tagget_update_modal" role="dialog">
        <div class="modal-dialog modal-large">
            <div class="modal-content">
                <form id="pdfUploadForm_update" enctype="multipart/form-data">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-flag"></i>
                                    </div>
                                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_year">
                                        <div class="input-group date nk-int-st">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" id="year_picker_insert_update">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <select class="selectpicker" data-live-search="true" id="select_bu_update" name="select_bu_update">
                                            <option value="" style="color: #999;" selected>Selected Dept...</option>
                                            <?
                                            $strSQL_dept_db = " SELECT [user_section] FROM [db_hrms].[dbo].[tbl_user] where user_kb_upload = '1' group by user_section";
                                            $objQuery_dept_db = sqlsrv_query($db_con, $strSQL_dept_db) or die("Error Query [" . $strSQL_dept_db . "]");
                                            while ($objResult_dept_db = sqlsrv_fetch_array($objQuery_dept_db, SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                                <option value="<?= $objResult_dept_db["user_section"]; ?>"><?= $objResult_dept_db["user_section"]; ?></option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-draft"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="hidden" class="form-control" id='target_id' name="target_id" />
                                        <input type="number" class="form-control" id='target_num_update' name="target_num_update" placeholder="Target Number" />
                                        <!-- <label class="nk-label">Othor Title</label> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="confirm_target_update();">Save Target</button>
                        <button type="button" class="btn btn-warning" onclick="closemodel();">Close</button>
                    </div>
            </div>
        </div>
        </from>
    </div>
    <!-- Invoice area End-->
    <!-- Start Footer area-->
    <?
    require_once("footer.php");
    ?>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>

    <!-- datapicker JS
		============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
    <!-- bootstrap select JS
		============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
    <!--  swal JS
		============================================ -->
    <script src="js/dialog/sweetalert2.min.js"></script>
    <script src="js/dialog/dialog-active.js"></script>
    <!--  notification JS
		============================================ -->
    <script src="js/notification/bootstrap-growl.min.js"></script>
    <script src="js/notification/notification-active.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!-- Login JS
		============================================ -->
    <script src="js/login/login-action.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- <!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                setTimeout(function() {
                    $("#load_client_approve").load("<?= $CFG->src_main_page; ?>/load_approve_count", {});
                }, 300);
            });
            var now_year = new Date().getFullYear();
            $("#year_picker").val("ALL");
            $("#year_picker_insert").val(now_year);
            _load_target();
            _load_card_target();
            _load_notification_online();
        });

        function _load_card_target() {
            setTimeout(function() {
                $("#load_client").load("<?= $CFG->src_masterData; ?>/load_card_target", {
                    year_: $('#year_picker').val(),
                });
            }, 300);
        }

        function refirshAll() {
            $("#year_picker").val("ALL");
            $("#year_picker").text("ALL");
            setTimeout(function() {
                $("#load_client").load("<?= $CFG->src_masterData; ?>/load_card_target", {
                    year_: $('#year_picker').val(),
                });
            }, 300);
        }

        function by_year() {
            setTimeout(function() {
                $("#load_client").load("<?= $CFG->src_masterData; ?>/load_card_target", {
                    year_: $('#year_picker').val(),
                });
            }, 300);
        }

        function openAddTarget() {
            $("#tagget_modal").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: false, //remove option to close with keyboard
                show: true //Display loader!
            });
        }

        function openAddTargetupdate() {
            $("#tagget_update_modal").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: false, //remove option to close with keyboard
                show: true //Display loader!
            });
        };

        //Dialog Alert
        function notify(from, align, icon, type, animIn, animOut, text_) {
            $.growl({
                icon: icon,
                title: 'แจ้งเตือน: ',
                message: text_,
                url: ''
            }, {
                element: 'body',
                type: type,
                allow_dismiss: true,
                placement: {
                    from: from,
                    align: align
                },
                offset: {
                    x: 20,
                    y: 85
                },
                spacing: 10,
                z_index: 1031,
                delay: 2000,
                timer: 2000,
                url_target: '_blank',
                mouse_over: false,
                animate: {
                    enter: animIn,
                    exit: animOut
                },
                icon_type: 'class',
                template: '<div data-growl="container" class="alert" role="alert">' +
                    '<button type="button" class="close" data-growl="dismiss">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '<span class="sr-only">Close</span>' +
                    '</button>' +
                    '<span data-growl="icon"></span>' +
                    '<span data-growl="title"></span>' +
                    '<span data-growl="message"></span>' +
                    '<a href="#" data-growl="url"></a>' +
                    '</div>'
            });
        };

        function confirm_target() {
            swal({
                title: "Are you sure ?",
                text: "You want to add target !",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "ok",
                cancelButtonText: "cancel",
            }).then(function(isConfirm) {
                if (isConfirm) {
                    if ($("#year_picker_insert").val() == "") {

                        $("#tagget_modal").modal("hide");
                        var nFrom = 'top';
                        var nAlign = 'right';
                        var nIcons = '';
                        var nType = 'warning';
                        var nAnimIn = 'animated fadeInDown';
                        var nAnimOut = 'animated fadeOutUp';
                        var text_ = 'กรุณาเลือกปี';

                        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                        setTimeout(function() {
                            $("#year_picker_insert").focus();
                            openAddTarget();
                        }, 2500);


                    } else if ($("#select_bu").val() == "") {

                        $("#tagget_modal").modal("hide");

                        var nFrom = 'top';
                        var nAlign = 'right';
                        var nIcons = '';
                        var nType = 'warning';
                        var nAnimIn = 'animated fadeInDown';
                        var nAnimOut = 'animated fadeOutUp';
                        var text_ = 'กรุณาเลือก BU';

                        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                        setTimeout(function() {
                            $("#select_bu").focus();
                            openAddTarget();
                        }, 2500);



                    } else if ($("#target_num").val() == "") {

                        $("#tagget_modal").modal("hide");

                        var nFrom = 'top';
                        var nAlign = 'right';
                        var nIcons = '';
                        var nType = 'warning';
                        var nAnimIn = 'animated fadeInDown';
                        var nAnimOut = 'animated fadeOutUp';
                        var text_ = 'กรุณากรอกจำนวน Target !';

                        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                        setTimeout(function() {
                            $("#target_num").focus();
                            openAddTarget();
                        }, 2500);


                    } else {

                        $("#tagget_modal").modal("hide");

                        $.ajax({
                            type: 'POST',
                            url: '<?= $CFG->src_masterData; ?>/confirm_taget',
                            data: {
                                year_ajax: $("#year_picker_insert").val(),
                                bu_ajax: $("#select_bu").val(),
                                number_ajax: $("#target_num").val()
                            },
                            success: function(response) {

                                if (response == 'SUCCESS_TAGET') {

                                    $('#select_bu').val(null).trigger('change');
                                    $("#target_num").val('');

                                    var nFrom = 'top';
                                    var nAlign = 'right';
                                    var nIcons = '';
                                    var nType = 'success';
                                    var nAnimIn = 'animated fadeInDown';
                                    var nAnimOut = 'animated fadeOutUp';
                                    var text_ = 'เพิ่ม Taget สำเร็จ';

                                    notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                                    _load_target();


                                } else if (response == 'FAILED_TAGET') {

                                    $('#select_bu').val(null).trigger('change');
                                    $("#target_num").val('');
                                    var nFrom = 'top';
                                    var nAlign = 'right';
                                    var nIcons = '';
                                    var nType = 'danger';
                                    var nAnimIn = 'animated fadeInDown';
                                    var nAnimOut = 'animated fadeOutUp';
                                    var text_ = 'เพิ่ม Taget ไม่สำเร็จ !';

                                    notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);
                                    _load_target();
                                } else if (response == 'UPDATE_TAGET_SUCCESS') {

                                    $('#select_bu').val(null).trigger('change');
                                    $("#target_num").val('');

                                    var nFrom = 'top';
                                    var nAlign = 'right';
                                    var nIcons = '';
                                    var nType = 'success';
                                    var nAnimIn = 'animated fadeInDown';
                                    var nAnimOut = 'animated fadeOutUp';
                                    var text_ = 'แก้ไข Taget สำเร็จ';

                                    notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);
                                    _load_target();

                                } else {

                                    $('#select_bu').val(null).trigger('change');
                                    $("#target_num").val('');
                                    var nFrom = 'top';
                                    var nAlign = 'right';
                                    var nIcons = '';
                                    var nType = 'danger';
                                    var nAnimIn = 'animated fadeInDown';
                                    var nAnimOut = 'animated fadeOutUp';
                                    var text_ = 'แก้ไข Taget ไม่สำเร็จ !';

                                    notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                                    _load_target();
                                }

                            },
                            error: function() {

                                $('#select_bu').val(null).trigger('change');
                                $("#target_num").val('');
                                _load_target();
                                //dialog ctrl
                                swal({
                                    title: "Warning !",
                                    text: "[D002] --- Ajax Error ไม่สามารถเข้าระบบได้ (ติดต่อ Admin) !!! ",
                                    type: "warning",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        });
                    }
                }
            }, function(dismiss) {
                if (dismiss === 'cancel' || dismiss === 'close') {
                    // ignore
                }
            });

        }

        function closemodel() {

            $('#select_bu').val(null).trigger('change');
            $("#target_num").val('');
            $("#tagget_modal").modal("hide");
            $("#tagget_update_modal").modal("hide");
        }

        function _load_target() {

            $.ajax({
                url: "<?= $CFG->src_masterData; ?>/load_target.php",
                success: function(data) {
                    // console.log(data);
                    var result = JSON.parse(data);
                    callinTable(result);
                }
            });


            function callinTable(data) {
                var table = $("#target_table").DataTable({
                    "bDestroy": true,
                    columnDefs: [{
                            orderable: true,
                            className: 'reorder',
                            targets: [1, 2, 3]
                        },
                        {
                            orderable: false,
                            targets: '_all'
                        }
                    ],
                    responsive: true,
                    autoFill: true,
                    colReorder: true,
                    keys: true,
                    // rowReorder: true,
                    select: true,
                    processing: true,
                    serverside: true,
                    data: data,
                    columns: [{
                            data: 'no'
                        },
                        {
                            "data": null,
                            render: function(data, type, row) {

                                return "<button onclick='form_update_target(this.id);' id='" + data['knowledge_taget_dept'] + "##" + data['knowledge_taget_year'] + "##" + data['knowledge_taget_total'] + "##" + data["knowledge_taget_id"] + "' class='btn btn-warning notika-btn-warning waves-effect'><i class='notika-icon notika-draft'></i></button>&nbsp;&nbsp;<button onclick='delete_target(this.id);' id='"+ data["knowledge_taget_id"] +"' class='btn btn-danger notika-btn-warning waves-effect'><i class='fa fa-trash'></i></button>"

                            },
                            "targets": -1
                        },
                        {
                            data: 'knowledge_taget_dept'
                        },
                        {
                            data: 'knowledge_taget_year'
                        },
                        {
                            data: 'knowledge_taget_total'
                        },
                    ]
                });

            }
        }

        function form_update_target(id) {
            openAddTargetupdate();
            //split id
            var str_split = '';
            str_split = id;
            var str_split_result = str_split.split("##");

            var target_bu = str_split_result[0];
            var target_year = str_split_result[1];
            var target_number = str_split_result[2];
            var target_id = str_split_result[3];


            $("#year_picker_insert_update").val(target_year);

            /// set bu
            jQuery("#select_bu_update option").filter(function() {
                return $.trim($(this).text()) == target_bu;
            }).prop('selected', true);
            $('#select_bu_update').selectpicker('refresh');
            $("#target_num_update").val(target_number);
            $("#target_id").val(target_id);

        }

        function confirm_target_update(){
            swal({
                title: "Are you sure ?",
                text: "You want to update target !",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "ok",
                cancelButtonText: "cancel",
            }).then(function(isConfirm) {
                if (isConfirm) {

                    $("#tagget_update_modal").modal("hide");

                    $.ajax({
                        type: 'POST',
                        url: '<?= $CFG->src_masterData; ?>/update_target',
                        data: {
                            year_ajax: $("#year_picker_insert_update").val(),
                            dept_ajax: $("#select_bu_update").val(),
                            number_ajax: $("#target_num_update").val(),
                            id_ajax: $("#target_id").val()
                        },
                        success: function(response) {

                            if (response == 'UPDATE_TARGET_SUCCESS') {

                                $('#selectselect_bu_update_bu').val(null).trigger('change');
                                $("#target_num_update").val('');
                                $("#year_picker_insert_update").val('');

                                var nFrom = 'top';
                                var nAlign = 'right';
                                var nIcons = '';
                                var nType = 'success';
                                var nAnimIn = 'animated fadeInDown';
                                var nAnimOut = 'animated fadeOutUp';
                                var text_ = 'แก้ไข Taget สำเร็จ';

                                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                                _load_target();


                            } else if (response == 'UPDATE_TARGET_FAILED') {

                                var nFrom = 'top';
                                var nAlign = 'right';
                                var nIcons = '';
                                var nType = 'danger';
                                var nAnimIn = 'animated fadeInDown';
                                var nAnimOut = 'animated fadeOutUp';
                                var text_ = 'แก้ไข Taget ไม่สำเร็จ !';

                                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);
                                _load_target();
                            }

                        },
                        error: function() {
                            //dialog ctrl
                            swal({
                                title: "Warning !",
                                text: "[D002] --- Ajax Error ไม่สามารถเข้าระบบได้ (ติดต่อ Admin) !!! ",
                                type: "warning",
                                timer: 3000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        }
                    });

                }
            }, function(dismiss) {
                if (dismiss === 'cancel' || dismiss === 'close') {
                    // ignore
                }
            });
        }

        function delete_target(id){
            swal({
                title: "Are you sure ?",
                text: "You want to delete target !",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "ok",
                cancelButtonText: "cancel",
            }).then(function(isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        type: 'POST',
                        url: '<?= $CFG->src_masterData; ?>/delete_target',
                        data: {
                            id_ajax: id
                        },
                        success: function(response) {

                            if (response == 'DELETE_TARGET_SUCCESS') {

                                var nFrom = 'top';
                                var nAlign = 'right';
                                var nIcons = '';
                                var nType = 'success';
                                var nAnimIn = 'animated fadeInDown';
                                var nAnimOut = 'animated fadeOutUp';
                                var text_ = 'ลบ Taget สำเร็จ';

                                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                                _load_target();


                            } else if (response == 'DELETE_TARGET_FAILED') {

                                var nFrom = 'top';
                                var nAlign = 'right';
                                var nIcons = '';
                                var nType = 'danger';
                                var nAnimIn = 'animated fadeInDown';
                                var nAnimOut = 'animated fadeOutUp';
                                var text_ = 'ลบ Taget ไม่สำเร็จ !';

                                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);
                                _load_target();
                            }

                        },
                        error: function() {
                            //dialog ctrl
                            swal({
                                title: "Warning !",
                                text: "[D002] --- Ajax Error ไม่สามารถเข้าระบบได้ (ติดต่อ Admin) !!! ",
                                type: "warning",
                                timer: 3000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        }
                    });

                }
            }, function(dismiss) {
                if (dismiss === 'cancel' || dismiss === 'close') {
                    // ignore
                }
            });
        }
        function _load_notification_online(){
            $(document).ready(function() {
                setTimeout(function() {
                    $("#count_online").load("<?= $CFG->src_main_page; ?>/load_online_count", {});
                }, 300);
            });
        }
    </script>
    <script src="js/logout.js"></script>
</body>

</html>