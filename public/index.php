<?php
require "admin/scripts/connect_db.php";

$set = $mysqli->query("SELECT id, type, title, value FROM settings");
for ($i = 0; $i < $set->num_rows; $i++) {
    $settings[] = $set->fetch_assoc();
}



$navhead = $mysqli->query("SELECT id, name, href FROM navigation ORDER BY id");
$navnav = $mysqli->query("SELECT id, name, href FROM navigation ORDER BY id");
$navfoot = $mysqli->query("SELECT id, name, href FROM navigation ORDER BY id");

$socials = $mysqli->query("SELECT * FROM socials");
for ($i = 0; $i < $socials->num_rows; $i++){
    $arr[] = $socials->fetch_assoc();
}

$intro = $mysqli->query("SELECT title, description, logo, bg, bg_thumb FROM intro");
$int = $intro->fetch_assoc();

$menu_restourant = $mysqli->query("SELECT title, description, href, bg, bg_thumb FROM menu_restourant");
$menu = $menu_restourant->fetch_assoc();

$menu_review = $mysqli->query("SELECT id, title, bg, bg_thumb FROM menu_review");
$menuReview = $menu_review->fetch_assoc();

$inter = $mysqli->query("SELECT id, title, description FROM interior");
$interior = $inter->fetch_assoc();
$interimg = $mysqli->query("SELECT id, src, src_thumb FROM images WHERE catalog='interior'");


$dis = $mysqli->query("SELECT id, title, description FROM dishes");
$dishes = $dis->fetch_assoc();
$dishesimg = $mysqli->query("SELECT id, src, src_thumb FROM images WHERE catalog='dishes'");

$addr = $mysqli->query("SELECT id, title, description, map FROM address");
$address = $addr->fetch_assoc();


?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">

    <!--for Chrome, Firefox OS, Opera-->
    <meta name="theme-color" content="#000">
    <!--for Windows Phone-->
    <meta name="msapplication-navbutton-color" content="#000">
    <!--for iOS Safari-->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta rel="shortcut icon" href="favicon.ico" type="image/x-icon">    

    <link rel="stylesheet" href="css/library/slick.css">
    <link rel="stylesheet" href="css/library/slick-theme.css">
    <link rel="stylesheet" href="css/library/fontAwasome/all.min.css">
    <link rel="stylesheet" href="css/library/animate.css">
    <link rel="stylesheet" href="css/main.css">

    <meta name="<?php echo $settings[0]['title']?>" content="<?php echo $settings[0]['value']?>">
    <meta name="<?php echo $settings[1]['title']?>" content="<?php echo $settings[1]['value']?>">
    <title><?php echo $settings[2]['value']?></title>
</head>
<body>
<script>
    var div = document.createElement('div'), img = document.createElement('img');
    div.setAttribute('id', 'loading');
    div.style.display = 'flex';
    img.setAttribute('src', 'image/interface/loading.gif');
    div.appendChild(img);
    document.body.appendChild(div);
    window.addEventListener('load', function(){
        document.getElementById('loading').style.display = 'none';
    })
</script>

<!-- WRAPPER -->
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
                    <li><a href="<?php echo $nav['href'];?>" title="<?php echo $nav['name'];?>"><?php echo $nav['name'];?></a></li>
                    <?php
                }
                ?>
            </ul>
        </nav>

        <div class="header-contact">
            <ul class="header-contact__socials">
                <li><a href="<?php echo $arr[0]['href']?>" title="<?php echo $arr[0]['description']?>"><?php echo $arr[0]['logo']?></i></a></li>
                <li><a href="<?php echo $arr[1]['href']?>" title="<?php echo $arr[1]['description']?>"><?php echo $arr[1]['logo']?></a></li>
                <li><a href="<?php echo $arr[2]['href']?>"
                       class="phone-number"
                       title="<?php echo $arr[2]['description']?>"
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




    <!-- SECTIONS -->
    <!-- INTRO  -->
    <section class="intro" id="intro">
        <div class="intro-bg"><img data-src="<?php echo $int['bg']?>" src="<?php echo $int['bg_thumb']?>" alt="" class="intro-bg_img"></div>
        <div class="intro-header">

        </div>

        <div class="intro-wrapper">
            <img src="<?php echo $int['logo']?>" alt="Plato">


            <h1><?php echo $int['title']?></h1>
            <p><i><?php echo $int['description']?></i></p>
        </div>

        <div class="intro-footer">
            <a id="intro-footer__arrow"
               href="#menu-restourant"
               class="intro-footer__arrow
                  animated infinite bounce delay-5s"
               title="Вниз">

                <i class="fas fa-arrow-down"></i>
            </a>
        </div>
    </section>
    <!-- end of INTRO -->


    <!-- section menu-restourant -->
    <section id="menu-restourant" class="menu-restourant">
        <div class="menu-restourant-left-side">
            <h1><?php echo $menu['title']?></h1>
            <p><?php echo $menu['description']?></p>
            <a id="menu-restourant-left-side-link-to" class="menu-restourant-left-side-link-to" href="<?php echo $menu['href']?>">Меню</a>
        </div>
        <div class="menu-restourant-right-side">
            <img data-href="#viewimg" data-src="<?php echo $menu['bg']?>" src="<?php echo $menu['bg_thumb']?>" alt="" class="menu-restourant-right-side_bg">
        </div>
    </section>
    <!-- end section menu-restourant -->
    
    <!-- section menu-review -->
    <section id="menu-review" class="menu-review">
        <div class="menu-review-bg-side">
            <img data-href="#viewimg" data-src="<?php echo $menuReview['bg']?>" src="<?php echo $menuReview['bg']?>" alt="" class="menu-review-right-side_bg">
        </div>

        <div class="menu-review-center-side">
            <p><?php echo $menuReview['title']?></p>
        </div>
    </section>
    <!-- end section menu-review -->

    <!-- section interior -->
    <section  id="interior" class="interior">
        <div id="interior-right-side" class="interior-right-side">

            <?php
            while($intImg = $interimg->fetch_assoc()){
                ?>
                    <img data-href="#viewimg" data-src="<?php echo $intImg['src']?>" src="<?php echo $intImg['src_thumb']?>" alt="" class="interior-right-side_bg">
                <?php
            }
            ?>
        </div>

        <div class="interior-left-side">
            <h1><?php echo $interior['title']?></h1>
            <p><?php echo $interior['description']?></p>
        </div>
    </section>

    <!-- end section interior -->

    <!-- section dishes -->
    <section  id="dishes" class="dishes">
        <div class="dishes-top-side">
        
            <?php
                while($disImg = $dishesimg->fetch_assoc()){
                    ?>
                        <img data-href="#viewimg" data-src="<?php echo $disImg['src']?>" src="<?php echo $disImg['src_thumb']?>" alt="" class="dishes-top-side_bg">
                    <?php
                }
            ?>
        </div>
        <div class="dishes-bottom-side">
            <h1><?php echo $dishes['title']?></h1>
            <p><?php echo $dishes['description']?></p>
        </div>
    </section>

    <!-- end section dishes -->

    <!-- our address -->

    <section id="address" class="address">
        <div class="address-header">
            <p><?php echo $address['title']?></p>
        </div>

        <iframe src="<?php echo $address['map']?>" frameborder="1" allowfullscreen="true"></iframe>

        <div class="address-footer">
            <p><?php echo $address['description']?></p>
        </div>
    </section>

    <!-- end our address -->
    <!--end of SECTION -->





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
<!-- end WRAPPER -->






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
                <li><a href="<?php echo $nav['href'];?>" title="<?php echo $nav['name'];?>"><?php echo $nav['name'];?></a></li>
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

<!-- VIEWIMG -->
<div id="viewimg" class="viewimg">

    <div class="close-viewimg">
        <i class="fas fa-times"></i>
    </div>

    <div class="viewimg-content">
        <img src="" alt="">
    </div>

</div>
<!-- end VIEWIMG -->




<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@8.17.0/dist/lazyload.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/jquery.viewportchecker.min.js"></script>
<script src="js/animatedModal.js"></script>
<script src="js/main.js"></script>
</body>
</html>