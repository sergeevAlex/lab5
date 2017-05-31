<?php
define("__ROOT__", "/Users/alexey/Sites/lab5/");
session_save_path(__ROOT__."/internal/sessions");
$wrong_login = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST["login"];
$pass = $_POST["password"];
$responce = file_get_contents("http://localhost/lab5/api.php?action=user&method=login&username=$id&password=$pass");
$json_msg = json_decode($responce,true);
if($json_msg["error"] == ""){
    session_id($json_msg["answer"]);
    session_start();
    $_SESSION["name"] = $id;
        $_SESSION["ssid"] = $json_msg["answer"];

    header("Location: ../index.php");
    exit();
}
 else 
{
    $wrong_login = $json_msg["error"];
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Авторизация на сайте</title>
	<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="../css/bootstrap.css" media="screen" type="text/css" />   
    <script src="../css/jquery.min.js"></script>

<script type="text/javascript">
function validate_form()
{
    valid = true;
        if ( document.login_form.login.value == "" || document.login_form.login.value == "Логин" || document.login_form.password.value == "" ||document.login_form.password.value == "Пароль")
        {
                valid = false;
        }
        return valid;
}
</script>
</head>
<body>
    <div id="login-form">
        <h1>Авторизация на сайте</h1>
        <fieldset>
            <form name="login_form" onsubmit="return validate_form();" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="login" required value="Логин" name="login" onBlur="if(this.value=='')this.value='Логин'" onFocus="if(this.value=='Логин')this.value='' ">
                <input type="password" required value="Пароль" name="password" onBlur="if(this.value=='')this.value='Пароль'" onFocus="if(this.value=='Пароль')this.value='' ">
                <button id="submit" class="btn btn-success" type="submit" style="float:right;margin-top:20px;" disabled="disabled">ВОЙТИ</button>
                <script type="text/javascript">
$(document).ready(function() {
    $('form > input').keyup(function() {
        var empty = false;
        $('form > input').each(function() {
            if ($(this).val() == '' || $(this).val() == 'Логин' || $(this).val() == 'Пароль') {
                empty = true;
            }
        });
        if (empty) {
            $('#submit').attr('disabled', 'disabled');
        } else {
            $('#submit').removeAttr('disabled');
        }
    });
})
</script>
                <span class="error"> <br><br><?php echo $wrong_login;?></span>
            </form>
        </fieldset>
    </div>
</body>
</html>