<?php
define("__ROOT__", "/Users/alexey/Sites/lab5/");

$this_user_exists = false;
$user_doesnt_exists = "";
require_once(__ROOT__."/utils/errors.php");
require_once(__ROOT__."/utils/functions.php");


$login = test_input($_POST["login"]);
$pass = test_input($_POST["password"]);
$id = $_POST["login"];
$pass = $_POST["password"];
require_once('../internal/available-users.php');
$list_users = get_array_of_users();
for($i=0;$i<count($list_users);$i++){
	if($list_users[$i] == $id){
			$this_user_exists = true;
	}
}

if($this_user_exists){
 	$data = file(__ROOT__."/internal/data/$id.txt");
	list($password, $value) = explode('*', $data[0]);
	if($pass == $password){
	

}
	else{

	}
}

else {
	$user_doesnt_exists = "Wrong login!";
	header("Location: ../index.html");
	exit();
}

?>