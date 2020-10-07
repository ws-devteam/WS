<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Wedding Stories is a professional photography and videography house based out of Kolkata">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Wedding Stories</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/sidebar.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader -->
    <?php require_once("components/preloader.php"); ?>

    <!-- Gradient Background Overlay -->
    <div class="gradient-background-overlay"></div>

    <!-- Header Area Start -->
    <header class="header-area">
        <?php require_once("components/header.php"); ?>
    </header>
    <!-- Header Area End -->

    <!-- Social Sidebar Area Start -->
    <div class="social-sidebar-area">
        <?php require_once("components/sidebar.php"); ?>
    </div>


    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome-area">
        <div class="carousel h-100 slide" data-ride="carousel" id="welcomeSlider">
            <!-- Carousel Inner -->
            <div class="carousel-inner h-100">

                <div class="carousel-item h-100 bg-img active" style="background-image: url(img/bg-img/1.jpg);">
                    <!-- <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>01.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div> -->
                </div>

                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/2.jpg);"></div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/3.jpg);"></div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/4.jpg);"></div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/5.jpg);"></div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/6.jpg);"></div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/7.jpg);"></div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/8.jpg);"></div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/9.jpg);"></div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/10.jpg);"></div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/11.jpg);"></div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/12.jpg);"></div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/13.jpg);"></div>
            </div>
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators" style="display:none">
                <li data-target="#welcomeSlider" data-slide-to="0" class="active bg-img" style="background-image: url(img/bg-img/1.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="1" class="bg-img" style="background-image: url(img/bg-img/2.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="2" class="bg-img" style="background-image: url(img/bg-img/3.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="3" class="bg-img" style="background-image: url(img/bg-img/4.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="4" class="bg-img" style="background-image: url(img/bg-img/5.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="5" class="bg-img" style="background-image: url(img/bg-img/6.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="6" class="bg-img" style="background-image: url(img/bg-img/7.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="7" class="bg-img" style="background-image: url(img/bg-img/8.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="8" class="bg-img" style="background-image: url(img/bg-img/9.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="9" class="bg-img" style="background-image: url(img/bg-img/10.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="10" class="bg-img" style="background-image: url(img/bg-img/11.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="11" class="bg-img" style="background-image: url(img/bg-img/12.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="12" class="bg-img" style="background-image: url(img/bg-img/13.jpg);"></li>
            </ol>
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Contact Area Start ***** -->
    <?php require_once("components/contact-popup.php") ?>
    <!-- ***** Contact Area End ***** -->


    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    <!-- <p>Copyright &copy;
        <script>
            document.write(new Date().getFullYear());
        </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    </p> -->
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <!--Contact-popup Mail -->
    <script src="js/contact-popup.js"></script>
</body>

</html>