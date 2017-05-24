<?php 
session_start();

define("__ROOT__", "/Users/alexey/Sites/lab5/");
session_save_path(__ROOT__."/internal/sessions");


$guest_type = "";
$redirect_url = "";
if($_SESSION["name"] != ''){
//	echo "Session visible!";
		$guest_type = "user";
}
else {
		$guest_type = "guest";
//		echo "Session invisible";
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