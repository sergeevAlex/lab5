<?php


define("__ROOT__", "/Users/alexey/Sites/lab5/");
require_once(__ROOT__."utils/functions.php");
function user_doesnt_exists() {

api_response_error("Such user doesn't exists!");
	exit();
}

function unknown_action($message){
	api_response(array(ERROR_MSG=> "Unknown action -- $message"));
	exit();
}


?>