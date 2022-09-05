<?
require_once("../../application.php");

$knowledge_code = isset($_POST['knowledge_code']) ? $_POST['knowledge_code'] : '';

$strSQL = " SELECT comment_id,[comment_content],[comment_knowledge_code],[comment_by],[knowledge_issue_date] FROM [tbl_knowledge_comment] where comment_knowledge_code = '$knowledge_code' order by knowledge_issue_datetime desc";
$objQuery = sqlsrv_query($db_con, $strSQL) or die("Error Query [" . $strSQL . "]");
while ($objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC)) {
?>
    <div class="panel-heading" role="tab">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#kb_comment_BIG" href="#kb_comment<?=$objResult["comment_id"];?>" aria-expanded="fasle">
                <?= $objResult["comment_by"]; ?>  <span style="float: right; color:#D8D6D5;"><?= $objResult["knowledge_issue_date"]; ?></span>
            </a>
        </h4>
    </div>
    <div id="kb_comment<?=$objResult["comment_id"];?>" class="collapse" role="tabpanel">
        <div class="panel-body">
            <p> <?= $objResult["comment_content"]; ?> </p>
        </div>
    </div>
<?
}
sqlsrv_close($db_con);

?>