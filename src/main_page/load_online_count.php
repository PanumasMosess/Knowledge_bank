<?
require_once("../../application.php");

$str_count_online = "SELECT count(*) as online_ from [tbl_knowledge_user_online]";
$objQuery = sqlsrv_query($db_con, $str_count_online);
$total_online = 0;
$str_sp_online = 0;
$objResult_online = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC);

//check total
if($objResult_online['online_'] == NULL){ $str_sp_online = '0'; } else { $str_sp_online = $objResult_online['online_']; }
$total_online = $str_sp_online;
?>

<script>
     $("#count_online").html('<?=$total_online;?>');
</script>