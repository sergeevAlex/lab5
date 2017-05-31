<?php 
session_start();
$ssid = session_id();
// $ssid = $_SESSION["ssid"];
// echo $ssid;
$responce_logout = file_get_contents("http://localhost/lab5/api.php?action=user&method=logout&ssid=$ssid");
$json_msg = json_decode($responce_logout,true);
//var_dump($json_msg);
if($json_msg["answer"] == "Successful" && $json_msg["error"] == ""){
	header('Location: ../index.php');
    exit();
}
?>