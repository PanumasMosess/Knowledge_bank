<?
     require_once("../../application.php");

     /**********************************************************************************/
     /*var *****************************************************************************/
     $user_ajax = $_SESSION['user_name_session'];
     $name_en_ajax = $_SESSION['user_name_en_session'];
     $section = $_SESSION['user_type_session'];
     $IP_Get =  getVisitorIP();

     
    // date time now 
    $buffer_date = date("Y-m-d");
    $buffer_time = date("H:i:s"); //24H
    $buffer_datetime = date("Y-m-d H:i:s");

     $str_insert_log = "INSERT INTO tbl_knowledge_login_log
     (
      user_login_ip
     ,user_login_user
     ,user_login_name
     ,user_login_type
     ,user_login_status
     ,user_issue_date_login_log
     ,user_issue_time_login_log
     ,user_issue_datetime_login_log)
     VALUES
     ('$IP_Get'
     ,'$user_ajax'
     ,'$name_en_ajax'
     ,'$section'
     ,'LOOUT SUCCESS'
     ,'$buffer_date'
     ,'$buffer_time'
     ,'$buffer_datetime')";
     
    $objQuery_log = sqlsrv_query($db_con, $str_insert_log);

    $str_delete_online = "DELETE FROM [tbl_knowledge_user_online]
    WHERE [user_code] = '$user_ajax'";

    $objQuery_delete_online = sqlsrv_query($db_con, $str_delete_online);

    //clear session

    unset($_SESSION['user_name_session']);
    unset($_SESSION['user_type_session']);
    unset($_SESSION['user_name_lastname_th_session']);
    unset($_SESSION['user_force_pass_chg_session']);  
    unset($_SESSION['user_dept_session']);
    unset($_SESSION['user_email_session']);
    unset($_SESSION['user_emp_session']);
    unset($_SESSION['logged_in']);  


    $_SESSION["user_name_en_session"] = NULL;
    session_write_close();

     echo 'SUCCESS_LOOUT';
?>