<?
require_once("application.php");
if (!isset($_SESSION["user_name_en_session"])) {
    header("location:login-register");
    die;
} else if ($_SESSION["user_force_pass_chg_session"] == '1') {
    header("location:change-pass");
    die;
}
?>

<!doctype html>
<html class="no-js" lang="">

<?
require_once("js_css_header.php")
?>

<body>
    <?
    require_once("menu.php");
    ?>

    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow">
                        <span id='load_card_summary'></span>
                        <div class="website-traffic-ctn">
                            <h2><span class="counter" id="count_summarry">0</span></h2>
                            <p>Total Knowledge</p>
                        </div>
                        <div class="sparkline-bar-stats3">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter" id="count_wait_approve">0</span></h2>
                            <p>Total Wait Approve</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter" id="count_recommend">0</span></h2>
                            <p>Total Recommend update </p>
                        </div>
                        <div class="sparkline-bar-stats4">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter" id="count_approve_ok">0</span></h2>
                            <p>Total Approve</p>
                        </div>
                        <div class="sparkline-bar-stats1">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Server time start-->
    <div class="search-engine-area mg-t-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="visitor-sv-tm-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="row">
                            <div class="contact-hd mg-bt-ant-inner">
                                <h2>Knowlege Bank Summary</h2>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4">
                                    <div class="form-group nk-datapk-ctm form-elet-mg" id="year_picker_chart_">
                                        <div class="row">
                                            <div class="input-group date nk-int-st">
                                                <span class="input-group-addon"></span>
                                                <input type="text" class="form-control" id="year_picker_chart"></span>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button data-toggle="tooltip" data-placement="right" title="Refirsh" onclick="refirshAll();" class="btn"><i class="fa fa-refresh"></i></button>
                        </div>
                        <div>
                            <div class="line-chart-wp chart-display-nn"><span id='load_chart'></span>
                                <canvas height="100" id="bulinechart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Server time End-->
    <!-- Search Engine Start-->
    <div class="search-engine-area mg-t-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="search-engine-int">
                        <div class="contact-hd search-hd-eg">
                            <a href="<?= $CFG->src_main; ?>/search_data?search_send=Title">
                                <h2>Title <i style="color: #b3d4fc;" class="fa fa-search"></i></h2>
                            </a>
                        </div>
                        <div class="search-eg-table">
                            <table class="table" id="table_title">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                        <div class="contact-hd search-hd-eg">
                            <a href="<?= $CFG->src_main; ?>/search_data?search_send=Upload By">
                                <h2>Upload by <i style="color: #b3d4fc;" class="fa fa-search"></i></h2>
                            </a>
                        </div>
                        <div class="search-eg-table">
                            <table class="table" id="table-author">
                                <thead>
                                    <tr>
                                        <th>Upload by</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="search-engine-int">
                        <div class="contact-hd search-hd-eg">
                            <a href="<?= $CFG->src_main; ?>/search_data?search_send=Department">
                                <h2>Department <i style="color: #b3d4fc;" class="fa fa-search"></i></h2>
                            </a>
                        </div>
                        <div class="search-eg-table">
                            <table class="table" id="table_department">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Engine End-->
    <!-- Search Engine Start-->
    <div class="search-engine-area mg-t-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="contact-hd search-hd-eg">
                            <a href="<?= $CFG->src_main; ?>/search_data?search_send=Year">
                                <h2>Year issued <i style="color: #b3d4fc;" class="fa fa-search"></i></h2>
                            </a>
                        </div>
                        <div class="search-eg-table">
                            <table class="table nowrap" id="date_total">
                                <thead>
                                    <tr>
                                        <th>Year</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td>2000-2021</td>
                                        <td class="text-right">
                                            <h4>20</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1990-2000</td>
                                        <td class="text-right">
                                            <h4>87</h4>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Engine End-->
    <!-- Start Footer area-->
    <?
    require_once('footer.php');
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
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- counterup JS ============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <!-- <script src="js/counterup/counterup-active.js"></script> -->
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!-- Charts JS
		============================================ -->
    <script src="js/charts/Chart.js"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
    <!-- bootstrap select JS
		============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/jquery.flot.pie.js"></script>
    <script src="js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot/jquery.flot.orderBars.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <script src="js/flot/analtic-flot-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>


    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!--  swal JS
		============================================ -->
    <script src="js/dialog/sweetalert2.min.js"></script>
    <script src="js/dialog/dialog-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <script src="js/logout.js"></script>
    <script>
        $(document).ready(function() {
            _load_count_year();
            _load_top_user_upload();
            _load_top_title();
            _load_top_Department();
            _load_chart();
            _load_notification_approve();
            _load_card_summary();
            _load_notification_online();

            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });

        });

        function _load_notification_approve() {
            $(document).ready(function() {
                setTimeout(function() {
                    $("#load_client_approve").load("<?= $CFG->src_main_page; ?>/load_approve_count", {});
                }, 300);
            });
        }

        function _load_notification_online() {
            $(document).ready(function() {
                setTimeout(function() {
                    $("#count_online").load("<?= $CFG->src_main_page; ?>/load_online_count", {});
                }, 300);
            });
        }

        function _load_count_year() {
            $.ajax({
                url: "<?= $CFG->src_main_page; ?>/load_date_total.php",
                success: function(data) {
                    // console.log(data);
                    var result = JSON.parse(data);
                    callinTable(result);
                }
            });


            function callinTable(data) {
                var table = $("#date_total").DataTable({
                    "bDestroy": true,
                    pageLength: 5,
                    pagingType: 'simple',
                    bFilter: false,
                    responsive: false,
                    autoFill: false,
                    colReorder: false,
                    keys: false,
                    searching: false,
                    paging: true,
                    info: false,
                    // rowReorder: true,
                    select: false,
                    processing: true,
                    serverside: true,
                    data: data,
                    lengthChange: false,
                    "columnDefs": [{
                        pageLength: 5,
                    }],
                    order: [
                        [0, 'desc']
                    ],
                    columns: [{
                            data: 'yearRange'
                        },
                        {
                            "data": null,
                            render: function(data, type, row) {
                                return "<td class='text-right'><h4 class='text-right'>" + data["count_year"] + "</h4></td>"
                            },
                            "targets": -1
                        },
                    ]
                });

            }
        }

        function refirshAll(){
            _load_chart();
        }

        function _load_chart() {
            $("#year_picker_chart").val('ALL');
            setTimeout(function() {
                $("#load_chart").load("<?= $CFG->src_main_page; ?>/load_chart_data", {
                    year_: 'ALL',
                });
            }, 300);

        }

        function by_year_chart() {

            if (basiclinechart) {
                basiclinechart.destroy();
            }

            setTimeout(function() {
                $("#load_chart").load("<?= $CFG->src_main_page; ?>/load_chart_data", {
                    year_: $("#year_picker_chart").val(),
                });
            }, 300);

        }

        function _load_top_user_upload() {
            $.ajax({
                url: "<?= $CFG->src_main_page; ?>/load_upload_by.php",
                success: function(data) {
                    // console.log(data);
                    var result = JSON.parse(data);
                    callinTable(result);
                }
            });


            function callinTable(data) {
                var table = $("#table-author").DataTable({
                    "bDestroy": true,
                    pageLength: 5,
                    pagingType: 'simple',
                    bFilter: false,
                    responsive: false,
                    autoFill: false,
                    colReorder: false,
                    keys: false,
                    searching: false,
                    paging: true,
                    info: false,
                    // rowReorder: true,
                    select: false,
                    processing: true,
                    serverside: true,
                    data: data,
                    order: [
                        [1, 'desc']
                    ],
                    lengthChange: false,
                    columns: [{
                            data: 'knowledge_user_upload'
                        },
                        {
                            "data": null,
                            render: function(data, type, row) {
                                return "<td class='text-right'><h4 class='text-right'>" + data["total"] + "</h4></td>"
                            },
                            "targets": -1
                        },
                    ],
                });

            }
        }

        function _load_top_Department() {
            $.ajax({
                url: "<?= $CFG->src_main_page; ?>/load_department.php",
                success: function(data) {
                    // console.log(data);
                    var result = JSON.parse(data);
                    callinTable(result);
                }
            });


            function callinTable(data) {
                var table = $("#table_department").DataTable({
                    "bDestroy": true,
                    pageLength: 5,
                    pagingType: 'simple',
                    bFilter: false,
                    responsive: true,
                    autoFill: false,
                    colReorder: true,
                    keys: false,
                    searching: false,
                    paging: true,
                    info: false,
                    select: false,
                    processing: true,
                    serverside: true,
                    data: data,
                    order: [
                        [1, 'desc']
                    ],
                    lengthChange: false,
                    columns: [{
                            data: 'knowledge_dept'
                        },
                        {
                            "data": null,
                            render: function(data, type, row) {
                                return "<td class='text-right'><h4 class='text-right'>" + data["dept"] + "</h4></td>"
                            },
                            "targets": -1
                        },
                    ],
                });

            }
        }

        function _load_top_title() {
            $.ajax({
                url: "<?= $CFG->src_main_page; ?>/load_title.php",
                success: function(data) {
                    // console.log(data);
                    var result = JSON.parse(data);
                    callinTable(result);
                }
            });


            function callinTable(data) {
                var table = $("#table_title").DataTable({
                    "bDestroy": true,
                    pageLength: 5,
                    pagingType: 'simple',
                    bFilter: false,
                    responsive: true,
                    autoFill: false,
                    colReorder: true,
                    keys: false,
                    searching: false,
                    paging: true,
                    info: false,
                    select: false,
                    processing: true,
                    serverside: true,
                    data: data,
                    order: [
                        [1, 'desc']
                    ],
                    lengthChange: false,
                    columnDefs: [{
                        "visible": false,
                        "targets": [1],
                        "searchable": false
                    }],
                    columns: [{
                        data: 'knowledge_title'
                    }, {
                        data: 'knowledge_issue_date'
                    }],
                });

            }
        }

        function _load_card_summary() {
            var count_total;
            var count_wait_approve;
            var count_recommend;
            var count_approve;
            $.ajax({
                url: "<?= $CFG->src_main_page; ?>/load_index_count",
                async: false,
                success: function(data) {
                    var str_split = data;
                    var str_split_result = str_split.split("#");

                    count_total = str_split_result[0];
                    count_wait_approve = str_split_result[1];
                    count_recommend = str_split_result[2];
                    count_approve = str_split_result[3];
                }
            });

            $("#count_summarry").html(count_total);
            $("#count_wait_approve").html(count_wait_approve);
            $("#count_recommend").html(count_recommend);
            $("#count_approve_ok").html(count_approve);
        }
    </script>

</body>

</html>