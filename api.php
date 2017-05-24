<?php

require_once(dirname(__FILE__)."/utils/functions.php");
require_once(dirname(__FILE__)."/utils/errors.php");


if(empty($_GET)){
	api_response_error("You are in simple api module, for use it try to make http-request in form: api.php?action=login&...");
}

$action_name = $_GET["action"];

if(is_callable($action_name)){
	$action_name();
}

else{

	unknown_action($action_name);
}


function data(){

	require_once(dirname(__FILE__)."/actions/data.php");

}

function user(){
	require_once(dirname(__FILE__)."/actions/user.php");
	
}



?>