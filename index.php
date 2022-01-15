<?php
session_start();
ob_start();
error_reporting(0);
include "db.php";
$getdata = $db->query("select * from ayarlar");
$writedata = $getdata->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee</title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome/css/all.css">
</head>

<body>
    <!--header başladı-->
    <header id="header">
        <div class="header">
            <div class="container">
                <div class="header-navbar">
                    <div class="logo">
                        <img src="logo.png" width="160px" height="160px">
                    </div>
                    <div class="header-menu">
                        <div class="box">
                            <ul>
                                <?php if($_SESSION["yetki"]==1){ ?>
                                <li><a href="admin-panel/index.php">Panel</a></li>
                                <?php }else{?>
                                <li><a href="#iletisim">İletişim</a></li>
                                <?php } ?>
                                <li><a href="#menu">Menü</a></li>
                                <li><a href="#hakkimizda">Hakkımızda</a></li>
                                <?php if ($_SESSION["nick"]) { ?>
                                    <li><a href="session.php"><?= $_SESSION["nick"]; ?></a></li>
                                <?php } else{ ?>
                                <li><a href="giris/giris.php">Giriş Yap</a></li>
                                <?php } ?>
                             

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-text">
                    <h1><span class="first-letter"></span>Hoş Geldiniz</h1>
                    <h3>Kahvenin tadı hatır bilenle çıkar...</h3>
                    <a href="dis_menu/index.html" class="btn-coffee">Alışverişe başlayın</a>
                </div>
            </div>
        </div>
        <a name="menu"></a>
        <a name="hakkimizda"></a>
        <a name="iletisim"></a>
    </header>
    <!--header bitti-->

    <!--about başladı-->
    <section id="about">
        <div class="about">
            <div class="container">
                <div class="about-tittle">
                    <h2>Hakkımızda</h2>
                </div>
                <div class="about-content">
                    <div class="about-img anime-left">
                        <img src="ortam.jpg">
                    </div>
                    <div class="about-text anime-right">
                        <h4>Hikayemiz</h4>
                        <div id="asteriks">
                            <i class="fas fa-asterisk"></i>
                        </div>
                        <p><?= $writedata["hakkimizda"]; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about bitti-->


    <!--Portfolio başladı-->
    <section id="portfolio">
        <div class="portfolio">
            <div class="portfolio-item ani1">
                <img src="no.1.jpg" alt="">
                <div class="overlay">
                    <i class="fas fa-mug-hot"></i>
                </div>
            </div>
            <div class="portfolio-item ani2">
                <img src="no.2.jpg" alt="">
                <div class="overlay">
                    <i class="fas fa-cookie-bite"></i>
                </div>
            </div>
            <div class="portfolio-item ani3">
                <img src="no.3.jpg" alt="">
                <div class="overlay">
                    <i class="fas fa-mug-hot"></i>
                </div>
            </div>
            <div class="portfolio-item ani4">
                <img src="no.4.jpg" alt="">
                <div class="overlay">
                    <i class="fas fa-cookie-bite"></i>
                </div>
            </div>
            <div class="portfolio-item ani5">
                <img src="no.5.jpg" alt="">
                <div class="overlay">
                    <i class="fas fa-mug-hot"></i>
                </div>
            </div>
            <div class="portfolio-item ani6">
                <img src="no.6.jpg" alt="">
                <div class="overlay">
                    <i class="fas fa-cookie-bite"></i>
                </div>
            </div>
            <div class="portfolio-item ani7">
                <img src="no.7.jpg" alt="">
                <div class="overlay">
                    <i class="fas fa-cookie-bite"></i>
                </div>
            </div>
            <div class="portfolio-item ani8">
                <img src="no.8.jpg" alt="">
                <div class="overlay">
                    <i class="fas fa-mug-hot"></i>
                </div>
            </div>
        </div>
    </section>



    <!--Portfolio bitti-->

    <!--Menu başladı-->
    <section id="menu">
        <div class="menu">
            <div class="container">
                <div class="menu-tittle">
                    <h2>Menü</h2>
                </div>
                <div class="menu-content">
                    <div class="menu-img anime-left">
                        <img src="menu.jpg">
                    </div>
                    <div class="menu-text anime-right">
                        <h4>Menü</h4>
                        <div id="asteriks">
                            <i class="fas fa-asterisk"></i>
                        </div>
                        <a href="dis_menu/index.html">Menüye ulaşmak için tıklayın...</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Menu bitti-->


    <!--iletişim basladi-->
    <section id="iletisim">
        <div class="iletisim">
            <div class="container">
                <div class="iletisim-tittle">
                    <h2> BİZE ULAŞIN</h2>
                </div>
                <div class="iletisim-content">
                    <div class="iletisim-item anime-top">
                        <i class="fas fa-phone"></i>
                        <p><?= $writedata["tel"]; ?></p>
                    </div>
                    <div class="iletisim-item anime-bottom">
                        <i class="fas fa-map-marker-alt"></i>
                        <p><?= $writedata["konum"]; ?></p>
                    </div>
                    <div class="iletisim-item anime-top">
                        <i class="fas fa-envelope-open"></i>
                        <p><?= $writedata["mail"]; ?></p>
                    </div>
                </div>
            </div>


        </div>
    </section>


    <!--iletişim bitti-->


    <!--footer başladı-->
    <footer id="footer">
        <div class="footer">
            <div class="footer-content">
                <div class="page-tittle">
                    <h2>Hakkımızda</h2>
                </div>

                <div class="footer-copyright">
                    <p>Bizi sosyal medyada da takip edin!</p>
                </div>
                <nav class="footer-social">
                    <ul>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>

    <!--footer bitti-->
    <script>
        window.sr = ScrollReveal();

        sr.reveal('.anime-left', {
            origin: 'left',
            duration: 1000,
            distance: '25rem',
            delay: 300
        });

        sr.reveal('.anime-right', {
            origin: 'right',
            duration: 1000,
            distance: '25rem',
            delay: 300
        });

        sr.reveal('.anime-top', {
            origin: 'top',
            duration: 1000,
            distance: '25rem',
            delay: 600
        });

        sr.reveal('.anime-bottom', {
            origin: 'bottom',
            duration: 1000,
            distance: '25rem',
            delay: 600
        });
    </script>


    <script>
        ScrollReveal().reveal('.ani1', {
            delay: 250
        });
        ScrollReveal().reveal('.ani2', {
            delay: 500
        });
        ScrollReveal().reveal('.ani3', {
            delay: 750
        });
        ScrollReveal().reveal('.ani4', {
            delay: 1000
        });
        ScrollReveal().reveal('.ani5', {
            delay: 1250
        });
        ScrollReveal().reveal('.ani6', {
            delay: 1500
        });
        ScrollReveal().reveal('.ani7', {
            delay: 1750
        });
        ScrollReveal().reveal('.ani8', {
            delay: 2000
        });
    </script>

</body>

</html>