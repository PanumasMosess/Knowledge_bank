<?
 require_once("../../application.php");
 require_once("../../PHPMailer/class.phpmailer.php");

 //user code session
 $emp_code = $_SESSION['user_name_session'];
 // date time now 
 $buffer_date = date("Y-m-d");
 $buffer_time = date("H:i:s"); //24H
 $buffer_datetime = date("Y-m-d H:i:s");
 
 $user_approve  = $_SESSION['user_name_en_session'];

 $knowledge_code = isset($_POST['knowledge_code']) ? $_POST['knowledge_code'] : '';
 $knowledge_comment = isset($_POST['knowledge_comment']) ? $_POST['knowledge_comment'] : '';

 $str_insert_comment = "
 INSERT INTO [tbl_knowledge_comment]
 ([comment_content]
 ,[comment_knowledge_code]
 ,[comment_read_status]
 ,[comment_by]
 ,[comment_time]
 ,[knowledge_issue_date]
 ,[knowledge_issue_datetime])
VALUES
 ('$knowledge_comment'
 ,'$knowledge_code'
 ,'N'
 ,'$user_approve'
 ,'$buffer_time'
 ,'$buffer_date'
 ,'$buffer_datetime')
 ";

 $objQuery_comment = sqlsrv_query($db_con, $str_insert_comment);

  //send mail
  $mail = new PHPMailer(true);
  $mail->IsSMTP(); 
             
                      try{
                       $t_subject = "Information from ".$CFG->AppNameTitle." Commend Knowload from ".$knowledge_code."";
                       $body = '
                           <body style="background-color: #f6f9fc; padding: 20px;">
                               <center>
                                       <table style="width: 75%; text-align: center; background-color: #fff; padding: 20px;">
                                           <tbody>
                                              <tr style="text-align: left;">
                                                 <td>
                                                     <h3>Dear K.Anong Nacom</h3>
                                                     <p style="color: gray; margin-top: -20px;">knowledge has Commend.</p>
                                                 </td>
                                              </tr>
                                               <tr style="text-align: left;">
                                                <td>
                                                   <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Code: '.$knowledge_comment.'</h3> 
                                                   <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Commend Date: '.$buffer_date.'</h3>
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
  $array_to = $CFG->user_approve;
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

//   $buffer_knowledge_dept_re = str_replace("&","%26",$buffer_knowledge_dept);
//   $buffer_knowledge_title = str_replace("&","%26",$buffer_knowledge_title);
  
  $lineMessage = "From KNOWLEDGE BANK SYSTEM \n === Konwledge Comment in Knowledge Bank === \n Knowledge Code: ".$knowledge_code." \n Knowledge Commend Date: ".$buffer_date." \n ==== KNOWLEDGE BANK SYSTEM =====";
 
  $token = $CFG->token_line;
 
  line_notify($token,$lineMessage);

?>