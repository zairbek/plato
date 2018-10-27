<?php
require "scripts/connect_db.php";
session_start();

if (isset($_SESSION['hash'])){
    $query = $mysqli->query("SELECT user_email, user_hash FROM admins WHERE user_hash='" . $_SESSION['hash'] .  "'  ");
    $res = $query->fetch_assoc();

    $navig = $mysqli->query("SELECT id, name, href FROM navigation ORDER BY id");
    $socials = $mysqli->query("SELECT id, title, description, href, logo FROM socials ORDER BY id");

    $intro = $mysqli->query("SELECT id, title, description, logo, bg FROM intro");
    $int = $intro->fetch_assoc();


    $menu_review = $mysqli->query("SELECT id, title FROM menu_review");
    $menuReview = $menu_review->fetch_assoc();

    $inter = $mysqli->query("SELECT id, title, description FROM interior");
    $interior = $inter->fetch_assoc();

    $dish = $mysqli->query("SELECT id, title, description FROM dishes");
    $dishes = $dish->fetch_assoc();

    $addr = $mysqli->query("SELECT id, title, description, map FROM address");
    $address = $addr->fetch_assoc();

}else{
    header("Location: enter/login.php");
}


?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <!--for Chrome, Firefox OS, Opera-->
    <meta name="theme-color" content="#000">
    <!--for Windows Phone-->
    <meta name="msapplication-navbutton-color" content="#000">
    <!--for iOS Safari-->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link rel="stylesheet" href="/css/library/fontAwasome/all.min.css">
    <link rel="stylesheet" href="css/main.css">

    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <nav class="nav">
                <a href="/admin/">Панель администратора</a>
                <a href="/">Главная</a>
            </nav>
            <div class="admins">
                <span><?php echo $res['user_email']?></span>
                <a href="enter/logout.php?logout">log out</a>
            </div>
        </header>
        <aside class="aside">
            <p>Navigation</p>
            <ul class="aside-nav">
                <li><a href="?headerandfooter">Header & Footer</a></li>
                <li><a href="?linksToSocials">links To Socials</a></li>
                <li><a href="?intro">Intro </a></li>
                <li><a href="?menu_restourant">Menu Restourant</a></li>
                <li><a href="?menu_review">Menu Review</a></li>
                <li><a href="?interior">Interior</a></li>
                <li><a href="?dishes">Dishes</a></li>
                <li><a href="?address">Address</a></li>
                <li><a href="?menu">Меню</a></li>
            </ul>
        </aside>
        <div class="content">
            <section>

                <?php
                 if(isset($_GET['headerandfooter'])) {
                     ?>
                     <div class="navconfig">
                         <?php
                         while ($nav = $navig->fetch_assoc()) {
                             ?>
                             <form method="post" action="scripts/scripts.php" class="navconfig-form">
                                 <h3><?php echo $nav['id']; ?> cсылка:</h3>
                                 <input type="hidden" name="navconfig">
                                 <input type="hidden" name="id" value="<?php echo $nav['id']; ?>">
                                 <label for="name">Название</label>
                                 <input type="text" name="name" value="<?php echo $nav['name']; ?>" required>
                                 <label for="href">Ссылка</label>
                                 <input type="text" name="href" value="<?php echo $nav['href']; ?>" required>
                                 <input type="submit" name="submit" value="отправить">
                             </form>
                             <?php
                         }
                         ?>
                     </div>
                     <?php
                 }
                 ?>



                <?php
                if(isset($_GET['linksToSocials'])) {
                    ?>
                    <div class="navconfig">
                        <?php
                        while ($soc = $socials->fetch_assoc()) {
                            ?>
                            <form method="post" action="scripts/scripts.php" class="navconfig-form">
                                <input type="hidden" name="linksToSocials">
                                <input type="hidden" name="id" value="<?php echo $soc['id']?>">
                                <label for="name">Название</label>
                                <input type="text" name="title" value="<?php echo $soc['title']?>" required>
                                <label for="name">Описание</label>
                                <input type="text" name="description" value="<?php echo $soc['description']?>" required>
                                <label for="href">Ссылка</label>
                                <input type="text" name="href" value="<?php echo $soc['href']?>" required>
                                <label for="href">Логотип</label>
                                <input type="text" name="logo" value='<?php echo $soc['logo']?>' required>
                                <input type="submit" name="submit" value="отправить">
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>




                <?php
                if(isset($_GET['intro'])) {
                    ?>
                    <div class="navconfig">
                        <form method="post" action="scripts/scripts.php" class="navconfig-form">
                            <input type="hidden" name="intro">
                            <input type="hidden" name="id" value="<?php echo $int['id']; ?>">
                            <label for="name">Название</label>
                            <input type="text" name="title" value="<?php echo $int['title']; ?>" required>
                            <label for="description">Описание</label>
                            <input type="text" name="description" value="<?php echo $int['description']; ?>" required>
                            <label for="logo">Логотип</label>
                            <input type="text" name="logo" value="<?php echo $int['logo']; ?>" required>
                            <input type="submit" name="submit" value="отправить">
                        </form>

                        <form action="scripts/scripts.php" method="post" enctype="multipart/form-data">
                            <span>фон</span>
                            <input type="hidden" name="upload">
                            <input type="file" name="uploadFile" required>
                            <span><?php echo ini_get("upload_max_filesize")?></span>
                            <input type="submit" name="submit">
                        </form>
                    </div>
                    <?php
                }
                ?>



                <?php
                if(isset($_GET['menu_restourant'])) {
                    $menu_restourant = $mysqli->query("SELECT id, title, description, href FROM menu_restourant");
                    $menuRest = $menu_restourant->fetch_assoc();

                    ?>
                    <div class="navconfig">
                        <form method="post" action="scripts/scripts.php" class="navconfig-form">
                            <input type="hidden" name="menu_restourant">
                            <input type="hidden" name="id" value="<?php echo $menuRest['id']; ?>">
                            <label for="name">Название</label>
                            <input type="text" name="title" value="<?php echo $menuRest['title']; ?>" required>
                            <label for="description">Описание</label>
                            <input type="text" name="description" value="<?php echo $menuRest['description']; ?>" required>
                            <label for="logo">Ссылка</label>
                            <input type="text" name="href" value="<?php echo $menuRest['href']; ?>" required>
                            <input type="submit" name="submit" value="отправить">
                        </form>

                        <form action="scripts/scripts.php" method="post" enctype="multipart/form-data">
                            <span>фон</span>
                            <input type="hidden" name="uploadMenu">
                            <input type="file" name="uploadFile" required>
                            <span><?php echo ini_get("upload_max_filesize")?></span>
                            <input type="submit" name="submit">
                        </form>
                    </div>
                    <?php
                }
                ?>


                <?php
                if(isset($_GET['menu_review'])) {
                    ?>
                    <div class="navconfig">
                        <form method="post" action="scripts/scripts.php" class="navconfig-form">
                            <input type="hidden" name="menu_review">
                            <input type="hidden" name="id" value="<?php echo $menuReview['id']; ?>">
                            <label for="name">Название</label>
                            <input type="text" name="title" value="<?php echo $menuReview['title']; ?>" required>
                            <input type="submit" name="submit" value="отправить">
                        </form>

                        <form action="scripts/scripts.php" method="post" enctype="multipart/form-data">
                            <span>фон</span>
                            <input type="hidden" name="uploadMenuReview">
                            <input type="file" name="uploadFile" required>
                            <span><?php echo ini_get("upload_max_filesize")?></span>
                            <input type="submit" name="submit">
                        </form>
                    </div>
                    <?php
                }
                ?>



                <?php
                if(isset($_GET['interior'])) {
                    ?>
                    <div class="navconfig">
                        <form method="post" action="scripts/scripts.php" class="navconfig-form">
                            <input type="hidden" name="interior">
                            <input type="hidden" name="id" value="<?php echo $interior['id']; ?>">
                            <label for="name">Название</label>
                            <input type="text" name="title" value="<?php echo $interior['title']; ?>" required>
                            <label for="name">Описание</label>
                            <input type="text" name="description" value="<?php echo $interior['description']; ?>" required>
                            <input type="submit" name="submit" value="отправить">
                        </form>

                        <form action="scripts/scripts.php" method="post" enctype="multipart/form-data">
                            <span>фон</span>
                            <input type="hidden" name="uploadInterior">
                            <input type="hidden" name="catalog" value="interior">
                            <input type="file" name="uploadFile" required>
                            <span><?php echo ini_get("upload_max_filesize")?></span>
                            <input type="submit" name="submit">
                        </form>
                    </div>
                    <?php
                }
                ?>


                <?php
                if(isset($_GET['dishes'])) {
                    ?>
                    <div class="navconfig">
                        <form method="post" action="scripts/scripts.php" class="navconfig-form">
                            <input type="hidden" name="dishes">
                            <input type="hidden" name="id" value="<?php echo $dishes['id']; ?>">
                            <label for="name">Название</label>
                            <input type="text" name="title" value="<?php echo $dishes['title']; ?>" required>
                            <label for="name">Описание</label>
                            <input type="text" name="description" value="<?php echo $dishes['description']; ?>" required>
                            <input type="submit" name="submit" value="отправить">
                        </form>

                        <form action="scripts/scripts.php" method="post" enctype="multipart/form-data">
                            <span>фон</span>
                            <input type="hidden" name="uploadDishes">
                            <input type="hidden" name="catalog" value="dishes">
                            <input type="file" name="uploadFile" required>
                            <span><?php echo ini_get("upload_max_filesize")?></span>
                            <input type="submit" name="submit">
                        </form>
                    </div>
                    <?php
                }
                ?>



                <?php
                if(isset($_GET['address'])) {
                    ?>
                    <div class="navconfig">
                        <form method="post" action="scripts/scripts.php" class="navconfig-form">
                            <input type="hidden" name="address">
                            <input type="hidden" name="id" value="<?php echo $address['id']; ?>">
                            <label for="name">Название</label>
                            <input type="text" name="title" value="<?php echo $address['title']; ?>" required>
                            <label for="name">Описание</label>
                            <input type="text" name="description" value="<?php echo $address['description']; ?>" required>
                            <label for="name">Карта</label>
                            <input type="text" name="map" value="<?php echo $address['map']; ?>" required>
                            <input type="submit" name="submit" value="отправить">
                        </form>
                    </div>
                    <?php
                }
                ?>


                <?php
                if(isset($_GET['menu'])) {
                    $qwerty = $mysqli->query("SELECT `id`, `title`, `name_category` FROM `category_menu`");
                    ?>
                    <div class="menu">
                        <form method="post" action="scripts/scripts.php" class="menu-form">
                            <input type="hidden" name="menu">
                            <input type="hidden" name="id" value="">
                            <label for="name">Название</label>
                            <input type="text" name="title" value="" required>
                            <label for="name">Цена</label>
                            <input type="text" name="price" value="" required>
                            <label for="category">Выберите категорию</label>
                            <select name="name_category" id="category">
                                <?php
                                while ($qwer = $qwerty->fetch_assoc()) {
                                    var_dump($qwer['title']);
                                    ?>
                                    <option value="<?php echo $qwer['name_category'] ?>"><?php echo $qwer['title'] ?></option>

                                    <?php
                                }
                                ?>
                            </select>
                            <input type="submit" name="submit" value="Сохранить">
                        </form>


                        <div class="container">
                            <?php
                            $cat = $mysqli->query("SELECT `id`, `title`, `name_category` FROM `category_menu`");
                            while ($category = $cat->fetch_assoc()) {

                                $res1 = $mysqli->query("SELECT `id`, `title`, `price`  FROM `menu` WHERE `category`= '" . $category['name_category'] . "'");

                                ?>
                                <section class="intro_menu">
                                    <h2><?php echo $category['name_category']; ?> </h2>

                                    <?php
                                    while ($menu = $res1->fetch_assoc()) {
                                        ?>
                                        <div class="grid">
                                            <p><?php echo $menu['title']; ?></p>
                                            <p><?php echo $menu['price']; ?></p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </section>
                                <?php
                            }
                            ?>

                        </div>


                    </div>
                    <?php
                }
                ?>
            </section>
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
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="js/data.js"></script>
    <script src="js/main.js"></script>

    <?php
    if(isset($_SESSION['jsonMsg'])) {
        echo $_SESSION['jsonMsg'];
        unset($_SESSION['jsonMsg']);
    }
    ?>

</body>
</html>