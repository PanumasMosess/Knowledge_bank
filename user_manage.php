<?
require_once("application.php");
if (!isset($_SESSION['logged_in'])) {
    header("Location: index");
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
                                        <i class="notika-icon notika-windows"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>User Manage</h2>
                                        <p>Welcome to Data User <span class="bread-ntd">User for management user</span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <button data-toggle="tooltip" data-placement="left" title="Download User List" class="btn"><i class="notika-icon notika-sent"></i></button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-user-master" class="table table-striped nowrap">
                                <thead>
                                    <tr style="font-size: 5px;">
                                        <th>No.</th>
                                        <th>Actions</th>
                                        <th>User Name</th>
                                        <th>Name (EN)</th>
                                        <th>Name (TH)</th>
                                        <th>Dept.</th>
                                        <th>Email</th>
                                        <th>Employee No.</th>
                                        <th>User Type.</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Actions</th>
                                        <th>User Name</th>
                                        <th>Name (EN)</th>
                                        <th>Name (TH)</th>
                                        <th>Dept.</th>
                                        <th>Email</th>
                                        <th>Employee No.</th>
                                        <th>User Type.</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
    <!-- Start Footer area-->
    <?
    require_once("footer.php");
    ?>

    <!-- modal update -->
    <div class="modal fade" id="update_modal" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="nk-form">
                        <div class="input-group">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                            <div class="nk-int-st">
                                <input type="text" id="user_name" class="form-control" placeholder="Username">
                                <input type="hidden" id="user_id" class="form-control" placeholder="Username">
                            </div>
                        </div>

                        <div class="input-group mg-t-15">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                            <div class="nk-int-st">
                                <input type="text" id="name_en" class="form-control" placeholder="Name (EN)">
                            </div>
                        </div>

                        <div class="input-group mg-t-15">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                            <div class="nk-int-st">
                                <input type="text" id="name_th" class="form-control" placeholder="Name (TH)">
                            </div>
                        </div>
                        <div class="input-group mg-t-15">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                            <div class="nk-int-st">
                                <input type="text" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <!-- <div class="input-group mg-t-15">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                            <div class="nk-int-st">
                                <select class="selectpicker" data-live-search="true" id="select_company_" name="select_company_">
                                    <option value="" style="color: #999;" selected>Selected Company...</option>
                                    <?
                                 //   $strSQL_dept_db = " SELECT [knowledge_com_name], [knowledge_com_code] FROM [dbo].[tbl_knowledge_company] where knowledge_com_status = 'ENABLE'";
                               //     $objQuery_dept_db = sqlsrv_query($db_con, $strSQL_dept_db) or die("Error Query [" . $strSQL_dept_db . "]");
                                //    while ($objResult_dept_db = sqlsrv_fetch_array($objQuery_dept_db, SQLSRV_FETCH_ASSOC)) {
                                //    ?>
                                        <option value="<?//= $objResult_dept_db["knowledge_com_code"]; ?>"><?//= $objResult_dept_db["knowledge_com_name"]; ?></option>
                               //     <?
                               //     }
                                    ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="input-group mg-t-15">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-star"></i></span>
                            <div class="bootstrap-select fm-cmp-mg">
                            <select class="selectpicker" data-live-search="true" id="select_dept_" name="select_dept_">
                                    <option value="" style="color: #999;" selected>Selected Dept...</option>
                                    <?
                                    $strSQL_dept_db = " SELECT [knowledge_dept_name]  FROM [tbl_knowledge_department] where knowledge_dept_status = 'ENABLE'";
                                    $objQuery_dept_db = sqlsrv_query($db_con, $strSQL_dept_db) or die("Error Query [" . $strSQL_dept_db . "]");
                                    while ($objResult_dept_db = sqlsrv_fetch_array($objQuery_dept_db, SQLSRV_FETCH_ASSOC)) {
                                    ?>
                                      <option value="<?= $objResult_dept_db["knowledge_dept_name"]; ?>"><?= $objResult_dept_db["knowledge_dept_name"]; ?></option>
                                    <?
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="input-group mg-t-15">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                            <div class="nk-int-st">
                                <input type="text" id="emp_num" class="form-control" placeholder="Employee Number">
                            </div>
                        </div>
                        <div class="input-group mg-t-15">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                            <div class="nk-int-st">
                                <select class="selectpicker" data-live-search="true" id="select_user_type">
                                    <option value="USER">USER</option>
                                    <option value="ADMIN">ADMIN</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group mg-t-15">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                            <div class="nk-int-st">
                                <select class="selectpicker" data-live-search="true" id="select_user_online">
                                    <option value="Enable">Enable</option>
                                    <option value="Disable">Disable</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div><br />
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="updateUser();">Save changes</button>
                    <button type="button" class="btn btn-warning" onclick="closeModal();">Close</button>
                </div>
            </div>
        </div>
    </div>
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
    <!--  Chat JS
		============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!--  notification JS
		============================================ -->
    <script src="js/notification/bootstrap-growl.min.js"></script>
    <script src="js/notification/notification-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- bootstrap select JS
		============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
    <!--  swal JS
		============================================ -->
    <script src="js/dialog/sweetalert2.min.js"></script>
    <script src="js/dialog/dialog-active.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <!-- <script src="js/data-table/data-table-act.js"></script> -->
    <!-- main JS ============================================ -->
    <script src="js/main.js"></script>
    <script src="js/logout.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
    <script>
        $(document).ready(function() {
            _load_user_master();

        });

        function _load_user_master() {

            $.ajax({
                url: "<?= $CFG->src_masterData; ?>/load_user_all.php",
                success: function(data) {
                    // console.log(data);
                    var result = JSON.parse(data);
                    callinTable(result);
                }
            });


            function callinTable(data) {
                var table = $("#data-table-user-master").DataTable({
                    "bDestroy": true,
                    columnDefs: [{
                            orderable: true,
                            className: 'reorder',
                            targets: [0, 2, 3, 4, 5, 6, 7, 8, 9]
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
                                //return "<div class='breadcomb-report'><button data-toggle='tooltip' data-placement='left' title='' class='btn btn-info notika-btn-info waves-effect' data-original-title='Detail User'><i class='notika-icon notika-menu'></i></button></div>"
                                return "<button onclick='form_update(this.id);' id='" + data["user_id"] + "####" + data["user_name"] + "####" + data["user_name_lastname_en"] + "####" + data["user_name_lastname_th"] + "####" + data["user_dept"] + "####" + data["user_email"] + "####" + data["user_emp_no"] + "####" + data["user_type"] + "####" + data["user_enable"] + "'  data-toggle='tooltip' title data-placement='left' data-original-title='Detail User' class='btn btn-info notika-btn-info waves-effect'><i class='notika-icon notika-menu'></i></button>"
                            },
                            "targets": -1
                        },
                        {
                            data: 'user_name'
                        },
                        {
                            data: 'user_name_lastname_en'
                        },
                        {
                            data: 'user_name_lastname_th'
                        },
                        {
                            data: 'user_dept',
                        },
                        {
                            data: 'user_email'
                        },
                        {
                            data: 'user_emp_no'
                        },
                        {
                            data: 'user_type'
                        },
                        {
                            "data": null,
                            render: function(data, type, row) {
                                if (data["user_enable"] == "Disable") {
                                    return "<div style='text-align: center; vertical-align: middle; color: red;'>Disable</div>"
                                } else {
                                    return "<div style='text-align: center; vertical-align: middle; color: green;'>Enable</div>"
                                }
                            },
                            "targets": -1
                        }
                    ]
                });

            }
        }

        function form_update(id) {
            //split id
            var str_split = id;
            var str_split_result = str_split.split("####");

            var user_id = str_split_result[0];
            var user_name = str_split_result[1];
            var user_name_lastname_en = str_split_result[2];
            var user_name_lastname_th = str_split_result[3];
            var user_dept = str_split_result[4];
            var user_email = str_split_result[5];
            var user_emp_no = str_split_result[6];
            var user_type = str_split_result[7];
            var user_set_online = str_split_result[8];
            // var user_company = str_split_result[9];

            $("#user_id").val(user_id);
            $("#user_name").val(user_name);
            $("#name_en").val(user_name_lastname_en);
            $("#name_th").val(user_name_lastname_th);
            // $("#select_company_").val(user_company);
            $("#select_dept_").val(user_dept);
            $("#email").val(user_email);
            $("#emp_num").val(user_emp_no);



            /// set user type
            jQuery("#select_user_type option").filter(function() {
                return $.trim($(this).text()) == user_type;
            }).prop('selected', true);
            $('#select_user_type').selectpicker('refresh');
            /// set status online
            jQuery("#select_user_online option").filter(function() {
                return $.trim($(this).text()) == user_set_online;
            }).prop('selected', true);
            $('#select_user_online').selectpicker('refresh');
            //// set user dept
            jQuery("#select_dept_ option").filter(function() {
                return $.trim($(this).text()) == user_dept;
            }).prop('selected', true);
            $('#select_dept_').val(user_dept);
            $('#select_dept_').selectpicker('refresh');

            //// set depts
            // $('#select_dept_').selectpicker('val', '');
            // $('#select_dept_').find('option').remove();
            // $('#select_dept_').append('<option value="' + user_dept + '" selected>' + user_dept + '</option>');
            // $('#select_dept_').selectpicker('refresh');
            // $.get("<?//= $CFG->src_masterData; ?>/get_dep.php?deptId=" + escape(user_company) + "", function(data) {
            //     var result = JSON.parse(data);
            //     $.each(result, function(index, item) {
            //         $('#select_dept_').append('<option value="' + item.knowledge_dept_name + '">' + item.knowledge_dept_name + '</option>');
            //     });
            //     $('#select_dept_').selectpicker('refresh');
            // });


            $("#update_modal").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: false, //remove option to close with keyboard
                show: true //Display loader!
            });
        }

        function closeModal() {
            $("#user_id").val("");
            $("#user_name").val("");
            $("#name_en").val("");
            $("#name_th").val("");
            $("#email").val("");
            $("#emp_num").val("");
            $('#select_user_type').selectpicker('refresh');
            $('#select_user_online').selectpicker('refresh');
            $('#select_dept_').selectpicker('refresh');
            // $('#select_company_').selectpicker('refresh');
            $("#update_modal").modal("hide");
        }



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
                delay: 2500,
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

        function updateUser() {
            swal({
                title: "Are you sure ?",
                text: "You want to update user !",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "ok",
                cancelButtonText: "cancel",
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= $CFG->src_masterData; ?>/update_user.php',
                        data: {
                            user_id_ajax: $("#user_id").val(),
                            user_ajax: $("#user_name").val(),
                            name_en_ajax: $("#name_en").val(),
                            name_th_ajax: $("#name_th").val(),
                            email_ajax: $("#email").val(),
                            emp_id_ajax: $("#emp_num").val(),
                            select_dept_ajax: $("#select_dept_").val(),
                            select_user_type_ajax: $('#select_user_type').val(),
                            select_user_status_ajax: $('#select_user_online').val()

                        },
                        success: function(response) {

                            if (response == 'SUCCESS_UPDATE_USER') {

                                $("#user_id").val("");
                                $("#user_name").val("");
                                $("#name_en").val("");
                                $("#name_th").val("");
                                $("#email").val("");
                                $("#emp_num").val("");
                                $('#select_user_type').selectpicker('refresh');
                                $('#select_user_online').selectpicker('refresh');
                                $('#select_dept_').selectpicker('refresh');
                                $("#update_modal").modal("hide");

                                var nFrom = 'top';
                                var nAlign = 'right';
                                var nIcons = '';
                                var nType = 'success';
                                var nAnimIn = 'animated fadeInDown';
                                var nAnimOut = 'animated fadeOutUp';
                                var text_ = 'แก้ไขผู้ใช้งานสำเร็จ !';

                                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                                _load_user_master();


                            } else if (response = 'Failed_UPDATE_USER') {

                                var nFrom = 'top';
                                var nAlign = 'right';
                                var nIcons = '';
                                var nType = 'danger';
                                var nAnimIn = 'animated fadeInDown';
                                var nAnimOut = 'animated fadeOutUp';
                                var text_ = 'กรุณาตรวจสอบข้อมูล !';

                                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);
                            } else {
                                console.log(response);
                            }
                        },
                        error: function() {
                            //dialog ctrl
                            swal({
                                title: "Warning !",
                                text: "[D002] --- Ajax Error ไม่สามารถแก้ไขข้อมูลได้ (ติดต่อ Admin) !!! ",
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

        // var companyObject_ = $('#select_company_');
        // var deptObject_ = $('#select_dept_');

        // // on change depts 
        // companyObject_.on('change', function() {
        //     var deptId = $('#select_company_').val();

        //     $.get("<? //= $CFG->src_masterData; ?>/get_dep.php?deptId=" + escape(deptId) + "", function(data) {
        //         var result = JSON.parse(data);
        //         deptObject_.selectpicker('val', '');
        //         deptObject_.find('option').remove();
        //         $('.selectpicker').selectpicker('refresh');
        //         $.each(result, function(index, item) {
        //             deptObject_.append('<option value="' + item.knowledge_dept_name + '">' + item.knowledge_dept_name + '</option>');
        //         });
        //         $('.selectpicker').selectpicker('refresh');
        //     });
        // });
    </script>

</body>

</html>