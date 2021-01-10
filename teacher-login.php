
<?php
require "db_connection.php";

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Teacher Login</title>

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
    <div class="page-content--bge5">
        <div class="container">

            <div class="login-wrap">
                <div class="login-content">

                    <?php
                    if($_POST){
                        $kullaniciAdi = $_POST['teacher_email'];
                        $sifre = $_POST['teacher_password'];

                        $giris = "select * from teacher_informations where teacher_email = '$kullaniciAdi' AND teacher_password = '$sifre'";
                        $son = $db ->query($giris);

                        if($son->num_rows>0){
                            session_start();
                            while($row = $son ->fetch_assoc()){
                                $_SESSION['teacher_id'] = $row['teacher_id'];
                                $_SESSION['oturum'] = true;
                                header("location:teacher-panel.php");
                            }
                        }else{
                            echo '<div class="alert alert-danger" role="alert">' .
                                'Some required information is missing or incomplete. Please correct your entries and try again. <a href="mailto:yagiz@vagonstudio.co" style="color:black;"></a>' . '</div>';
                        }

                    }
                    ?>
                    <div class="login-form">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label style="text-align: center;"><b>Teacher Login</b></label>
                                <input class="au-input au-input--full" type="email" name="teacher_email" placeholder="email:">
                            </div>
                            <div class="form-group">
                                <label></label>
                                <input class="au-input au-input--full" type="password" name="teacher_password" placeholder="password:">
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">Login</button>
                        </form>
                    </div>
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
<!-- end document-->