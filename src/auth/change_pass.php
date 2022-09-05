<?
      require_once("../../application.php");

      /**********************************************************************************/
      /*var *****************************************************************************/
      $pass_ajax = isset($_POST['pass_ajax']) ? $_POST['pass_ajax'] : '';
      $pass_ajax = md5($pass_ajax);


      ///////session///////
      $user_code  = $_SESSION['user_name_session'];
      $user_old_pass  = $_SESSION['user_pass_md5_session'];

      $str_update_pass = " UPDATE [db_hrms].[dbo].[tbl_user] 
      SET [user_pass_md5] = '$pass_ajax'
      ,[user_force_pass_chg] = '0'
      WHERE [user_pass_md5] = '$user_old_pass' and [user_code] = '$user_code'
      ";
      $objQuery_update_pass = sqlsrv_query($db_con, $str_update_pass);

      if($objQuery_update_pass){
            $_SESSION['user_force_pass_chg_session'] = '0';
            echo 'PASS_UPDATE_SUCCESS';
      }else{      
            echo 'PASS_UPDATE_FAILD';
      }
?>