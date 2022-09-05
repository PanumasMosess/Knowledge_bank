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
                                        <i class="notika-icon notika-windows"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>List Wait Approve</h2>
                                        <p>Welcome to Data List wait for Approve to knowledge Bank </p>
                                    </div>
                                </div>
                            </div>
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
                            <table id="data-table-list-approve" class="table table-striped nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th style='text-align: center; vertical-align: middle;'>Action</th>
                                        <th>Knowledge Code</th>
                                        <th>Title</th>
                                        <th>Title Other</th>
                                        <th>Video</th>
                                        <th>PDF File</th>
                                        <!-- <th>Other File</th> -->
                                        <th style='text-align: center; vertical-align: middle;'>Status</th>
                                        <th>Upload By</th>
                                        <th>Dept</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th style='text-align: center; vertical-align: middle;'>Action</th>
                                        <th>Knowledge Code</th>
                                        <th>Title</th>
                                        <th>Title Other</th>
                                        <th>Video</th>
                                        <th>PDF File</th>
                                        <!-- <th>Other File</th> -->
                                        <th style='text-align: center; vertical-align: middle;'>Status</th>
                                        <th>Upload By</th>
                                        <th>Dept</th>
                                        <th>Date</th>
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
    <!-- Input Mask JS
		============================================ -->
    <script src="js/jasny-bootstrap.min.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- rangle-slider JS
		============================================ -->
    <script src="js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
    <script src="js/rangle-slider/rangle-active.js"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
    <!-- bootstrap select JS
		============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
    <!--  color-picker JS
		============================================ -->
    <script src="js/color-picker/farbtastic.min.js"></script>
    <script src="js/color-picker/color-picker.js"></script>
    <!--  notification JS
		============================================ -->
    <script src="js/notification/bootstrap-growl.min.js"></script>
    <script src="js/notification/notification-active.js"></script>
    <!--  summernote JS
		============================================ -->
    <script src="js/summernote/summernote-updated.min.js"></script>
    <script src="js/summernote/summernote-active.js"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="js/dropzone/dropzone.js"></script>
    <!--  swal JS
		============================================ -->
    <script src="js/dialog/sweetalert2.min.js"></script>
    <script src="js/dialog/dialog-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  chosen JS
		============================================ -->
    <script src="js/chosen/chosen.jquery.js"></script>
    <!--  notification JS
		============================================ -->
    <script src="js/notification/bootstrap-growl.min.js"></script>

    <!--  Chat JS
		============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <!-- <script src="js/data-table/data-table-act.js"></script> -->
    <!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
    <script src="js/logout.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
    <script>
        $(document).ready(function() {
            _load_approve_master();
            _load_notification_approve();
            _load_notification_online();
        });

        function _load_notification_approve(){
            $(document).ready(function() {
                setTimeout(function() {
                    $("#load_client_approve").load("<?= $CFG->src_main_page; ?>/load_approve_count", {});
                }, 300);
            });
        }
        function _load_notification_online(){
            $(document).ready(function() {
                setTimeout(function() {
                    $("#count_online").load("<?= $CFG->src_main_page; ?>/load_online_count", {});
                }, 300);
            });
        }

        function _load_approve_master() {

            $.ajax({
                url: "<?= $CFG->src_masterData; ?>/load_approve.php",
                success: function(data) {
                    //     console.log(data);
                    var result = JSON.parse(data);
                    callinTable(result);
                }
            });


            function callinTable(data) {
                var table = $("#data-table-list-approve").DataTable({
                    "bDestroy": true,
                    columnDefs: [{
                            orderable: true,
                            className: 'reorder',
                            targets: [0, 2, 3, 4, 5, 6, 7]
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
                                return "<button onclick='knowledage_approve(this.id);' id='" + data["knowledge_id"] + "####" + data["knowledge_code"] + "'  data-toggle='tooltip' title data-placement='left' data-original-title='Detail User' class='btn btn-indigo notika-btn-indigo waves-effect'><i class='notika-icon notika-checked' style='color: #ffff;'>  Approve</i></button>&nbsp;&nbsp;<button onclick='knowledage_reject(this.id);' id='" + data["knowledge_code"] + "'  data-toggle='tooltip' title data-placement='left' data-original-title='Detail User' class='btn btn-danger notika-btn-danger waves-effect'><i class='notika-icon notika-refresh' style='color: #ffff;'>  Recommend</i></button>"
                            },
                            "targets": -1
                        },
                        {
                            data: 'knowledge_code'
                        },
                        {
                            data: 'knowledge_title'
                        },
                        {
                            data: 'knowledge_title_other'
                        },
                        {
                            "data": null,
                            "className": "text-center",
                            render: function(data, type, row) {
                                if (data["knowledge_file_link"] != "") {
                                    return "<button onclick='playYouTubeModal(this.id);' id='" + data["knowledge_file_link"] + "' style='font-size:20px;color:red;align: center;border: none;padding: 0;background: none;' ><i class='fa fa-file-video-o'></i></button>"
                                } else {
                                    return ""
                                }                             
                            },
                            "targets": -1
                        },
                        {
                            "data": null,
                            "className": "text-center",
                            render: function(data, type, row) {
                                if (data["knowledge_file_link_pdf"] != "") {
                                    return "<a href='" + data["knowledge_file_link_pdf"] + '#toolbar=0&navpanes=0' +  "' style='font-size:20px;color:red;align: center;' target='_blank' ><i class='fa fa-file-pdf-o'></i></a>"
                                } else {
                                    return ""
                                }

                            },
                            "targets": -1
                        },
                        // {
                        //     "data": null,
                        //     "className": "text-center",
                        //     render: function(data, type, row) {
                        //         if (data["knowledge_file_link_ppt"] != "") {
                        //             return "<a href='" + data["knowledge_file_link_ppt"] + "#toolbar=0"+"' style='font-size:20px;color:red;align: center;' target='_blank'  ><i class='fa fa-file-powerpoint-o'></i></a>"
                        //         } else {
                        //             return ""
                        //         }

                        //     },
                        //     "targets": -1
                        // },
                        {
                            "data": null,
                            render: function(data, type, row) {
                                if (data['knowledge_running_status'] == 'WAIT_APPROVE') {
                                    return "<div style='text-align: center; vertical-align: middle; color: orange;'>Wait Approve</div>"
                                } else if (data['knowledge_running_status'] == 'RECOMMEND') {
                                    return "<div style='text-align: center; vertical-align: middle; color: #F93106;'>Recommend</div>"
                                } else {
                                    return "<div style='text-align: center; vertical-align: middle; color: green;'>Approve</div>"
                                }
                            },
                            "targets": -1
                        }, {
                            data: 'knowledge_user_upload'
                        }, {
                            data: 'knowledge_dept'
                        }, {
                            data: 'knowledge_issue_date'
                        }
                    ]
                });

            }
        }

        function knowledage_approve(id) {
            //split id
            var str_split = '';
            str_split = id;
            var str_split_result = str_split.split("####");

            var knowledge_id = str_split_result[0];
            var knowledge_code = str_split_result[1];

            swal({
                title: "Are you sure ?",
                text: "You want to Approve Knowledge File !",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Approve ",
                cancelButtonText: "cancel",
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        async: true,
                        type: 'POST',
                        url: '<?= $CFG->src_masterData; ?>/confirm_approve',
                        data: {
                            knowledge_code_ajax: knowledge_code,
                        },
                        success: function(response) {
                            if (response == "APPROVE_SUCCESS") {
                                _load_approve_master();
                                _load_notification_approve();
                                //dialog 
                                swal({
                                    title: "Success !",
                                    text: "Approve File Knowlege สำเร็จ !!! ",
                                    type: "success",
                                    timer: 2500,
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            } else {
                                //dialog ctrl
                                swal({
                                    title: "Warning !",
                                    text: "[D002] --- Ajax Error Can't Approve (ติดต่อ Admin) !!! ",
                                    type: "warning",
                                    timer: 2500,
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        },
                        error: function() {
                            //dialog ctrl
                            swal({
                                title: "Warning !",
                                text: "[D002] --- Ajax Error Can't Approve (ติดต่อ Admin) !!! ",
                                type: "warning",
                                timer: 2500,
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

        var public_knowledge_id;

        function knowledage_reject(id) {
            //split id
            public_knowledge_id = '';
            public_knowledge_id = id;


            $("#update_modal_comment_reject").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: false, //remove option to close with keyboard
                show: true //Display loader!
            });


        }

        function closeModal() {
            $("#reject_details").val('');
            $("#update_modal_comment_reject").modal("hide");
        }

        function confirm_reject(id) {

            swal({
                title: "Are you sure ?",
                text: "You want to Recommend Knowledge File !",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Recommend",
                cancelButtonText: "cancel",
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        async: true,
                        type: 'POST',
                        url: '<?= $CFG->src_masterData; ?>/confirm_reject',
                        data: {
                            reject_details_ajax: $("#reject_details").val(),
                            public_knowledge_id_ajax: public_knowledge_id,
                        },
                        success: function(response) {
                            if (response == "RECOMMEND_SUCCESS") {
                                $("#reject_details").val('');
                                swal({
                                    title: "Recommed Is Success",
                                    type: "success",
                                    cancelButtonText: "OK",
                                });
                                _load_approve_master();
                                _load_notification_approve();
                                closeModal();
                            } else {
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

        function playYouTubeModal(id) {
            $("#videoModal").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: true, //remove option to close with keyboard
                show: true //Display loader!
            });
            var videoSRCauto = `${id}`;

            console.log(videoSRCauto);
            $('#youtube_if').attr('src', videoSRCauto);
        };

        function closeIframe() {
            $("#videoModal").modal("hide");
            $('#youtube_if').attr('src', '');
        }
    </script>
</body>

</html>


<!-- modal comment reject -->
<div class="modal fade" id="update_modal_comment_reject" role="dialog">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h2>Recommend Detail</h2>
                <br />
                <div class="nk-int-st">
                    <textarea class="form-control" id="reject_details" rows="5" placeholder="กรอกรายละเอียดการ Comment ...."></textarea>
                </div>
            </div><br />
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="confirm_reject()">Confirm Recomment</button>
                <button type="button" class="btn btn-warning" onclick="closeModal();">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal video  -->
<div class="modal fade" id="videoModal" role="dialog">
    <div class="modal-dialog modal-large">
        <div class="modal-content" style="padding: 5px 5px;">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeIframe();">&times;</button>
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                <!-- <iframe id="youtube_if" width="100%" height="100%" src="" allowfullscreen> -->
                </iframe>
                <iframe type="video/mp4" id="youtube_if" frameborder="0" class="embed-responsive-item" src="" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>