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
                                        <i class="notika-icon notika-form"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>List Knowledge Page</h2>
                                        <p>Welcome to List Knowledge By <?= $_SESSION['user_name_en_session']; ?> </p>
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
                            <table id="data-table-list-user" class="table table-striped nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Action</th>
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
                                        <th>Action</th>
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

    <!-- modal update -->
<div class="modal fade" id="update_modal_knowledge" role="dialog">
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
                                    <i class="notika-icon notika-draft"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name='title_know' id='title_know' class="form-control" autocomplete="off" placeholder="Title">
                                    <!-- <label class="nk-label">Title</label> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int float-lb floating-lb">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-draft"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" id='title_other' name="title_other" placeholder="Othor Title">
                                    <input type="hidden" class="form-control" id='knowledge_code' name="knowledge_code" placeholder="Author">
                                    <!-- <label class="nk-label">Othor Title</label> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int float-lb floating-lb">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-flag"></i>
                                </div>
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_year_target">
                                    <div class="input-group date nk-int-st">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" placeholder="Target Knowledge Year" id="year_target" name="year_target"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dropzone area Start-->
                    <div class="dropzone-area">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="dropdone-nk mg-t-30">
                                    <div id="dropzone1" class="multi-uploader-cs">
                                        <div class="dropzone dropzone-nk needsclick" id="demo1-upload-update">
                                            <div class="dz-message needsclick download-custom">
                                                <i class="notika-icon notika-cloud"></i>
                                                <h2>Drop files here or click to upload. (MP4, PDF File only)</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br />
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="uploaderBtn_update">Save changes</button>
                    <button type="button" class="btn btn-warning" onclick="closeModal();">Close</button>
                </div>
        </div>
    </div>
    </from>
</div>
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
    <script src="js/data-table/data-table-act.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
    <script src="js/logout.js"></script>
    <script>
        $(document).ready(function() {
            _load_user_master();
            _load_notification_approve();
        });

        function _load_user_master() {

            $.ajax({
                url: "<?= $CFG->src_manageUpload; ?>/load_list_by_emp.php",
                success: function(data) {
                    var result = JSON.parse(data);
                    callinTable(result);
                }
            });


            function callinTable(data) {
                var table = $("#data-table-list-user").DataTable({
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
                                if (data['knowledge_running_status'] == 'RECOMMEND') {
                                    var title = data["knowledge_title"].replace(/'/g, '&#39;');
                                    var title_other = data["knowledge_title_other"].replace(/'/g, '&#39;');
                                    return "<button onclick='form_update_knowledage(this.id);' id='" + data["knowledge_id"] + "####" + data["knowledge_code"] + "####" + title + "####" + title_other + "####" + data["knowledge_file_link"] + "####" + data["knowledge_author"] + "####" + data["knowledge_target_year"] + "'  data-toggle='tooltip' title data-placement='left' data-original-title='Detail User' class='btn btn-info notika-btn-info waves-effect'><i class='notika-icon notika-draft'></i></button>&nbsp;&nbsp;<button onclick='detailReject(this.id);' id='" + data["knowledge_running_reject_comment"] + "' class='btn btn-warning notika-btn-warning waves-effect'><i class='notika-icon notika-menu'></i></button>"
                                } else if (data['knowledge_running_status'] == 'APPROVE') {
                                    return "";
                                } else {
                                    var title = data["knowledge_title"].replace(/'/g, '&#39;');
                                    var title_other = data["knowledge_title_other"].replace(/'/g, '&#39;');
                                    return "<button onclick='form_update_knowledage(this.id);' id='" + data["knowledge_id"] + "####" + data["knowledge_code"] + "####" + title + "####" + title_other + "####" + data["knowledge_file_link"] + "####" + data["knowledge_author"] + "####" + data["knowledge_target_year"] +  "'  data-toggle='tooltip' title data-placement='left' data-original-title='Detail User' class='btn btn-info notika-btn-info waves-effect'><i class='notika-icon notika-draft'></i></button>"
                                }
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
                                    return "<a href='pdf_view.php?pdf1= " + data["knowledge_file_link_pdf"] + "' style='font-size:20px;color:red;align: center;' target='_blank'><i class='fa fa-file-pdf-o'></i></a>"
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
                        //         if(data["knowledge_file_link_ppt"] != ""){
                        //             return "<a href='" + data["knowledge_file_link_ppt"] + "' style='font-size:20px;color:red;align: center;' target='_blank' ><i class='fa fa-file-powerpoint-o'></i></a>"
                        //         }else{
                        //             return ""
                        //         }

                        //     },
                        //     "targets": -1
                        // },
                        {
                            "data": null,
                            render: function(data, type, row) {
                                if (data['knowledge_running_status'] == 'RECOMMEND') {
                                    return "<div style='text-align: center; vertical-align: middle; color: #F93106;'>Recommend</div>"
                                } else if (data['knowledge_running_status'] == 'WAIT_APPROVE') {
                                    return "<div style='text-align: center; vertical-align: middle; color: orange;'>Wait Approve</div>"
                                } else {
                                    return "<div style='text-align: center; vertical-align: middle; color: green;'>Approve</div>"
                                }
                            },
                            "targets": -1
                        },
                        {
                            data: 'knowledge_user_upload'
                        },
                        {
                            data: 'knowledge_dept'
                        },
                        {
                            data: 'knowledge_issue_date'
                        },
                    ]
                });

            }
        }

        function _load_notification_approve() {
            $(document).ready(function() {
                setTimeout(function() {
                    $("#load_client_approve").load("<?= $CFG->src_main_page; ?>/load_approve_count", {});
                }, 300);
            });
        }

        //Dropzone Configuration
        Dropzone.autoDiscover = false;

        function form_update_knowledage(id) {

            $("#update_modal_knowledge").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: false, //remove option to close with keyboard
                show: true //Display loader!
            });
            //split id
            var str_split = '';
            str_split = id;
            var str_split_result = str_split.split("####");



            var knowledge_id = str_split_result[0];
            var knowledge_code = str_split_result[1];
            var knowledge_title = str_split_result[2];
            var knowledge_title_other = str_split_result[3];
            var knowledge_file_link = str_split_result[4];
            var knowledge_author = str_split_result[5];
            var knowledge_target = str_split_result[6];

            //  knowledge_file_link = "https://www.youtube.com/watch?v=" + knowledge_file_link;

            $("#title_know").val(knowledge_title);
            $("#title_other").val(knowledge_title_other);
            //  $("#you_link").val(knowledge_file_link);
            $("#knowledge_code").val(knowledge_code);
            $("#year_target").val(knowledge_target);

            var myDropzone = new Dropzone("div#demo1-upload-update", {
                url: '<?= $CFG->wwwroot; ?>/upload_update.php',
                uploadMultiple: true,
                autoProcessQueue: false,
                parallelUploads: 3,
                maxFilesize: 1024,
                acceptedFiles: ".mp4,application/pdf",
                createImageThumbnails: false,
                addRemoveLinks: true,
                maxFiles: 2,
                method: 'post',
                paramName: "file",
                maxfilesexceeded: function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                },
                init: function(file) {
                    myDropzone = this;
                    $("#uploaderBtn_update").click(function() {
                        swal({
                            title: "Are you sure ?",
                            text: "You want to Update Knowledge Bank !",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonText: "upload ",
                            cancelButtonText: "cancel",
                        }).then(function(isConfirm) {
                            if (isConfirm) {
                                if (myDropzone.getQueuedFiles().length == 0) {
                                    $.ajax({
                                        async: true,
                                        type: 'POST',
                                        url: '<?= $CFG->wwwroot; ?>/upload_update',
                                        data: {
                                            title_know: $("#title_know").val(),
                                            title_other: $("#title_other").val(),
                                            //      author: $("#author").val(),
                                            knowledge_code: $("#knowledge_code").val(),
                                            year_target: $("#year_target").val()
                                        },
                                        success: function(response) {
                                            $("#title_know").val('');
                                            //     $("#author").val('');
                                            $("#title_other").val('');
                                            $("#knowledge_code").val('');
                                            swal({
                                                title: "Update Knowledge",
                                                type: "success",
                                                cancelButtonText: "OK",
                                            });
                                            _load_user_master();
                                            closeModal();
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


                                } else {
                                    myDropzone.processQueue();
                                }

                            }
                        }, function(dismiss) {
                            if (dismiss === 'cancel' || dismiss === 'close') {
                                // ignore
                            }
                        });
                    });

                    this.on('sending', function(file, xhr, formData) {
                        // Append all form inputs to the formData Dropzone will POST
                        var data = $('div :input').serializeArray();
                        $.each(data, function(key, el) {
                            formData.append(el.name, el.value);
                        });
                    });

                    this.on('success', function(file, response) {
                        myDropzone.removeFile(file);
                        $("#title_know").val('');
                        // $("#author").val('');
                        $("#title_other").val('');
                        $("#knowledge_code").val('');
                        swal({
                            title: "Update Knowledge",
                            type: "success",
                            cancelButtonText: "OK",
                        });
                        _load_user_master();
                        closeModal();
                    });

                    this.on("error", function(file, errorMessage) {
                        if (errorMessage.indexOf("Error 404") !== -1) {
                            var errorDisplay = document.querySelectorAll("[data-dz-errormessage]");
                            errorDisplay[errorDisplay.length - 1].innerHTML =
                                "Error 404: The upload page was not found on the server";
                        }
                    });

                },
            });
        }

        // function confirmUpdate() {
        //     swal({
        //         title: "Are you sure ?",
        //         text: "You want to upload files to Knowledge Bank !",
        //         type: "warning",
        //         showCancelButton: true,
        //         confirmButtonText: "upload ",
        //         cancelButtonText: "cancel",
        //     }).then(function(isConfirm) {
        //         if (isConfirm) {
        //             $.ajax({
        //                 async: true,
        //                 type: 'POST',
        //                 url: '<? //= $CFG->src_manageUpload; 
                                    ?>/confirm_update_knowledge',
        //                 data: {
        //                     title_know_ajax: $("#title_know").val(),
        //                     title_other_ajax: $("#title_other").val(),
        //                     link_ajax: $("#you_link").val(),
        //                     knowledge_code_ajax: $("#knowledge_code").val()
        //                 },
        //                 success: function(response) {
        //                     if (response == 'SUCCESS') {
        //                         $("#title_know").val('');
        //                         $("#you_link").val('');
        //                         $("#title_other").val('');
        //                         $("#knowledge_code").val('');
        //                         swal({
        //                             title: "Update Knowledge",
        //                             type: "success",
        //                             cancelButtonText: "OK",
        //                         });
        //                         _load_user_master();
        //                         closeModal();
        //                     } else {
        //                         //dialog ctrl
        //                         swal({
        //                             title: "Warning !",
        //                             text: "[D003] --- ไม่สามารถแก้ไขได้กรุณาตรวจสอบข้อมูล !!! ",
        //                             type: "warning",
        //                             timer: 3000,
        //                             showConfirmButton: false,
        //                             allowOutsideClick: false
        //                         });
        //                     }
        //                 },
        //                 error: function() {
        //                     //dialog ctrl
        //                     swal({
        //                         title: "Warning !",
        //                         text: "[D002] --- Ajax Error ไม่สามารถแก้ไขได้ (ติดต่อ Admin) !!! ",
        //                         type: "warning",
        //                         timer: 3000,
        //                         showConfirmButton: false,
        //                         allowOutsideClick: false
        //                     });
        //                 }
        //             });
        //         }
        //     }, function(dismiss) {
        //         if (dismiss === 'cancel' || dismiss === 'close') {
        //             // ignore
        //         }
        //     });
        // }

        function closeModal() {
            $("#title_know").val('');
            $("#author").val('');
            $("#title_other").val('');
            $("#year_target").val('');
            $("#update_modal_knowledge").modal("hide");
        }

        function detailReject(id) {
            $('#reject_details').val(id);
            $("#update_modal_comment_reject").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: true, //remove option to close with keyboard
                show: true //Display loader!
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
                <h2>Recommend</h2>
                <br />
                <div class="nk-int-st">
                    <textarea class="form-control" id="reject_details" rows="5" placeholder=""></textarea>
                </div>
            </div><br />
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videoModal" role="dialog">
    <div class="modal-dialog modal-large">
        <div class="modal-content" style="padding: 5px 5px;">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeIframe();">&times;</button>
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                <!-- <iframe id="youtube_if" width="100%" height="100%" src="" allowfullscreen> -->
                <!-- </iframe>
                 <iframe type="video/mp4" id="youtube_if" frameborder="0"   class="embed-responsive-item" src="" allowfullscreen></iframe>  -->
                <video controls="true" id="youtube_if" controlsList="nodownload">
                    <source src="" type="video/mp4" />
                </video>
            </div>
        </div>
    </div>
</div>