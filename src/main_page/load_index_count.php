<?
require_once("../../application.php");

$year = isset($_POST['year_']) ? $_POST['year_'] : '';

$year = 'ALL';

if ($year  == 'ALL') {
    ////////////Target Year

    $sql_total = "SELECT count(*) as all_ FROM tbl_knowledge_data";

    //get total
    $objQuery_total = sqlsrv_query($db_con, $sql_total);
    $objResult_total = sqlsrv_fetch_array($objQuery_total, SQLSRV_FETCH_ASSOC);

    //check total
    if ($objResult_total['all_'] == NULL) {
        $str_sp_total = '0';
    } else {
        $str_sp_total = $objResult_total['all_'];
    }
    $total_knowledge = $str_sp_total;


    ///////////////////Current 

    $sql_current_wait_approve = "SELECT count(*) as waitapprove_ FROM tbl_knowledge_data 
    left join tbl_knowledge_running 
    on tbl_knowledge_data.knowledge_code = tbl_knowledge_running.knowledge_running_code
    where knowledge_running_status = 'WAIT_APPROVE'";

    //get total
    $objQuery_current_wait_approve = sqlsrv_query($db_con, $sql_current_wait_approve);
    $objResult_current_wait_approve = sqlsrv_fetch_array($objQuery_current_wait_approve, SQLSRV_FETCH_ASSOC);

    //check total
    if ($objResult_current_wait_approve['waitapprove_'] == NULL) {
        $str_sp_current_wait_approve = '0';
    } else {
        $str_sp_current_wait_approve = $objResult_current_wait_approve['waitapprove_'];
    }
    $total_current_wait_approve = $str_sp_current_wait_approve;


    ///////////////////Current 

    $sql_recommend = "SELECT count(*) as recommend_ FROM tbl_knowledge_data 
    left join tbl_knowledge_running 
    on tbl_knowledge_data.knowledge_code = tbl_knowledge_running.knowledge_running_code
    where knowledge_running_status = 'RECOMMEND'";

    //get total
    $objQuery_recommend = sqlsrv_query($db_con, $sql_recommend);
    $objResult_recommend = sqlsrv_fetch_array($objQuery_recommend, SQLSRV_FETCH_ASSOC);

    //check total
    if ($objResult_recommend['recommend_'] == NULL) {
        $str_sp_recommend = '0';
    } else {
        $str_sp_recommend = $objResult_recommend['recommend_'];
    }
    $total_sp_recommend = $str_sp_recommend;


    
    ///////////////////Current 

    $sql_approve = "SELECT count(*) as approve_ FROM tbl_knowledge_data 
    left join tbl_knowledge_running 
    on tbl_knowledge_data.knowledge_code = tbl_knowledge_running.knowledge_running_code
    where knowledge_running_status = 'APPROVE'";

    //get total
    $objQuery_approve = sqlsrv_query($db_con, $sql_approve);
    $objResult_approve = sqlsrv_fetch_array($objQuery_approve, SQLSRV_FETCH_ASSOC);

    //check total
    if ($objResult_approve['approve_'] == NULL) {
        $str_sp_approve = '0';
    } else {
        $str_sp_approve = $objResult_approve['approve_'];
    }
    $total_sp_approve = $str_sp_approve;

} else {
  
}

echo $total_knowledge."#".$total_current_wait_approve."#".$total_sp_recommend."#".$total_sp_approve;

?>
