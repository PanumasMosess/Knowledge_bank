<?
      require_once("../../application.php");

      $str_title = "SELECT [knowledge_title] ,knowledge_issue_date
      FROM [tbl_knowledge_data] 
      LEFT JOIN tbl_knowledge_running
	  ON tbl_knowledge_running.knowledge_running_code = tbl_knowledge_data.knowledge_code
	  where knowledge_running_status = 'APPROVE' order by knowledge_issue_date desc ";
  
       $objQuery = sqlsrv_query($db_con, $str_title);
       
       $row_id = 0;
       $json = array();
       while($objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC))
       {
           $row_id++;
           $inround__ = array(
               "no" => $row_id,
               "knowledge_title" => $objResult['knowledge_title'],
               "knowledge_issue_date" => $objResult['knowledge_issue_date']
           );
           array_push($json, $inround__);
       
       }
          
      echo json_encode($json);
?>