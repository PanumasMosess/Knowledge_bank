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
    require_once('menu.php');
    ?>
    <!-- Main Menu area End-->
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
                                        <i class="notika-icon notika-promos"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Search Knowledge </h2>
                                        <p>Welcome to search Knowledge page</p>
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
    <!-- Inbox area Start-->
    <div class="inbox-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="row">
                            <div class="col-lg-1 col-md-2 col-sm-2 col-xs-12">
                                <div class="dropdown-trig-sgn">
                                    <button id='btn_search' class="btn triger-bounceInUp" data-toggle="dropdown">Search Type</button>
                                    <ul class="dropdown-menu triger-bounceInUp-dp" id="type_search">
                                        <li id="Department"><a>Department</a></li>
                                        <li id="Title"><a>Title</a></li>
                                        <li id="Upload By"><a>Upload By</a></li>
                                        <li id="Year"><a>Year</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <div class="nk-int-st search-input search-overt">
                                    <input type="text" id='search_search' class="form-control" />
                                    <button onclick="search_by();" class="btn search-ib">ค้นหา</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="data-table-list">
                        <div class="row">
                            <span id="spn_load_search"></span>
                        </div>
                        <div class="loadmore">
                            <input type="button" id="loadMore" class="loadBtn" value="Load More">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Inbox area End-->
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
    <!--  notification JS
		============================================ -->
    <script src="js/notification/bootstrap-growl.min.js"></script>
    <script src="js/notification/notification-active.js"></script>
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
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!--  swal JS
		============================================ -->
    <script src="js/dialog/sweetalert2.min.js"></script>
    <script src="js/dialog/dialog-active.js"></script>
    <!--  animation JS
		============================================ -->
    <script src="js/animation/animation-active.js"></script>
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

    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/logout.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <!-- Change btn -->
    <script>
        var type;
        $("#type_search li").click(function() {
            var elem = document.getElementById("btn_search");
            elem.innerHTML = this.id;
            type = '';
            type = this.id;
        });

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
                z_index: 9999,
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

        function search_by() {

            var data_search_ = $('#search_search').val();
            setTimeout(function() {
                $("#spn_load_search").load("<?= $CFG->src_search; ?>/load_data_search_grid", {
                    type_ajax: type,
                    data_search_ajax: data_search_
                });
            }, 500);

        }

        $("#loadMore").click(function() {
            setTimeout(function() {
                $("#spn_load_search").load("<?= $CFG->src_search; ?>/load_data_search_grid", {
                    data_load_more: Number($('#postCount').val()),
                });
            }, 500);
        });

        $(document).ready(function() {
            search_by();
            var url_string = window.location.href;
            var url = new URL(url_string);
            var c = url.searchParams.get("search_send");
            if (c == null) {} else {
                var elem = document.getElementById("btn_search");
                elem.innerHTML = c;
                type = '';
                type = c;
            }
            $('#youtube_if').bind('contextmenu', function() {
                return false;
            });
        });

        function playYouTubeModal(id) {
            $("#videoModal").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: true, //remove option to close with keyboard
                show: true //Display loader!
            });

            //split id
            var str_split = id;
            var str_split_result = str_split.split("###");

            var knowledge_file_link = str_split_result[0];
            var knowledge_code = str_split_result[1];

            var videoSRCauto = `${knowledge_file_link}`;

            $('#youtube_if').attr('src', videoSRCauto);

            $.ajax({
                type: 'POST',
                url: "<?= $CFG->src_search; ?>/update_view",
                data: {
                    knowledge_code: knowledge_code,
                },
                success: function(data) {
                    var result = JSON.parse(data);
                }
            });
        };

        function closeIframe() {
            $("#videoModal").modal("hide");
            $('#youtube_if').attr('src', '');
        }

        function clickLike(id) {
            $.ajax({
                type: 'POST',
                url: "<?= $CFG->src_search; ?>/like_unlike",
                data: {
                    knowledge_code: id,
                },
                success: function(data) {
                    // var result = JSON.parse(data);
                    setTimeout(function() {
                        $("#spn_load_search").load("<?= $CFG->src_search; ?>/load_data_search_grid", {
                            like_refirsh: Number($('#postCount').val()),
                            type_ajax: type
                        });
                    }, 500);
                }
            });

        }

        function clickUnlike(id) {

            $.ajax({
                type: 'POST',
                url: "<?= $CFG->src_search; ?>/like_unlike",
                data: {
                    knowledge_code: id,
                },
                success: function(data) {
                    // var result = JSON.parse(data);                 
                    setTimeout(function() {
                        $("#spn_load_search").load("<?= $CFG->src_search; ?>/load_data_search_grid", {
                            like_refirsh: Number($('#postCount').val()),
                            type_ajax: type
                        });
                    }, 500);

                }
            });
        }

        function comment(id) {

            $("#commentModal").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: true, //remove option to close with keyboard
                show: true //Display loader!
            });

            $("#knowledge_code_id").val(id);

        }

        function comment_send() {

            if ($('#comment_content').val() != '') {

                $.ajax({
                    type: 'POST',
                    url: "<?= $CFG->src_search; ?>/comment",
                    data: {
                        knowledge_code: $("#knowledge_code_id").val(),
                        knowledge_comment: $('#comment_content').val()
                    },
                    success: function(data) {
                        // var result = JSON.parse(data);                 
                        setTimeout(function() {
                            $("#spn_load_search").load("<?= $CFG->src_search; ?>/load_data_search_grid", {
                                like_refirsh: Number($('#postCount').val()),
                                type_ajax: type
                            });
                        }, 500);
                    }
                });

                $("#knowledge_code_id").val('');
                $('#comment_content').val('');
                $("#commentModal").modal("hide");

            } else {
                var nFrom = 'top';
                var nAlign = 'right';
                var nIcons = '';
                var nType = 'warning';
                var nAnimIn = 'animated fadeInDown';
                var nAnimOut = 'animated fadeOutUp';
                var text_ = 'กรุณากรอก Comment';

                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, text_);
            }

        }

        function close_commend() {
            $("#commentModal").modal("hide");
            $("#knowledge_code_id").val('');
            $('#comment_content').val('');
        }

        function comment_read(id) {
            setTimeout(function() {
                $("#comment_detal").load("<?= $CFG->src_search; ?>/comment_detail", {
                    knowledge_code: id,
                });
            }, 300);


            $("#commentModalRead").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: true, //remove option to close with keyboard
                show: true //Display loader!
            });
        }
    </script>
</body>

</html>

<div class="modal fade" id="videoModal" role="dialog">
    <div class="modal-dialog modal-large">
        <div class="modal-content" style="padding: 5px 5px;">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeIframe();">&times;</button>
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                <!-- <iframe id="youtube_if" width="100%" height="100%" src="" allowfullscreen> -->
                <!-- </iframe> -->
                <!-- <iframe type="video/mp4" id="youtube_if" frameborder="0"  class="embed-responsive-item" src="" allowfullscreen></iframe> -->
                <video controls="true" id="youtube_if" controlsList="nodownload">
                    <source src="" type="video/mp4" />
                </video>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="commentModal" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content" style="padding: 20px 29px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="nk-cyan">
                                <input type="hidden" id="knowledge_code_id" />
                                <textarea id="comment_content" class="form-control" rows="5" placeholder="Comment...."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger notika-btn-danger waves-effect" onclick="close_commend();">CLOSE</button>
                <button type="button" class="btn btn-success notika-btn-success waves-effect" onclick="comment_send();">COMMENT</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="commentModalRead" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="accordion-wn-wp">
                    <div class="accordion-stn">
                        <div class="panel-group" data-collapse-color="nk-green" id="kb_comment_BIG" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-collapse notika-accrodion-cus">
                                <div id="comment_detal"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>