<?
    require_once("../../application.php");
    require_once("../../PHPMailer/class.phpmailer.php");

  // date time now 
  $buffer_date = date("Y-m-d");
  $buffer_time = date("H:i:s"); //24H
  $buffer_datetime = date("Y-m-d H:i:s");

  $user_approve  = $_SESSION['user_name_en_session'];

  /*var *****************************************************************************/
  $public_knowledge_id_ajax = isset($_POST['public_knowledge_id_ajax']) ? $_POST['public_knowledge_id_ajax'] : '';
  $reject_details_ajax = isset($_POST['reject_details_ajax']) ? $_POST['reject_details_ajax'] : '';

  $reject_details_ajax = str_replace("'"," ",$reject_details_ajax);

  $sql_update_reject = " UPDATE [tbl_knowledge_running]
  SET [knowledge_running_status] = 'RECOMMEND'
     ,[knowledge_running_reject_comment] = '$reject_details_ajax'
     ,[knowledge_running_status_issue_by] = '$user_approve'
     ,[knowledge_running_time] = '$buffer_time'
     ,[knowledge_running_date] = '$buffer_date'
     ,[knowledge_running_datetime] = '$buffer_datetime'
WHERE [knowledge_running_code] = '$public_knowledge_id_ajax'
  ";
  $objQuery_update_running = sqlsrv_query($db_con, $sql_update_reject);

  $sql_insert_reject_log = "INSERT INTO [tbl_knowledge_reject_log]
  ([knowledge_reject_log_code]
  ,[knowledge_reject_log_comment]
  ,[knowledge_reject_log_by]
  ,[knowledge_reject_log_time]
  ,[knowledge_reject_log_date]
  ,[knowledge_reject_log_datetime])
VALUES
  ('$public_knowledge_id_ajax'
  ,'$reject_details_ajax'
  ,'$user_approve'
  ,'$buffer_time'
  ,'$buffer_date'
  ,'$buffer_datetime') 
  ";
  $objQuery_insert_reject_log = sqlsrv_query($db_con, $sql_insert_reject_log);


  /////SELECT EMAIL
  $sql_select_email = "SELECT user_email, user_name_en,  knowledge_title, knowledge_title_other, knowledge_dept, knowledge_issue_date FROM [tbl_knowledge_data]  
  LEFT JOIN db_hrms.dbo.tbl_user ON tbl_knowledge_data.knowledge_emp_no = tbl_user.user_code 
  WHERE knowledge_code = '$public_knowledge_id_ajax' ";

  $objQuery_select_email = sqlsrv_query($db_con, $sql_select_email);

  $buffer_email = '';
  $buffer_user_name_en = '';
  $buffer_knowledge_title= '';
  $buffer_knowledge_title_other= '';
  $buffer_knowledge_dept = '';
  $buffer_knowledge_issue_date = '';

  while($objResult_email = sqlsrv_fetch_array($objQuery_select_email, SQLSRV_FETCH_ASSOC)){
   $buffer_email = $objResult_email['user_email'];
   $buffer_user_name_en = $objResult_email['user_name_en'];
   $buffer_knowledge_title = $objResult_email['knowledge_title'];
   $buffer_knowledge_title_other = $objResult_email['knowledge_title_other'];
   $buffer_knowledge_dept = $objResult_email['knowledge_dept'];   
   $buffer_knowledge_issue_date = $objResult_email['knowledge_issue_date'];   
  }


if(($objQuery_update_running && $objQuery_insert_reject_log)){
 //send mail
 $mail = new PHPMailer(true);
 $mail->IsSMTP(); 
            
                     try{
                      $t_subject = "Information from ".$CFG->AppNameTitle." Your Knowledge has Recommend ".$public_knowledge_id_ajax."";
                      $body = '
                          <body style="background-color: #f6f9fc; padding: 20px;">
                              <center>
                                      <table style="width: 75%; text-align: center; background-color: #fff; padding: 20px;">
                                          <tbody>
                                             <tr style="text-align: left;">
                                                <td>
                                                    <h3>Dear '.$buffer_user_name_en.'</h3>
                                                    <p style="color: gray; margin-top: -20px;">You have knowledge currently upload is recommend.</p>
                                                    <p>From: '.$user_approve.' </p>
                                                </td>
                                             </tr>
                                              <tr style="text-align: left;">
                                               <td>
                                                  <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Code: '.$public_knowledge_id_ajax.'</h3> 
                                                  <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Title: '.$buffer_knowledge_title.'</h3> 
                                                  <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Other Title: '.$buffer_knowledge_title_other.'</h3> 
                                                  <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Recommend Detail: '.$reject_details_ajax.'</h3> 
                                                  <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Recommend Date: '.$buffer_date.'</h3>
                                              </td>
                                              </tr>
                                              <tr>
                                                  <td style="pading: 20px;margin-top: 40px;">
                                                      <br><br>
                                                      <a href="'.$CFG->path_host.$CFG->wwwroot.'/login-register.php" style="color: #fff; background-color: tomato; border: 1px solid tomato;  box-shadow: 1px 1px 1px tomato; border-radius: 25px; height: 35px; padding: 5px 35px; margin-top: 30px;">GO TO KNOWLEDGE BANK</a>
                                                  </td>
                                              </tr>
                                              <tr style="text-align: left">
                                                  <td>
                                                      <p style="font-size: 11px; text-align: center;">
                                                          ----- It is only an automated notification email. ----- <br>
                                                          ----- Please, do not reply this e-mail address. --------
                                                      </p>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                              </center>
                          </body>
                      ';
            
 $mail->SMTPDebug  = 0;
 // enables SMTP debug information (for testing)
 // 0 = off
 // 1 = errors and messages
 // 2 = messages only
 $mail->CharSet = "UTF-8";
 $mail->SMTPAuth = true; // enable SMTP authentication
 $mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
 $mail->Host = $CFG->mail_host; // sets the SMTP server
 $mail->Port = $CFG->mail_port; // set the SMTP port
 $mail->Username = $CFG->user_smtp_mail; // SMTP account username
 $mail->Password = $CFG->password_smtp_mail; // SMTP account password
            
 // $array_to = 'anongn@glong-duang-jai.com,anong.nacom@albatrossthai.com';
 $array_to = $buffer_email;
 // $array_to = 'wiwatt@all2gether.net,armmybear4428@gmail.com,wiwat.tunyawatworakkul@e-tech.ac.th';
 $array_to = explode(",",$array_to);
 $count_array = count($array_to);

 $admin_cc_mail = $CFG->user_approve_cc;
 $mail->AddCC($admin_cc_mail);

 $mail->SetFrom($CFG->from_mail, '[Automatic E-mail] no-reply@');
 $mail->Subject = $t_subject;
 $mail->MsgHTML($body);
            
 for($z=0; $z<$count_array; $z++){
     $mail->AddAddress($array_to[$z], $array_to[$z]); 
 }
                          
 $mail->Send();
 }catch (phpmailerException $e){
     echo $e->errorMessage(); //Pretty error messages from PHPMailer
 } catch (Exception $e) {
     echo $e->getMessage(); //Boring error messages from anything else!
 }

 $buffer_knowledge_dept_re = str_replace("&","%26",$buffer_knowledge_dept);
 $buffer_knowledge_title = str_replace("&","%26",$buffer_knowledge_title);
 
 $lineMessage = "From KNOWLEDGE BANK SYSTEM \n === Konwledge Recomend in Knowledge Bank === \n Knowledge Code: ".$public_knowledge_id_ajax." \n Knowledge Title: ".$buffer_knowledge_title." \n Knowledge Dept: ".$buffer_knowledge_dept_re." \n Knowledge issue Date: ".$buffer_knowledge_issue_date." \n Knowledge Recommend Date: ".$buffer_date." \n ==== KNOWLEDGE BANK SYSTEM =====";

 $token = $CFG->token_line;

 line_notify($token,$lineMessage);

    echo "RECOMMEND_SUCCESS";
  }else{
     echo "RECOMMEND_FAILED";
  }

?>