<?php
require "../admin/scripts/connect_db.php";

$navhead = $mysqli->query("SELECT id, name, href FROM navigation ORDER BY id");
$navnav = $mysqli->query("SELECT id, name, href FROM navigation ORDER BY id");
$navfoot = $mysqli->query("SELECT id, name, href FROM navigation ORDER BY id");

$socials = $mysqli->query("SELECT * FROM socials");
for ($i = 0; $i < $socials->num_rows; $i++){
    $arr[] = $socials->fetch_assoc();
}




?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">

  <!--for Chrome, Firefox OS, Opera-->
  <meta name="theme-color" content="#000">
  <!--for Windows Phone-->
  <meta name="msapplication-navbutton-color" content="#000">
  <!--for iOS Safari-->
  <meta name="apple-mobile-web-app-status-bar-style" content="#000">
 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Put your description here.">

  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  <link rel="stylesheet" href="../css/library/fontAwasome/all.min.css">
  <link rel="stylesheet" href="../css/library/animate.css">
  <link rel="stylesheet" href="css/main.css">
  
  <title>Menu</title>
</head>
<body>

<div class="wrapper" id="wrapper">
    <div class="bg" id="bg"></div>


    <!-- HEADER -->
    <header id="header" class="header">

        <div class="header-logo">
            <p><a href="/">Plato</a></p>
        </div>

        <nav class="header-nav">
            <ul class="script-nav header-nav__items">
                <?php
                while($nav = $navhead->fetch_assoc()) {
                    ?>
                    <li><a href="/<?php echo $nav['href'];?>" title="<?php echo $nav['name'];?>"><?php echo $nav['name'];?></a></li>
                    <?php
                }
                ?>
            </ul>
        </nav>

        <div class="header-contact">
            <ul class="header-contact__socials">
                <li><a href="<?php echo $arr[0]['href']?>" title="<?php echo $arr[0]['title']?>"><?php echo $arr[0]['logo']?></i></a></li>
                <li><a href="<?php echo $arr[1]['href']?>" title="<?php echo $arr[1]['title']?>"><?php echo $arr[1]['logo']?></a></li>
                <li><a href="<?php echo $arr[2]['href']?>"
                       class="phone-number"
                       title="<?php echo $arr[2]['title']?>"
                       data-href="#popupmodal">
                        <?php echo $arr[2]['logo']?></a></li>
            </ul>

            <a class="header-contact__menu"
               id="demo1"
               data-href="#animatedModal">
                <i class="fas fa-bars"></i>
            </a>
        </div>
    </header>
    <!--end of HEADER -->

    <div class="title">
        <h1>Меню рыбного ресторана Plato</h1>
    </div>

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
                        <span><?php echo $menu['price']; ?></span>
                    </div>
                    <?php
                }
                ?>
            </section>

            <?php
        }
        ?>
    </div>




    <!-- FOOTER -->
    <footer id="footer" class="footer">
        <nav class="footer-nav">
            <ul class="script-nav footer-nav__items">
                <?php
                while($nav = $navfoot->fetch_assoc()) {
                    ?>
                    <li><a href="<?php echo $nav['href'];?>" title="<?php echo $nav['name'];?>"><?php echo $nav['name'];?></a></li>
                    <?php
                }
                ?>
            </ul>
        </nav>


        <div class="footer-logo">
            <p></p>
            <p>Рыбный ресторан <b>"Plato"</b> на Бальшом Патриарший переулоке д.10 </p>

        </div>
    </footer>
    <!-- end FOOTER -->
</div>




<!-- MENU -->
<nav class="menu" id="animatedModal">

    <div class="close-animatedModal" id="close-animatedModal">
        <i class="fas fa-times"></i>
    </div>

    <a class="nav nav-socials-1
                animated infinite tada"
       href="<?php echo $arr[0]['href']?>">
        <?php echo $arr[0]['logo']?>
    </a>

    <a class="nav nav-socials-2
                animated infinite tada"
       href="<?php echo $arr[1]['href']?>">
        <?php echo $arr[1]['logo']?>
    </a>

    <a class="nav nav-phone-number
                animated infinite tada"
       href="<?php echo $arr[2]['href']?>">
        <?php echo $arr[2]['logo']?>
    </a>

    <div class="modal-content">
        <ul id="menu__items" class="menu__items">
            <?php
            while($nav = $navnav->fetch_assoc()) {
                ?>
                <li><a href="/<?php echo $nav['href'];?>" title="<?php echo $nav['name'];?>"><?php echo $nav['name'];?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>
<!-- end MENU -->


<!-- POPUPMODAL -->
<div id="popupmodal" class="popupmodal">

    <div class="popupmodal-content">
        <div class="close-popupmodal">
            <i class="fas fa-times"></i>
        </div>

        <p>Для брони стола звоните по номеру <b><?php echo $arr[2]['title']?></b></p>
        <p><b>Наш адрес:</b> г. Москва, Большой Патриарший переулокб д.10</p>

    </div>
</div>
<!-- end POPUPMODAL -->



<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/animatedModal.js"></script>
  <script src="js/main.js"></script>
</body>
</html>