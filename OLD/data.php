<?php
// require_once(dirname(path)."/actions/user.php");
require_once(dirname(path)."/utils/errors.php");
require_once(dirname(path)."/utils/functions.php");

$data_method = $_GET["method"];

if(is_callable($data_method)){

	$data_method();
}
else {
	api_response_error("This method isn't real:(");}

	function is_user_correct(){
		require_once(dirname(path)."/internal/avaible-users.php");
		$id = $_SESSION['id'];
		$this_user_exists1 = false;
		$list_users1 = get_array_of_users();
		for($i = 0;$i < count($list_users1);$i++){
		if($list_users1[$i] == $id){
			$this_user_exists1 = true;
		}
	}

	return $this_user_exists1;

	}


	function get(){
		$ssid = $_GET['sessionid'];
		$id = $_SESSION['id'];

	
		$this_user_exists1 = is_user_correct();

		if($this_user_exists1){
		$info = file(dirname(path)."/internal/data/$id.txt");
	}
	else {
		api_response_error("You do not have permission to this information! :(");
	}

		list($password, $value) = explode('*', $info[0]);
		if(session_id() == $ssid){
			api_data_response($value);
		}
		else{
			api_response_error("Wrong session. U are not login in!");
		}
	}

	function set(){

		$ssid = $_GET['sessionid'];
		$id = $_SESSION['id'];
		$somestring = $_GET['text'];
		$this_user_exists2 = is_user_correct();
		if($ssid == session_id()){
		if($this_user_exists2){
			$file = file(dirname(path)."/internal/data/$id.txt");
			$ff = dirname(path)."/internal/data/$id.txt";

			list($password, $value) = explode('*', $file[0]);
			$content = "$password*$somestring";
			file_put_contents($ff,$content);
			successful("String added/rewrited!");
		}
		else{
			api_response_error("Wrong session. U are not login in!");
			}
		}
		else{
						api_response_error("Wrong session. U are not login in!");

		}
	}



?>