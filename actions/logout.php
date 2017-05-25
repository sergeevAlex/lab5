<?php 
define("__ROOT__", "/Users/alexey/Sites/lab5/");
session_save_path(__ROOT__."/internal/sessions");
    session_start();
    $ssid = session_id();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);

   //unlink(__ROOT__."/internal/session/sess_".$ssid);
header('Location: ../index.php');
exit();
?>