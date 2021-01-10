<?php require_once ("db_connection.php");
require_once("logout.php");

session_start();

if(!isset($_SESSION['oturum'])){
    header("location:teacher-login.php");
}else{

    $teacher_id = $_SESSION['teacher_id'];
    $details = $db -> query("SELECT  student_informations.student_name, enrolled_courses.enrollment_id, enrolled_courses.enrollment_date FROM enrolled_courses, student_informations WHERE student_informations.student_id = enrolled_courses.student_id && enrolled_courses.course_id = '$teacher_id'");
    $numberOfStudent =  $db -> query("SELECT COUNT(student_informations.student_name) FROM enrolled_courses, student_informations WHERE student_informations.student_id = enrolled_courses.student_id && enrolled_courses.course_id = '$teacher_id'");
    $totalSales = $db -> query("SELECT COUNT(enrolled_courses.enrollment_id) FROM enrolled_courses, student_informations WHERE student_informations.student_id = enrolled_courses.student_id && enrolled_courses.course_id = '$teacher_id'");
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
                        <a class="js-arrow" href="teacher-panel.php">
                            <i class="fas fa-tachometer-alt"></i>Detailed Analysis</a>
                    </li>
                    <li>
                        <a href="course-settings.php">
                            <i class="fas fa-chart-bar"></i>Course Settings</a>
                    </li>
                    <li>
                        <a href="lecture-settings.php">
                            <i class="far fa-check-square"></i> Lecture Settings</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="student-settings.php">
                            <i class="fas fa-copy"></i> Student Settings </a>
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
                        <a class="js-arrow" href="teacher-panel.php">
                            <i class="fas fa-tachometer-alt"></i>Detailed Analysis</a>
                    </li>
                    <li>
                        <a href="course-settings.php">
                            <i class="fas fa-chart-bar"></i>Course Settings
                        </a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="lecture-settings.php">
                            <i class="fas fa-desktop"></i>Lecture Settings</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="student-settings.php">
                            <i class="fas fa-copy"></i> Student Settings </a>
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
                    <div class="row m-t-25">

                        <div class="col-6 col-xs-6 col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c3">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-calendar-note"></i>
                                        </div>
                                        <div class="text">
                                            <h2>20.01.2021</h2>
                                            <span>next payment date</span>
                                            <div style="height:20px"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="title-1 m-b-25">Detailed Sales</h2>
                            <div class="table-responsive table--no-card m-b-40">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                    <tr>
                                        <th>enrollment id</th>
                                        <th >enrollment date</th>
                                        <th class="text-right">student name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($last = $details->fetch_assoc()):
                                        echo '<tr>'.
                                            '<td>' . $last['enrollment_id'] . '</td>'.
                                            '<td>' . $last['enrollment_date'] . '</td>'.
                                            '<td>' . $last['student_name'] . '</td>' .
                                            '</tr>';
                                    endwhile;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align:center;">
                    <a class="logo" href="welcome.php">
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