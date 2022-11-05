<?php
session_start();
error_reporting(0);
include('../includes/dbconnect.php');
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

    <title>Elite Capital - Verification</title>
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


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
     <?php include ('sidebar.php')?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="bg-dark" style="background-color: #25204a !important">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-secondary topbar static-top shadow text-white" style="background-color: #374f65 !important">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <div>
                        Account Status - <span class="text-capitalize font-weight-bold text-white"><?php echo $row->status?></span>

                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw text-white"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">0</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notification
                                </h6>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Click on each to mark as read</a>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="mr-2 d-none d-lg-inline text-white small"><?php if($row->status!='ACTIVE'){ echo 'NOT ACTIVE';}else{echo  $row->status;}?></span>
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-white "></i>


                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="change-password">
                                    <i class="fa fa-key fa-sm fa-fw mr-2 text-dark"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark"></i>
                                    Logout
                                </a>
                                <div class="dropdown-divider"></div>

                            </div>
                        </li>

                    </ul>

                </nav>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-white">Upload Means of Identification</h1>


                    </div>


                    <!-- Content Row -->
                    <div class="row">


                    </div>
                    <!-- Content Row -->
                    <div class="container bootstrap snippet">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active row mt-2 text-white" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <p>Verify your account by uploading a valid Means of Identification.
                                </p>
                                <!--/col-3-->


                                <div class="col-sm-12 text-white">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                            <!-- Form Starts -->
                                            <form method="POST" enctype="multipart/form-data" action="upload-id">
                                                <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz"> <!-- Input Field Starts -->
                                                <div class="form-group">
                                                    <label for="documentName">Name Of Document</label>
                                                    <input id="documentName" type="text" class="form-control " name="documentName" required autofocus>

                                                </div>
                                                <!-- Input Field Ends -->
                                                <!-- Input Field Starts -->
                                                <div class="form-group">
                                                    <label for="documentFront">Document Front Page</label>
                                                    <input id="documentFront" type="file" class="form-control " name="documentFront" required>

                                                </div>
                                                <!-- Input Field Ends -->

                                                <!-- Input Field Starts -->
                                                <div class="form-group">
                                                    <label for="documentBack">Document Back Page</label>
                                                    <input id="documentBack" type="file" class="form-control " name="documentBack" required>

                                                </div>
                                                <!-- Input Field Ends -->

                                                <!-- Submit Form Button Starts -->
                                                <div class="form-group">
                                                    <input class="btn btn-primary" name="verify" type="submit" value="Verify Account" style="width: 100%;">
                                                </div>
                                                <!-- Submit Form Button Ends -->
                                            </form>
                                            <!-- Form Ends -->
                                        </div>
                                    </div>
                                    <!--/tab-pane-->
                                </div>

                                <!--here-->



                                <!--here-->
                            </div>



                        </div>
                    </div>



                </div>
                <!-- /.container-fluid -->
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
                    <a class="btn btn-primary" href="logout" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Yes</a>
                </div>
                <form id="logout-form" action="logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">
                </form>
            </div>
        </div>
    </div>
    <?php include ('walletfund.php')?>  
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

            swal("NOTICE!", "Please contact the admin on info@elitecapitalsinvest.online ", "warning");
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
                                <form method="POST" action="wallet/fund/trial">
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
                <form id="logout-form" action="logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">
                </form>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/custom2.js"></script>
    <script src='js/notification.js'></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>