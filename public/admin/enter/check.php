<?php
/**
 * Created by PhpStorm.
 * User: adminka
 * Date: 15.10.18
 * Time: 21:38
 */
// Скрипт для проверки

$link = mysqli_connect("localhost", "root", "1", "plato");

if(isset($_COOKIE["ID"]) and isset($_COOKIE["HSH"])){
    $query = mysqli_query($link, "SELECT  *, INET_NTOA(user_ip) AS user_ip FROM admins WHERE user_id = ' " . intval($_COOKIE['ID']) . " '");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata["user_hash"] !== $_COOKIE["HSH"]) or ($userdata["user_id"] !== $_COOKIE["ID"])
        or (($userdata["user_ip"] !== $_SERVER["REMOTE_ADDR"]) and ($userdata["user_ip"] !== 0))){
        setcookie("ID", "",time() - 3600*24*30*12, "/");
        setcookie("HSH", "",time() - 3600*24*30*12, "/");
        print "Хм, что-то не получилось";
    }else{
        session_start();
        header("Location: index.php"); exit();
    }

}else{
    print "Включите куки";
}