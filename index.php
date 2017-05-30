<?php 
define("__ROOT__", "/Users/alexey/Sites/lab5/");
session_save_path(__ROOT__."/internal/sessions");
session_start();
// echo session_id();
$guest_type = "";
$redirect_url = "";
if($_SESSION["name"] != ''){
//if(session_id()){
		$guest_type = "user";
}
else {
		$guest_type = "guest";
}

switch ($guest_type) {
	case "user":
		$redirect_url = "actions/panel.php";
		break;
	default:
		$redirect_url = "actions/login.php";
		break;
}
header('Location: '.$redirect_url);
exit();
?>