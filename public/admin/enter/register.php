<?php
require "../scripts/connect_db.php";

if (isset($_POST["submit"])){
    $err = [];

//    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['email'])){
//        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
//    }
    if(strlen($_POST['email']) < 6 or strlen($_POST['email']) > 30){
        $err[] = "Логин должен быть не меньше 6-х символов и не больше 30";
    }

    $result = $mysqli->query("SELECT user_id FROM admins WHERE user_email ='". $mysqli->real_escape_string($_POST['email'])."'" );

    if($result->num_rows !== 0){
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    if(count($err) == 0){
        $email = $_POST['email'];
        $password = md5(md5(trim($_POST['password'])));

        $mysqli->query("INSERT INTO admins SET user_email='". $email ."', user_password='". $password . "'");
        header("Location: login.php"); exit();

    }else{
        foreach($err as $error){
            print $error. "<br>";
        }
    }
}
?>


<form method="post">
    Login <input type="email" name="email">
    Pass <input type="password" name="password">
    <input type="submit" name="submit" value="check in">
</form>
<a href="login.php">log in</a>