<?
    require_once("../../application.php");


$strSql = "SELECT [id]
,[user_name]
,[user_password]
,[user_name_lastname_en]
,[user_name_lastname_th]
,[user_dept]
,[user_email]
,[user_emp_no]
,[user_type]
,[user_enable]
FROM [tbl_knowledge_user] ";
$objQuery = sqlsrv_query($db_con, $strSql);

$row_id = 0;
$json = array();
while($objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC))
{
    $row_id++;
    $inround__ = array(
        "no" => $row_id,
        "user_id" => $objResult['id'],
        "user_name" => $objResult['user_name'],
        "user_password" => $objResult['user_password'],
        "user_name_lastname_en" => $objResult['user_name_lastname_en'],
        "user_name_lastname_th" => $objResult['user_name_lastname_th'],
        "user_dept" => $objResult['user_dept'],
        "user_email" => $objResult['user_email'],
        "user_emp_no" => $objResult['user_emp_no'],
        "user_type" => $objResult['user_type'],
        "user_enable" => $objResult['user_enable']
    );
    array_push($json, $inround__);

}
		
    echo json_encode($json);
?>