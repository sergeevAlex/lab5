<?php 
define("__ROOT__", "/Users/alexey/Sites/lab5/");
require_once(__ROOT__."/utils/functions.php");

session_start();

if(!isset($_SESSION['name'])){
        header("Location: ../index.php");
        exit();
}
$name = $_SESSION['name'];
$ssid = session_id();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$new_text = array('text' =>$_POST["code"]);
$great_url = http_build_query($new_text);
$last_url = substr($great_url, 5);
$response =  file_get_contents("http://localhost/lab4/api.php?action=data&method=set&sessionid=$ssid&text=$last_url");
header("Location: ../index.php");
        exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Редактирование текста</title>
	<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />  
        <link rel="stylesheet" href="../css/bootstrap.css" media="screen" type="text/css" />   
</head>
<body>
    <div id="text-block">
    <h1>Редактирование текста, <?php echo $name;?> </h1>
            <fieldset>
            <form method="post">
            <textarea name="code" id="text" style="margin-left: 0px; margin-right: 0px; width: 548px;height: 190px;font-size: 12pt;display: block;"><?php 
                $ssid = session_id();
                $getter =  api_request("data","get","sessionid=$ssid");
                echo $getter["answer"];
                ?>
</textarea> 
<center><button class="btn btn-success" type="submit">Сохранить</button></center>
                </form>
            </fieldset>

        <a href="logout.php"><button class="btn btn-danger">LOGout</button></a>
    </div>
</body>
</html>