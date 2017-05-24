<?php
$method_name = $_GET["method"];
require_once(dirname(path)."/utils/errors.php");
require_once(dirname(path)."/utils/functions.php");

	session_save_path(dirname(path)."/internal/sessions");
 //   session_start();
  
// if(is_callable($method_name)){
// 	$method_name();
// }
// else {
// 	    session_destroy();
// 	api_response_error("This method isn't real:(");}


function login(){
	require_once(dirname(path)."/internal/avaible-users.php");
	$id = $_GET["id"];
	$pass = $_GET["pass"];
	$this_user_exists = false;
	$list_users = get_array_of_users();
	for($i = 0;$i < count($list_users);$i++){
		// echo $list_users[$i];
		if($list_users[$i] == $id){
			$this_user_exists = true;
		}
	}
 if($this_user_exists){
 	$data = file(dirname(path)."/internal/data/$id.txt");
	list($password, $value) = explode('*', $data[0]);
	if($pass == $password){
		$_SESSION['id'] = $id;
		api_login_response(session_id());
		successful_logout();
	}
	else{
		api_response_error("Incorrect password");
	}
}

else {
		user_doesnt_exists();
	}
}

function logout($login = NULL, $ssid = NULL){
	$ssid = $_GET['sessionid'];
	if($_SESSION){
	    session_destroy();
	    	successful("Logout successful");
	}
	else {
		api_response(array(ERROR_MSG => "You cant destroy session is u are not in it!" ));
	}
}

?>