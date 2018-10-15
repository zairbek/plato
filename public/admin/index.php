<?php
/**
 * Created by PhpStorm.
 * User: adminka
 * Date: 15.10.18
 * Time: 22:33
 */

session_start();
print "Привет, ".$_COOKIE['HSH'].". Всё работает!";
print "Привет, ".$_SESSION['user'].". Всё работает!";
