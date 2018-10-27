<?php
mb_internal_encoding("UTF-8");

$mysqli = new mysqli("localhost", "root", "1", "plato");
$mysqli->set_charset("utf8");
if(mysqli_connect_errno()){
    printf("Нет подключение с базой: %s \n", mysqli_connect_errno());
    exit();
}