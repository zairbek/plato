<?php
require "connect_db.php";
require "cutAndCrop.php";
require  "lib.php";
session_start();

$err = array();

if(isset($_SESSION["hash"])) {
    if (isset($_POST['submit'])) {

        if (isset($_POST['navconfig'])) {
            $status = $mysqli->query("UPDATE navigation SET name='" . $_POST['name'] . "' ,  href='" . $_POST['href'] . "' WHERE id='" . $_POST['id'] . "'");
            if ($status) {
                $success[] = "Изменение применены";
            }else{
                $error[] = "Изменение не произошло";
            }
        }

        if (isset($_POST['linksToSocials'])) {
            $status = $mysqli->query("UPDATE socials SET title='" . $_POST['title'] . "', description='" . $_POST['description'] . "' ,  href='" . $_POST['href'] . "', logo='" . $_POST['logo'] . "' WHERE id='" . $_POST['id'] . "'");
            if ($status) {
                $success[] = "Изменение применены";
            }else{
                $error[] = "Изменение не произошло";
            }
        }

        if (isset($_POST['intro'])) {
            $status = $mysqli->query("UPDATE intro SET title='" . $_POST['title'] . "', description='" . $_POST['description'] . "' ,  logo='" . $_POST['logo'] . "' WHERE id='" . $_POST['id'] . "'");
            if ($status) {
                $success[] = "Изменение применены";
            }else{
                $error[] = "Изменение не произошло";
            }
        }


        if (isset($_POST['upload'])) {
            if ((isset($_FILES['uploadFile'])) and ($_FILES['uploadFile']['error'] !== 4)) {

                $file_name = time() . "_" . basename($_FILES['uploadFile']['name']);
                $file_path = "/image/content/intro/" . time() . "_" . basename(iconv('utf-8', 'windows-1251', $_FILES['uploadFile']['name']));

                chdir('../../');
                $path = getcwd() . $file_path;

                if ($_FILES['uploadFile']['tmp_name']){
                   $types = array('jpg', 'jpeg', 'png');
                   $type_file = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);

                   if(!in_array($type_file, $types)){
                       $error[] = "Неверный формат";
                   }elseif (!move_uploaded_file($_FILES['uploadFile']['tmp_name'], $path)){
                       $error[] = "файд не переместился в папку - $path";
                   }else{
                       $dir_path = getcwd()."/image/content/intro/";
                       $dir_path_thumb = getcwd(). "/image/content/intro/thumb/";
                       cropImage($dir_path.$file_name, $dir_path_thumb.$file_name, 320,230);

                       $mysqli->query("UPDATE intro SET bg='" . $file_path. "', bg_thumb='/image/content/intro/thumb/" . $file_name . "'");

                       $success[] = "Изображение загружено";
                   }

                }else{
                    print "ошибка при выгрузке";
                }

            } else {
                print "выберите файл";
            }
        }


        if (isset($_POST['menu_restourant'])) {
            $status = $mysqli->query("UPDATE menu_restourant SET title='" . $_POST['title'] . "', description='" . $_POST['description'] . "' ,  href='" . $_POST['href'] . "' WHERE id='" . $_POST['id'] . "'");
            if ($status) {
                $success[] = "Изменение применены";
            }else{
                $error[] = "Изменение не произошло";
            }
        }


        if (isset($_POST['uploadMenu'])) {
            if ((isset($_FILES['uploadFile'])) and ($_FILES['uploadFile']['error'] !== 4)) {

                $file_name = time() . "_" . basename($_FILES['uploadFile']['name']);
                $file_path = "/image/content/menu-restourant/" . time() . "_" . basename(iconv('utf-8', 'windows-1251', $_FILES['uploadFile']['name']));

                chdir('../../');
                $path = getcwd() . $file_path;

                if ($_FILES['uploadFile']['tmp_name']){
                   $types = array('jpg', 'jpeg', 'png');
                   $type_file = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);

                   if(!in_array($type_file, $types)){
                       $error[] = "Неверный формат";
                   }elseif (!move_uploaded_file($_FILES['uploadFile']['tmp_name'], $path)){
                       $error[] = "файд не переместился в папку - $path";
                   }else{
                       $dir_path = getcwd()."/image/content/menu-restourant/";
                       $dir_path_thumb = getcwd(). "/image/content/menu-restourant/thumb/";
                       cropImage($dir_path.$file_name, $dir_path_thumb.$file_name, 320,230);

                       $mysqli->query("UPDATE menu_restourant SET bg='" . $file_path. "', bg_thumb='/image/content/menu-restourant/thumb/" . $file_name . "'");

                       $success[] = "Изображение загружено";
                   }

                }else{
                    print "ошибка при выгрузке";
                }

            } else {
                print "выберите файл";
            }
        }




        if (isset($_POST['menu_review'])) {
            $status = $mysqli->query("UPDATE menu_review SET title='" . $_POST['title'] . "' WHERE id='" . $_POST['id'] . "'");
            if ($status) {
                $success[] = "Изменение применены";
            }else{
                $error[] = "Изменение не произошло";
            }
        }


        if (isset($_POST['uploadMenuReview'])) {
            if ((isset($_FILES['uploadFile'])) and ($_FILES['uploadFile']['error'] !== 4)) {

                $file_name = time() . "_" . basename($_FILES['uploadFile']['name']);
                $file_path = "/image/content/menu_review/" . time() . "_" . basename(iconv('utf-8', 'windows-1251', $_FILES['uploadFile']['name']));

                chdir('../../');
                $path = getcwd() . $file_path;

                if ($_FILES['uploadFile']['tmp_name']){
                   $types = array('jpg', 'jpeg', 'png');
                   $type_file = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);

                   if(!in_array($type_file, $types)){
                       $error[] = "Неверный формат";
                   }elseif (!move_uploaded_file($_FILES['uploadFile']['tmp_name'], $path)){
                       $error[] = "файд не переместился в папку";
                   }else{
                       $dir_path = getcwd()."/image/content/menu_review/";
                       $dir_path_thumb = getcwd(). "/image/content/menu_review/thumb/";
                       cropImage($dir_path.$file_name, $dir_path_thumb.$file_name, 320,230);

                       $mysqli->query("UPDATE menu_review SET bg='" . $file_path. "', bg_thumb='/image/content/menu-restourant/thumb/" . $file_name . "'");

                       $success[] = "Изображение загружено";
                   }

                }else{
                    print "ошибка при выгрузке";
                }

            } else {
                print "выберите файл";
            }
        }



        if (isset($_POST['interior'])) {
            $status = $mysqli->query("UPDATE interior SET title='" . $_POST['title'] . "', description='" . $_POST['description'] . "' WHERE id='" . $_POST['id'] . "'");
            if ($status) {
                $success[] = "Изменение применены";
            }else{
                $error[] = "Изменение не произошло";
            }
        }

        if (isset($_POST['uploadInterior'])) {
            if ((isset($_FILES['uploadFile'])) and ($_FILES['uploadFile']['error'] !== 4)) {

                $file_name = time() . "_" . basename($_FILES['uploadFile']['name']);
                $file_path = "/image/content/interior/" . time() . "_" . basename(iconv('utf-8', 'windows-1251', $_FILES['uploadFile']['name']));

                chdir('../../');
                $path = getcwd() . $file_path;

                if ($_FILES['uploadFile']['tmp_name']){
                   $types = array('jpg', 'jpeg', 'png');
                   $type_file = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);

                   if(!in_array($type_file, $types)){
                       $error[] = "Неверный формат";
                   }elseif (!move_uploaded_file($_FILES['uploadFile']['tmp_name'], $path)){
                       $error[] = "файд не переместился в папку";
                   }else{
                       $dir_path = getcwd()."/image/content/interior/";
                       $dir_path_thumb = getcwd(). "/image/content/interior/thumb/";
                       cropImage($dir_path.$file_name, $dir_path_thumb.$file_name, 320,230);

                       $mysqli->query("INSERT INTO images SET src='" . $file_path. "', src_thumb='/image/content/interior/thumb/" . $file_name . "', catalog='" . $_POST['catalog'] . "'");

                       $success[] = "Изображение загружено";
                   }

                }else{
                    print "ошибка при выгрузке";
                }

            } else {
                print "выберите файл";
            }
        }




        if (isset($_POST['dishes'])) {
            $status = $mysqli->query("UPDATE dishes SET title='" . $_POST['title'] . "', description='" . $_POST['description'] . "' WHERE id='" . $_POST['id'] . "'");
            if ($status) {
                $success[] = "Изменение применены";
            }else{
                $error[] = "Изменение не произошло";
            }
        }

        if (isset($_POST['uploadDishes'])) {
            if ((isset($_FILES['uploadFile'])) and ($_FILES['uploadFile']['error'] !== 4)) {

                $file_name = time() . "_" . basename($_FILES['uploadFile']['name']);
                $file_path = "/image/content/dishes/" . time() . "_" . basename(iconv('utf-8', 'windows-1251', $_FILES['uploadFile']['name']));

                chdir('../../');
                $path = getcwd() . $file_path;

                if ($_FILES['uploadFile']['tmp_name']){
                   $types = array('jpg', 'jpeg', 'png');
                   $type_file = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);

                   if(!in_array($type_file, $types)){
                       $error[] = "Неверный формат";
                   }elseif (!move_uploaded_file($_FILES['uploadFile']['tmp_name'], $path)){
                       $error[] = "файд не переместился в папку";
                   }else{
                       $dir_path = getcwd()."/image/content/dishes/";
                       $dir_path_thumb = getcwd(). "/image/content/dishes/thumb/";
                       cropImage($dir_path.$file_name, $dir_path_thumb.$file_name, 320,230);

                       $mysqli->query("INSERT INTO images SET src='" . $file_path. "', src_thumb='/image/content/dishes/thumb/" . $file_name . "', catalog='" . $_POST['catalog'] . "'");

                       $success[] = "Изображение загружено";
                   }

                }else{
                    print "ошибка при выгрузке";
                }

            } else {
                print "выберите файл";
            }
        }





        if (isset($_POST['address'])) {
            $status = $mysqli->query("UPDATE address SET title='" . $_POST['title'] . "', description='" . $_POST['description'] . "', map='" . $_POST['map'] . "' WHERE id='" . $_POST['id'] . "'");
            if ($status) {
                $success[] = "Изменение применены";
            }else{
                $error[] = "Изменение не произошло";
            }
        }



        if (isset($_POST['menu'])) {
            $status = $mysqli->query("INSERT INTO menu SET title='" . $_POST['title'] ."' , price='" . $_POST['price'] ."'  , category='" .$_POST['name_category'] ."'");
            if ($status) {
                $success[] = "Изменение применены";
            }else{
                $error[] = "Изменение не произошло";
            }
        }

















        if (isset($success)){
            $_SESSION['jsonMsg'] = jsonMsg($success);
        }elseif (isset($error)){
            $_SESSION['jsonMsg'] = jsonMsg($error);
        }
        header("location:". $_SERVER['HTTP_REFERER']);

    }else{
        $err[] = "несанкционированный доступ";
    }
}else{
    header("Location: ../enter/login.php");
}

