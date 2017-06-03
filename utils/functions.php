<?php

const ERROR_MSG = "error";
const API_URL = "http://localhost/lab4/api.php";


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function api_response($value)
{
	header('Content-Type: application/json');
	echo json_encode($value);
	exit();
}

function api_response_error($message)
{
	api_response(array(ERROR_MSG=>$message));
		exit();


}

function api_login_response($message){
	api_response(array('answer' => $message,
		ERROR_MSG => NULL));
		exit();
}

function api_data_response($message){
	api_response(array('text: ' => $message,
		ERROR_MSG => NULL));
		exit();

}

function successful($message){
	api_response(array('text' => $message, 
		ERROR_MSG => NULL
		));
		exit();

}


function api_request($action, $method, $params) {

	$url = API_URL . "?action=$action&method=$method&$params";
	$response_string = file_get_contents($url);
	$decoded = json_decode($response_string,true);
	return $decoded;}

?>