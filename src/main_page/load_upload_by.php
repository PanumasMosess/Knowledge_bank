<?
    require_once("../../application.php");

    $str_count_athor = "SELECT  [knowledge_user_upload], count(*)total
    FROM [tbl_knowledge_data] 
	LEFT JOIN [tbl_knowledge_running] 
	ON [tbl_knowledge_running].[knowledge_running_code] = [tbl_knowledge_data].[knowledge_code] 
	where knowledge_running_status = 'APPROVE' group by knowledge_user_upload order by total desc ";

$objQuery = sqlsrv_query($db_con, $str_count_athor);

$row_id = 0;
$json = array();
while($objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC))
{
    $row_id++;
    $inround__ = array(
        "no" => $row_id,
        "knowledge_user_upload" => $objResult['knowledge_user_upload'],
        "total" => $objResult['total'],
    );
    array_push($json, $inround__);

}
		
    echo json_encode($json);

?>