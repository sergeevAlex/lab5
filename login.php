<?php 
define("__ROOT__", "/Users/alexey/Sites/lab5/");
$this_user_exists = false;
$user_doesnt_exists = "";
$wrong_login = "";

require_once(__ROOT__."/utils/errors.php");
require_once(__ROOT__."/utils/functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


$id = $_POST["login"];
$pass = $_POST["password"];
require_once(__ROOT__.'/internal/available-users.php');
$list_users = get_array_of_users();
for($i=0;$i<count($list_users);$i++){
    if($list_users[$i] == $id){
            $this_user_exists = true;
    }
}



if($this_user_exists){
    $data = file(__ROOT__."/internal/data/$id.txt");
    list($password, $value) = explode('*', $data[0]);
    if($pass == $password){
        session_start();
        $_SESSION['login'] = $id;
        header("Location: index.php");
    }
    else{
     $wrong_login = "Wrong password!";
    }
}
else {
    $wrong_login = "Wrong login!";
    }
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Авторизация на сайте</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
    <div id="login-form">
        <h1>Авторизация на сайте</h1>
        <fieldset>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="login" required value="Логин" name="login" onBlur="if(this.value=='')this.value='Логин'" onFocus="if(this.value=='Логин')this.value='' ">
                <input type="password" required value="Пароль" name="password" onBlur="if(this.value=='')this.value='Пароль'" onFocus="if(this.value=='Пароль')this.value='' ">
                <span class="error"> <?php echo $wrong_login;?></span><input type="submit" value="ВОЙТИ">
            </form>
        </fieldset>

    </div>
</body>
</html>