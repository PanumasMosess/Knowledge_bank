<?
    require_once("../../application.php");

    //user code session
    $emp_code = $_SESSION['user_name_session'];

    $knowledge_code = isset($_POST['knowledge_code']) ? $_POST['knowledge_code'] : '';

    $str_select_check = "SELECT [like_user_code],[like_status],[like_content_code]
    FROM [tbl_knowledge_like_unlike] WHERE like_user_code = '$emp_code' AND like_content_code = '$knowledge_code'";

    $objQuery_like = sqlsrv_query($db_con, $str_select_check, $params, $options);

    $like_status = "";

    while ($objResult_like = sqlsrv_fetch_array($objQuery_like, SQLSRV_FETCH_ASSOC)) {
     $like_status = $objResult_like["like_status"];
    }

    if($like_status == ""){
        $str_insert_status = "
        INSERT INTO [tbl_knowledge_like_unlike]
        ([like_user_code]
        ,[like_status]
        ,[like_content_code])
        VALUES
        ( '$emp_code'
        , 'LIKE'
        , '$knowledge_code')
        ";

        $objQuery_like_status_null = sqlsrv_query($db_con, $str_insert_status);
        

    }else if($like_status == "LIKE"){

        $str_update_status = "
        UPDATE [tbl_knowledge_like_unlike] set [like_status] = 'UNLIKE' WHERE like_user_code = '$emp_code' AND like_content_code = '$knowledge_code'";

        $objQuery_update_UNLIKE = sqlsrv_query($db_con, $str_update_status);

    }else if($like_status == "UNLIKE"){

        $str_update_status = "
        UPDATE [tbl_knowledge_like_unlike] set [like_status] = 'LIKE' WHERE like_user_code = '$emp_code' AND like_content_code = '$knowledge_code'";

        $objQuery_update_UNLIKE = sqlsrv_query($db_con, $str_update_status);

    }

    $result_like = sqlsrv_query($db_con,"SELECT count(like_status) as like_ FROM [tbl_knowledge_like_unlike] where like_content_code = '$knowledge_code' and like_status = 'LIKE'" , $params, $options);

    $count_like = ""; 
 
    while ($objResult_Like_ALl = sqlsrv_fetch_array($result_like, SQLSRV_FETCH_ASSOC)) {
     $count_like = $objResult_Like_ALl["like_"];
    }

?>
<input type="hidden" id="load_like" value="<?=$count_like;?>">
