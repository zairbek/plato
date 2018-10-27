<?php
require "../scripts/connect_db.php";
require "../scripts/lib.php";

// Страница авторизации
// Функция для генерации случайной строки

if(isset($_POST['submit'])){

    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $result = $mysqli->query("SELECT user_id, user_password FROM admins WHERE user_email='". $mysqli->real_escape_string($_POST['email']) . "' LIMIT 1");
    $data = $result->fetch_assoc();

    // Сравниваем пароли
    if($data["user_password"] == md5(md5(trim($_POST['password'])))){

        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        // Записываем в БД новый хеш авторизации без IP
        $mysqli->query("UPDATE admins SET user_hash='" . $hash . "' WHERE user_id='" . $data['user_id'] . "' ");

        //ставим cookie
        setcookie("ID", $data['user_id'], time()+60*60*24*30);
        setcookie("HSH", $hash, time()+60*60*24*30, null, null, null, true);
        session_start();
        $_SESSION["hash"] = $hash;


        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: ../"); exit();

    }else{
        $err[] = "Вы ввели неправильный email или пароль";
    }


}


?>

<!doctype html>
<html lang="ru">
<head style="overflow: hidden;">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link rel="stylesheet" href="../../css/library/fontAwasome/all.min.css">
    <link rel="stylesheet" href="../../css/library/animate.css">
    <link rel="stylesheet" href="../css/main.css">

    <title>Вход в панель администратора</title>
</head>
<body style="overflow: hidden;">
    
    <div class="login-wrapper">

        <div class="login-wrapper-block">
            <h1>Панель администратора</h1>
            <form method="POST" name="formEnter">
                <input name="email" type="email" placeholder="EMAIL" minlength="4" maxlength="50" required><br>
                <input name="password" type="password" placeholder="PASSWORD" minlength="8" maxlength="50"required><br>
                <input name="submit" type="submit" value="LOG IN">
            </form>
            <a href="/">Plato</a>
        </div>



        <div class="notification hidden">
            <div class="close-notification">
                <i class="fas fa-times"></i>
            </div>

            <div class="notification-content">
                <p class="notification-text"></p>
            </div>
        </div>

    </div>




    <?php
    if(isset($err)){
        echo jsonData($err);
    }
    ?>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../js/data.js"></script>
    <script src="../js/main.js"></script>

    <script>
        if(typeof(err) !== "undefined"){
            notification(err);
        }
        if(document.formEnter){
            var form = document.formEnter;
            form.email.addEventListener('input', validateLogin.email);
            form.password.addEventListener('input', validateLogin.password);
        }
    </script>
</body>
</html>
