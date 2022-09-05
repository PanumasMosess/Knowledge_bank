<?
require_once("application.php");

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
                    <i class="notika-icon notika-support"></i>
                  </div>
                  <div class="breadcomb-ctn">
                    <h2>Contact</h2>
                    <p>Welcome to Contact Page</p>
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
  <!-- Contact area Start-->
  <div class="contact-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="contact-list">
            <div class="contact-win">
              <div class="contact-img">
                <img src="img/post/1.jpg" alt="" width="150px" height="100px" />
              </div>
            </div>
            <div class="contact-ctn">
              <div class="contact-ad-hd">
                <h2>Anong Nacom</h2>
                <p class="ctn-ads">ABT, TTV, GDJ</p>
                <p class="ctn-ads">ISO</p>
                <p class="ctn-ads">Senior Quality Management Representative Manager</p>
                <p class="ctn-ads">Email: anongn@glong-duang-jai.com</p>
              </div>
              <p>Detail and Flow Knowledge Bank System.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="contact-list sm-res-mg-t-30">
            <div class="contact-win">
              <div class="contact-img">
                <img src="img/post/no-image.jpg" alt="" width="150px" height="100px" />
              </div>
            </div>
            <div class="contact-ctn">
              <div class="contact-ad-hd">
                <h2>Panumas Srisook</h2>
                <p class="ctn-ads">ABT, TTV, GDJ</p>
                <p class="ctn-ads">IT</p>
                <p class="ctn-ads">Programer</p>
                <p class="ctn-ads">Email: panumas@all2gether.net</p>
              </div>
              <p>System Support.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact area End-->
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
  <!--  swal JS
		============================================ -->
  <script src="js/dialog/sweetalert2.min.js"></script>
  <script src="js/dialog/dialog-active.js"></script>
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
  <script src="js/logout.js"></script>
  <!-- tawk chat JS -->
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
  </script>
</body>

</html>