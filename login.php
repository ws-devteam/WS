<?php
session_start();
if(isset($_SESSION['login'])){
    session_destroy();
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Login to WS</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="showbox">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
        <div class="questions-area text-center">
            <p>Did you know?</p>
            <ul>
                <li>The largest photography competition is 353,768 entries.</li>
                <li>Photography is the toughest profession in the world.</li>
                <li>The world’s largest photo album by dimensions was 13 ft 11.5 in x 17 ft.</li>
                <li>The world’s largest photo mosaic featured 176,175 pictures.</li>
                <li>The world’s largest camera lens was a 5200mm lens attached to a canon.</li>
            </ul>
        </div>
    </div>

    <!-- Gradient Background Overlay -->
    <div class="gradient-background-overlay"></div>

    <!-- Header Area Start -->
    <header class="header-area bg-img" style="background-image: url(img/bg-img/14.jpg);">
        <?php require_once("components/header.php"); ?>
    </header>
    <!-- Header Area End -->


    <section class="mt-100">
        <div class="d-flex align-items-center justify-content-center">
            <div class="card" style="width:40rem">
                <div class="card-body">
                    <div class="border border-light p-5">
                        <form id="signin">
                            <p class="h4 mb-4 text-center">Sign in</p>

                            <input type="email" name="SigninEmail" class="form-control mb-4" placeholder="E-mail" required>
                            <input type="password" name="SigninPassword" class="form-control mb-4" placeholder="Password" required>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="">Forgot password?</a>
                                </div>
                            </div>
                            <div id="signinError" class="text-center m-2 text-danger font-weight-bold"></div>
                            <button id="btnSignin" class="btn btn-info btn-block my-4" type="submit">Sign in</button>
                        </form>
                        <form id="signup">
                            <p class="h4 mb-4 text-center">Sign up</p>
                            <input type="text" name="FirstName" class="form-control mb-2" placeholder="First name" required>
                            <input type="text" name="LastName" class="form-control mb-2" placeholder="Last name" required>
                            <input type="email" name="SignupEmail" class="form-control mb-2" placeholder="E-mail" required>
                            <input type="password" name="SignupPassword" class="form-control mb-2" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>
                            <!-- <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">Minimal 8 characters lenght</small> -->
                            <input type="number" name="Phone" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock" required>
                            <!-- <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">Optional</small> -->
                            <div id="signupError" class="text-center m-2 text-danger font-weight-bold"></div>
                            <button id="btnSignup" class="btn btn-info btn-block my-4" type="submit">Sign up</button>
                        </form>
                        <div class="text-center">
                            <p>Here you go for
                                <a href="#" id="btnSwitchForm" class="btn-link font-weight-bold">Sign up</a>
                            </p>
                            <p>or connect with:</p>
                            <button class="btn btn-outline-primary"><i class="fa fa-facebook"></i> Facebook</button>
                            <button class="btn btn-outline-danger"><i class="fa fa-google"></i> Google</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



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
        $(document).ready(function() {
            $("#signup").hide();
        });

        $("#btnSwitchForm").click(function() {
            $("#signup").toggle();
            $("#signin").toggle();
            if ($(this).text() == "Sign up") {
                $(this).text("Sign in");
            } else {
                $(this).text("Sign up");
            }
        });

        $("form").submit(function(event) {
            var fname=$(this).attr('id');
            $.ajax({
                type: "POST",
                url: 'BL/auth.php',
                dataType: 'html',
                data: $(this).serialize() + "&functionname=" + fname,
                success: function(result) {
                    if (result == 1) {
                        window.location = "home.php";
                    } else {
                        if (fname == "signin") {
                            $("#signinError").text(result);
                        }
                        else{
                            $("#signupError").text(result);
                        }
                    }
                },
                error: function(xhr, status, result) {
                    alert(result);
                }
            });
            event.preventDefault();
        });
    </script>

</body>

</html>