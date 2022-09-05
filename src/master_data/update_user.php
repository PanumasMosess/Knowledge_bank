<?
  require_once("../../application.php");

  // date time now 
  $buffer_date = date("Y-m-d");
  $buffer_time = date("H:i:s"); //24H
  $buffer_datetime = date("Y-m-d H:i:s");

  /**********************************************************************************/
  /*var *****************************************************************************/
  $user_ajax = isset($_POST['user_ajax']) ? $_POST['user_ajax'] : '';
  $user_id_ajax = isset($_POST['user_id_ajax']) ? $_POST['user_id_ajax'] : '';
  $name_en_ajax = isset($_POST['name_en_ajax']) ? $_POST['name_en_ajax'] : '';
  $name_th_ajax = isset($_POST['name_th_ajax']) ? $_POST['name_th_ajax'] : '';
  $emp_id_ajax = isset($_POST['emp_id_ajax']) ? $_POST['emp_id_ajax'] : '';
  $email_ajax = isset($_POST['email_ajax']) ? $_POST['email_ajax'] : '';
  $select_dept_ajax = isset($_POST['select_dept_ajax']) ? $_POST['select_dept_ajax'] : '';
 // $select_company_ajax = isset($_POST['select_company_ajax']) ? $_POST['select_company_ajax'] : '';
  $select_user_type_ajax = isset($_POST['select_user_type_ajax']) ? $_POST['select_user_type_ajax'] : '';
  $select_user_status_ajax = isset($_POST['select_user_status_ajax']) ? $_POST['select_user_status_ajax'] : '';

     
    $sql_update_detail_user = " UPDATE tbl_knowledge_user SET
     user_name = '$user_ajax'
     ,user_name_lastname_en = '$name_en_ajax'
     ,user_name_lastname_th = '$name_th_ajax'
     ,user_dept = '$select_dept_ajax'
     ,user_email = '$email_ajax'
     ,user_emp_no = '$emp_id_ajax'
     ,user_type = '$select_user_type_ajax '
     ,user_enable = '$select_user_status_ajax'
     ,user_issue_time = '$buffer_time'
     ,user_issue_date = '$buffer_date'
     ,user_issue_datetime = '$buffer_datetime'
     WHERE id = '$user_id_ajax'
     ";
     $objQuery_update_user = sqlsrv_query($db_con, $sql_update_detail_user);
  
     if($objQuery_update_user){
        echo "SUCCESS_UPDATE_USER";
     }else{
        echo "Failed_UPDATE_USER";
     }

?>