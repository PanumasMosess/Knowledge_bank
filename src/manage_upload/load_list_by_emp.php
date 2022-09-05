<?
    require_once("../../application.php");

    //session emp
    $emp_id = $_SESSION['user_emp_session'];
    $type = $_SESSION['user_type_session'];
    $user_upload_session = $_SESSION['user_upload_session'];

if($user_upload_session == '3'){
    $strSql = "SELECT [knowledge_id]
    ,[knowledge_code]
    ,[knowledge_running_status]
    ,[knowledge_running_reject_comment]
    ,[knowledge_title]
    ,[knowledge_title_other]
    ,[knowledge_author]
    ,[knowledge_dept]
    ,[knowledge_file_link]
    ,[knowledge_file_link_pdf]
    ,[knowledge_file_link_ppt]
    ,[knowledge_emp_no]
    ,[knowledge_user_upload]
    ,[knowledge_target_year]
    ,[knowledge_issue_time]
    ,[knowledge_issue_date]
    ,[knowledge_issue_datetime] 
    FROM [tbl_knowledge_data] LEFT JOIN [tbl_knowledge_running] ON [tbl_knowledge_running].[knowledge_running_code] = [tbl_knowledge_data].[knowledge_code] order by  knowledge_code desc";
}else{
    $strSql = "SELECT [knowledge_id]
    ,[knowledge_code]
    ,[knowledge_running_status]
    ,[knowledge_running_reject_comment]
    ,[knowledge_title]
    ,[knowledge_title_other]
    ,[knowledge_author]
    ,[knowledge_dept]
    ,[knowledge_file_link]
    ,[knowledge_file_link_pdf]
    ,[knowledge_file_link_ppt]
    ,[knowledge_emp_no]
    ,[knowledge_user_upload]
    ,[knowledge_target_year]
    ,[knowledge_issue_time]
    ,[knowledge_issue_date]
    ,[knowledge_issue_datetime] 
    FROM [tbl_knowledge_data] LEFT JOIN [tbl_knowledge_running] ON [tbl_knowledge_running].[knowledge_running_code] = [tbl_knowledge_data].[knowledge_code]  WHERE knowledge_emp_no = '$emp_id' order by  knowledge_code desc";
}

$objQuery = sqlsrv_query($db_con, $strSql);

$row_id = 0;
$json = array();
while($objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC))
{
    $row_id++;
    
    $inround__ = array(
        "no" => $row_id,
        "knowledge_id" => $objResult['knowledge_id'],
        "knowledge_code" => $objResult['knowledge_code'],
        "knowledge_title" => $objResult['knowledge_title'],
        "knowledge_title_other" => $objResult['knowledge_title_other'],
        "knowledge_author" => $objResult['knowledge_author'],
        "knowledge_dept" => $objResult['knowledge_dept'],
        "knowledge_file_link" => $objResult['knowledge_file_link'],
        "knowledge_file_link_pdf" => $objResult['knowledge_file_link_pdf'],
        "knowledge_file_link_ppt" => $objResult['knowledge_file_link_ppt'],
        "knowledge_emp_no" => $objResult['knowledge_emp_no'],
        "knowledge_user_upload" => $objResult['knowledge_user_upload'],
        "knowledge_code" => $objResult['knowledge_code'],
        "knowledge_running_status" => $objResult['knowledge_running_status'],
        "knowledge_running_reject_comment" => $objResult['knowledge_running_reject_comment'],
        "knowledge_issue_date" => $objResult['knowledge_issue_date'],
        "knowledge_target_year" => $objResult['knowledge_target_year'],
    );
    array_push($json, $inround__);

}
		
    echo json_encode($json);
?>