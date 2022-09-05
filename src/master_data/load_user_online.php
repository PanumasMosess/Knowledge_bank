<?
    require_once("../../application.php");


    $strSql = "SELECT [kb_online_id]
    ,[user_code]
    ,[user_dept]
    ,[user_login_name]
    ,[kb_online_lastime]
    FROM [tbl_knowledge_user_online] order by kb_online_id desc";

$objQuery = sqlsrv_query($db_con, $strSql);

$row_id = 0;
$json = array();
while($objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC))
{
    $row_id++;
    $inround__ = array(
        "no" => $row_id,
        "user_code" => $objResult['user_code'],
        "user_dept" => $objResult['user_dept'],
        "user_login_name" => $objResult['user_login_name'],
        "kb_online_lastime" => $objResult['kb_online_lastime'],
    );
    array_push($json, $inround__);

}
		
    echo json_encode($json);
?>