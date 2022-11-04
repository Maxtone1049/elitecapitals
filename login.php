<?php
session_start();
error_reporting(0);
include('includes/dbconnect.php');

if (isset($_POST['login'])) {
    $uname = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT ID FROM users WHERE email=:email and password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $uname, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['obcsuid'] = $result->ID;
        }

        $_SESSION['login'] = $_POST['Email'];
        $msg = "<div style='background:green;padding:1em;border-radius:1em;color:white;font-size: 1.2rem;font-weight:900'><i class='fa fa-spinner fa-spin'></i> Signing In </div>";
        echo   "<script type='text/javascript'>  
        setTimeout(function(){
           window.location.href = 'trade/dashboard';
        }, 3000);
       </script>";
    } else {
        $msg = "<p class='text-danger bg-warning text-center font-weight-bold px-2 py-2 rounded stat3'>Wrong Username or Password</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elite Capital | Login </title>
    <!--Favicon add-->
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <!--bootstrap Css-->
    <link href="auth-assets/front/css/bootstrap.min.css" rel="stylesheet">
    <!--font-awesome Css-->
    <link href="auth-assets/front/css/icofont.min.css" rel="stylesheet">
    <!--owl.carousel Css-->
    <link href="auth-assets/front/css/owl.carousel.min.css" rel="stylesheet">
    <!--Slick Nav Css-->
    <link href="auth-assets/front/css/slicknav.min.css" rel="stylesheet">
    <!--Animate Css-->
    <link href="auth-assets/front/css/animate.css" rel="stylesheet">
    <!--Style Css-->
    <link href="auth-assets/front/css/style.css" rel="stylesheet">
    <!--Responsive Css-->
    <link href="auth-assets/front/css/responsive.css" rel="stylesheet">
    <link href="maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.html" rel="stylesheet">

    <script src="code.jquery.com/jquery-3.3.1.min.html" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.html">
    <script src="cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min-2.html"></script>

    <link href="auth-assets/front/css/color535a535a535a.css?color=009933" rel="stylesheet">


    <style>
        .form-control {
            border-radius: 0 !important;
        }
    </style>
</head>

<body>
    <nav class="navbar-area" style="background-color: #ff9f1a;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 ">
                    <a href="." class="logo"><img src="auth-assets/images/logo/logo.png" alt="logo image" style="max-height: 44px;"></a>
                </div>
                <div class="col-lg-9 text-right ">
                    <ul id="main-menu">
                        <li><a href=".">Home</a></li>
                        <li><a href="login">Login</a></li>
                        <li><a href="register">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="content-for-template  content-template-bg ">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-12  ml-auto mr-auto">
                <div class="card text-white bg-dark" style="margin-top:50px;margin-bottom:50px; background-color: #ff9f1a!important;">
                    <div class="card-header text-center">
                        Log in
                    </div>
                    <p class="font-12 text-danger text-center" id="err-regform"></p>
                    <div class="card-body">
                        <center>
                            <?php if ($msg) {
                                echo $msg;
                            }  ?> </p>
                        </center>
                        <form method="post" id="login" action="login">
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" name="email" placeholder="email address" title="Please enter you email address" required="" class="form-control">
                                <!-- <span class="help-block small">Your unique username to app</span> -->
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" name="password" title="Please enter your password" placeholder="******" required="" class="form-control">
                                <!-- <span class="help-block small">Your strong password</span> -->
                            </div>
                            <div>

                                <button type="submit" name="login" id="btnLogin" class="btn btn-own btn-lg btn-block">Login</button>

                                <!-- <div class="form-group" style="margin-top: 10px;">
                        <a class="btn btn-default form-control" href="register">Register</a>
                        
                    </div> -->
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">

                        <div class="row">

                            <!-- <div class="col-md-6 col-sm-12 text-center">
Forgot your password? <br><a href="password/reset" class="btn btn-info btn-sm">Reset now</a>        
    </div> -->

                            <div class="col-md-6 col-sm-12 text-center">
                                Don't Have an Account? <br><a href="register" class="btn btn-primary btn-sm">Sign
                                    up</a>
                            </div>

                        </div>



                    </div>

                </div>
            </div>
        </div>


    </div>

    <footer style="background-color: #ff9f1a;">
        <!--footer area start-->
        <div class="copyright-area" style="background-color: #ff9f1a;">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-6 col-md-7 ">
                        <p class="copyright-text">©
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Elite Capital. All Rights
                            Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--footer area end-->
    </footer>


    <!--back to top start-->
    <div class="back-to-top">
        <i class="icofont icofont-simple-up"></i>
    </div>
    <!--back to top end-->

    <!--jquery script load-->
    <script src="auth-assets/front/js/jquery.js"></script>
    <!--Owl carousel script load-->
    <script src="auth-assets/front/js/owl.carousel.min.js"></script>
    <!--Propper script load here-->
    <script src="auth-assets/front/js/popper.min.js"></script>
    <!--Bootstrap v4 script load here-->
    <script src="auth-assets/front/js/bootstrap.min.js"></script>
    <!--Slick Nav Js File Load-->
    <script src="auth-assets/front/js/jquery.slicknav.min.js"></script>
    <!--Scroll Spy File Load-->
    <script src="auth-assets/front/js/scrollspy.min.js"></script>
    <!--Wow Js File Load-->
    <script src="auth-assets/front/js/wow.min.js"></script>
    <!--Main js file load-->
    <script src="auth-assets/front/js/main.js"></script>
</body>

</html>