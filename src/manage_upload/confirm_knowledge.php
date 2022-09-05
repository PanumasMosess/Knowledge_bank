<?
   require_once("../../application.php");
    //get session 
   $dept =  $_SESSION['user_dept_session'];
   $user =  $_SESSION['user_name_session'];
   $user_name_en =  $_SESSION['user_name_lastname_en_session'];
   $emp_no = $_SESSION['user_emp_session'];

   $buffer_date = date("Y-m-d");
   $buffer_time = date("H:i:s"); //24H
   $buffer_datetime = date("Y-m-d H:i:s");

   $title_ajax = isset($_POST['title_ajax']) ? $_POST['title_ajax'] : '';
   $other_title_ajax = isset($_POST['other_title_ajax']) ? $_POST['other_title_ajax'] : '';
   $youtube_link_ajax = isset($_POST['youtube_link_ajax']) ? $_POST['youtube_link_ajax'] : '';

   $youtube_link_ajax_ = explode("https://www.youtube.com/watch?v=", $youtube_link_ajax);

   $youtube_link_ajax = $youtube_link_ajax_[1];

   $strSql_get_id = " SELECT TOP(1) SUBSTRING(knowledge_running_code,3,9) as substr_knowledge_running_code  FROM tbl_knowledge_running order by knowledge_running_code DESC ";
   $objQuery_get_id = sqlsrv_query($db_con, $strSql_get_id, $params, $options);
   $num_row_get_id = sqlsrv_num_rows($objQuery_get_id);

   if($num_row_get_id == 0){

    $sprintf_id = sprintf("%07d", 1);//generate first
    $full_id = $sprintf_id;
    $KN_id = 'KN'.$full_id;//full id

     //insert running
     $strSql_insert_know_running = " INSERT INTO tbl_knowledge_running
     (knowledge_running_code
    ,knowledge_running_reject_comment
    ,knowledge_running_status
    ,knowledge_running_issue_by
    ,knowledge_running_status_issue_by
    ,knowledge_running_time
    ,knowledge_running_date
    ,knowledge_running_datetime)
    VALUES
    ('$KN_id'
    ,null
    ,'WAIT_APPROVE'
    ,'$user_name_en'
    ,'$user_name_en'
    ,'$buffer_time'
    ,'$buffer_date'
    ,'$buffer_datetime')";
    
    $objQuery_running = sqlsrv_query($db_con, $strSql_insert_know_running);

    if($objQuery_running){
      //insert knowledge data
      $str_insert_knowledge = "
      INSERT INTO tbl_knowledge_data
      (knowledge_code
      ,knowledge_title
      ,knowledge_title_other
      ,knowledge_author
      ,knowledge_dept
      ,knowledge_file_link
      ,knowledge_emp_no
      ,knowledge_user_upload
      ,knowledge_issue_time
      ,knowledge_issue_date
      ,knowledge_issue_datetime)
     VALUES
       ('$KN_id'
      ,'$title_ajax'
      ,'$other_title_ajax'
      ,'$user_name_en'
      ,'$dept'
      ,'$youtube_link_ajax'
      ,'$emp_no'
      ,'$user'
      ,'$buffer_time'
      ,'$buffer_date'
      ,'$buffer_datetime')
      ";
      $objQuery_know = sqlsrv_query($db_con, $str_insert_knowledge);
    
     echo 'SUCCESS';

    }else{

     echo 'Failed Upload File';
     
    }

   }else{

    while($objResult_get_id = sqlsrv_fetch_array($objQuery_get_id, SQLSRV_FETCH_ASSOC))
    {
      $buffer_know_id = $objResult_get_id['substr_knowledge_running_code'];
    }
    $sprintf_id = sprintf("%07d", $buffer_know_id + 1);//generate first
    $full_id = $sprintf_id;
    $KN_id = 'KN'.$full_id;//full id

     //insert running
     $strSql_insert_know_running = " INSERT INTO tbl_knowledge_running
     (knowledge_running_code
    ,knowledge_running_reject_comment
    ,knowledge_running_status
    ,knowledge_running_issue_by
    ,knowledge_running_status_issue_by
    ,knowledge_running_time
    ,knowledge_running_date
    ,knowledge_running_datetime)
    VALUES
    ('$KN_id'
    ,null
    ,'WAIT_APPROVE'
    ,'$user_name_en'
    ,'$user_name_en'
    ,'$buffer_time'
    ,'$buffer_date'
    ,'$buffer_datetime')";
    
    $objQuery_running = sqlsrv_query($db_con, $strSql_insert_know_running);

    if($objQuery_running){
               //insert knowledge data
      $str_insert_knowledge = "
      INSERT INTO tbl_knowledge_data
      (knowledge_code
      ,knowledge_title
      ,knowledge_title_other
      ,knowledge_author
      ,knowledge_dept
      ,knowledge_file_link
      ,knowledge_emp_no
      ,knowledge_user_upload
      ,knowledge_issue_time
      ,knowledge_issue_date
      ,knowledge_issue_datetime)
    VALUES
       ('$KN_id'
      ,'$title_ajax'
      ,'$other_title_ajax'
      ,'$user_name_en'
      ,'$dept'
      ,'$youtube_link_ajax'
      ,'$emp_no'
      ,'$user'
      ,'$buffer_time'
      ,'$buffer_date'
      ,'$buffer_datetime')
      ";

      $objQuery_know = sqlsrv_query($db_con, $str_insert_knowledge);

      echo 'SUCCESS';

   }else{

      echo 'Failed Upload File';
      
   }
}

?>
