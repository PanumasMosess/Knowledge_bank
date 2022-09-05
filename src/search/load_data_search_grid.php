<?
require_once("../../application.php");

//user code session
$emp_code = $_SESSION['user_name_session'];
$type_user = $_SESSION['user_upload_session'];

$type_ajax = isset($_POST['type_ajax']) ? $_POST['type_ajax'] : '';
$data_search_ajax =  isset($_POST['data_search_ajax']) ? $_POST['data_search_ajax'] : '';
$data_load_more_temp =  isset($_POST['data_load_more']) ? $_POST['data_load_more'] : 0;
$like_refirsh =  isset($_POST['like_refirsh']) ? $_POST['like_refirsh'] : 0;

$limit = 4;
$limit = $limit + $data_load_more_temp;

if ($type_ajax == 'Department') {
    $strSql = "SELECT [knowledge_id]
        ,[knowledge_code]
        ,[knowledge_running_status]
        ,[knowledge_title]
        ,[knowledge_title_other]
        ,[knowledge_author]
        ,[knowledge_dept]
        ,[knowledge_file_link]
        ,[knowledge_file_link_pdf]
        ,[knowledge_file_link_ppt]
        ,[knowledge_emp_no]
        ,[knowledge_user_upload]
        ,[knowledge_issue_time]
        ,[knowledge_issue_date]
        ,[knowledge_issue_datetime] 
        ,count_view
        FROM [tbl_knowledge_data] LEFT JOIN [tbl_knowledge_running] 
        ON [tbl_knowledge_running].[knowledge_running_code] = [tbl_knowledge_data].[knowledge_code] 
        LEFT JOIN tbl_knowledge_view
        ON [tbl_knowledge_data].[knowledge_code] = [tbl_knowledge_view].[count_view_knowledge_code]
        where knowledge_running_status = 'APPROVE' and knowledge_dept LIKE '$data_search_ajax%'    order by  knowledge_code desc";
} else if ($type_ajax == 'Title') {
    $strSql = "SELECT [knowledge_id]
        ,[knowledge_code]
        ,[knowledge_running_status]
        ,[knowledge_title]
        ,[knowledge_title_other]
        ,[knowledge_author]
        ,[knowledge_dept]
        ,[knowledge_file_link]
        ,[knowledge_file_link_pdf]
        ,[knowledge_file_link_ppt]
        ,[knowledge_emp_no]
        ,[knowledge_user_upload]
        ,[knowledge_issue_time]
        ,[knowledge_issue_date]
        ,[knowledge_issue_datetime] 
        ,count_view
        FROM [tbl_knowledge_data] LEFT JOIN [tbl_knowledge_running] 
        ON [tbl_knowledge_running].[knowledge_running_code] = [tbl_knowledge_data].[knowledge_code] 
        LEFT JOIN tbl_knowledge_view
        ON [tbl_knowledge_data].[knowledge_code] = [tbl_knowledge_view].[count_view_knowledge_code]
        where knowledge_running_status = 'APPROVE' and knowledge_title LIKE '$data_search_ajax%'    order by  knowledge_code desc";
} else if ($type_ajax == 'Upload By') {
    $strSql = "SELECT [knowledge_id]
        ,[knowledge_code]
        ,[knowledge_running_status]
        ,[knowledge_title]
        ,[knowledge_title_other]
        ,[knowledge_author]
        ,[knowledge_dept]
        ,[knowledge_file_link]
        ,[knowledge_file_link_pdf]
        ,[knowledge_file_link_ppt]
        ,[knowledge_emp_no]
        ,[knowledge_user_upload]
        ,[knowledge_issue_time]
        ,[knowledge_issue_date]
        ,[knowledge_issue_datetime] 
        ,count_view
        FROM [tbl_knowledge_data] LEFT JOIN [tbl_knowledge_running] 
        ON [tbl_knowledge_running].[knowledge_running_code] = [tbl_knowledge_data].[knowledge_code] 
        LEFT JOIN tbl_knowledge_view
        ON [tbl_knowledge_data].[knowledge_code] = [tbl_knowledge_view].[count_view_knowledge_code]
        where knowledge_running_status = 'APPROVE' and knowledge_user_upload LIKE '%$data_search_ajax%'  order by  knowledge_code desc";
} else if ($type_ajax == 'Year') {
    $strSql = "SELECT [knowledge_id]
        ,[knowledge_code]
        ,[knowledge_running_status]
        ,[knowledge_title]
        ,[knowledge_title_other]
        ,[knowledge_author]
        ,[knowledge_dept]
        ,[knowledge_file_link]
        ,[knowledge_file_link_pdf]
        ,[knowledge_file_link_ppt]
        ,[knowledge_emp_no]
        ,[knowledge_user_upload]
        ,[knowledge_issue_time]
        ,[knowledge_issue_date]
        ,[knowledge_issue_datetime] 
        ,count_view
        FROM [tbl_knowledge_data] LEFT JOIN [tbl_knowledge_running] 
        ON [tbl_knowledge_running].[knowledge_running_code] = [tbl_knowledge_data].[knowledge_code] 
        LEFT JOIN tbl_knowledge_view
        ON [tbl_knowledge_data].[knowledge_code] = [tbl_knowledge_view].[count_view_knowledge_code]
        where knowledge_running_status = 'APPROVE' and CONVERT(nvarchar, DATEPART(year, knowledge_issue_date)) LIKE '%$data_search_ajax%'   order by  knowledge_code desc";
} else if ($like_refirsh != 0) {
    $strSql = "SELECT top($like_refirsh) [knowledge_id]
    ,[knowledge_code]
    ,[knowledge_running_status]
    ,[knowledge_title]
    ,[knowledge_title_other]
    ,[knowledge_author]
    ,[knowledge_dept]
    ,[knowledge_file_link]
    ,[knowledge_file_link_pdf]
    ,[knowledge_file_link_ppt]
    ,[knowledge_emp_no]
    ,[knowledge_user_upload]
    ,[knowledge_issue_time]
    ,[knowledge_issue_date]
    ,[knowledge_issue_datetime] 
    ,[count_view]
    FROM [tbl_knowledge_data] LEFT JOIN [tbl_knowledge_running] 
    ON [tbl_knowledge_running].[knowledge_running_code] = [tbl_knowledge_data].[knowledge_code] 
    LEFT JOIN tbl_knowledge_view
    ON [tbl_knowledge_data].[knowledge_code] = [tbl_knowledge_view].[count_view_knowledge_code]
    where knowledge_running_status = 'APPROVE' order by  knowledge_code desc";

    $limit = $like_refirsh;
} else {
    $strSql = "SELECT top($limit) [knowledge_id]
        ,[knowledge_code]
        ,[knowledge_running_status]
        ,[knowledge_title]
        ,[knowledge_title_other]
        ,[knowledge_author]
        ,[knowledge_dept]
        ,[knowledge_file_link]
        ,[knowledge_file_link_pdf]
        ,[knowledge_file_link_ppt]
        ,[knowledge_emp_no]
        ,[knowledge_user_upload]
        ,[knowledge_issue_time]
        ,[knowledge_issue_date]
        ,[knowledge_issue_datetime] 
        ,[count_view]
        FROM [tbl_knowledge_data] LEFT JOIN [tbl_knowledge_running] 
        ON [tbl_knowledge_running].[knowledge_running_code] = [tbl_knowledge_data].[knowledge_code] 
        LEFT JOIN tbl_knowledge_view
        ON [tbl_knowledge_data].[knowledge_code] = [tbl_knowledge_view].[count_view_knowledge_code]
        where knowledge_running_status = 'APPROVE' order by  knowledge_code desc";
}


$objQuery = sqlsrv_query($db_con, $strSql, $params, $options);
$postCount = $limit;

// $row_id = 0;
// $json = array();
while ($objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC)) {

    $knowledge_code = $objResult["knowledge_code"];

    $sql_check_like = "SELECT [like_user_code],[like_status],[like_content_code]
    FROM [tbl_knowledge_like_unlike] WHERE like_user_code = '$emp_code' AND like_content_code = '$knowledge_code'";

    $objQuery_like = sqlsrv_query($db_con, $sql_check_like, $params, $options);

    $like_status = "";

    while ($objResult_like = sqlsrv_fetch_array($objQuery_like, SQLSRV_FETCH_ASSOC)) {
        $like_status = $objResult_like["like_status"];
    }

    $result_like = sqlsrv_query($db_con, "SELECT count(like_status) as like_ FROM [tbl_knowledge_like_unlike] where like_content_code = '$knowledge_code' and like_status = 'LIKE'", $params, $options);
    $count_like = "";
    while ($objResult_Like_ALl = sqlsrv_fetch_array($result_like, SQLSRV_FETCH_ASSOC)) {
        $count_like = $objResult_Like_ALl["like_"];
    }

    $sql_comment_count = "SELECT count(comment_knowledge_code) as comment_ FROM [tbl_knowledge_comment] where comment_knowledge_code = '$knowledge_code'"; 
    $objQuery_comment = sqlsrv_query($db_con, $sql_comment_count, $params, $options);   
    $comment_count = "";
    while ($objResult_count_ALl = sqlsrv_fetch_array($objQuery_comment, SQLSRV_FETCH_ASSOC)) {
        $comment_count = $objResult_count_ALl["comment_"];
    }

?>
    <div class="column">
        <div class="card">
            <font>
                <h6><?= $objResult['count_view']; ?>&nbsp;View</h6>
            </font>
            <div class="inner">
                <video width="220" height="150" style="pointer-events:none;">
                    <source src="<?= $objResult['knowledge_file_link']; ?>" type="video/mp4" />
                </video>
            </div>
            <!-- <iframe type="video/mp4" src="<?= $objResult['knowledge_file_link']; ?>" width="220" height="150" style="pointer-events:none;" autoplay="0" controls="0" id='fream_id'></iframe> -->
            <br /><br />
            <h5>Knowledge Code:&nbsp;&nbsp;<?= $objResult['knowledge_code']; ?></h5>
            <h5>Title:&nbsp;&nbsp;<?= $objResult['knowledge_title']; ?></h5>
            <h5>TitleOther:&nbsp;&nbsp;<?= $objResult['knowledge_title_other']; ?></h5>
            <h5>Dept:&nbsp;&nbsp;<?= $objResult['knowledge_dept']; ?></h5>
            <h5>Full Size Video:&nbsp;&nbsp;<button onclick='playYouTubeModal(this.id);' id='<?= $objResult["knowledge_file_link"] . "###" . $objResult["knowledge_code"] ?>' style='font-size:20px;color:red;align: center;border: none;padding: 0;background: none;'><i class='fa fa-file-video-o'></i></button></h5>
            <h5>Pdf:&nbsp;&nbsp;<a href='pdf_view.php?pdf1=<?= $objResult["knowledge_file_link_pdf"]; ?>' style='font-size:20px;color:red;align: center;' target='_blank'><i class='fa fa-file-pdf-o'></i></a></h5>
            <?
            if ($like_status == "" || $like_status == "UNLIKE") {
            ?>
                <h5><button class="btn_like" onclick='clickLike(this.id);' id='<?= $objResult["knowledge_code"] ?>'><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button>&nbsp;<span id="get_like_<?= $objResult["knowledge_code"] ?>"><?= $count_like ?></span></h5>
            <?
            } else {
            ?>
                <h5><button class="btn_unlike" onclick='clickUnlike(this.id);' id='<?= $objResult["knowledge_code"] ?>'><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>&nbsp;<span id='get_like_<?= $objResult["knowledge_code"] ?>'><?= $count_like ?></span></h5>
            <? } ?>
            <!-- &nbsp;&nbsp;<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>&nbsp;0 -->
            <h5><button onclick="comment(this.id);"  id="<?= $objResult["knowledge_code"] ?>" style="border:none;">Comment</button>&nbsp;<span><?= $comment_count ?></span></h5>
            <?
                if($type_user  == '3'){
                    ?>
                    <h6><button onclick="comment_read(this.id);"  id="<?= $objResult["knowledge_code"] ?>">Show Comment</button></h6>
                    <?
                }else{
                    ?>

                    <?
                }
            ?>
        </div>
    </div>
<?
}
?>
<input type="hidden" id="postCount" value="<?= $postCount; ?>">
<?
?>