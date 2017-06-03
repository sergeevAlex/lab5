<?php  
define("__ROOT__", "/Users/alexey/Sites/lab5/");
require_once(__ROOT__."/utils/functions.php");
session_start();
if(!isset($_SESSION['name'])){
        header("Location: ../index.php");
        exit();
}
$name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Panel</title>
	<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />   
    <link rel="stylesheet" href="../css/bootstrap.css" media="screen" type="text/css" />   
    <script src="../css/jquery.min.js"></script>
</head>
<body>
    <div id="text-block">
    <h1>Добро пожаловать <div id="user_login"><?php echo $name;?></span> </h1>
            <fieldset>
<a href="edit.php"> <button class="btn btn-success" type="submit">Edit/Add text</button></a> <br>  
<div class="content"><p><span id='content_text'/>   
<script type="text/javascript">
var ssid = document.cookie;
var new_ssid = ssid.substring(10);
var login = document.getElementById('user_login').innerHTML;
var xhr = new XMLHttpRequest();
xhr.open('GET', "http://localhost/lab4/api.php?action=data&method=get&limit=200&sessionid="+new_ssid+"", false);
xhr.send();
var data = JSON.parse(xhr.responseText);
var text = document.getElementById('content_text');
text.innerHTML = data["answer"];
</script>
</span> </p></div>
            <center><button class="btn btn-success" type="submit" id="extra">Load more...</button>
</center>
<script type="text/javascript">
function load_more(){
var xhr_etra = new XMLHttpRequest();
xhr_etra.open('GET', "http://localhost/lab4/api.php?action=data&method=get&limit=other&sessionid="+new_ssid+"", false);
xhr_etra.send();
var data_extra = JSON.parse(xhr_etra.responseText);
var text_extra = document.createTextNode(data_extra["answer"]);
text.innerText += data_extra["answer"];
}
var button = document.getElementById('extra');
button.onclick = function(){
    load_more();
    this.remove();
};

</script>
            </fieldset>
        <a href="logout.php"><button class="btn btn-danger">LOGout</button></a>
    </div>
</body>
</html>