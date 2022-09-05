<?
    require_once("application.php");
    require_once("PHPMailer/class.phpmailer.php");
    ini_set('upload_max_filesize', '1024M');

    //get session 
    $type  =  $_SESSION['user_type_session'];
    $dept =  $_SESSION['user_section_session'];
    $user =  $_SESSION['user_name_session'];
    $user_name_en =  $_SESSION['user_name_en_session'];
    $emp_no = $_SESSION['user_emp_session'];

    $buffer_date = date("Y-m-d");
    $buffer_time = date("H:i:s"); //24H
    $buffer_datetime = date("Y-m-d H:i:s");

    // file management only //
    $check_last_process = true;
    $file_upload_count=0;
    $data_file =  (isset($_FILES['file']['tmp_name'])) ? $_FILES['file']['tmp_name'] : '';
 
    $title = $_POST["title_know"]; 
    $title_other = $_POST["title_other"];
    $year_target = $_POST["year_target"];

    $title =  str_replace("'","''",$title);
    $title_other =  str_replace("'","''",$title_other);
  //  $author = $_POST["author"];
    $knowledge_code = $_POST["knowledge_code"];

    if($data_file == ''){
        $str_update_Knowledge_running = " UPDATE [tbl_knowledge_running]
        SET [knowledge_running_status] = 'WAIT_APPROVE'
        ,[knowledge_running_status_issue_by] = '$user_name_en'
        ,[knowledge_running_time] = '$buffer_time'
        ,[knowledge_running_date] = '$buffer_date'
        ,[knowledge_running_datetime] = '$buffer_datetime'
        WHERE [knowledge_running_code] = '$knowledge_code'
        ";
        $objQuery_running_update = sqlsrv_query($db_con, $str_update_Knowledge_running);

        if($objQuery_running_update){
            $str_update_knowledge_data = " UPDATE [tbl_knowledge_data]
            SET [knowledge_title] = '$title'
               ,[knowledge_title_other] = '$title_other'
               ,[knowledge_author] = ''
               ,[knowledge_target_year] = '$year_target'
               ,[knowledge_issue_time] = '$buffer_time'
               ,[knowledge_issue_date] = '$buffer_date'
               ,[knowledge_issue_datetime] = '$buffer_datetime'
            WHERE knowledge_code = '$knowledge_code'";
            $objQuery_data_update = sqlsrv_query($db_con, $str_update_knowledge_data);

            
            $strSql_get_id = " SELECT TOP(1)  [knowledge_dept]  FROM tbl_knowledge_data where knowledge_code = '$knowledge_code' ";
            $objQuery_get_id = sqlsrv_query($db_con, $strSql_get_id, $params, $options);
            while($objResult_get_link = sqlsrv_fetch_array($objQuery_get_id, SQLSRV_FETCH_ASSOC)){
              $buff_dept = $objResult_get_link['knowledge_dept'];
            }

         //send mail
         $mail = new PHPMailer(true);
         $mail->IsSMTP(); 

         try{
          $t_subject = "Information from ".$CFG->AppNameTitle." New Knowledge upload currently wait for your approve.";
          $body = '
              <body style="background-color: #f6f9fc; padding: 20px;">
                  <center>
                          <table style="width: 75%; text-align: center; background-color: #fff; padding: 20px;">
                              <tbody>
                              <tr style="text-align: left;">
                              <td>
                                  <h3>Dear Anong Nacom</h3>
                                  <p style="color: gray; margin-top: -20px;">You have new knowledge currently upload pending your approve.</p>
                                  <p>From: '.$user_name_en.' ==> Dept: '.$buff_dept.'</p>
                              </td>
                           </tr>
                                  <tr style="text-align: left;">
                                   <td>
                                      <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Code: '.$knowledge_code.'</h3> 
                                      <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Title: '.$title.'</h3> 
                                      <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Other Title: '.$title_other.'</h3> 
                                      <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Upload By Dept: '.$buff_dept.'</h3> 
                                      <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Upload Date: '.$buffer_date.'</h3>
                                  </td>
                                  </tr>
                                  <tr>
                                      <td style="pading: 20px;margin-top: 40px;">
                                          <br><br>
                                          <a href="'.$CFG->path_host.$CFG->wwwroot.'/login-register.php" style="color: #fff; background-color: tomato; border: 1px solid tomato;  box-shadow: 1px 1px 1px tomato; border-radius: 25px; height: 35px; padding: 5px 35px; margin-top: 30px;">GO TO APPROVED</a>
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

            $buff_dept_re = str_replace("&","%26",$buff_dept);
            $title_re = str_replace("&","%26",$title);

            $lineMessage = "From KNOWLEDGE BANK SYSTEM \n === New Konwledge Upload to Knowledge Bank === \n Knowledge Code: ".$knowledge_code." \n Knowledge Title: ".$title_re." \n Knowledge Dept: ".$buff_dept_re." \n Knowledge issue Date: ".$buffer_date." \n ==== KNOWLEDGE BANK SYSTEM =====";

            $token = $CFG->token_line;
         
            line_notify($token,$lineMessage);

            echo 'SUCCESS';
        }else{
            echo 'Failed Upload File';
        }

        }else{

        if ( 0 < $_FILES['file']['error'][0] ) {

            echo 'Error';
       
            } else {

                $strSql_get_id = " SELECT TOP(1)  [knowledge_file_link], knowledge_file_link_pdf, knowledge_file_link_ppt, [knowledge_dept]  FROM tbl_knowledge_data where knowledge_code = '$knowledge_code' ";
                $objQuery_get_id = sqlsrv_query($db_con, $strSql_get_id, $params, $options);
                while($objResult_get_link = sqlsrv_fetch_array($objQuery_get_id, SQLSRV_FETCH_ASSOC)){
                  $link_buffer_mp4 = $objResult_get_link['knowledge_file_link'];
                  $link_buffer_pdf = $objResult_get_link['knowledge_file_link_pdf'];
                  $link_buffer_ppt = $objResult_get_link['knowledge_file_link_ppt'];
                  $buff_dept = $objResult_get_link['knowledge_dept'];
                }

                $count_move = 0;
                $total = count($_FILES['file']['tmp_name']);
          
                for($i=0; $i < $total; $i++){
                
                  $type_file = $_FILES['file']['type'][$i];
          
                  $type_file_arr = explode("/", $type_file);
            
                if($type_file_arr[1] == 'mp4'){

                  unlink('src/file_knowlage/' . $knowledge_code . ".mp4");     
                  move_uploaded_file($_FILES['file']['tmp_name'][$i], 'src/file_knowlage/' . $knowledge_code . ".mp4"); 
                  $link_buffer_mp4 = 'src/file_knowlage/' . $knowledge_code . ".mp4";                
                  $count_move++;
                }
                else if($type_file_arr[1] == 'pdf') {
                    
                  unlink('src/file_knowlage/' . $knowledge_code . ".pdf");
                  move_uploaded_file($_FILES['file']['tmp_name'][$i], 'src/file_knowlage/' . $knowledge_code . ".pdf"); 
                  $link_buffer_pdf = 'src/file_knowlage/' . $knowledge_code . ".pdf";                
                  $count_move++;
                }else {
            
                  unlink('src/file_knowlage/' . $knowledge_code . ".pptx");
                  move_uploaded_file($_FILES['file']['tmp_name'][$i], 'src/file_knowlage/' . $knowledge_code . ".pptx");     
                  $link_buffer_ppt = 'src/file_knowlage/' . $knowledge_code . ".pptx";     
                  $count_move++;
                }
             }
                
            if($count_move == $total){     
       
                $str_update_Knowledge_running = " UPDATE [tbl_knowledge_running]
                SET [knowledge_running_status] = 'WAIT_APPROVE'
                ,[knowledge_running_status_issue_by] = '$user_name_en'
                ,[knowledge_running_time] = '$buffer_time'
                ,[knowledge_running_date] = '$buffer_date'
                ,[knowledge_running_datetime] = '$buffer_datetime'
                WHERE [knowledge_running_code] = '$knowledge_code'
                ";
                $objQuery_running_update = sqlsrv_query($db_con, $str_update_Knowledge_running);
               
        if($objQuery_running_update){
                    $str_update_knowledge_data = " UPDATE [tbl_knowledge_data]
                    SET [knowledge_title] = '$title'
                       ,[knowledge_title_other] = '$title_other'
                       ,[knowledge_author] = ''
                       ,[knowledge_file_link] = '$link_buffer_mp4'
                       ,[knowledge_file_link_pdf] = '$link_buffer_pdf'
                       ,[knowledge_file_link_ppt] = '$link_buffer_ppt'
                       ,[knowledge_target_year] = '$year_target'
                       ,[knowledge_issue_time] = '$buffer_time'
                       ,[knowledge_issue_date] = '$buffer_date'
                       ,[knowledge_issue_datetime] = '$buffer_datetime'
                    WHERE knowledge_code = '$knowledge_code'";
                    $objQuery_data_update = sqlsrv_query($db_con, $str_update_knowledge_data);

                          //send mail
         $mail = new PHPMailer(true);
         $mail->IsSMTP(); 

         try{
          $t_subject = "Information from ".$CFG->AppNameTitle." New Knowledge upload currently wait for your approve.";
          $body = '
              <body style="background-color: #f6f9fc; padding: 20px;">
                  <center>
                          <table style="width: 75%; text-align: center; background-color: #fff; padding: 20px;">
                              <tbody>
                              <tr style="text-align: left;">
                              <td>
                                  <h3>Dear Anong Nacom</h3>
                                  <p style="color: gray; margin-top: -20px;">You have new knowledge currently upload pending your approve.</p>
                                  <p>From: '.$user_name_en.' ==> Dept: '.$buff_dept.'</p>
                              </td>
                           </tr>
                                  <tr style="text-align: left;">
                                   <td>
                                      <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Code: '.$knowledge_code.'</h3> 
                                      <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Title: '.$title.'</h3> 
                                      <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Knowledge Other Title: '.$title_other.'</h3> 
                                      <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Upload By Dept: '.$buff_dept.'</h3> 
                                      <h3 style="text-align: left; margin-top: 10px; margin-bottom: 2px; color: #000;">Upload Date: '.$buffer_date.'</h3>
                                  </td>
                                  </tr>
                                  <tr>
                                      <td style="pading: 20px;margin-top: 40px;">
                                          <br><br>
                                          <a href="'.$CFG->path_host.$CFG->wwwroot.'/login-register.php" style="color: #fff; background-color: tomato; border: 1px solid tomato;  box-shadow: 1px 1px 1px tomato; border-radius: 25px; height: 35px; padding: 5px 35px; margin-top: 30px;">GO TO APPROVED</a>
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

          // $array_to = 'anongn@glong-duang-jai.com';
          $array_to = $CFG->user_approve;
          // $array_to = 'wiwatt@all2gether.net,armmybear4428@gmail.com,wiwat.tunyawatworakkul@e-tech.ac.th';
          $array_to = explode(",",$array_to);
          $count_array = count($array_to);

          $admin_cc_mail = $CFG->user_approve_cc;
          //$admin_cc_mail = 'anong.nacom@albatrossthai.com';
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
            $buff_dept_re = str_replace("&","%26",$buff_dept);
            $title_re = str_replace("&","%26",$title);

            $lineMessage = "From KNOWLEDGE BANK SYSTEM \n === New Konwledge Upload to Knowledge Bank === \n Knowledge Code: ".$knowledge_code." \n Knowledge Tile: ".$title_re." \n Knowledge Dept: ".$buff_dept_re." \n Knowledge issue Date: ".$buffer_date." \n ==== KNOWLEDGE BANK SYSTEM =====";

            $token = $CFG->token_line;
                 
           line_notify($token,$lineMessage);

            echo 'SUCCESS';
                    
        }
                      
              }else{
               echo 'Failed Upload File';
              }   
           }    
        }
?>
