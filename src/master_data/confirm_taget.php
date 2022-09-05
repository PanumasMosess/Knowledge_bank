<?
  require_once("../../application.php");

  // date time now 
  $buffer_date = date("Y-m-d");
  $buffer_time = date("H:i:s"); //24H
  $buffer_datetime = date("Y-m-d H:i:s");

  $user_approve  = $_SESSION['user_name_en_session'];

  /*var *****************************************************************************/
  $year_ajax = isset($_POST['year_ajax']) ? $_POST['year_ajax'] : '';
  $bu_ajax = isset($_POST['bu_ajax']) ? $_POST['bu_ajax'] : '';
  $number_ajax = isset($_POST['number_ajax']) ? $_POST['number_ajax'] : '';

  $slelct_check_insert = "SELECT * FROM [tbl_knowledge_taget] WHERE [knowledge_taget_year] = '$year_ajax' and [knowledge_taget_dept] = '$bu_ajax' ";

  $objQuery_chk_tagget = sqlsrv_query($db_con, $slelct_check_insert, $params, $options);
  $num_row_chk_tagget = sqlsrv_num_rows($objQuery_chk_tagget);

  if($num_row_chk_tagget > 0){

    $sql_update_target = " UPDATE [tbl_knowledge_taget]
  SET [knowledge_taget_total] = '$number_ajax'
     ,[knowledge_taget_user_issue] = '$user_approve'
     ,[knowledge_taget_time] = '$buffer_time'
     ,[knowledge_taget_date] = '$buffer_date'
     ,[knowledge_taget_datetime] = '$buffer_datetime'
 WHERE [knowledge_taget_year] = '$year_ajax' and [knowledge_taget_dept] = '$bu_ajax'
  ";
  $objQuery_update_target = sqlsrv_query($db_con, $sql_update_target);

  if($objQuery_update_target){
     echo "UPDATE_TAGET_SUCCESS";
  }else{
     echo "UPDATE_TAGET_FAILED";
  }
     
 }else {
    $sql_insert_target = "INSERT INTO [dbo].[tbl_knowledge_taget]
    ([knowledge_taget_year]
    ,[knowledge_taget_dept]
    ,[knowledge_taget_total]
    ,[knowledge_taget_user_issue]
    ,[knowledge_taget_date]
    ,[knowledge_taget_time]
    ,[knowledge_taget_datetime])
VALUES
    ('$year_ajax'
    ,'$bu_ajax'
    ,'$number_ajax'
    ,'$user_approve'
    ,'$buffer_date'
    ,'$buffer_time'
    ,'$buffer_datetime')
    ";
    $objQuery_insert_target = sqlsrv_query($db_con, $sql_insert_target);

    if($objQuery_insert_target){
        echo "SUCCESS_TAGET";
     }else{
        echo "FAILED_TAGET";
     }

 }

  

?>