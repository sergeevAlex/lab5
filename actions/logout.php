<?php 
define("__ROOT__", "/Users/alexey/Sites/lab5/");

	session_save_path(__ROOT__."/internal/sessions");
$ssid = $_COOKIE['ssid'];
	unset($_COOKIE['ssid']);
    setcookie('ssid', '',-3600, '/');


	session_id($ssid);
    session_start();
    session_destroy();	
    session_write_close();
    session_regenerate_id(true);
//$responce_logout = file_get_contents("http://localhost/lab5/api.php?action=user&method=logout&ssid=$ssid");
//$json_msg = json_decode($responce_logout,true);
//if($json_msg["answer"] == "Successful" && $json_msg["error"] == ""){
	header('Location: ../index.php');
    exit();
//}
?>