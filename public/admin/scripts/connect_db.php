<?php
$mysqli = new mysqli("localhost", "root", "1", "plato");
if(mysqli_connect_errno()){
    printf("Нет подключение с базой: %s \n", mysqli_connect_errno());
    exit();
}