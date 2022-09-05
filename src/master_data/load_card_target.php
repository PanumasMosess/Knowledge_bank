<?
require_once("../../application.php");

$year = isset($_POST['year_']) ? $_POST['year_'] : '';

$year = trim($year);

if ($year  == 'ALL') {
    ////////////Target Year

    $sql_total = "SELECT SUM(CONVERT(int, knowledge_taget_total)) as target_
FROM [tbl_knowledge_taget]";

    //get total
    $objQuery_total = sqlsrv_query($db_con, $sql_total);
    $objResult_total = sqlsrv_fetch_array($objQuery_total, SQLSRV_FETCH_ASSOC);

    //check total
    if ($objResult_total['target_'] == NULL) {
        $str_sp_total = '0';
    } else {
        $str_sp_total = $objResult_total['target_'];
    }
    $total_target = $str_sp_total;


    ///////////////////Current 

    $sql_current = "SELECT COUNT(knowledge_running_code) as current_ FROM [tbl_knowledge_running] where knowledge_running_status != 'APPROVE'   ";

    //get total
    $objQuery_current = sqlsrv_query($db_con, $sql_current);
    $objResult_current = sqlsrv_fetch_array($objQuery_current, SQLSRV_FETCH_ASSOC);

    //check total
    if ($objResult_current['current_'] == NULL) {
        $str_sp_current = '0';
    } else {
        $str_sp_current = $objResult_current['current_'];
    }
    $total_current = $str_sp_current;


    ///////////////////Current 

    $sql_success = "SELECT COUNT(knowledge_dept) as success_ FROM tbl_knowledge_data  left join tbl_knowledge_running 
on tbl_knowledge_data.knowledge_code = tbl_knowledge_running.knowledge_running_code
where knowledge_running_status = 'APPROVE'";

    //get total
    $objQuery_success = sqlsrv_query($db_con, $sql_success);
    $objResult_success = sqlsrv_fetch_array($objQuery_success, SQLSRV_FETCH_ASSOC);

    //check total
    if ($objResult_success['success_'] == NULL) {
        $str_sp_success = '0';
    } else {
        $str_sp_success = $objResult_success['success_'];
    }
    $total_success = $str_sp_success;

    //Diff
    $total_diff = $total_target - $total_success;
} else {
    ////////////Target Year

    $sql_total = "SELECT SUM(CONVERT(int, knowledge_taget_total)) as target_
    FROM [tbl_knowledge_taget] where knowledge_taget_year = '$year'";

    //get total
    $objQuery_total = sqlsrv_query($db_con, $sql_total);
    $objResult_total = sqlsrv_fetch_array($objQuery_total, SQLSRV_FETCH_ASSOC);

    //check total
    if ($objResult_total['target_'] == NULL) {
        $str_sp_total = '0';
    } else {
        $str_sp_total = $objResult_total['target_'];
    }
    $total_target = $str_sp_total;
    $test = $str_sp_total;


    ///////////////////Current 

    $sql_current = "SELECT COUNT(knowledge_dept) as current_ FROM tbl_knowledge_data 
    left join tbl_knowledge_running on tbl_knowledge_data.knowledge_code = tbl_knowledge_running.knowledge_running_code
    where [knowledge_target_year] = '$year' and knowledge_running_status != 'APPROVE' ";

    //get total
    $objQuery_current = sqlsrv_query($db_con, $sql_current);
    $objResult_current = sqlsrv_fetch_array($objQuery_current, SQLSRV_FETCH_ASSOC);

    //check total
    if ($objResult_current['current_'] == NULL) {
        $str_sp_current = '0';
    } else {
        $str_sp_current = $objResult_current['current_'];
    }
    $total_current = $str_sp_current;


    ///////////////////Current 

    $sql_success = "SELECT COUNT(knowledge_dept) as success_ FROM tbl_knowledge_data  left join tbl_knowledge_running 
    on tbl_knowledge_data.knowledge_code = tbl_knowledge_running.knowledge_running_code
    where knowledge_running_status = 'APPROVE' and knowledge_target_year = '$year'";

    //get total
    $objQuery_success = sqlsrv_query($db_con, $sql_success);
    $objResult_success = sqlsrv_fetch_array($objQuery_success, SQLSRV_FETCH_ASSOC);

    //check total
    if ($objResult_success['success_'] == NULL) {
        $str_sp_success = '0';
    } else {
        $str_sp_success = $objResult_success['success_'];
    }
    $total_success = $str_sp_success;

    //Diff
    $total_diff = $total_target - $total_success;
}



?>

<script>
    $("#spn_db_target_year_now").html('<?= $total_target; ?>');
    $("#spn_db_target_year_current").html('<?= $total_current; ?>');
    $("#spn_db_target_year_success").html('<?= $total_success; ?>');
    $("#spn_db_target_year_diff").html('<?= $total_diff; ?>');
</script>