<?php
require "../scripts/connect_db.php";

// Страница авторизации
// Функция для генерации случайной строки
function generateCode($length = 6){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) -1;
    while(strlen($code) < $length){
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}


if(isset($_POST['submit'])){

    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $result = $mysqli->query("SELECT user_id, user_password FROM admins WHERE user_login='". $mysqli->real_escape_string($_POST['login']) . "' LIMIT 1");
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
        print "Вы ввели неправильный логин/пароль";
    }


}



?>



<form method="POST">
    Логин <input name="login" type="text" required><br>
    Пароль <input name="password" type="password" required><br>
    <input name="submit" type="submit" value="Войти">
</form>

<a href="register.php">register</a>
