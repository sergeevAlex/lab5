<?php
session_start();
$_SESSION['name'] = "sami";
header("location: test2.php");
exit();
?>