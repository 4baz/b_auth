
<!DOCTYPE html>


<html lang="en">
<?php
//include '../credentials.php';
require '../bauth.php';
require '../../b_auth/usercount.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['un'])) {
    die("not logged in");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../../");
    exit();
}

//$numKeys = $_SESSION["numUsers"];
//$numUsers = $_SESSION["numKeys"];
//$numOnlineUsers = $_SESSION["numOnlineUsers"];

$username = $_SESSION["user_data"]["username"];
$email = $_SESSION["user_data"]["email"];
$expiry = $_SESSION["user_data"]["expires"];

//hwid reset needs to be added
//reset password needs to be added

// launcher download
//menu version and launcher version

//any issues contact us on discord

if (isset($_POST['download'])) {

$file = '';


if (file_exists($file) && $expiry > date()) {

    echo("<script>history.replaceState({},'','');</script>");


  //header('Content-Description: File Transfer');
   // header('Content-Type: application/octet-stream');
   // header('Content-Disposition: attachment; filename="'.basename($file).'"');
   // header('Expires: 0');
   // header('Cache-Control: must-revalidate');
   // header('Pragma: public');
   // header('Content-Length: ' . filesize($file));
   // readfile($file);

  //  exit;
}
die();

}

//shows download button if user data is valid

$dlstyle = "style='display:none;'";

if($expiry > date()){

    $dlstyle = "";

}

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>bauth | Panel</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <script src="./unixtolocal.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                  <!--  <i class="fas fa-laugh-wink"></i>-->
                </div>
                <div class="sidebar-brand-text mx-3">bauth<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Cheats
            </div>
 <!-- Nav Item - Charts -->
 <li class="nav-item">
    <a class="nav-link" href="gta5.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Grand Theft Auto 5</span></a>
</li>

  <!-- Divider -->
  <hr class="sidebar-divider">
     <!-- Heading -->
     <div class="sidebar-heading">
        STORE
    </div>
    <li class="nav-item">
        <a class="nav-link" href="resellers.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Resellers</span></a>
    </li>

    <hr class="sidebar-divider">



            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <span>Join the Discord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
 <li class="nav-item" <?php echo $dlstyle;?>>

 <a class="nav-link" href="#">
                    <span>Download Launcher</span></a>


            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">


                <button  class="rounded-circle border-0" id="sidebarToggle"></button>




  </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-black topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white-800 small"><?php echo $username; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>-->
                               <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>-->
                              <!--  <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-white-800"></i>
                                    Logout
                                </a>
                                <a class="dropdown-item" ></a>
                                <a class="dropdown-item" ></a>

                                <a class="dropdown-item" href="../../../b_auth/reset_user.php">
                                    <i class="fas  fa-sm fa-fw mr-2 text-white-800"></i>
                                    Reset Password
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Registrations</div>
                                            <div class="h5 mb-0 font-weight-bold text-white-800"><?php   echo "$totalusers";    ?></div>
                                        </div>
                                        <div class="col-auto">
                                          <!--  <i class="fas fa-calendar fa-2x text-gray-300"></i>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Logins</div>
                                            <div class="h5 mb-0 font-weight-bold text-white-800"><?php   echo "$totalonline";    ?></div>
                                        </div>
                                        <div class="col-auto">
                                          <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Subscription Expires</div>
                                            <div class="h5 mb-0 font-weight-bold text-white-800">

                                            <script>

                            //professional javaskript\

                            var expiry = convertTimestamp(<?php echo $expiry; ?>);

                            if(expiry == "NaN-aN-aN @ NaN:aN AM"){
                                expiry = "LIFETIME"; //doesnt work kekw
                            }


                            document.write(expiry);</script>

                        <?php

                       echo  date("d-m-Y",$expiry);?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                          <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Cheat Status</div>
                                            <div class="h5 mb-0 font-weight-bold text-white-800">ONLINE</div>
                                        </div>
                                        <div class="col-auto">
                                          <!-- <i class="fas fa-comments fa-2x text-gray-300"></i>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
  <!-- Page Heading -->
  <!--<h1 class="h3 mb-4 text-gray-800">My Cheats</h1>-->
                    <div class="row">



                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold " style="color:blueviolet ">RESELLERS</h6>
                                </div>
                                <div class="card-body">
                                    <p>ayo
                                    </p>
                                    <p class="mb-0">Once a key has been purchased in can be redeemed on the specified  page found in the side bar or the sections bellow </p>
                                   <br>
                                        <a href="resellers.php" class="btn btn-secondary btn-icon-split btn-lg">
                                            <span class="icon text-white-50">
                                                <i class="fas  fa-shopping-cart"></i>
                                            </span>
                                            <span class="text">Resellers</span>
                                        </a>






                                </div>
                            </div>
                              <!-- Project Card Example -->
                              <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold" style="color:blueviolet ">Grand Theft Auto 5</h6>
                                </div>
                                <div class="card-body">
                                    <p>some text here</p>
                                    <p class="mb-0">some text heree</p>
                                   <br>
                                        <a href="gta5.php" class="btn btn-secondary btn-icon-split btn-lg">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <span class="text">Grand Theft Auto 5</span>
                                        </a>






                                </div>
                            </div>
<br><br>
                            <!-- Color System -->
                            <div class="row">




                            <!--    <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>-->
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold " style="color:blueviolet ">Youtube Previews:</h6>
                                </div>
                                <div class="card-body">
                                    <p></p>
                                    <iframe width="750" height="400" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <br><br>

                                </div>
                            </div>



                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-black">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>bauth &copy; 2022</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <!--   <a class="btn btn-primary" href="login.html">Logout</a>-->


                    <form method="post" style="margin-top: 12px; ">
                    <button name="logout" class="btn btn-primary">Log out</button>
                    </form>


                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
