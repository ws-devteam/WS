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
    <link rel="stylesheet" href="css/pricing.css">
    <link rel="stylesheet" href="css/required.css">

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

    <section class="mt-100 section_padding_100">

        <div class="row m-auto text-center w-75">
            <div class="about-content text-center">
                <span></span>
                <h2>Get our pricing</h2>
                <p>Wedding Stories is a luxury wedding photography company located in Kolkata, West Bengal. We specialize in fun and off-beat candid wedding photography and cinematography for destination weddings worldwide. All images, text, videos are copyrighted. ©2019 Wedding Stories - all rights reserved.</p>
            </div>


            <div class="row col-12">
                <div class="col-xl col-md-6 princing-item red">
                    <div class="pricing-divider border">
                        <h3 class="text-light mb-3">Pre Wedding</h3>
                        <h4 class="my-0 display-4 text-light font-weight-bold mb-3"><span class="h3">₹ </span>15000</h4>
                        <?php require("components/wave.php"); ?>
                    </div>
                    <div class="card-body bg-white mt-0 shadow" style="box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <ul class="list-unstyled mb-5 position-relative">
                            <li><b>20</b> Edited Images</li>
                            <li><b>All RAW</b> Images</li>
                            <li><b>Approx 5 Mins</b> Cinematic Video</li>
                            <li><b>--</b></li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block  btn-custom-red" data-toggle="modal" data-target="#preWedingModal">Customization</button>
                    </div>
                </div>
                <div class="col-xl col-md-6 princing-item blue">
                    <div class="pricing-divider">
                        <h3 class="text-light mb-3">Wedding</h3>
                        <h4 class="my-0 display-4 text-light font-weight-bold mb-3"><span class="h3">₹ </span>35000</h4>
                        <?php require("components/wave.php"); ?>
                    </div>

                    <div class="card-body bg-white mt-0 shadow" style="box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <ul class="list-unstyled mb-5 position-relative">
                            <li><b>150 </b>Edited Images</li>
                            <li><b>One Side</b> Coverage</li>
                            <li><b>Approx 25 Mins </b>Cinematic Video</li>
                            <li><b>1 Canvera</b> Album</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block  btn-custom-blue" data-toggle="modal" data-target="#wedingModal">Customization</button>
                    </div>
                </div>
                <div class="col-xl col-md-6 princing-item green">
                    <div class="pricing-divider">
                        <h3 class="text-light mb-3">Rice Ceremony</h3>
                        <h4 class="my-0 display-4 text-light font-weight-bold mb-3"><span class="h3">₹ </span>25000</h4>
                        <?php require("components/wave.php"); ?>
                    </div>

                    <div class="card-body bg-white mt-0 shadow" style="box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <ul class="list-unstyled mb-5 position-relative">
                            <li><b>180</b> Edited Images</li>
                            <li><b>--</b></li>
                            <li><b>Approx 25 Mins</b> Cinematic Video</li>
                            <li><b>1 Canvera</b> Album</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block  btn-custom-green " data-toggle="modal" data-target="#babyModal">Customization</button>
                    </div>
                </div>
                <div class="col-xl col-md-6 princing-item skyblue">
                    <div class="pricing-divider">
                        <h3 class="text-light mb-3">Corporate Event</h3>
                        <h4 class="my-0 display-4 text-light font-weight-bold mb-3"><span class="h3">₹ </span>25000</h4>
                        <?php require("components/wave.php"); ?>
                    </div>

                    <div class="card-body bg-white mt-0 shadow" style="box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <ul class="list-unstyled mb-5 position-relative">
                            <li><b>Some</b> Edited Images</li>
                            <li><b>All RAW</b> Images</li>
                            <li><b>Event</b> Video</li>
                            <li><b>--</b></li>
                            <li><b>--</b></li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block  btn-custom-skyblue" data-toggle="modal" data-target="#corporateModal">Customization</button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div>
                <?php require_once("components/prewedding.php"); ?>
            </div>
            <div>
                <?php require_once("components/wedding.php"); ?>
            </div>
            <div>
                <?php require_once("components/baby.php"); ?>
            </div>
            <div>
                <?php require_once("components/corporate.php"); ?>
            </div>


        </div>

    </section>

    <!-- ***** Contact Area Start ***** -->
    <?php require_once("components/contact-popup.php") ?>
    <!-- ***** Contact Area End ***** -->

    <!-- Footer Area Start -->
    <?php require_once("components/footer.php"); ?>
    <!-- Footer Area End -->

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