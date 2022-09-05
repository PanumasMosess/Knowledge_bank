<?
require_once("../../application.php");

$deptId  = $_GET['deptId'];

$sql = "SELECT [knowledge_dept_name]
FROM [tbl_knowledge_department] where [knowledge_dept_status] = 'ENABLE'  and [knowledge_dept_com_code] IN ('$deptId') group by knowledge_dept_name";
$query = sqlsrv_query($db_con, $sql);
 
$json = array();
while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {    
    array_push($json, $result);
}
echo json_encode($json);
?>