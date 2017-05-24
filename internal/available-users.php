<?php
define("__ROOT__", "/Users/alexey/Sites/lab5/");

function get_array_of_users(){

	$files = scandir(__ROOT__."/internal/data/");
        array_shift($files);
        array_shift($files);
        for($i=0; $i<count($files); $i++){
        	$files[$i] = preg_replace('/.txt/',"", $files[$i]);
        }

	return $files;
}



?>