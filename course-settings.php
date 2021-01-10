<?php require_once ("db_connection.php");
require_once("logout.php");

session_start();


if(!isset($_SESSION['oturum'])){
    header("location:teacher-login.php");
}else{

    $teacher_id = $_SESSION['teacher_id'];
    $courseName = $db -> query("SELECT course_name FROM course_informations WHERE teacher_id = '$teacher_id'");
    $coursePrice = $db -> query("SELECT course_price FROM course_informations WHERE teacher_id = '$teacher_id'");
    $courseDescription = $db -> query("SELECT course_description FROM course_informations WHERE teacher_id = '$teacher_id'");

    if(isset($_POST['update'])){

        $course_Name = $_POST['course_name'];
        $course_Price = $_POST['course_price'];
        $course_Description = $_POST['course_description'];

        $updateCourseDetails = $db -> query("UPDATE course_informations SET course_price= '$course_Price',course_name ='$course_Name',course_description='$course_Description' WHERE teacher_id = '$teacher_id'");
        header("Refresh:0");
    }
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
                    <li>
                        <a class="js-arrow" href="teacher-panel.php">
                            <i class="fas fa-tachometer-alt"></i>Detailed Analysis</a>
                    </li>
                    <li class="active has-sub">
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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Edit Course Details</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="course-settings.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Course Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="course_name" placeholder="Text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Course Price</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="course_price" placeholder="Text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="course_description" class=" form-control-label">Course Description</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="course_description" id="text-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <button type="Submit" name="update" href="course-settings.php" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Updated</strong> Version
                                </div>
                                <div class="card-body card-block">
                                    <form action="" method="post" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf-email" class=" form-control-label">Course Name:</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <span class="help-block"><?php while($son = $courseName->fetch_assoc()){
                                                        echo $son['course_name'];}?></span>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf-email" class=" form-control-label">Course Price:</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <span class="help-block"><?php while($son = $coursePrice->fetch_assoc()){
                                                        echo $son['course_price'];}?></span>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf-email" class=" form-control-label">Course Description:</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <span class="help-block"><?php while($son = $courseDescription->fetch_assoc()){
                                                        echo $son['course_description'];}?></span>
                                            </div>
                                        </div>
                                </div>
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
