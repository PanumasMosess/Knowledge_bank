<?
require_once("application.php");
?>

<!doctype html>
<html class="no-js" lang="">
<?
require_once("js_css_header.php");
?>

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <!-- Login Register area Start-->
  <div class="login-content">
    <!-- Login -->
    <div class="nk-block " id="l-login">
      <div class="nk-form">
        <div class="input-group">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
          <div class="nk-int-st">
            <input type="text" class="form-control" placeholder="Username" id="user_">
          </div>
        </div>
        <div class="input-group mg-t-15">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
          <div class="nk-int-st">
            <input type="password" class="form-control" id="password_" placeholder="Password">
          </div>
        </div>
        <div class="fm-checkbox">
          <label><input type="checkbox" id="showPassword" class="i-checks" /> <i></i> Show Password</label>
        </div>
        <a href="#" onclick="signIn();" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></a>
      </div>

      <div class="nk-navigation nk-lg-ic">
        <!-- <a href="<?= $CFG->wwwroot; ?>/index" data-ma-block="#l-login"><i class="notika-icon notika-left-arrow"></i> <span>Back</span></a>
        <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
        <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a> -->
      </div>
    </div>

    <!-- Register -->
    <div class="nk-block " id="l-register">
      <div class="nk-form">
        <div class="input-group">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
          <div class="nk-int-st">
            <input type="text" class="form-control" id="user" placeholder="  Username">
          </div>
        </div>

        <div class="input-group mg-t-15">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
          <div class="nk-int-st">
            <input type="password" class="form-control" id="password" placeholder="  Password">
          </div>
        </div>

        <div class="input-group mg-t-15">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
          <div class="nk-int-st">
            <input type="text" class="form-control" id="emp_id" placeholder="  Employee Id">
          </div>
        </div>

        <div class="input-group mg-t-15">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-credit-card"></i></span>
          <div class="nk-int-st">
            <input type="text" class="form-control" id="name_en" placeholder="  Name & Last name (EN)">
          </div>
        </div>

        <div class="input-group mg-t-15">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-credit-card"></i></span>
          <div class="nk-int-st">
            <input type="text" class="form-control" id="name_th" placeholder="  ชื่อ & นามสกุล (TH)">
          </div>
        </div>

        <div class="input-group mg-t-15">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
          <div class="nk-int-st">
            <input type="text" class="form-control" id="email_" placeholder="  Email Address">
          </div>
        </div>

        <!-- <div class="input-group mg-t-15">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-star"></i></span>
          <div class="bootstrap-select fm-cmp-mg">
            <select class="selectpicker" data-live-search="true" id="select_company" name="select_company">
              <option value="" style="color: #999;" selected>Selected Company...</option>
              <?
              //  $strSQL_dept_db = " SELECT [knowledge_com_name], [knowledge_com_code] FROM [db_knowledge_bank].[dbo].[tbl_knowledge_company] where knowledge_com_status = 'ENABLE'";
              //  $objQuery_dept_db = sqlsrv_query($db_con, $strSQL_dept_db) or die("Error Query [" . $strSQL_dept_db . "]");
              //   while ($objResult_dept_db = sqlsrv_fetch_array($objQuery_dept_db, SQLSRV_FETCH_ASSOC)) {
              //   
              ?>
           //     <option value="<? //= $objResult_dept_db["knowledge_com_code"]; 
                                  ?>"><? //= $objResult_dept_db["knowledge_com_name"]; 
                                      ?></option>
           //   <?
                //   }
                //   
                ?>
            </select>
          </div>
        </div> -->

        <div class="input-group mg-t-15">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-star"></i></span>
          <div class="bootstrap-select fm-cmp-mg">
            <select class="selectpicker" data-live-search="true" id="select_dept" name="select_dept">
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
      </div>

      <a href="#" onclick="singUp();" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
      <!-- <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a> -->


      <div class="nk-navigation rg-ic-stl">
        <a href="<?= $CFG->wwwroot; ?>/index" data-ma-block="#l-login"><i class="notika-icon notika-left-arrow"></i> <span>Back</span></a>
        <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
        <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
      </div>
    </div>

    <!-- Forgot Password -->
    <div class="nk-block toggled" id="l-forget-password">
      <div class="nk-form">
        <h4 class="text-center">Update Your Password</h4>
        <div class="input-group">
          <span class="input-group-addon nk-ic-st-pro"><i class="fa fa-key"></i></span>
          <div class="nk-int-st">
            <input type="password" class="form-control" placeholder="New password" id="pass_change">
          </div>
        </div>
        <div class="fm-checkbox">
          <label><input type="checkbox" id="showPassword_" class="i-checks" /> <i></i> Show Password</label>
        </div>

        <a href="#l-login" onclick="chengePass();" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
      </div>

      <div class="nk-navigation nk-lg-ic rg-ic-stl">
        <a href="<?= $CFG->wwwroot; ?>/login-register" data-ma-block="#l-login"><i class="notika-icon notika-left-arrow"></i> <span>Back</span></a>
        <!-- <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
        <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a> -->
      </div>
    </div>
  </div>
  <!-- Login Register area End-->
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
  <!--  wave JS
		============================================ -->
  <script src="js/wave/waves.min.js"></script>
  <script src="js/wave/wave-active.js"></script>
  <!-- icheck JS
		============================================ -->
  <script src="js/icheck/icheck.min.js"></script>
  <script src="js/icheck/icheck-active.js"></script>
  <!--  swal JS
		============================================ -->
  <script src="js/dialog/sweetalert2.min.js"></script>
  <script src="js/dialog/dialog-active.js"></script>
  <!--  notification JS
		============================================ -->
  <script src="js/notification/bootstrap-growl.min.js"></script>
  <script src="js/notification/notification-active.js"></script>
  <!-- bootstrap select JS
		============================================ -->
  <script src="js/bootstrap-select/bootstrap-select.js"></script>
  <!--  chosen JS
		============================================ -->
  <script src="js/chosen/chosen.jquery.js"></script>
  <!--  todo JS
		============================================ -->
  <script src="js/todo/jquery.todo.js"></script>
  <!-- Login JS
		============================================ -->
  <script src="js/login/login-action.js"></script>
  <!-- plugins JS
		============================================ -->
  <script src="js/plugins.js"></script>
  <!-- main JS
		============================================ -->
  <script src="js/main.js"></script>

  <script>
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


    function singUp() {
      swal({
        title: "Are you sure ?",
        text: "You want to Register !",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "ok",
        cancelButtonText: "cancel",
      }).then(function(isConfirm) {
        if (isConfirm) {

          if ($("#user").val() == "") {

            var nFrom = 'top';
            var nAlign = 'right';
            var nIcons = '';
            var nType = 'warning';
            var nAnimIn = 'animated fadeInDown';
            var nAnimOut = 'animated fadeOutUp';
            var text_ = 'กรุณากรอก username';

            notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

            setTimeout(function() {
              $("#user").focus();
            }, 500);

          } else if ($("#password").val() == "") {
            var nFrom = 'top';
            var nAlign = 'right';
            var nIcons = '';
            var nType = 'warning';
            var nAnimIn = 'animated fadeInDown';
            var nAnimOut = 'animated fadeOutUp';
            var text_ = 'กรุณากรอกรหัสผ่าน !';

            notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

            setTimeout(function() {
              $("#password").focus();
            }, 500);
          } else if ($("#emp_id").val() == "") {
            var nFrom = 'top';
            var nAlign = 'right';
            var nIcons = '';
            var nType = 'warning';
            var nAnimIn = 'animated fadeInDown';
            var nAnimOut = 'animated fadeOutUp';
            var text_ = 'กรุณากรอกรหัสพนักงาน !';

            notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

            setTimeout(function() {
              $("#emp_id").focus();
            }, 500);
          } else if ($("#name_en").val() == "") {
            var nFrom = 'top';
            var nAlign = 'right';
            var nIcons = '';
            var nType = 'warning';
            var nAnimIn = 'animated fadeInDown';
            var nAnimOut = 'animated fadeOutUp';
            var text_ = 'กรุณากรอก ชื่อ-นามสกุล ภาษาอังกฤษ !';

            notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

            setTimeout(function() {
              $("#name_en").focus();
            }, 500);
          } else if ($("#name_th").val() == "") {
            var nFrom = 'top';
            var nAlign = 'right';
            var nIcons = '';
            var nType = 'warning';
            var nAnimIn = 'animated fadeInDown';
            var nAnimOut = 'animated fadeOutUp';
            var text_ = 'กรุณากรอก ชื่อ-นามสกุล ภาษาไทย !';

            notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

            setTimeout(function() {
              $("#name_th").focus();
            }, 500);
          } else if ($("#email_").val() == "") {
            var nFrom = 'top';
            var nAlign = 'right';
            var nIcons = '';
            var nType = 'warning';
            var nAnimIn = 'animated fadeInDown';
            var nAnimOut = 'animated fadeOutUp';
            var text_ = 'กรุณากรอก Email !';

            notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

            setTimeout(function() {
              $("#email_").focus();
            }, 500);
          } else if ($("#select_company").val() == "") {

            var nFrom = 'top';
            var nAlign = 'right';
            var nIcons = '';
            var nType = 'warning';
            var nAnimIn = 'animated fadeInDown';
            var nAnimOut = 'animated fadeOutUp';
            var text_ = 'กรุณาเลือกบริษัท !';

            notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

            setTimeout(function() {
              $("#select_company").focus();
            }, 500);

          } else if ($("#select_dept").val() == "") {

            var nFrom = 'top';
            var nAlign = 'right';
            var nIcons = '';
            var nType = 'warning';
            var nAnimIn = 'animated fadeInDown';
            var nAnimOut = 'animated fadeOutUp';
            var text_ = 'กรุณาเลือกแผนก !';

            notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

            setTimeout(function() {
              $("#select_dept").focus();
            }, 500);

          } else {
            $.ajax({
              type: 'POST',
              url: '<?= $CFG->src_auth; ?>/register.php',
              data: {
                user_ajax: $("#user").val(),
                pass_ajax: $("#password").val(),
                name_en_ajax: $("#name_en").val(),
                name_th_ajax: $("#name_th").val(),
                emp_id_ajax: $("#emp_id").val(),
                email_ajax: $("#email_").val(),
                select_dept_ajax: $("#select_dept").val(),
              },
              success: function(response) {

                if (response == 'SUCCESS_REGISTER') {
                  //clear
                  // $('#select_company').val(null).trigger('change');
                  $('#select_dept').val(null).trigger('change');
                  $("#email_").val('');
                  $("#name_en").val('');
                  $("#emp_id").val('');
                  $("#name_th").val('');
                  $("#password").val('');
                  $("#user").val('');

                  var nFrom = 'top';
                  var nAlign = 'right';
                  var nIcons = '';
                  var nType = 'success';
                  var nAnimIn = 'animated fadeInDown';
                  var nAnimOut = 'animated fadeOutUp';
                  var text_ = 'ลงทะเบียนสำเร็จ !';

                  notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                } else if (response = 'USER_DUPLICATE') {
                  var nFrom = 'top';
                  var nAlign = 'right';
                  var nIcons = '';
                  var nType = 'danger';
                  var nAnimIn = 'animated fadeInDown';
                  var nAnimOut = 'animated fadeOutUp';
                  var text_ = 'User Name ซ้ำกรุณาเปลี่ยน User Name !';

                  notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                  setTimeout(function() {
                    $("#user").focus();
                  }, 500);
                } else {
                  console.log(response);
                }

              },
              error: function() {
                //dialog ctrl
                swal({
                  title: "Warning !",
                  text: "[D002] --- Ajax Error ไม่สามารถลงทะเบียนได้ (ติดต่อ Admin) !!! ",
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


    function chengePass() {
      if ($("#pass_change").val() == "") {

        var nFrom = 'top';
        var nAlign = 'right';
        var nIcons = '';
        var nType = 'warning';
        var nAnimIn = 'animated fadeInDown';
        var nAnimOut = 'animated fadeOutUp';
        var text_ = 'กรุณากรอก Password';

        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

        setTimeout(function() {
          $("#pass_change").focus();
        }, 500);
      } else {
        swal({
          title: "Are you sure ?",
          text: "Confirm New Password ?",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "ok",
          cancelButtonText: "cancel",
        }).then(function(isConfirm) {

          if (isConfirm) {
            $.ajax({
              type: 'POST',
              url: '<?= $CFG->src_auth; ?>/change_pass',
              data: {
                pass_ajax: $("#pass_change").val(),
              },
              success: function(response) {

                if (response == 'PASS_UPDATE_SUCCESS') {
                  //clear
                  // $('#select_company').val(null).trigger('change');
                  $("#pass_change").val('');

                  var nFrom = 'top';
                  var nAlign = 'right';
                  var nIcons = '';
                  var nType = 'success';
                  var nAnimIn = 'animated fadeInDown';
                  var nAnimOut = 'animated fadeOutUp';
                  var text_ = 'แก้ไขรหัสผ่านสำเร็จ !';

                  notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                  window.location.href = 'index';

                } else if (response = 'PASS_UPDATE_FAILD') {
                  var nFrom = 'top';
                  var nAlign = 'right';
                  var nIcons = '';
                  var nType = 'danger';
                  var nAnimIn = 'animated fadeInDown';
                  var nAnimOut = 'animated fadeOutUp';
                  var text_ = 'ไม่สามารถแกไข Password ได้';

                  notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);

                  setTimeout(function() {
                    $("#pass_change").focus();
                  }, 500);
                } else {
                  console.log(response);
                }

              },
              error: function() {
                //dialog ctrl
                swal({
                  title: "Warning !",
                  text: "[D002] --- Ajax Error ไม่สามารถลงทะเบียนได้ (ติดต่อ Admin) !!! ",
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
    }

    $('#showPassword_').on('ifChanged', function() {
      $(this).is(':checked') ? $('#pass_change').attr('type', 'text') : $('#pass_change').attr('type', 'password');
    });

    // var companyObject = $('#select_company');
    // var deptObject = $('#select_dept');
    // // on change depts 
    // companyObject.on('change', function() {
    //   var deptId = $('#select_company').val();

    //   $.get("<? //= $CFG->src_auth; 
                ?>/get_dep.php?deptId=" + escape(deptId) + "", function(data) {
    //     var result = JSON.parse(data);
    //     deptObject.selectpicker('val', '');
    //     deptObject.find('option').remove();
    //     $('.selectpicker').selectpicker('refresh');
    //     $.each(result, function(index, item) {
    //       deptObject.append('<option value="' + item.knowledge_dept_name + '">' + item.knowledge_dept_name + '</option>');
    //     });
    //     $('.selectpicker').selectpicker('refresh');
    //   });
    // });
  </script>
</body>

</html>