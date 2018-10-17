<?php
require "scripts/connect_db.php";

session_start();
if (isset($_SESSION['hash'])){
    $query = $mysqli->query("SELECT user_login, user_hash FROM admins WHERE user_hash='" . $_SESSION['hash'] .  "'  ");
    $res = $query->fetch_assoc();

    print $res['user_login'];

}else{
    header("Location: enter/login.php");
}

?>

<a href="enter/logout.php?logout">log out</a>
