<?php
/**
 * Created by PhpStorm.
 * User: adminka
 * Date: 19.10.18
 * Time: 22:25
 */
mb_internal_encoding("UTF-8");
// из PHP в JS и вывод с JSON
function jsonData($array){
    $obj = json_encode($array);
    $tagOpen = "<script>";
    $tagClose = "</script>";

    return "$tagOpen var err = $obj $tagClose";
}

function jsonMsg($array){
    $obj = json_encode($array);
    $tagOpen = "<script>";
    $tagClose = "</script>";

    return "$tagOpen var msg = $obj $tagClose";
}


function generateCode($length = 6){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) -1;
    while(strlen($code) < $length){
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}