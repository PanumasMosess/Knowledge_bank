<?
/**********************************************************************************/
/*conn db *************************************************************************/
//error reporting
//open
ini_set('display_errors', 1);
error_reporting(~0);

set_time_limit(1200);

/**********************************************************************************/
/*connect to the database *********************************************************/ 
//connect to the database $dbname on $dbhost with the user/password pair
//"CharacterSet" =>'UTF-8' for support thai lang
//set var to array (var must be string type)
$connectionInfo = array("Database"=>"$CFG->dbname", "UID"=>"$CFG->dbuser", "PWD"=>"$CFG->dbpass", "MultipleActiveResultSets"=>true, 'ReturnDatesAsStrings'=>true, "CharacterSet" =>'UTF-8' );
$db_con = sqlsrv_connect($CFG->dbhost, $connectionInfo);

if($db_con === false)
{
	echo "Connection could not be established. <br/>";
    die( print_r( sqlsrv_errors(), true));
}

/**********************************************************************************/
/*convert lang for support phpexcel fully *****************************************/
//tis620_to_utf8
function tis620_to_utf8($tis)
{
  $utf8 = "";
  for( $i=0 ; $i< strlen($tis) ; $i++ ){
    $s = substr($tis, $i, 1);
    $val = ord($s);
    if( $val < 0x80 ){
	 $utf8 .= $s;
    } elseif ((0xA1 <= $val and $val <= 0xDA) 
              or (0xDF <= $val and $val <= 0xFB))  {
	 $unicode = 0x0E00 + $val - 0xA0;
	 $utf8 .= chr( 0xE0 | ($unicode >> 12) );
	 $utf8 .= chr( 0x80 | (($unicode >> 6) & 0x3F) );
	 $utf8 .= chr( 0x80 | ($unicode & 0x3F) );
    }
  }
  return $utf8;
} 

//utf8_to_tis620
function utf8_to_tis620($string)
{
  $str = $string;
  $res = "";
  for ($i = 0; $i < strlen($str); $i++) {
	if (ord($str[$i]) == 224) {
	  $unicode = ord($str[$i+2]) & 0x3F;
	  $unicode |= (ord($str[$i+1]) & 0x3F) << 6;
	  $unicode |= (ord($str[$i]) & 0x0F) << 12;
	  $res .= chr($unicode-0x0E00+0xA0);
	  $i += 2;
	} else {
	  $res .= $str[$i];
	}
  }
  return $res;
}

//mb_utf8_to_tis620
function mb_utf8_to_tis620($string) 
{
    return mb_convert_encoding($string, 'UTF-8', 'TIS-620');
}

/**********************************************************************************/
/*filter_string *******************************************************************/
function filter_string($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  
  //remove
  $data = str_replace("<br />", "", $data);
  $data = str_replace("<br/>", "", $data);
  $data = str_replace("<br>", "", $data);
  $data = str_replace("\n", "", $data);
  $data = str_replace("\r", "", $data);
  $data = str_replace("\r\n", "", $data);
  
  return $data;
}

/**********************************************************************************/
/*Remove all special characters from a string *************************************/
function func_remove_char($string)
{
	//remove '
	$conv_string = str_replace("'",'', $string);
	
	//remove &
	$conv_string1 = str_replace("&",'and', $conv_string);
    return $conv_string1;
}

/**********************************************************************************/
/*endoce, decode  *****************************************************************/
function var_encode($value)
{
	$str_encode = base64_encode(base64_encode(base64_encode($value)));
	return $str_encode;
}

function var_decode($value)
{
	$str_decode = base64_decode(base64_decode(base64_decode($value)));
	return $str_decode;
}

/**********************************************************************************/
/*date diff ***********************************************************************/
function DateDiff($strDate1,$strDate2)
{
	return (strtotime($strDate2) - strtotime($strDate1)) / ( 60 * 60 * 24 );  // 1 day = 60*60*24
}

function TimeDiff($strTime1,$strTime2)
{
	return (strtotime($strTime2) - strtotime($strTime1)) / ( 60 * 60 ); // 1 Hour =  60*60
}

function DateTimeDiff($strDateTime1,$strDateTime2)
{
	return (strtotime($strDateTime2) - strtotime($strDateTime1)) / ( 60 * 60 * 24 ); // 1 Hour =  60*60
}

/**********************************************************************************/
/*date thai ***********************************************************************/
function DateThai($strDate)
{
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth = date("n",strtotime($strDate));
	$strDay = date("j",strtotime($strDate));
	$strHour = date("H",strtotime($strDate));
	$strMinute = date("i",strtotime($strDate));
	$strSeconds = date("s",strtotime($strDate));
	$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMonthThai = $strMonthCut[$strMonth];
	//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	return "$strMonthThai";
}



/**********************************************************************************/
/*sqlsrv_num_rows *****************************************************************/
/*
===Examples===
$query_xxx = sqlsrv_query($db_con, $sql_xxx, $params, $options);
*/
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

/**********************************************************************************/
/*autolink ************************************************************************/
function autolink($temp)
{
	//email link
	//$temp = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\"><font color=#FF6600>\\2@\\3</font></a>", $temp);

	//link http://
	//$temp = preg_replace("#(^|[\n ])([\w]+?://[^ \"\n\r\t<]*)#is", "\\1<a href=\"\\2\" target=\"_blank\"><font color=#FF6600>\\2</font></a>", $temp);

	//link www.
	$temp = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\"><font color=#FF6600>\\2</font></a>", $temp);

	return $temp;
}

/**********************************************************************************/
/*.htaccess ***********************************************************************/
function redirectTohttps()
{
	if($_SERVER['HTTPS']!="on")
	{
		$redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		header("Location:$redirect");
	}
}

/**********************************************************************************/
/*Convert a string to an array with multibyte string ******************************/
/*
===Description===
array getMBStrSplit ( string $string [, int $split_length = 1 ] )
===Parameters===
string = ข้อความที่ต้องการนำมาแบ่ง
split_length = จำนวนความยาวของตัวอักษรที่จะแบ่ง (ค่าปริยายคือ 1)

===Examples===
$str = "สวัสดีชาวโลก";
$arr1 = getMBStrSplit($str);
$arr2 = getMBStrSplit($str, 3);
*/
function getMBStrSplit($string, $split_length = 1)
{
	mb_internal_encoding('UTF-8');
	mb_regex_encoding('UTF-8'); 
	
	$split_length = ($split_length <= 0) ? 1 : $split_length;
	$mb_strlen = mb_strlen($string, 'utf-8');
	$array = array();
	$i = 0; 
	
	while($i < $mb_strlen)
	{
		$array[] = mb_substr($string, $i, $split_length);
		$i = $i+$split_length;
	}
	
	return $array;
}

/**********************************************************************************/
/*Get string length for Character Thai ********************************************/
/*
===Description===
int getStrLenTH ( string $string )
===Parameters===
string = ข้อความที่ต้องการนับ

===Examples===
$str = 'สวัสดีชาวโลก';
echo getStrLenTH($str); // 10

$str = 'เรารักประเทศไทย';
echo getStrLenTH($str); // 14
*/
function getStrLenTH($string)
{
	$array = getMBStrSplit($string);
	$count = 0;
	
	foreach($array as $value)
	{
		$ascii = ord(iconv("UTF-8", "TIS-620", $value ));
		
		if( !( $ascii == 209 ||  ($ascii >= 212 && $ascii <= 218 ) || ($ascii >= 231 && $ascii <= 238 )) )
		{
			$count += 1;
		}
	}
	return $count;
}



/*
[แจก] ฟังก์ชั่น str-split(), strlen(), substr() สำหรับต...
HTML5 Articles, Examples, Tricks and Tips ความรู้เกี่ย...
*/
function getSubStrTH($string, $start, $length)
{			
	$length = ($length+$start)-1;
	$array = getMBStrSplit($string);
	$count = 0;
	$return = "";
		
	for($i=$start; $i < count($array); $i++)
	{
		$ascii = ord(iconv("UTF-8", "TIS-620", $array[$i] ));
		
		if( $ascii == 209 ||  ($ascii >= 212 && $ascii <= 218 ) || ($ascii >= 231 && $ascii <= 238 ) )
		{
			//$start++;
			$length++;
		}
		
		if( $i >= $start )
		{
			$return .= $array[$i];
		}
		
		if( $i >= $length )
			break;
		}
	
	return $return;
}

/**********************************************************************************/
/*detect mobile *******************************************************************/
function detect_mobile()
{ 
	if(preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']))
	return true;
	else
	return false;
}

/**********************************************************************************/
/*detect browser  *****************************************************************/
function get_browser_name()
{
    $arr_browsers = ["Firefox", "Chrome", "Safari", "Opera", "MSIE", "Trident", "Edge"];
 
	$agent = $_SERVER['HTTP_USER_AGENT'];
	 
	$user_browser = '';
	foreach ($arr_browsers as $browser) {
		if (strpos($agent, $browser) !== false) {
			$user_browser = $browser;
			break;
		}   
	}
	 
	switch ($user_browser) {
		case 'MSIE':
			$user_browser = 'Internet Explorer';
			break;
	 
		case 'Trident':
			$user_browser = 'Internet Explorer';
			break;
	 
		case 'Edge':
			$user_browser = 'Internet Explorer';
			break;
	}
	
	return $user_browser;
}

/**********************************************************************************/
/*detect browser2  ****************************************************************/
function getBrowser()
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
	
    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    
    // Next get the name of the useragent yes seperately and for good reason
    if((preg_match('/MSIE/i',$u_agent) || preg_match('/Trident/i',$u_agent)) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    }
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
	elseif(preg_match('/Edge/i', $u_agent)) 
    { 
        $bname = 'Edge'; 
        $ub = "Edge"; 
    }	
    
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'platform'  => $platform
    );
}

// now try it
//$ua=getBrowser();
//$yourbrowser= "Your browser: " . $ua['name'] . " " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
//print_r($yourbrowser);

/**********************************************************************************/
/*IP for mobile for show results **************************************************/
//$serverIP = $_SERVER['REMOTE_ADDR'];
function getVisitorIP()
{
	// Get real visitor IP behind CloudFlare network
	if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])) 
	{
		$_SERVER['REMOTE_ADDR']    = $_SERVER["HTTP_CF_CONNECTING_IP"];
		$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}
	
	$client  = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote  = $_SERVER['REMOTE_ADDR'];

	if(filter_var($client, FILTER_VALIDATE_IP))
	{
		$ip = $client;
	}
	elseif(filter_var($forward, FILTER_VALIDATE_IP))
	{
		$ip = $forward;
	}
	else
	{
		$ip = $remote;
	}

	return $ip;
}

/**********************************************************************************/
/*application settings ************************************************************/
//smtp mail config
function get_smtp_mail_config($db_con,$type_selector,$ver_status)
{
	$strSQL_app_smtp = "
	select 
		[email_srv_host]
		,[email_srv_port]
		,[email_srv_usr]
		,[email_srv_pass]
		,[email_srv_form_title]
	from [tbl_config_email_server]
	where 
		[email_srv_status] = '$ver_status'
	";
	
	//clear
	$str_email_srv_host = "";
	$str_email_srv_port = "";
	$str_email_srv_usr = "";
	$str_email_srv_pass = "";
	$str_email_srv_form_title = "";
	
	$objQuery_app_smtp = sqlsrv_query($db_con, $strSQL_app_smtp);					
	while($objResult_app_smtp = sqlsrv_fetch_array($objQuery_app_smtp, SQLSRV_FETCH_ASSOC))
	{
		$str_email_srv_host = $objResult_app_smtp["email_srv_host"];
		$str_email_srv_port = $objResult_app_smtp["email_srv_port"];
		$str_email_srv_usr = $objResult_app_smtp["email_srv_usr"];
		$str_email_srv_pass = $objResult_app_smtp["email_srv_pass"];
		$str_email_srv_form_title = $objResult_app_smtp["email_srv_form_title"];
	}
	
	//selector by type
	if($type_selector == "SmtpHost")
	{
		return $str_email_srv_host;
	}
	else if($type_selector == "SmtpPort")
	{
		return $str_email_srv_port;
	}
	else if($type_selector == "SmtpUsr")
	{
		return $str_email_srv_usr;
	}
	else if($type_selector == "SmtpPass")
	{
		return $str_email_srv_pass;
	}
	else if($type_selector == "SmtpFormTitle")
	{
		return $str_email_srv_form_title;
	}

	sqlsrv_close($db_con);
}

/**********************************************************************************/
/*get url *************************************************************************/
function FuncCurUrl()
{
	$cur_url = 'http' . (($_SERVER['HTTPS'] == 'on') ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	return $cur_url;
}

/***********************************************/
/*line notify*/
/***********************************************/
function line_notify($Token, $message)
{
 $lineapi = $Token; // input token key
 $mms =  trim($message); // input message
 date_default_timezone_set("Asia/Bangkok");
 $chOne = curl_init(); 
 curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");  
 // SSL USE 
 curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
 curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
 //POST 
 curl_setopt( $chOne, CURLOPT_POST, 1); 
 curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms"); 
 curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1); 
 $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
 curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
 $result = curl_exec( $chOne ); 
 //Check error 
 if(curl_error($chOne)) 
 { 
        //echo 'error:' . curl_error($chOne); 
 } 
 else 
 { 
  $result_ = json_decode($result, true); 
     //echo "status : ".$result_['status']; echo "message : ". $result_['message'];
  } 
 curl_close( $chOne );   

}






?>