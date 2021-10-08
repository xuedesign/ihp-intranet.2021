<?php

session_start();
include("default.php");
include("defaultLoginCheck.php");

// 檢查權限
if ( $_SESSION["iph_sadmin"] != 'Y' ) {
  
  // 檢查第一層授權
  $QueryMPI1  = "SELECT * FROM modulePInfo 
  WHERE level = '1'
  AND   M1    = '3'
  AND   uid   = '".$_SESSION["iph_uid"]."'";
  $ResultMPI1 = mysql_query($QueryMPI1);
  if (!$ResultMPI1) {
    echo "ErrnoMPI1: ".mysql_errno()."<br>";
    echo "ErrorMPI1: ".mysql_error()."<br>";
    exit;
  }          
  if ( mysql_num_rows($ResultMPI1) < 1 ) {
  
    header("Location: login.php");
    exit;
  
  }

}

/*----------------------------------------------------------------------------*/

$epid = $_GET['epid'];
        
$Query  = "SELECT * FROM iEPaper WHERE epid = '".$epid."'";
$Result = mysql_query($Query);
if (!$Result) {
  echo "Errno1: ".mysql_errno()."<br>";
  echo "Error1: ".mysql_error()."<br>";
  exit;
}
$Row         = mysql_fetch_array($Result);
$mainTitle   = $Row["title"];
$note        = $Row["note"]; 
$publishDate = $Row["publishDate"];
$temp  = explode("-",$publishDate);     
$PDate = $temp[0].'/'.$temp[1].'/'.$temp[2];                                                                                                      

$contents = '';
$QueryC = "SELECT * FROM iEPaperContent 
WHERE epid = '".$epid."'
ORDER BY sort";
$ResultC = mysql_query($QueryC);
if (!$ResultC) {
  echo "ErrnoC1: ".mysql_errno()."<br>";
  echo "ErrorC1: ".mysql_error()."<br>";
  exit;
}
$a = 1;
while ( $RowC = mysql_fetch_array($ResultC) ) {
$title        = $RowC["title"]; 
$epcontent    = $RowC["epcontent"]; 
switch ( $a ) {
  case '1':
    // 綠
    $contents .= "
    <br>
    <div style='color:#ffffff; background-color:#8ebc69;'>
    <img src='http://www2.ihp.sinica.edu.tw/manage/epaper/subimg7.gif' alt='' width='32' height='27' align='absmiddle'>　".$title."</div>
    <br>".$epcontent;
    break;
  case '2':
    // 粉
    $contents .= "
    <br>
    <div style='color:#ffffff; background-color:#bc698f;'>
    <img src='http://www2.ihp.sinica.edu.tw/manage/epaper/subimg2.gif' alt='' width='32' height='27' align='absmiddle'>　".$title."</div>
    <br>".$epcontent;
    break;
  case '3':
    // 土黃
    $contents .= "
    <br>
    <div style='color:#ffffff; background-color:rgb(196, 153, 88);'>
    <img src='http://www2.ihp.sinica.edu.tw/manage/epaper/subimg.gif' alt='' width='32' height='27' align='absmiddle'>　".$title."</div>
    <br>".$epcontent;    
    break;
  case '4':
    // 橄欖綠
    $contents .= "
    <br>
    <div style='color:#ffffff; background-color:#bcb769;'>
    <img src='http://www2.ihp.sinica.edu.tw/manage/epaper/subimg5.gif' alt='' width='32' height='27' align='absmiddle'>　".$title."</div>
    <br>".$epcontent;
    break;    
  case '5':
    // 淺藍
    $contents .= "
    <br>
    <div style='color:#ffffff; background-color:#69a7bc;'>
    <img src='http://www2.ihp.sinica.edu.tw/manage/epaper/subimg12.jpg' alt='' width='32' height='27' align='absmiddle'>　".$title."</div>
    <br>".$epcontent;
    break;
  case '6':
    // 深藍
    $contents .= "
    <br>
    <div style='color:#ffffff; background-color:#6992bc;'>
    <img src='http://www2.ihp.sinica.edu.tw/manage/epaper/subimg6.gif' alt='' width='32' height='27' align='absmiddle'>　".$title."</div>
    <br>".$epcontent;    
    break;
  case '7':
    // 紅
    $contents .= "
    <br>
    <div style='color:#ffffff; background-color:#cd3a4a;'>
    <img src='http://www2.ihp.sinica.edu.tw/manage/epaper/subimg13.jpg' alt='' width='32' height='27' align='absmiddle'>　".$title."</div>
    <br>".$epcontent;
    break;      
  default:
    $contents .= "
    <br>
    <div style='color:#ffffff; background-color:#8ebc69;'>
    <img src='http://www2.ihp.sinica.edu.tw/manage/epaper/subimg7.gif' alt='' width='32' height='27' align='absmiddle'>　".$title."</div>
    <br>".$epcontent;
}
$a++;
}

$body = "
<html>
<head>
<meta name='robots' content='index,follow'>
<meta name='copyright' content='Copyright (c) Institute of History and Philology All Rights Reserved. 中央研究院歷史語言研究所 版權所有'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title>中央研究院歷史語言研究所 電子報</title> 
</head>
<body style='font-family: Arial,sans-serif;'>
  <table width='100%' cellpadding='0' cellspacing='0' border='0'
    style='
    background-color: #202020;
    font-family: Arial, sans-serif;
    font-size:10pt;
    color: #545859;'>
    <tr>  
      <td align='center' valign='bottom' height='179' background='http://www2.ihp.sinica.edu.tw/images/headerbg_epaper.jpg' style='background-repeat:repeat-x;'>        
        <table cellpadding='0' cellspacing='0' border='0'>
          <tr>
            <td align='center' width='800' height='112' background='http://www2.ihp.sinica.edu.tw/images/epaperheader_epaper.png'>
          
              <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                <tr>
                  <td style='padding-left:20px;'>
                    <img src='http://www2.ihp.sinica.edu.tw/manage/epaper/logo_epaper.png' width='400'>
                  </td>
                  <td align='right' valign='bottom' style='padding-bottom:20px;'>
                    <span style='font-size:15px; color:#ffffff; padding-right:30px;'>第 ".$mainTitle." 期</span>
                    <span style='font-size:15px; color:#ffffff; padding-right:30px;'>出刊日：".$PDate."</span>
                  </td>
                </tr>
              </table>
          
            </td>
          </tr>
          <tr>
            <td align='right'>
              <br>
              <a href='http://www2.ihp.sinica.edu.tw/intranet/epaperDetail.php?TM=7&M1=3' style='color:#8EBC69; font-size:13px; text-decoration:none;'>電子報同步刊登於本所網站，內容更新以網頁為主。</a>
            </td>
          </tr>
        </table>        
      </td>
    </tr>
    <tr>  
      <td style='background-color:#e7e7e7; padding:30px 30px 60px 30px;'>".$contents."</td>
    </tr>
    <tr>  
      <td align='center' style='background-color:#c8c8c8; padding:30px 0px 30px 0px;'>  
        <div style='font-size:16px;'>中央研究院歷史語言研究所發行</div>
        <div style='padding-top:15px;'>Copyright © 2012 Institute of History and Philology All Rights Reserved.</div>
        <div>地址：台北市南港區115研究院路二段130號　電話：(02)27829555　傳真：(02)27868834　服務信箱：<a href='mailto:ihp@asihp.net'>ihp@asihp.net</a></div>
        <div style='padding-top:15px; font-size:16px;'>若您對內容有任何建議，請與我們聯絡。</div>
      </td>
    </tr>
  </table>
</body>
</html>
";

/*----------------------------------------------------------------------------*/

$tb = "iEPaperContact";

// 訪問 iEPaperContact
$Query  = "SELECT * FROM iEPaperContact ORDER BY email";
$Result = mysql_query($Query);
if (!$Result) {
  echo "Errno1: ".mysql_errno()."<br>";
  echo "Error1: ".mysql_error()."<br>";
  exit;
}    
$Tos = '';
while ( $Row  = mysql_fetch_array($Result) ) {
  $email      = $Row["email"];
  $Tos       .= $email.',';
}

/*
echo 'Nums = '.mysql_num_rows($Result)."<br>";
echo '$Tos = '.$Tos."<br>";
exit;
*/

// 發送通知郵件

// $to = 'chen.peugeot@gmail.com,';

// $to = 'yujean@mail.ihp.sinica.edu.tw, chen.peugeot@gmail.com,';

// $to = 'chfen@asihp.net, yalingle@asihp.net, mao@gate.sinica.edu.tw, wchw@asihp.net, yujean@mail.ihp.sinica.edu.tw, chen.peugeot@gmail.com ';

$to = "ihp@asihp.net";

$from    = 'ihp@asihp.net';
$subject = $note;
$subject = "=?UTF-8?B?".base64_encode($subject)."?=";

// $header
$header="";
$header.="Return-Path: <ihp@asihp.net>\r\n";
$header.="MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n";
$header.="From: $from\n";
$header.="Sender: ihp@asihp.net \r\n";

$header.="BCC: ".$Tos." chen.peugeot@gmail.com \r\n";
  
mail($to,$subject,$body,$header);

/*----------------------------------------------------------------------------*/

// log_performance
if ( isset($_SESSION["iph_astatus"]) && $_SESSION["iph_astatus"] == 'Y' ) {

  // 鎖定資料表
  $Result = mysql_query("LOCK TABLES log_performance WRITE");
  if (!$Result) {
    echo "ErrnoLP1: ".mysql_errno()."<br>";
    echo "ErrorLP1: ".mysql_error()."<br>";
    exit;
  }

  // 取得 newlpid
  $Result = mysql_query("SELECT MAX(lpid) as maxlpid FROM log_performance");
  if (!$Result) {
    echo "ErrnoLP2: ".mysql_errno()."<br>";
    echo "ErrorLP2: ".mysql_error()."<br>";
    exit;
  }
  $Row = mysql_fetch_array($Result);
  if ( is_null($Row['maxlpid']) ) { 
    $newlpid = 1; 
  } else { 
    $newlpid = $Row['maxlpid'] + 1; 
  }

  // 建立資料
  $Query = "INSERT INTO log_performance ( 
    lpid, 	
    uid,
    tmid,
    mid,
    miid,
    M3,
    tid,
    action,
    note, 
    Y,	
    M,
    D,
    createtime) 
  VALUES (
    '".$newlpid."',
    '".$_SESSION["iph_uid"]."',
    '28',
    '1',
    '',
    '',
    '".$epid."',
    '6',
    '發送電子報',
    '".date('Y')."',
    '".date('m')."',
    '".date('d')."',
    '".date('Y-m-d H:i:s')."')";

  $Result = mysql_query($Query);
  if (!$Result) {
    echo "ErrnoP33: ".mysql_errno()."<br>";
    echo "ErrorP33: ".mysql_error()."<br>";
    exit;
  } 

  // 解除鎖定資料表
  $Result = mysql_query("UNLOCK TABLES");
  if (!$Result) {
    echo "ErrnoP3E: ".mysql_errno()."<br>";
    echo "ErrorP3E: ".mysql_error()."<br>";
    exit;
  }

}

/*----------------------------------------------------------------------------*/

header("Location: iEPaperList.php?M=28&B=1&begin=".$_GET['begin']);
exit;

?>