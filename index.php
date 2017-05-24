<?php 
define("__ROOT__", "/Users/alexey/Sites/lab5/");
$guest_type = "";
$redirect_url = "";
if(empty($_SESSION["login"])){
	$guest_type = "user";
}
else {
	$guest_type = "guest";
}
switch ($guest_type) {
	case "user":
		$redirect_url = "panel.php";
		break;
	
	default:
		$redirect_url = "login.php";
		break;
}

header('HTTP/1.1 200 OK');
header('Location: '.$redirect_url);
?>