<?
    require_once("../../application.php");

    //get session 
    $type  =  $_SESSION['user_type_session'];
    $dept =  $_SESSION['user_dept_session'];
    $user_name_en =  $_SESSION['user_name_lastname_en_session'];
    $emp_no = $_SESSION['user_emp_session'];

    $buffer_date = date("Y-m-d");
    $buffer_time = date("H:i:s"); //24H
    $buffer_datetime = date("Y-m-d H:i:s");

    $title_know_ajax = isset($_POST['title_know_ajax']) ? $_POST['title_know_ajax'] : '';
    $title_other_ajax = isset($_POST['title_other_ajax']) ? $_POST['title_other_ajax'] : '';
    $link_ajax = isset($_POST['link_ajax']) ? $_POST['link_ajax'] : '';
    $knowledge_code_ajax = isset($_POST['knowledge_code_ajax']) ? $_POST['knowledge_code_ajax'] : '';

    $link_ajax = explode("https://www.youtube.com/watch?v=", $link_ajax);

    $link_ajax = $link_ajax[1];
   
    $str_update_Knowledge_running = " UPDATE [tbl_knowledge_running]
    SET [knowledge_running_status] = 'WAIT_APPROVE'
    ,[knowledge_running_time] = '$buffer_time'
    ,[knowledge_running_date] = '$buffer_date'
    ,[knowledge_running_datetime] = '$buffer_datetime'
    WHERE [knowledge_running_code] = '$knowledge_code_ajax'
    ";
    $objQuery_running_update = sqlsrv_query($db_con, $str_update_Knowledge_running);
    if($objQuery_running_update){
        $str_update_knowledge_data = " UPDATE [tbl_knowledge_data]
        SET [knowledge_title] = '$title_know_ajax'
           ,[knowledge_title_other] = '$title_other_ajax'
           ,[knowledge_author] = '$user_name_en'
           ,[knowledge_file_link] = '$link_ajax'
           ,[knowledge_issue_time] = '$buffer_time'
           ,[knowledge_issue_date] = '$buffer_date'
           ,[knowledge_issue_datetime] = '$buffer_datetime'
        WHERE knowledge_code = '$knowledge_code_ajax'";

        $objQuery_data_update = sqlsrv_query($db_con, $str_update_knowledge_data);

        echo 'SUCCESS';
    }else{
        echo 'Failed Upload File';
    }
    
?>
