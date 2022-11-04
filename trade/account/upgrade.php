<?php
session_start();
error_reporting(0);
include('../../includes/dbconnect.php');
if (strlen($_SESSION['obcsuid']==0)) {
  header('location:../logout.php');
  } else{

$uid=$_SESSION['obcsuid'];
$sql="SELECT * FROM  users where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{  $cnt=$cnt+1;}
}             
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elite Capital - Account Upgrade</title>
    <link rel="shortcut icon" href="../favicon.png" type="image/png">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .pricing .card {
            border: none;
            border-radius: 1rem;
            transition: all 0.2s;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }

        .pricing hr {
            margin: 1.5rem 0;
        }

        .pricing .card-title {
            margin: 0.5rem 0;
            font-size: 0.9rem;
            letter-spacing: .1rem;
            font-weight: bold;
        }

        .pricing .card-price {
            font-size: 3rem;
            margin: 0;
        }

        .pricing .card-price .period {
            font-size: 0.8rem;
        }

        .pricing ul li {
            margin-bottom: 1rem;
        }

        .pricing .text-muted {
            opacity: 0.7;
        }

        .pricing .btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            opacity: 0.7;
            transition: all 0.2s;
        }

        /* Hover Effects on Card */

        @media (min-width: 992px) {
            .pricing .card:hover {
                margin-top: -.25rem;
                margin-bottom: .25rem;
                box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
            }

            .pricing .card:hover .btn {
                opacity: 1;
            }
        }
    </style>

    <style>
        .card {
            border: 0px;
        }
    </style>

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include('sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="bg-dark" style="background-color: #25204a !important">
                <!-- Topbar -->
                <?php include('topbar.php') ?>
                <div class="mb-2">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>

                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                            {
                                "symbols": [{
                                        "proName": "FOREXCOM:SPXUSD",
                                        "title": "S&P 500"
                                    },
                                    {
                                        "proName": "FOREXCOM:NSXUSD",
                                        "title": "Nasdaq 100"
                                    },
                                    {
                                        "proName": "FX_IDC:EURUSD",
                                        "title": "EUR/USD"
                                    },
                                    {
                                        "proName": "BITSTAMP:BTCUSD",
                                        "title": "BTC/USD"
                                    },
                                    {
                                        "proName": "BITSTAMP:ETHUSD",
                                        "title": "ETH/USD"
                                    }
                                ],
                                "colorTheme": "dark",
                                "isTransparent": false,
                                "displayMode": "adaptive",
                                "locale": "en"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
                <!-- End of Topbar -->

                <section class="pricing py-5">


                    <div class="container-fluid">
                        <h1 class="h3 mb-2 mt-0 text-white text-capitalize">Upgrade Account
                        </h1>


                        <div class="row">
                            <!-- Free Tier -->
                            <div class="col-lg-4  mb-5">
                                <div class="card mb-5 mb-lg-0">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center">BRONZE</h5>
                                        <h6 class="card-price text-center">$1000</h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>24x7 Support</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Professional Charts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Trading Alerts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Trading Central Bronze
                                            </li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>NO BONUS</li>
                                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Live
                                                Trading
                                                With Experts</li>
                                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>SMS &
                                                EMail
                                                Alerts</li>

                                        </ul>
                                        <a href="#" data-toggle="modal" data-target="#bronzeModal" class="btn btn-block btn-primary text-uppercase">Upgrade
                                            Account</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Plus Tier -->
                            <div class="col-lg-4  mb-5">
                                <div class="card mb-5 mb-lg-0">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center">SILVER</h5>
                                        <h6 class="card-price text-center">$2,000</h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>24x7 Support</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Professional Charts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Trading Alerts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Trading Central Silver
                                            </li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>3,500 USD Bonus</li>
                                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Live
                                                Trading
                                                With Experts</li>
                                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>SMS &
                                                EMail
                                                Alerts</li>
                                        </ul>
                                        <a href="#" data-toggle="modal" data-target="#silverModal" class="btn btn-block btn-primary text-uppercase">Upgrade
                                            Account</a>
                                    </div>
                                </div>
                            </div>


                            <!-- Pro Tier -->
                            <div class="col-lg-4  mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center">GOLD</h5>
                                        <h6 class="card-price text-center">$3,000</h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>24x7 Support</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Professional Charts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Trading Alerts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Trading Central Gold</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>8,500 USD Bonus</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Trading
                                                With Experts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>SMS & EMail
                                                Alerts</li>

                                        </ul>
                                        <a href="#" data-toggle="modal" data-target="#goldModal" class="btn btn-block btn-primary text-uppercase">Upgrade
                                            Account</a>
                                    </div>
                                </div>
                            </div>



                            <!-- Pro Tier -->
                            <div class="col-lg-4  mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center">DIAMOND</h5>
                                        <h6 class="card-price text-center">$20,000</h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>24x7 Support</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Professional Charts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Trading Alerts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Trading Central Gold</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>15,500 USD Bonus</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Trading
                                                With Experts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>SMS & EMail
                                                Alerts</li>
                                        </ul>
                                        <a href="#" data-toggle="modal" data-target="#diamondModal" class="btn btn-block btn-primary text-uppercase">Upgrade
                                            Account</a>
                                    </div>
                                </div>
                            </div>


                            <!-- Pro Tier -->
                            <div class="col-lg-4  mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center">ULTIMATE</h5>
                                        <h6 class="card-price text-center">$50,000</h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>24x7 Support</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Professional Charts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Trading Alerts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Trading Central Gold</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>35,000 USD Bonus</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Live Trading
                                                With Experts</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span>SMS & EMail
                                                Alerts</li>
                                        </ul>
                                        <a href="#" data-toggle="modal" data-target="#ultimateModal" class="btn btn-block btn-primary text-uppercase">Upgrade
                                            Account</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </section>

                <!-- Logout Modal-->
                <div class="modal fade" id="bronzeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <!--/col-3-->
                                <div class="col-sm-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                            <p class="text-justify text-black">
                                                Hello <?php echo 'Name here' ?> , to upgrade your Elite Capital trading account to <strong>BRONZE</strong>,
                                                please
                                                contact our Live
                                                Chat agent to receive the appropriate payment details. <strong>$500.00</strong>
                                            </p>
                                            <p class="text-justify bg-primary text-white p-2">
                                                For more information contact us immediately through our official email address
                                                info@elitecapital.online Thank you for using Elite Capital
                                            </p>
                                            <div class="text-center">

                                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary text-center">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/tab-pane-->
                                </div>
                                <!--/tab-content-->
                            </div>
                            <form id="logout-form" action="../logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Logout Modal-->
                <div class="modal fade" id="silverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <!--/col-3-->
                                <div class="col-sm-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                            <p class="text-justify text-black">
                                                Hello, to upgrade your Elite Capital trading account to <strong>SILVER</strong>,
                                                please
                                                contact our Live
                                                Chat agent to receive the appropriate payment details. <strong>$1,500.00</strong>
                                            </p>
                                            <p class="text-justify bg-primary text-white p-2">
                                                For more information contact us immediately through our official email address
                                                info@elitecapital.online Thank you for using Elite Capital
                                            </p>
                                            <div class="text-center">

                                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary text-center">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/tab-pane-->
                                </div>
                                <!--/tab-content-->
                            </div>
                            <form id="logout-form" action="../logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Logout Modal-->
                <div class="modal fade" id="goldModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <!--/col-3-->
                                <div class="col-sm-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                            <p class="text-justify text-black">
                                                Hello, to upgrade your Elite Capital trading account to <strong>GOLD</strong>,
                                                please
                                                contact our Live
                                                Chat agent to receive the appropriate payment details. <strong>$5,000.00</strong>
                                            </p>
                                            <p class="text-justify bg-primary text-white p-2">
                                                For more information contact us immediately through our official email address
                                                info@elitecapital.online Thank you for using Elite Capital
                                            </p>
                                            <div class="text-center">

                                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary text-center">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/tab-pane-->
                                </div>
                                <!--/tab-content-->
                            </div>
                            <form id="logout-form" action="../logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Logout Modal-->
                <div class="modal fade" id="diamondModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <!--/col-3-->
                                <div class="col-sm-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                            <p class="text-justify text-black">
                                                Hello, to upgrade your Elite Capital trading account to <strong>DIAMOND</strong>,
                                                please
                                                contact our Live
                                                Chat agent to receive the appropriate payment details. <strong>$20,000.00</strong>
                                            </p>
                                            <p class="text-justify bg-primary text-white p-2">
                                                For more information contact us immediately through our official email address
                                                info@elitecapital.online Thank you for using Elite Capital
                                            </p>
                                            <div class="text-center">

                                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary text-center">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/tab-pane-->
                                </div>
                                <!--/tab-content-->
                            </div>
                            <form id="logout-form" action="../logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Logout Modal-->
                <div class="modal fade" id="ultimateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <!--/col-3-->
                                <div class="col-sm-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                            <p class="text-justify text-black">
                                                Hello, to upgrade your Elite Capital trading account to <strong>ULTIMATE</strong>,
                                                please
                                                contact our Live
                                                Chat agent to receive the appropriate payment details. <strong>$50,000.00</strong>
                                            </p>
                                            <p class="text-justify bg-primary text-white p-2">
                                                For more information contact us immediately through our official email address
                                                info@elitecapital.online Thank you for using Elite Capital
                                            </p>
                                            <div class="text-center">

                                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary text-center">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/tab-pane-->
                                </div>
                                <!--/tab-content-->
                            </div>
                            <form id="logout-form" action="../logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-secondary shadow-lg" style="background-color: #374f65 !important">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto text-white">
                        <span>Copyright &copy; Elite Capital <script>
                                document.write(new Date().getFullYear());
                            </script></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Yes</a>
                </div>
                <form id="logout-form" action="../logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">
                </form>
            </div>
        </div>
    </div>

    <?php include('walletfund.php')?>
    <div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Amount to Withdraw</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--/col-3-->
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <!-- Form Starts -->
                                <form method="#">
                                    <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz"> <!-- Input Field Starts -->
                                    <div class="form-group">
                                        <label for="amount">Amount in USD</label>
                                        <input id="amount" type="number" class="form-control " name="amount" value="" required autocomplete="amount" autofocus>


                                    </div>
                                    <!-- Input Field Ends -->

                                    <!-- Input Field Starts -->
                                    <div class="form-group">
                                        <label for="address">Btc Address</label>
                                        <input id="address" type="text" class="form-control " name="address" value="" required autocomplete="address" autofocus>


                                    </div>
                                    <!-- Input Field Ends -->



                                    <!-- Submit Form Button Starts -->
                                    <div class="form-group">
                                        <!--<input class="btn btn-primary" name="_s_up" type="submit" value="Withdraw"-->
                                        <!--    style="width: 100%;">-->
                                        <button class="btn btn-primary" id="mybtnWith">Withdraw Now</button>

                                    </div>
                                    <!-- Submit Form Button Ends -->
                                </form>
                                <!-- Form Ends -->
                            </div>
                        </div>
                        <!--/tab-pane-->
                    </div>
                    <!--/tab-content-->
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var btn = document.getElementById('mybtnWith');
        btn.addEventListener('click', myswal)

        function myswal(e) {
            e.preventDefault();

            swal("NOTICE!", "Please contact the admin on info@elitecapital.online ", "warning");
            console.log('someVarName');
        }
    </script>
    <!-- Logout Modal-->
    <div class="modal fade" id="trialModal" tabindex="-1" role="dialog" aria-labelledby="trialModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Amount to deposit</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--/col-3-->
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <strong>You can start a free trial by depositing from $100 - $499.
                                </strong>
                                <!-- Form Starts -->
                                <form method="POST" action="../wallet/fund">
                                    <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz"> <!-- Input Field Starts -->
                                    <div class="form-group">
                                        <label for="amount">Amount in USD</label>
                                        <input id="amount" type="number" class="form-control " name="amount" value="" required autocomplete="amount" autofocus>


                                    </div>
                                    <!-- Input Field Ends -->



                                    <!-- Submit Form Button Starts -->
                                    <div class="form-group">
                                        <input class="btn btn-primary" name="_s_up" type="submit" value="Deposit" style="width: 100%;">
                                    </div>
                                    <!-- Submit Form Button Ends -->
                                </form>
                                <!-- Form Ends -->
                            </div>
                        </div>
                        <!--/tab-pane-->
                    </div>
                    <!--/tab-content-->
                </div>
                <form id="logout-form" action="../logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">
                </form>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/custom2.js"></script>
    <script src='../js/notification.js'></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>