<?
session_start();

//default Asia/Bangkok
date_default_timezone_set('Asia/Bangkok');

/**********************************************************************************/
/*turn on verbose error reporting (15) to see all warnings and errors *************/
//error_reporting(15);
//define stdClass
//class object {};

//setup the configuration object 
//define stdClass
$CFG = new stdClass;

/**********************************************************************************/
/*config sql server ***************************************************************/
// $CFG->dbhost = "LAC-APPS, 49894";
// $CFG->dbhostPing = "LAC-APPS";
// $CFG->dbname = "VMI";
// $CFG->dbuser = "Allvmi";
// $CFG->dbpass = "brewrL5iRebi4+Ewre0r";

$CFG->dbhost = "203.150.199.177, 1433";
$CFG->dbhostPing = "172.25.1.177";
$CFG->dbname = "db_knowledge_bank_test";
$CFG->dbuser = "kbdb";
$CFG->dbpass = "rJmBXTW2";
/**********************************************************************************/
/*config path file ****************************************************************/
$CFG->path_host = "http://localhost:81/";  
//  https://kb.albatrosslogistic.com/
//$CFG->path_host = "https://lac-apps.albatrossthai.com/";
// $CFG->path_host = "https://kb.albatrosslogistic.com/";
$CFG->wwwroot_other = "/knowledge_bank"; //case check any location
$CFG->wwwroot = "/knowledge_bank";

/**********************************************************************************/
/*config system path  *************************************************************/
$CFG->libdir = "lib";
$CFG->iconsdir = "$CFG->wwwroot/icons";
$CFG->imagedir = "$CFG->wwwroot/images";
$CFG->logodir = "$CFG->wwwroot/img";
$CFG->logopoweredby = "$CFG->wwwroot/img/logo";
$CFG->languagedir = "language";

/**********************************************************************************/
/*app name  ***********************************************************************/
$CFG->AppName = "Knowledge Bank";
$CFG->AppNameTitle = "Knowledge Bank"; //line noti / mail alert
$CFG->AppNameTitleMini = "Knowledge Bank";

/**********************************************************************************/
/*config path file  ***************************************************************/

//src_file
$CFG->src_main = "$CFG->wwwroot";
$CFG->src_main_page = "$CFG->wwwroot/src/main_page";
$CFG->src_auth = "$CFG->wwwroot/src/auth";
$CFG->src_masterData = "$CFG->wwwroot/src/master_data";  
$CFG->src_manageUpload = "$CFG->wwwroot/src/manage_upload"; 
$CFG->src_search = "$CFG->wwwroot/src/search"; 

/**********************************************************************************/
/*standard libraries **************************************************************/
require_once("$CFG->libdir/comlib.php");

//application settings
/**********************************************************************************/
/*version & copyright  ************************************************************/
$CFG->App_ver = "1.0.0";
$CFG->App_ver_update = "2020-09-01";
$CFG->App_copyright = "2020";

//contact
$CFG->contact_tel_en = "Tel. +66 3811 0910-2, +66 3811 0915 Fax. +66 3811 0916";
$CFG->contact_tel_th = "Tel. +66 3811 0910-2, +66 3811 0915 Fax. +66 3811 0916";

/**********************************************************************************/
/*link address ********************************************************************/
$CFG->Link_address = "<br>".$CFG->path_host."".$CFG->wwwroot."/index";

////////////////////////////////////////////////////////////////////////////////////
//tools configuration //////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////

/**********************************************************************************/
/*SMTP mailing ********************************************************************/
//var
//$ses_company_VMI_GDJ = isset($_SESSION['ses_lang_VMI_GDJ']) ? $_SESSION['ses_lang_VMI_GDJ'] : '';

$CFG->mail_host = get_smtp_mail_config($db_con,"SmtpHost","Active","GDJ");
$CFG->mail_port = get_smtp_mail_config($db_con,"SmtpPort","Active","GDJ");
$CFG->user_smtp_mail = get_smtp_mail_config($db_con,"SmtpUsr","Active","GDJ");
$CFG->password_smtp_mail = get_smtp_mail_config($db_con,"SmtpPass","Active","GDJ");
$CFG->from_mail = get_smtp_mail_config($db_con,"SmtpFormTitle","Active","GDJ");

/**********************************************************************************/
/*pattern / shuffle password ******************************************************/
$CFG->pass_shuffle = "123456789";
$CFG->pass_shuffle_digit = "6";

// Mail Auto Approve
$CFG->user_approve = "anongn@glong-duang-jai.com";
$CFG->user_approve_cc = "anong.nacom@albatrossthai.com";


//Mail auto Test
// $CFG->user_approve = "panumas@all2gether.net";
// $CFG->user_approve_cc = "panumas@all2gether.net";


$CFG->token_line = "A5KpCkqb7rSoLu6pEvF9yXxYGF8KUDk0VvHqWNVEGPn";
?>