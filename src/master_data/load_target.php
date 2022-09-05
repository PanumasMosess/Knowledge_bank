<?
    require_once("../../application.php");


$strSql = "SELECT 
 [knowledge_taget_id]
,[knowledge_taget_year]
,[knowledge_taget_dept]
,[knowledge_taget_total]
,[knowledge_taget_user_issue]
,[knowledge_taget_date]
,[knowledge_taget_time]
,[knowledge_taget_datetime]
FROM [tbl_knowledge_taget] order by knowledge_taget_year desc";
$objQuery = sqlsrv_query($db_con, $strSql);

$row_id = 0;
$json = array();
while($objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC))
{
    $row_id++;
    $inround__ = array(
        "no" => $row_id,
        "knowledge_taget_id" => $objResult['knowledge_taget_id'],
        "knowledge_taget_year" => $objResult['knowledge_taget_year'],
        "knowledge_taget_dept" => $objResult['knowledge_taget_dept'],
        "knowledge_taget_total" => $objResult['knowledge_taget_total'],
        "knowledge_taget_user_issue" => $objResult['knowledge_taget_user_issue'],
        "knowledge_taget_date" => $objResult['knowledge_taget_date'],
        "knowledge_taget_time" => $objResult['knowledge_taget_time']
    );
    array_push($json, $inround__);

}
		
    echo json_encode($json);
?>