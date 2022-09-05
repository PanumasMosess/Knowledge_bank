<?
require_once("../../application.php");

$knowledge_code = isset($_POST['knowledge_code']) ? $_POST['knowledge_code'] : '';

//SELECT VIEW
$str_get_view_cureent = "SELECT [count_view_id]
,[count_view_knowledge_code]
,[count_view]
FROM [tbl_knowledge_view] WHERE [count_view_knowledge_code] = '$knowledge_code' ";

$objQuery_view = sqlsrv_query($db_con, $str_get_view_cureent);

while($objResult_get_view_cureent = sqlsrv_fetch_array($objQuery_view, SQLSRV_FETCH_ASSOC))
{
    $count_view = $objResult_get_view_cureent['count_view'];
}

 $count_view++;

//UPDATE VIEW
$str_update_view = "UPDATE tbl_knowledge_view SET count_view = $count_view
where count_view_knowledge_code =  '$knowledge_code'";
$objQuery_update_view = sqlsrv_query($db_con, $str_update_view);

sqlsrv_close($db_con);

?>