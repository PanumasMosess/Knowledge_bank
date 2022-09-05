<?
    require_once("../../application.php");


  /*var *****************************************************************************/
  $id_ajax = isset($_POST['id_ajax']) ? $_POST['id_ajax'] : '';



  $sql_delete_target = "DELETE FROM [tbl_knowledge_taget] WHERE [knowledge_taget_id] = '$id_ajax'";

  $objQuery_delete_target = sqlsrv_query($db_con, $sql_delete_target);

if($objQuery_delete_target){
  echo "DELETE_TARGET_SUCCESS";
}else{
  echo "DELETE_TARGET_FAILED";
}
?>