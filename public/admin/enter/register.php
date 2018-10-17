<?php
require "../scripts/connect_db.php";

if (isset($_POST["submit"])){
    $err = [];

    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])){
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }
    if(strlen($_POST['login']) < 6 or strlen($_POST['login']) > 30){
        $err[] = "Логин должен быть не меньше 6-х символов и не больше 30";
    }

    $result = $mysqli->query("SELECT user_id FROM admins WHERE user_login ='". $mysqli->real_escape_string($_POST['login'])."'" );

    if($result->num_rows !== 0){
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    if(count($err) == 0){
        $login = $_POST['login'];
        $password = md5(md5(trim($_POST['password'])));

        $mysqli->query("INSERT INTO admins SET user_login='". $login ."', user_password='". $password . "'");
        header("Location: enter/login.php"); exit();

    }else{
        foreach($err as $error){
            print $error. "<br>";
        }
    }
}
?>


<form method="post">
    Login <input type="text" name="login">
    Pass <input type="password" name="password">
    <input type="submit" name="submit" value="check in">
</form>
<a href="login.php">log in</a>