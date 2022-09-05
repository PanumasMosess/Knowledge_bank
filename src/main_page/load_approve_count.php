<?
require_once("../../application.php");

$str_count_approve = " SELECT count(*) as Approve from [tbl_knowledge_running]  where knowledge_running_status = 'WAIT_APPROVE'";
$objQuery = sqlsrv_query($db_con, $str_count_approve);
$total_approve = 0;
$str_sp_approve = 0;
$objResult_approve = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC);

//check total
if($objResult_approve['Approve'] == NULL){ $str_sp_approve = '0'; } else { $str_sp_approve = $objResult_approve['Approve']; }
$total_approve = $str_sp_approve;
?>

<script>
     $("#count_approve").html('<?=$total_approve;?>');
</script>