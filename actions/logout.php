<?php 
define("__ROOT__", "/Users/alexey/Sites/lab5/");
require_once(__ROOT__."/utils/functions.php");
session_start();
	if(isset($_SESSION['name'])){
		$ssid = session_id();
		$json_msg = api_request("user","logout","sessionid=$ssid");
		session_destroy();
		header('Location: ../index.php');
    exit();
	}
else {
	header('Location: ../index.php');
    exit();
}
// if(isset($_COOKIE["ssid"])){
// 	session_save_path(__ROOT__."/internal/sessions");
//     $ssid = $_COOKIE['ssid'];
// $responce_logout = file_get_contents("http://localhost/lab5/api.php?action=user&method=logout&ssid=$ssid");
//     unset($_COOKIE['ssid']);
//     setcookie('ssid', '',-3600,'/');
//         setcookie('name', '',-3600,'/');

//     setcookie('PHPSESSID', '',-3600,'/');
// $json_msg = json_decode($responce_logout,true);
// if($json_msg["answer"] == "Successful" && $json_msg["error"] == ""){
// 	header('Location: ../index.php');
//     exit();
// }
// }

?>