<?php
/**
 * Created by PhpStorm.
 * User: adminka
 * Date: 14.10.18
 * Time: 5:02
 */

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


// Соединямся с БД
$link = mysqli_connect("localhost", "root", "1", "plato");

if(isset($_POST['submit'])){

    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link, "SELECT user_id, user_password FROM admins WHERE user_login='". mysqli_real_escape_string($link, $_POST['login']) . "' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data["user_password"] == md5(md5(trim($_POST['password'])))){

        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));


        // Записываем в БД новый хеш авторизации и IP
        mysqli_query($link, "UPDATE admins SET user_hash='" . $hash . "' WHERE user_id='" . $data['user_id'] . "' ");

        //ставим cookie
        setcookie("ID", $data['user_id'], time()+60*60*24*30);
        setcookie("HSH", $hash, time()+60*60*24*30, null, null, null, true);


        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php"); exit();

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
