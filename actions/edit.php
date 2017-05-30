<?php 
define("__ROOT__", "/Users/alexey/Sites/lab5/");
session_save_path(__ROOT__."/internal/sessions");
session_start();

if($_SESSION["name"] == ''){

        header("Location: ../index.php");
        exit();
}
$name = $_SESSION['name'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$new_text = $_POST["code"];
file_put_contents(__ROOT__."internal/texts/text_".$name.".txt" ,$new_text);
                // $request_set = file_get_contents("http://localhost/lab5/api.php?action=data&method=get&name=$name");
// $r = new HttpRequest("http://localhost/lab5/api.php?action=data&method=set&name=$name&text=$new_text", HttpRequest::METH_GET);
// $r->send();

// file_get_contents("http://localhost/lab5/api.php?action=data&method=set&name=$name&text=$new_text");
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
            <textarea name="code" id="text" style="margin-left: 0px; margin-right: 0px; width: 548px;height: 190px;font-size: 12pt;display: block;"> 
            <?php 
            //When editing some new br happens :( 
                //  $filename = __ROOT__."/internal/texts/text_".$name.".txt";
                    // echo file_get_contents(__ROOT__."internal/texts/text_".$name.".txt");
                $request_get = file_get_contents("http://localhost/lab5/api.php?action=data&method=get&name=$name");
                $jmsg = json_decode($request_get,true);
                //var_dump($jmsg);
               if($jmsg["error"] == ""){
                echo $jmsg["text: "]; 
                }       
                ?>
</textarea> 
<center><button class="btn btn-success" type="submit">Сохранить</button></center>
                </form>
            </fieldset>
        <a href="logout.php"><button class="btn btn-danger">LOGout</button></a>
    </div>
</body>
</html>