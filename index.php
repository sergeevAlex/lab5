<?php 
define("__ROOT__", "/Users/alexey/Sites/lab5/");
// session_save_path(__ROOT__."/internal/sessions");
session_start();
// var_dump( $_COOKIE["ssid"]);
$guest_type = "";
$redirect_url = "";

if(isset($_COOKIE["ssid"])){
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
		// session_destroy();
        // $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        // foreach($cookies as $cookie) {
        //     $parts = explode('=', $cookie);
        //     $name = trim($parts[0]);
        //     setcookie($name, '', time()-1000);
        //     setcookie($name, '', time()-1000, '/');
        // }
header('Location: '.$redirect_url);
exit();
?>