<?
    require_once("../../application.php");

    // date time now 
    $buffer_date = date("Y-m-d");
    $buffer_time = date("H:i:s"); //24H
    $buffer_datetime = date("Y-m-d H:i:s");

    /**********************************************************************************/
    /*var *****************************************************************************/
    $user_ajax = isset($_POST['user_ajax']) ? $_POST['user_ajax'] : '';
    $pass_ajax = isset($_POST['pass_ajax']) ? $_POST['pass_ajax'] : '';
    $pass_ajax = md5($pass_ajax);
    $name_en_ajax = isset($_POST['name_en_ajax']) ? $_POST['name_en_ajax'] : '';
    $name_th_ajax = isset($_POST['name_th_ajax']) ? $_POST['name_th_ajax'] : '';
    $emp_id_ajax = isset($_POST['emp_id_ajax']) ? $_POST['emp_id_ajax'] : '';
    $email_ajax = isset($_POST['email_ajax']) ? $_POST['email_ajax'] : '';
   //  $select_company_ajax = isset($_POST['select_company_ajax']) ? $_POST['select_company_ajax'] : '';
    $select_dept_ajax = isset($_POST['select_dept_ajax']) ? $_POST['select_dept_ajax'] : '';

    //check duplicate user
    $strSql_chk_user = "SELECT [user_name] FROM [tbl_knowledge_user] where user_name ='$user_ajax' ";
    $objQuery_chk_user = sqlsrv_query($db_con, $strSql_chk_user, $params, $options);
    $num_row_chk_user = sqlsrv_num_rows($objQuery_chk_user);

    if($num_row_chk_user > 0){
       echo 'USER_DUPLICATE';
    }else {
       
      $sql_insert_register_user = " INSERT INTO tbl_knowledge_user
       (user_name
       ,user_password
       ,user_name_lastname_en
       ,user_name_lastname_th
       ,user_dept
       ,user_email
       ,user_emp_no
       ,user_type
       ,user_enable
       ,user_issue_time
       ,user_issue_date
       ,user_issue_datetime)
    VALUES
       ('$user_ajax'
       ,'$pass_ajax'
       ,'$name_en_ajax'
       ,'$name_th_ajax'
       ,'$select_dept_ajax'
       ,'$email_ajax'
       ,'$emp_id_ajax'
       ,'USER'
       ,'Enable'
       ,'$buffer_time'
       ,'$buffer_date'
       ,'$buffer_datetime')
       ";
       $objQuery_insert_user = sqlsrv_query($db_con, $sql_insert_register_user);
	
       echo "SUCCESS_REGISTER";
    }

?>