<?php
require '../functions/includes.php';

require '../session.php';

session::check();

$c_con = get_connection();

$app_to_manage = session::program_key();

if(!$app_to_manage)
    header('Location: index.php');

if(isset($_POST['new_var_value'])){
    $var_to_edit = encryption::static_decrypt($_POST['edit_var']);

    $var_resp = api\admin\update_var($c_con, $app_to_manage, $var_to_edit, $_POST['new_var_value']);

    if($var_resp === 'empty_data')
        functions::box('The new var value is empty', 3);
    else
        functions::box('Updated the var successfully', 2);

    unset($_POST['edit_var']);
}

if(isset($_POST['create_var'])) {
    $var_resp = api\admin\create_var($c_con, $app_to_manage, $_POST['var_name'], $_POST['var_value']);

    switch ($var_resp) {
        case 'empty_data':
            functions::box('Empty data', 3);
            break;

        case 'maximum_vars_reached':
            functions::box('Maximum vars reached', 3);
            break;

        case 'var_already_exists':
            functions::box('Var already exists', 3);
            break;

        case responses::success:
            functions::box('Created the var successfully', 2);
            break;

        default:
            functions::box('Unknown response', 3);
            break;
    }
}

if(isset($_POST['delete_var'])) {
    $var_to_delete = encryption::static_decrypt($_POST['delete_var']);

    api\admin\delete_var($c_con, $app_to_manage, $var_to_delete);

    functions::box('Deleted the var successfully', 2);
}

?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="cAuth - A secure authentication system for C#, C++ and PHP">
    <meta name="keywords" content="licensing, auth system, hwid lock, secure, licensing solution, easy to setup">

    <meta property="og:title" content="cAuth Authentication System" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://cauth.me/assets/images/logo-white.png" />
    <meta property="og:description" content="cAuth - A secure authentication system for C#, C++ and PHP" />
    <meta property="og:site_name" content="cAuth Authentication System" />
    <meta property="og:url" content="https://cauth.me"/>
    <link rel="icon" href="https://cauth.me/assets/images/logo-white.png" type="image/gif" sizes="16x16">
    <!-- /meta tags -->
    <title> cAuth - Dashboard</title>

    <!-- Font Icon Styles -->
    <link rel="stylesheet" href="../assets/fonts/noir-pro/styles.css">
    <link rel="stylesheet" href="../plugins/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendor/gaxon-icon/styles.css">
    <!-- /font icon Styles -->

    <!-- Perfect Scrollbar stylesheet -->
    <link rel="stylesheet" href="../plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <!-- /perfect scrollbar stylesheet -->

    <link rel="stylesheet" type="text/css" href="../plugins/owl.carousel/css/owl.carousel.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../plugins/chartist/css/chartist.min.css" media="all" />

    <link rel="stylesheet" href="../assets/css/default/theme-semidark.min.css">

    <script>
        var rtlEnable = '';
        var $mediaUrl = window.location.origin + '/';
        var $baseUrl = window.location.origin + '/';
        var current_path = window.location.href.split(window.location.origin + '/').pop();
        if (current_path == '') {
            current_path = 'index.php';
        }
    </script>
    <style>
        th, td {
            white-space: nowrap;
        }
    </style>

    <script src="../plugins/jquery/js/jquery.min.js"></script>
    <script src="../plugins/moment/js/moment.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Perfect Scrollbar jQuery -->
    <script src="../plugins/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <!-- /perfect scrollbar jQuery -->

    <link rel="stylesheet" type="text/css" href="../plugins/datatables.net-bs4/css/dataTables.bootstrap4.css" media="all" />

</head>
<body class="dt-layout--default dt-sidebar--fixed dt-header--fixed">
<!-- Loader -->
<div class="dt-loader-container">
    <div class="dt-loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
    </div>
</div>
<!-- /loader -->
<!-- Root -->
<div class="dt-root">
    <div class="dt-root__inner">
        <!-- Header -->
        <header class="dt-header">

            <!-- Header container -->
            <div class="dt-header__container">

                <!-- Brand -->
                <div class="dt-brand">

                    <!-- Brand tool -->
                    <div class="dt-brand__tool" data-toggle="main-sidebar">
                        <div class="hamburger-inner"></div>
                    </div>
                    <!-- /brand tool -->

        <span class="dt-brand__logo">
        <a class="dt-brand__logo-link" href="index.php">
          <img class="dt-brand__logo-img d-none d-sm-inline-block" src="../assets/images/logo-white.png" alt="cAuth">
          <img class="dt-brand__logo-symbol d-sm-none" src="../assets/images/logo-white.png" alt="cAuth">
        </a>
      </span>

                </div>
                <!-- /brand -->

                <!-- Header toolbar-->
                <div class="dt-header__toolbar">

                    <!-- Header Menu Wrapper -->
                    <div class="dt-nav-wrapper">
                        <!-- Header Menu -->
                        <ul class="dt-nav d-lg-none">
                            <li class="dt-nav__item dt-notification-search dropdown">

                                <!-- Dropdown Link -->
                                <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"> <i class="icon icon-search icon-fw icon-lg"></i> </a>
                                <!-- /dropdown link -->

                                <!-- Dropdown Option -->
                                <div class="dropdown-menu">

                                </div>
                                <!-- /dropdown option -->

                            </li>
                        </ul>
                        <!-- /header menu -->

                        <!-- Header Menu -->
                        <?php
                            functions::display_news();

                            functions::display_user_data(session::username(), session::premium(), session::admin() );
                        ?>
                        <!-- /header menu -->
                    </div>
                    <!-- Header Menu Wrapper -->

                </div>
                <!-- /header toolbar -->

            </div>
            <!-- /header container -->

        </header>
        <!-- /header -->
        <!-- Site Main -->
        <main class="dt-main">
            <!-- Sidebar -->
            <aside id="main-sidebar" class="dt-sidebar">
                <div class="dt-sidebar__container">

                    <!-- Sidebar Navigation -->
                    <ul class="dt-side-nav">

                        <!-- Menu Header -->
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">main</span>
                        </li>
                        <!-- /menu header -->

                        <li class="dt-side-nav__item">
                            <a href="index.php" class="dt-side-nav__link">
                                <i class="icon icon-dashboard icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Dashboard</span>
                            </a>
                        </li>

                        <?php functions::display_classes(); ?>

                        <li class="dt-side-nav__item">
                            <a href="" class="dt-side-nav__link">
                                <i class="icon icon-layout icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Help</span>
                            </a>
                        </li>

                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Management</span>
                        </li>

                        <?php functions::display_pr_tabs(); ?>

                    </ul>
                    <!-- /sidebar navigation -->

                </div>
            </aside>
            <!-- /sidebar -->
            <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">
                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Dashboard - Vars</h1>
                    </div>
                    <!-- /page header -->

                    <form method="post">
                        <div class="row">
                            <div class="col-xl-10 col-sm-10 col-2">
                                <div class="dt-card">
                                    <div class="dt-card__header">
                                        <div class="card-header bg-transparent">
                                            <h3 class="card-title">Vars Creating Form : </h3>
                                            <h5 class="card-subtitle mb-0">Here is where you can create server sided variables to be used with the client-sided's API versions</h5>
                                        </div>
                                    </div>
                                    <div class="dt-card__body">
                                        <div class="form-group">
                                            <label for="var_name">Variable Name</label>
                                            <input type="text" class="form-control" id="var_name" name="var_name" placeholder="Variable Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="var_value">Variable Value</label>
                                            <input type="text" class="form-control" id="var_value" name="var_value" placeholder="Variable Value">
                                        </div>
                                        <button type="submit" name="create_var" class="btn btn-primary text-uppercase">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <br>

                    <form method="post">
                        <div class="row">
                        <div class="col-xl-10 col-sm-10 col-2">
                            <div class="dt-card">
                                <div class="dt-card__header">
                                    <div class="card-header bg-transparent">
                                        <h3 class="card-title">Vars Management : </h3>
                                        <h5 class="card-subtitle mb-0">Here is where all the variables generated are listed, you can edit their value and delete them too</h5>
                                    </div>
                                </div>
                                <div class="dt-card__body">
                                    <div class="card-body mb-1 pt-0">
                                        <div class="table-responsive mb-0 pt-0" >
                                            <table id="data_table" class="table table-dark mb-0 pt-5" style="background-color: #23293f;">
                                                <thead>
                                                <tr>
                                                    <th class="text-uppercase" scope="col">Name</th>
                                                    <th class="text-uppercase" scope="col">Value</th>
                                                    <th class="text-uppercase" scope="col">Edit</th>
                                                    <th class="text-uppercase" scope="col">Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $all_vars = api\fetch\fetch_and_decrypt_all_vars($c_con, $app_to_manage);
                                                foreach($all_vars as $pro_row){
                                                    ?><tr>
                                                        <td><?php echo $pro_row['c_name']; ?></td>
                                                        <td><?php echo $pro_row['c_value']; ?></td>
                                                        <td><button class="btn btn-primary text-uppercase" name="edit_var" value="<?php echo encryption::static_encrypt($pro_row['c_name']); ?>"> Edit</button></td>
                                                        <td><button class="btn btn-primary text-uppercase" name="delete_var" value="<?php echo encryption::static_encrypt($pro_row['c_name']); ?>"> Delete</button></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /tables -->
                                        <?php if(isset($_POST['edit_var'])) { ?>
                                            <div class="form-group">
                                                <label for="new_var_value">New var value :</label>
                                                <input class="form-control" type="text" placeholder="New value" name="new_var_value" id="new_var_value">
                                            </div>
                                            <input type="hidden" name="edit_var" value="<?php echo functions::xss_clean($_POST['edit_var']); ?>"/>
                                            <button class="btn btn-primary text-uppercase"> Change</button> <br> <br>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>
                <!-- /grid -->

            </div>
        </main>
    </div>
</div>
<!-- /root -->

<!-- /contact user information -->    <!-- masonry script -->
<script src="../plugins/masonry-layout/js/masonry.pkgd.min.js"></script>
<script src="../plugins/sweetalert2/js/sweetalert2.js"></script>
<script src="../assets/js/default/functions.js"></script>
<script src="../assets/js/default/customizer.js"></script>

<script src="../assets/js/default/script.js"></script>
<script src="../plugins/chartist/js/chartist.min.js"></script>
<script src="../plugins/owl.carousel/js/owl.carousel.min.js"></script>
<script src="../assets/js/global/charts/dashboard-listing.js"></script>
<script src="../plugins/datatables.net/js/jquery.dataTables.js"></script>
<script src="../plugins/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready(function() {
            $('#data_table').DataTable( {
                "autoWidth": true,
                "paging":   true,
                "ordering": false,
                "info":     false,
                "bFilter": true
            } );
        }
    );</script>
</body>

</html>
