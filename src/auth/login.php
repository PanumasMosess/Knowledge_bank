<?
    require_once("../../application.php");

    /**********************************************************************************/
    /*var *****************************************************************************/
    $user_ajax = isset($_POST['user_ajax']) ? $_POST['user_ajax'] : '';
    $pass_ajax = isset($_POST['pass_ajax']) ? $_POST['pass_ajax'] : '';
    $pass_ajax = md5($pass_ajax);

    // date time now 
    $buffer_date = date("Y-m-d");
    $buffer_time = date("H:i:s"); //24H
    $buffer_datetime = date("Y-m-d H:i:s");

    //check duplicate user
    $strSql_chk_user = "SELECT [user_code] FROM [db_hrms].[dbo].[tbl_user] where user_code ='$user_ajax' and user_pass_md5 = '$pass_ajax' ";
    $objQuery_chk_user = sqlsrv_query($db_con, $strSql_chk_user, $params, $options);
    $num_row_chk_user = sqlsrv_num_rows($objQuery_chk_user);

    if($num_row_chk_user > 0){
        $IP_Get =  getVisitorIP();
        $str_sql_get_user = "SELECT * FROM [db_hrms].[dbo].[tbl_user] where user_code ='$user_ajax' and [user_pass_md5] = '$pass_ajax' and user_enable = '1'";
        $objQuery_user = sqlsrv_query($db_con, $str_sql_get_user,  $params, $options);
        $num_row_user = sqlsrv_num_rows($objQuery_user);

        if($num_row_user > 0){
            while($objResult_user= sqlsrv_fetch_array($objQuery_user, SQLSRV_FETCH_ASSOC))
            {
              $user_code = $objResult_user['user_code'];
              $user_name_en = $objResult_user['user_name_en'];
              $user_company = $objResult_user['user_company'];
              $user_type = $objResult_user['user_type'];
              $user_name_th = $objResult_user['user_name_th'];  
              $user_section = $objResult_user['user_section'];
              $user_email = $objResult_user['user_email'];
              $user_kb_upload = $objResult_user['user_kb_upload'];
              $user_pass_md5 = $objResult_user['user_pass_md5'];
              $user_force_pass_chg = $objResult_user['user_force_pass_chg'];
            }
            
            $_SESSION['user_name_session'] = trim($user_code);
            $_SESSION['user_type_session'] = trim($user_type);
            $_SESSION['user_name_en_session'] = $user_name_en;
            $_SESSION['user_name_th_session'] = $user_name_th;
            $_SESSION['user_company_session'] = $user_company;
            $_SESSION['user_section_session'] = $user_section;
            $_SESSION['user_upload_session'] = trim($user_kb_upload);
            $_SESSION['user_email_session'] = trim($user_email);
            $_SESSION['user_emp_session'] = trim($user_code);
            $_SESSION['user_emp_session'] = trim($user_code);
            $_SESSION['user_pass_md5_session'] = trim($user_pass_md5);
            $_SESSION['user_force_pass_chg_session'] = trim($user_force_pass_chg);
            
            session_write_close();
    
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
            ,'$user_code'
            ,'$user_name_en'
            ,'$user_type'
            ,'LOGIN SUCCESS'
            ,'$buffer_date'
            ,'$buffer_time'
            ,'$buffer_datetime')";
    
        $objQuery_log = sqlsrv_query($db_con, $str_insert_log);

        $strSql_chk_user_on = "SELECT * FROM [tbl_knowledge_user_online] where user_code = '$user_ajax'";
        $objQuery_chk_user_on = sqlsrv_query($db_con, $strSql_chk_user_on, $params, $options);
        $num_row_chk_online = sqlsrv_num_rows($objQuery_chk_user_on);

        if($num_row_chk_online > 0){

            $str_update_online = "UPDATE [tbl_knowledge_user_online] SET kb_online_date = '$buffer_date', kb_online_lastime = '$buffer_datetime' WHERE user_code = '$user_ajax'";
    
            $objQuery_online = sqlsrv_query($db_con, $str_update_online);

        }else{

            $str_insert_online = "INSERT INTO [dbo].[tbl_knowledge_user_online]
            ([user_code]
            ,[user_dept]
            ,[user_login_name]
            ,kb_online_date
            ,[kb_online_lastime])
            VALUES
            ('$user_code'
            ,'$user_section'
            ,'$user_name_en'
            ,'$buffer_date'
            ,'$buffer_datetime')";
    
            $objQuery_online = sqlsrv_query($db_con, $str_insert_online);

        }
  
        echo 'SUCCESS_LOGIN';
        
        }else {
            echo 'USER_DISABLE';
        }
       
     }else {
        echo 'USER_NOT_FOUND';
     }
?>