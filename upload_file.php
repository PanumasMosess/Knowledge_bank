<?
require_once("application.php");
if (!isset($_SESSION["user_name_en_session"])) {
  header("location:login-register.php");
  die;
}
?>

<!doctype html>
<html class="no-js" lang="">

<link rel="stylesheet" href="<?= $CFG->wwwroot; ?>/css/themesaller-forms.css">

<?
require_once("js_css_header.php");
?>


<body>

  <?
  require_once("menu.php");
  ?>

  <form id="pdfUploadForm" enctype="multipart/form-data">
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
                      <h2>Detail Knowledge</h2>
                      <p>Welcome to KNOWLEDGE BANK <span class="bread-ntd">LOGISTICS ALLIANCE</span></p>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Form Element area Start-->
    <div class="form-element-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-element-list mg-t-30">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group ic-cmp-int float-lb floating-lb">
                    <div class="form-ic-cmp">
                      <i class="notika-icon notika-draft"></i>
                    </div>
                    <div class="nk-int-st">
                      <input type="text" name='title_know' id='title_know' class="form-control" autocomplete="off">
                      <label class="nk-label">Title</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group ic-cmp-int float-lb floating-lb">
                    <div class="form-ic-cmp">
                      <i class="notika-icon notika-draft"></i>
                    </div>
                    <div class="nk-int-st">
                      <input type="text" class="form-control" id='title_other' name="title_other">
                      <label class="nk-label">Othor Title</label>
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
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-element-list mg-t-30">
              <div class="basic-tb-hd">
                <h2>Link Video</h2>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <div class="nk-int-st">
                      <textarea class="form-control" id="you_link" name="you_link" rows="5" placeholder="Paste Your Youtube Link ..."></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br />
        <div class="summernote-clickable" style="text-align: right;">
          <button class="btn btn-warning btn-sm hec-button waves-effect" data-dz-remove onclick="clearAll();">CLEAR</button>
          <button class="btn btn-primary btn-sm hec-button waves-effect" onclick="submitKnowledge();" type="button">UPLOAD KNOWLEDGE</button>
        </div> -->
      </div>
    </div>
    <!-- Form Element area End-->
    <!-- Dropzone area Start-->
    <div class="dropzone-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="dropdone-nk mg-t-30">
              <div id="dropzone1" class="multi-uploader-cs">
                <div class="dropzone dropzone-nk needsclick" id="demo1-upload">
                  <div class="dz-message needsclick download-custom">
                    <i class="notika-icon notika-cloud"></i>
                    <h2>Drop files here or click to upload. (MP4, PDF File only)</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br />
        <div class="summernote-clickable" style="text-align: right;">
          <button class="btn btn-warning btn-sm hec-button waves-effect" data-dz-remove onclick="clearAll();">CLEAR</button>
          <button class="btn btn-primary btn-sm hec-button waves-effect" id="uploaderBtn" type="button">UPLOAD KNOWLEDGE</button>
        </div>

      </div>
    </div>
  </form>

  <!-- Dropzone area End-->
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
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

  <script>
    $(document).ready(function() {
      _load_notification_approve();
    });

    function _load_notification_approve() {
      $(document).ready(function() {
        setTimeout(function() {
          $("#load_client_approve").load("<?= $CFG->src_main_page; ?>/load_approve_count", {});
        }, 300);
      });
    }
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

    //Dropzone Configuration
    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("div#demo1-upload", {
      url: '<?= $CFG->wwwroot; ?>/upload.php',
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
        $("#uploaderBtn").click(function() {
          swal({
            title: "Are you sure ?",
            text: "You want to upload files to Knowledge Bank !",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "upload ",
            cancelButtonText: "cancel",
          }).then(function(isConfirm) {
            if (isConfirm) {

              if ($("#title_know").val() == "") {

                var nFrom = 'top';
                var nAlign = 'right';
                var nIcons = '';
                var nType = 'warning';
                var nAnimIn = 'animated fadeInDown';
                var nAnimOut = 'animated fadeOutUp';
                var text_ = 'กรุณากรอกข้อมูล Title ';

                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                setTimeout(function() {
                  $("#title_know").focus();
                }, 500);

              }else if($("#year_target").val() == ""){

                var nFrom = 'top';
                var nAlign = 'right';
                var nIcons = '';
                var nType = 'warning';
                var nAnimIn = 'animated fadeInDown';
                var nAnimOut = 'animated fadeOutUp';
                var text_ = 'กรุณาเลือกปีของ Knowledge ';

                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);


              } else if (myDropzone.getQueuedFiles().length == 0) {

                var nFrom = 'top';
                var nAlign = 'right';
                var nIcons = '';
                var nType = 'warning';
                var nAnimIn = 'animated fadeInDown';
                var nAnimOut = 'animated fadeOutUp';
                var text_ = 'กรุณาอัพโหลดไฟล์ !';

                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                // } else if ($("#author").val() == "") {
                //   var nFrom = 'top';
                //   var nAlign = 'right';
                //   var nIcons = '';
                //   var nType = 'warning';
                //   var nAnimIn = 'animated fadeInDown';
                //   var nAnimOut = 'animated fadeOutUp';
                //   var text_ = 'กรุณากรอกผู้จัดทำ !';

                //   notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                //   setTimeout(function() {
                //     $("#author").focus();
                //   }, 500);
                // }
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
          $("#year_target").val('');
          swal({
            title: "Upload Knowledge",
            type: "success",
            cancelButtonText: "OK",
          });
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

    // function submitKnowledge(){
    //       swal({
    //         title: "Are you sure ?",
    //         text: "You want to upload files to Knowledge Bank !",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonText: "upload ",
    //         cancelButtonText: "cancel",
    //       }).then(function(isConfirm) {
    //         if (isConfirm) {

    //           if ($("#title_know").val() == "") {

    //             var nFrom = 'top';
    //             var nAlign = 'right';
    //             var nIcons = '';
    //             var nType = 'warning';
    //             var nAnimIn = 'animated fadeInDown';
    //             var nAnimOut = 'animated fadeOutUp';
    //             var text_ = 'กรุณากรอกข้อมูล Title ';

    //             notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

    //             setTimeout(function() {
    //               $("#title_know").focus();
    //             }, 500);

    //           } else if ($("#you_link").val() == "") {

    //             var nFrom = 'top';
    //             var nAlign = 'right';
    //             var nIcons = '';
    //             var nType = 'warning';
    //             var nAnimIn = 'animated fadeInDown';
    //             var nAnimOut = 'animated fadeOutUp';
    //             var text_ = 'กรุณากรอก Link Video !';

    //             notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);
    //             setTimeout(function() {
    //               $("#you_link").focus();
    //             }, 500);
    //           } else {
    //             $.ajax({
    //             type: 'POST',
    //             url: '<? //= $CFG->src_manageUpload; 
                          ?>/confirm_knowledge.php',
    //             data: {
    //             title_ajax: $("#title_know").val(),
    //             other_title_ajax: $("#title_other").val(),
    //             youtube_link_ajax: $("#you_link").val(),
    //           },
    //           success: function(response) {

    //             if (response == 'SUCCESS') {
    //               //clear
    //               $("#title_know").val('');
    //               $("#title_other").val('');
    //               $("#you_link").val('');

    //               var nFrom = 'top';
    //               var nAlign = 'right';
    //               var nIcons = '';
    //               var nType = 'success';
    //               var nAnimIn = 'animated fadeInDown';
    //               var nAnimOut = 'animated fadeOutUp';
    //               var text_ = 'ลงทะเบียนสำเร็จ !';

    //               notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

    //             } else {
    //               var nFrom = 'top';
    //               var nAlign = 'right';
    //               var nIcons = '';
    //               var nType = 'danger';
    //               var nAnimIn = 'animated fadeInDown';
    //               var nAnimOut = 'animated fadeOutUp';
    //               var text_ = 'ไม่สามารถ Upload ได้กรุณาแจ้ง Admin !';

    //               notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

    //             }

    //           },
    //           error: function() {
    //             //dialog ctrl
    //             swal({
    //               title: "Warning !",
    //               text: "[D002] --- Ajax Error ไม่สามารถลงทะเบียนได้ (ติดต่อ Admin) !!! ",
    //               type: "warning",
    //               timer: 3000,
    //               showConfirmButton: false,
    //               allowOutsideClick: false
    //             });
    //           }
    //         });
    //           }

    //         }
    //       }, function(dismiss) {
    //         if (dismiss === 'cancel' || dismiss === 'close') {
    //           // ignore
    //         }
    //       });
    // }




    function clearAll() {
      $("#title_know").val('');
      $("#title_other").val('');
      // $("#you_link").val('');
    }
  </script>
  <script src="js/logout.js"></script>
</body>

</html>