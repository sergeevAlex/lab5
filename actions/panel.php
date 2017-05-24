<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Авторизация на сайте</title>
	<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
</head>
<body>
    <div id="text-block">
    <h1>Добро пожаловать,  <?php echo $_SESSION['name']?> </h1>
            <fieldset>
            
            </fieldset>
        <a href="logout.php"><button>LOGout</button></a>
    </div>
</body>
</html>