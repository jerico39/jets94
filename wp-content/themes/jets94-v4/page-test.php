<?php
/*
Template Name:page-test
*/
//setcookie('hoge', 'fuga', 3600, '/; SameSite=Strict', '', true, true);

/*
$resHttps = isset($_SERVER['HTTPS'])? $_SERVER['HTTPS'] : NULL;
$resHttpsInt = 0;
$resHttpsStr = "";
$resSamesite = "";
if($resHttps){
    $resHttpsInt = 1;
    $resHttpsStr = "Secure";
    $resSamesite = ";samesite=None";
}
setcookie("test2","abcdefrg", time() + 3600*24, "/".$resSamesite ,"",$resHttpsInt);
setcookie("test3","abcdefrg", 0, "/".$resSamesite ,"",$resHttpsInt);
*/





//▼ADD20200220 旧macOSは避ける
/*
$ua=$_SERVER['HTTP_USER_AGENT'];
if(!preg_match(
      //iPhone,iPodの場合
      '/(CPU\siPhone\sOS\s1[0-2]|'.
      //iPadの場合
      'iPad;\sCPU\sOS\s1[0-2]|'.
      //MacでSafari12以下の場合
      'Macintosh;\sIntel\sMac\sOS\sX.*Version\/1[0-2].*Safari|'.
      //Mac10.14でSafari13以下の場合
      'Macintosh;.*Mac\sOS\sX\s10_14.*\sAppleWebKit.*Version\/1[0-3].*Safari'.
    ')/i',$ua)){
    echo "!対象!".$ua;
*/
    //▼ADD20200212 cookiesのsamesite付与

    /*
$shopping_id = $_COOKIE['SHOPPINGID'];
$phpsess_id = $_COOKIE['PHPSESSID'];
$prev_show_goods = $_COOKIE['prev_show_goods'];
$expire = time() + 3600 * 24 * COOKIE_LIFETIME_PREV_SHOW_LOG;
$resHttpsInt = 0;
$resSamesite = "";

$resHttps = isset($_SERVER['HTTPS'])? $_SERVER['HTTPS'] : NULL;
if($resHttps){
$resHttpsInt = 1;
$resSamesite = ";samesite=None";

}
setcookie("SHOPPINGID",$shopping_id ,0, "/" .$resSamesite ,"",$resHttpsInt);
setcookie("PHPSESSID",$phpsess_id ,0, "/" .$resSamesite ,"",$resHttpsInt);
setcookie("prev_show_goods",$prev_show_goods ,$expire, "/" .$resSamesite ,"",$resHttpsInt);
//▲ADD20200212
}else{
  echo "!対象外!".$ua;
}
//▲ADD20200220 
*/
/*
$_cp = session_get_cookie_params();
session_set_cookie_params($_cp['lifetime'], $_cp['path'] . '; SameSite=None', $_cp['domain'], true, true);
session_start();

$array = ["SHOPPINGID", "PHPSESSID", "prev_show_goods"]; //取得するCookie


setcookie("PHPSESSID",$phpsess_id ,0, "/" .$resSamesite ,"",$resHttpsInt);

print_r($_COOKIE);
*/

//テスト用既存cookie
setcookie("test4","abcdefg",0,"/;");
setcookie("test5","hijklmn",time() + 3600 * 24 * 60,"/;");


 cookieSet_SamesiteNone("test4");
 cookieSet_SamesiteNone("test5",time() + 3600 * 24 * 5);
 
function cookieSet_SamesiteNone($name,$expire = 0){
  $blnHttps = isset($_SERVER['HTTPS'])? $_SERVER['HTTPS'] : NULL;
  if($blnHttps){ //httpsのみ処理
    $ua=$_SERVER['HTTP_USER_AGENT'];
    echo "<br/>".$ua."<br/>";
    if(!preg_match( //バグのあるOSにSameSite=Noneは処理しない
      //iPhone,iPodの場合
      '/(CPU\siPhone\sOS\s1[0-2]|'.
      //iPadの場合
      'iPad;\sCPU\sOS\s1[0-2]|'.
      //MacでSafari12以下の場合
      'Macintosh;\sIntel\sMac\sOS\sX.*Version\/1[0-2].*Safari|'.
      //Mac10.14でSafari13以下の場合
      'Macintosh;.*Mac\sOS\sX\s10_14.*\sAppleWebKit.*Version\/1[0-3].*Safari'.
      ')/i',$ua)){
      if(isset($_COOKIE[$name])){ //定義されているか確認
        echo "セット:".$name."<br/>";
        setcookie($name,$_COOKIE[$name] ,$expire, "/;samesite=None","",1); //samesite=None ,secure属性
       }
    }else{
      echo "<br/>対象外:".$name."<br/>";
    }
  }
}




?>
testpage