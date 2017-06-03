<?php 
define("__ROOT__", "/Users/alexey/Sites/lab5/");
require_once(__ROOT__."/utils/functions.php");
session_start();
$guest_type = "";
$redirect_url = "";

if(isset($_SESSION['name'])){
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