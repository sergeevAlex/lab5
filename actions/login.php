<?php 
define("__ROOT__", "/Users/alexey/Sites/lab5/");
session_save_path(__ROOT__."/internal/sessions");
session_start();


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
        $_SESSION["name"] = $_POST["login"];
        header("Location: ../index.php");
        exit();
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

<?php 
session_start();
session_destroy();

?>