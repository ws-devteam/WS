<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
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
    <header class="header-area bg-img" style="background-image: url(img/bg-img/14.jpg);">
        <?php require_once("components/header.php"); ?>
    </header>
    <!-- Header Area End -->

    <!-- Social Sidebar Area Start -->
    <div class="social-sidebar-area">
        <?php require_once("components/sidebar.php"); ?>
    </div>
    <!-- Social Sidebar Area End -->

    <!-- About Me Area Start -->
    <section class="about-me-area mt-100 section_padding_100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- <div class="col-10">
                    <div class="about-me-thumb">
                        <img src="img/bg-img/about-me.jpg" alt="">
                    </div>
                </div> -->
                <div class="col-10">
                    <div class="about-content mb-100 text-center">
                        <span></span>
                        <h2>What can I tell you about WS?</h2>
                        <p>Wedding Stories is a professional photography and videography house based out of Kolkata. We specialise in candid wedding photography along with cinematography. Our services covers all types of events whether it is social, corporate or portfolio shoot. We offer our service all across India.
                            </br> All images, text, videos are copyrighted. ©<?php $mydate = getdate(date("U"));
                                                                                echo "$mydate[year]"; ?> Wedding Stories - all rights reserved.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="about-content text-center">
                        <!-- <span></span> -->
                        <h2 class="text-danger">Services Offered</h2>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.4s">
                                <!-- <img src="img/core-img/photo-camera.png" alt=""> -->
                                <i class="fa fa-camera-retro" aria-hidden="true" style="font-size:48px; padding-bottom:30px;"></i>
                                <h5>Photography</h5>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum.</p> -->
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.9s">
                                <!-- <img src="img/core-img/video-camera.png" alt=""> -->
                                <i class="fa fa-video-camera" aria-hidden="true" style="font-size:48px; padding-bottom:30px;"></i>
                                <h5>Cinematography</h5>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="about-content text-center">
                        <!-- <span></span> -->
                        <h2 class="text-danger">Genres Covered</h2>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.4s">
                                <img src="img/core-img/wedding-rings.png" alt="">
                                <!-- <i class="fa fa-camera-retro" aria-hidden="true" style="font-size:48px; padding-bottom:30px;"></i> -->
                                <h5>Wedding</h5>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum.</p> -->
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.9s">
                                <img src="img/core-img/pre-wedding.png" alt="">
                                <!-- <i class="fa fa-video-camera" aria-hidden="true" style="font-size:48px; padding-bottom:30px;"></i> -->
                                <h5>Pre Wedding</h5>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum.</p> -->
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.9s">
                                <img src="img/core-img/baby-boy.png" alt="">
                                <!-- <i class="fa fa-video-camera" aria-hidden="true" style="font-size:48px; padding-bottom:30px;"></i> -->
                                <h5>Baby Shoot Event</h5>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum.</p> -->
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.9s">
                                <img src="img/core-img/team.png" alt="">
                                <!-- <i class="fa fa-video-camera" aria-hidden="true" style="font-size:48px; padding-bottom:30px;"></i> -->
                                <h5>Corporate Events</h5>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum.</p> -->
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.9s">
                                <img src="img/core-img/portfolio.png" alt="">
                                <!-- <i class="fa fa-video-camera" aria-hidden="true" style="font-size:48px; padding-bottom:30px;"></i> -->
                                <h5>Portfolio Shoot</h5>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum.</p> -->
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.9s">
                                <img src="img/core-img/product.png" alt="">
                                <!-- <i class="fa fa-video-camera" aria-hidden="true" style="font-size:48px; padding-bottom:30px;"></i> -->
                                <h5>Product</h5>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="about-content text-center">
                        <!-- <span></span> -->
                        <h2 class="text-danger">Our Team</h2>
                    </div>
                    <div class="our-skills-area text-center">
                        <div class="row">
                            <!-- Team Member 1 -->
                            <div class="col-xl-3 col-md-6 mb-4 wow flipInX">
                                <div class="card shadow" style="border-top-left-radius: calc(1rem - 1px) !important;border-top-right-radius: calc(1rem - 1px)!important;">
                                    <img src="img/user/hams.jpg" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-0">Hambir</h5>
                                        <!-- <div class="card-text text-black-50">Cinematography</div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- Team Member 2 -->
                            <div class="col-xl-3 col-md-6 mb-4 wow flipInX">
                                <div class="card shadow" style="border-top-left-radius: calc(1rem - 1px) !important;border-top-right-radius: calc(1rem - 1px)!important;">
                                    <img src="img/user/gourab.jpg" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-0">Gourab</h5>
                                        <!-- <div class="card-text text-black-50">Cinematography</div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- Team Member 3 -->
                            <div class="col-xl-3 col-md-6 mb-4 wow flipInX">
                                <div class="card shadow" style="border-top-left-radius: calc(1rem - 1px) !important;border-top-right-radius: calc(1rem - 1px)!important;">
                                    <img src="img/user/subhasish.jpg" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-0">Subhasish</h5>
                                        <!-- <div class="card-text text-black-50">Photography</div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- Team Member 4 -->
                            <div class="col-xl-3 col-md-6 mb-4 wow flipInX">
                                <div class="card shadow" style="border-top-left-radius: calc(1rem - 1px) !important;border-top-right-radius: calc(1rem - 1px)!important;">
                                    <img src="img/user/suman.jpg" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-0">Suman</h5>
                                        <!-- <div class="card-text text-black-50">Editing, Tech Support</div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- About Me Area End -->
    <!-- ***** Contact Area Start ***** -->
    <?php require_once("components/contact-popup.php") ?>
    <!-- ***** Contact Area End ***** -->

    <!-- Follow Me Instagram Area Start -->
    <!-- <section class="follow-me-instagram-area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-11 ml-auto">
                    <div class="follow-me-title">
                        <h5>Follow me @ Instagram</h5>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- Instagram Feeds Area -->
    <!-- <div class="instagram-feeds-area owl-carousel">
            <div class="single-instagram-feeds">
                <img src="img/bg-img/i1.jpg" alt="">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <div class="single-instagram-feeds">
                <img src="img/bg-img/i2.jpg" alt="">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <div class="single-instagram-feeds">
                <img src="img/bg-img/i3.jpg" alt="">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <div class="single-instagram-feeds">
                <img src="img/bg-img/i4.jpg" alt="">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <div class="single-instagram-feeds">
                <img src="img/bg-img/i5.jpg" alt="">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <div class="single-instagram-feeds">
                <img src="img/bg-img/i6.jpg" alt="">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <div class="single-instagram-feeds">
                <img src="img/bg-img/i7.jpg" alt="">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>
    </section> -->
    <!-- Follow Me Instagram Area End -->

    <!-- Footer Area Start -->
    <?php require_once("components/footer.php"); ?>
    <!-- Footer Area End -->

    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    <!-- <p>Copyright &copy;
        <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
            class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
    <script>
        // $(window).scroll(function() {
        //     var $header = $(".header-area");
        //     $header.toggleClass('scrolled', $(this).scrollTop() > 50);
        //     // $header.removeAttr('style');
        //     if (($header).hasClass('scrolled') == true) {
        //         // $header.css('background-image', 'url(img/bg-img/14.jpg)');
        //         $header.css('height', '40px');
        //         $('.navbar-brand').hide();
        //     } else {
        //         $header.css('height', '110px');
        //         $('.navbar-brand').show();
        //     }
        // });
    </script>
    <!--Contact-popup Mail -->
    <script src="js/contact-popup.js"></script>
</body>

</html>