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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.css">
    <link rel="stylesheet" href="css/gallery-grid.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/core-style.css">

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


    <section class="mt-100 mb-5">
        <div class="container gallery-container">

            <main role="main">
                <section class="text-center">
                    <div class="container">
                        <div class="contact-heading-text text-center p-3">
                            <span></span>
                            <h2>Our Works</h2>
                        </div>
                        <div class="col-md-12">
                            <p>
                                <button type="button" class="btn btn-secondary my-2" onclick="$('.secClass').hide();$('.wedding').fadeIn(3000);">Wedding</button>
                                <button type="button" class="btn btn-secondary my-2" onclick="$('.secClass').hide();$('.prewedding').fadeIn(3000);">Pre Wedding</button>
                                <button type="button" class="btn btn-secondary my-2" onclick="$('.secClass').hide();$('.babyshoot').fadeIn(3000);">Baby Shoot</button>
                                <button type="button" class="btn btn-secondary my-2" onclick="$('.secClass').hide();$('.video').fadeIn(3000);">Video</button>
                            </p>
                        </div>
                    </div>

                </section>
            </main>

            <div class="tz-gallery">

                <div class="row">
                    <!-- All -->

                    <?php require_once("BL/mediaLoader.php"); ?>

                    <!-- Wedding Section -->

                    <?php loadMedia('OurWorks', 'lightbox', 'wedding'); ?>

                    <!-- Pre Wedding Section -->

                    <?php loadMedia('OurWorks', 'lightbox', 'prewedding'); ?>

                    <!-- Baby Shoot Section -->

                    <?php loadMedia('OurWorks', 'lightbox', 'babyshoot'); ?>

                    <!-- Video Section -->
                    <div class="col-sm-6 col-md-6 video secClass" style="margin-bottom: 30px">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" style="border-radius:5px" src="https://www.youtube.com/embed/m-SVfLiRu8o" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 video secClass" style="margin-bottom: 30px">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" style="border-radius:5px" src="https://www.youtube.com/embed/2S3LCdbOL-I" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 video secClass" style="margin-bottom: 30px">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" style="border-radius:5px" src="https://www.youtube.com/embed/XsuOTmmRU7E" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 video secClass" style="margin-bottom: 30px">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" style="border-radius:5px" src="https://www.youtube.com/embed/1ndulhFzelw" allowfullscreen></iframe>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </section>

    <!-- Project Area Start -->

    <!-- Project Area End -->
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
    <!--Lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
    <script>
        $(window).on("load", function() {
            $(".secClass").hide();
            $(".wedding").show();
        });
    </script>
</body>

</html>