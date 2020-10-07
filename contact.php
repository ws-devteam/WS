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

    <!-- <section class="contact-area section_padding_100 mt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="contact-heading-text text-center mb-100">
                        <span></span>
                        <h2>Please get in touch</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate id justo quis facilisis. Vestibulum id orci ligula. Sed tempor, nunc ut sodales pulvinar, mauris ante euismod magna, at elementum lectus leo sed enim. Praesent dictum suscipit tincidunt. Nulla facilisi. Aenean in mollis orci. Ut interdum vulputate ante a egestas. Pellentesque varius purus malesuada arcu semper vehicula. </p>
                    </div>
                </div>
                Contact Form Area
                <div class="col-10">
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn studio-btn mt-3" disabled>Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Google Maps -->
    <section class="section_padding_100 mt-100">
        <div class="map-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="contact-heading-text text-center mb-5">
                            <span></span>
                            <h2>Find us</h2>

                            <div class="card text-center">
                                <div class="card-header text-white bg-danger">
                                    We would love to hear from you
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6 wow bounceIn">

                                            <h5 class="fa-stack card-title" style="color: #E1BE53">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                            </h5>
                                            <h5>Call us at:</h5>

                                            <p class="card-text">
                                                <a href="tel:+919874370273">+919874370273,</a>
                                                <a href="tel:+919038141853">+919038141853,</a>
                                                <a href="tel:+919836343600">+919836343600</a>
                                            </p>

                                        </div>
                                        <div class="col-md-6 wow bounceIn">
                                            <h5 class="fa-stack card-title" style="color: #E1BE53">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                            </h5>
                                            <h5>Email us at:</h5>

                                            <a href="mailto:weddingstories3@gmail.com">weddingstories3@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="wow flipInX" id="googleMap"></div>
                </div>
            </div>
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
    <!-- Google Maps -->
    <script>
        function initMap() {
            var center = {
                lat: 22.612474,
                lng: 88.421298
            };
            var locations = [
                ['Wedding Stories<br>\
    707 Motilal Gupta Rd, Barisha, WB 700041<br>\
   <a href="https://goo.gl/maps/gdCsvLZkwSQhvnaa6" target="_blank">Get Directions</a>', 22.4870055, 88.3297766],
                ['Wedding Stories<br>\
    128 Dakshin Para Road, Baguiati, WB 700028<br>\
   <a href="https://goo.gl/maps/snvYgRCYhp5X1TYR7" target="_blank">Get Directions</a>', 22.612474, 88.421298],
                ['Wedding Stories<br>\
    145/7, Spotlight Rainbow, Madhyamgram, WB 700129 <br>\
    <a href="https://goo.gl/maps/NDstwTvP6u2ZRqyg8" target="_blank">Get Directions</a>', 22.6981276, 88.472436]
            ];
            var map = new google.maps.Map(document.getElementById('googleMap'), {
                zoom: 11,
                center: center
            });
            var infowindow = new google.maps.InfoWindow({});
            var marker, count;
            for (count = 0; count < locations.length; count++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[count][1], locations[count][2]),
                    map: map,
                    title: locations[count][0]
                });
                google.maps.event.addListener(marker, 'click', (function(marker, count) {
                    return function() {
                        infowindow.setContent(locations[count][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, count));
            }
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXY_pDrFNXEYabXtQubrUTKWZ3hzg-8a4&callback=initMap"></script>
    <!-- <script src="js/map-active.js"></script> -->
    <!--Contact-popup Mail -->
    <script src="js/contact-popup.js"></script>
</body>

</html>