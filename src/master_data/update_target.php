<?
    require_once("../../application.php");

  // date time now 
  $buffer_date = date("Y-m-d");
  $buffer_time = date("H:i:s"); //24H
  $buffer_datetime = date("Y-m-d H:i:s");

  /*var *****************************************************************************/
  $id_ajax = isset($_POST['id_ajax']) ? $_POST['id_ajax'] : '';
  $year_ajax = isset($_POST['year_ajax']) ? $_POST['year_ajax'] : '';
  $dept_ajax = isset($_POST['dept_ajax']) ? $_POST['dept_ajax'] : '';
  $number_ajax = isset($_POST['number_ajax']) ? $_POST['number_ajax'] : '';


  $sql_update_target = "UPDATE [tbl_knowledge_taget] set knowledge_taget_year = '$year_ajax', knowledge_taget_dept = '$dept_ajax', knowledge_taget_total = '$number_ajax'
  ,[knowledge_taget_date] = '$buffer_date'
  ,[knowledge_taget_time] = '$buffer_time '
  ,[knowledge_taget_datetime] = '$buffer_datetime' 
  WHERE  [knowledge_taget_id] = '$id_ajax'
  ";

$objQuery_update_target = sqlsrv_query($db_con, $sql_update_target);

if($objQuery_update_target){
  echo "UPDATE_TARGET_SUCCESS";
}else{
  echo "UPDATE_TARGET_FAILED";
}
?>