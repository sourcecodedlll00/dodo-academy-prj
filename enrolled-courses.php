<?php require_once ("db_connection.php");
require_once("logout.php");

session_start();

if(!isset($_SESSION['oturum'])){
    header("location:student-login.php");
}else{

$id = $_SESSION['id'];

$enrolled_courses = $db->query("SELECT course_name, course_description, course_informations.course_id
FROM course_informations, student_informations, enrolled_courses
WHERE enrolled_courses.student_id = student_informations.student_id && enrolled_courses.course_id = course_informations.course_id && student_informations.student_id = '$id'");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none" style="background-color:white">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="enrolled-courses.php">
                            <img src="images/icon/dodo-akademi-logo.png" alt="Dodo Akademi Logo" style="height:60px; width:auto;" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Enrolled Courses</a>
                        </li>
                        <li>
                            <a href="purchase-history.php">
                                <i class="fas fa-chart-bar"></i>Detaylı Analiz</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Haftalık Görevler</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Raporlar</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Feedback Form</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/dodo-akademi-logo.png" alt="Dodo Akademi Logo" style="height:60px; width:auto;" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="enrolled-courses.php">
                                <i class="fas fa-tachometer-alt"></i>Enrolled Courses</a>
                        </li>
                        <li>
                            <a href="purchase-history.php">
                                <i class="fas fa-chart-bar"></i>Purchase History
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="change-profile.php">
                                <i class="fas fa-desktop"></i>Profile Settings</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="feedback-form.php">
                                <i class="fas fa-copy"></i>Feedback Form</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header">

                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">

                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">

                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power">Logout</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                                <?php
                                while($son = $enrolled_courses->fetch_assoc()){
                                    ?>
                                <div class="col-md-4">
                                    <div class="card">
                                     <img class="card-img-top" src="images/icon/course-image.webp" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title mb-3"><?php echo $son['course_name']?></h4>
                                            <p class="card-text"> <?php echo $son['course_description'];?></p>
                                            <a href="single-course-details.php?course_id=<?php echo $son['course_id']?>">Detayları Gör</a>
                                    </div>
                                </div>
                            </div>
                                <?php
                                }?>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align:center;">
                        <a class="logo" href="enrolled-courses.php">
                            <img src="images/icon/dodo-akademi-logo.png" alt="Dodo Akademi Logo" style="height:60px; width:auto;" />
                        </a>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>