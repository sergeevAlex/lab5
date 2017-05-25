<?php  
define("__ROOT__", "/Users/alexey/Sites/lab5/");
session_save_path(__ROOT__."/internal/sessions");
session_start();
if($_SESSION["name"] == ''){
        header("Location: ../index.php");
        exit();
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Авторизация на сайте</title>
	<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />   
    <link rel="stylesheet" href="../css/bootstrap.css" media="screen" type="text/css" />   
    <script src="../css/jquery.min.js"></script>
</head>
<body>
    <div id="text-block">
    <h1>Добро пожаловать,  <?php echo $name;?> </h1>
            <fieldset>
<a href="edit.php"> <button class="btn btn-success" type="submit">Edit/Add text</button></a> <br>  
    <div class="content"><p>       
       <?php 
                  $filename = __ROOT__."/internal/texts/text_".$name.".txt";
                if(file_exists($filename)){
                    echo file_get_contents(__ROOT__."internal/texts/text_".$name.".txt");
                }  
                else {
                    $fp = fopen($filename,"w+");
                }
                ?>
</p></div>
            <center>          <button id="read-more" class="btn btn-success" type="submit">Load more...</button>
</center>
            </fieldset>
            <script type="text/javascript">
var $textcnt = $(".content p");
if($textcnt.text().length>300){
    $.data(document.body,"content",$textcnt.text());
    $textcnt.text($textcnt.text().substr(0,300)+"...");
}else{
   $("#read-more").remove(); 
}
$("#read-more").click(function(){
    $textcnt.text($.data(document.body,"content"));
       $("#read-more").remove(); 

});
</script>
   
        <a href="logout.php"><button class="btn btn-danger">LOGout</button></a>
    </div>



</body>
</html>