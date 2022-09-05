<?
    require_once("../../application.php");

    $str_count_year = "SELECT  COUNT(*)count_year,(CONVERT(VARCHAR,MIN(year(knowledge_running_date)))+'-' + CONVERT(VARCHAR,MAX(year(knowledge_running_date)))) AS yearRange
	FROM [tbl_knowledge_data] LEFT JOIN [tbl_knowledge_running] 
    ON [tbl_knowledge_running].[knowledge_running_code] = [tbl_knowledge_data].[knowledge_code] 
	where knowledge_running_status = 'APPROVE' GROUP BY FLOOR(Year(knowledge_running_date) /5) ";

$objQuery = sqlsrv_query($db_con, $str_count_year);

$row_id = 0;
$json = array();
while($objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC))
{
    $row_id++;
    $inround__ = array(
        "no" => $row_id,
        "count_year" => $objResult['count_year'],
        "yearRange" => $objResult['yearRange'],
    );
    array_push($json, $inround__);

}
		
    echo json_encode($json);

?>