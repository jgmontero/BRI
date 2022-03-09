<?php

session_start();
include "../backend/db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Customer Register Page - BRI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/microscopeIcon.jpg" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- CSS modal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Gp - v4.6.0
    * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="../index.php">BRI<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="../index.php#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="../index.php#about">About</a></li>
                <li><a class="nav-link scrollto" href="../index.php#services">Services</a></li>
                <li><a class="nav-link scrollto " href="../index.php#studies">Studies</a></li>
                <li><a class="nav-link scrollto" href="../index.php#team">Team</a></li>
                <?php
                $user = $_SESSION["user"];
                $sql = "SELECT * FROM `customers` WHERE email = '{$user}' ";
                $resultSet = mysqli_query($connection, $sql);
                $row = mysqli_fetch_row($resultSet);
                if ($row[18] == "1") { ?>
                    <li class="dropdown"><a><span>Management</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="./studies_page.php">Studies management</a></li>
                            <li><a href="./user_management">User Management</a></li>
                        </ul>
                    </li>
                <?php }
                ?>
                <li><a class="nav-link scrollto" href="../index.php#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="../index.php#about" class="get-started-btn scrollto">Get Started</a>

    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2><?php echo !empty($_POST['pk_customer']) ? "Update" : "Add" ?> Customer Management Page</h2>
                <ol>
                    <li><a href="../index.php">Home</a></li>
                    <li>Customers</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <?php
        $row = null;

        if (!empty($_POST['pk_customer'])) {
            $pk_customer = $_POST['pk_customer'];
            $sql = "SELECT * FROM `customers` where pk_customers = {$pk_customer}";
            $resultSet = mysqli_query($connection, $sql);
            $row = mysqli_fetch_row($resultSet);
        }
        //print_r($row);

        ?>
        <div class="container" style="margin-left: 1px;">
            <div id="add_customer" style="margin-top: 15px;">
                <form action="../backend/customer_register.php" onsubmit="return CheckRegister(this)" method="post" class="formulario__register">
                    <input type="hidden" style="cursor: pointer; " name="action"
                           value="<?php echo !empty($_POST['pk_customer']) ? "upt" : "add" ?>"/>
                    <input type="hidden" style="cursor: pointer; " name="pk_customer"
                           value="<?php echo !empty($_POST['pk_customer']) ? $_POST['pk_customer'] : "" ?>"/>

                    <input type="hidden" style="cursor: pointer; " name="is_admin"
                           value="<?php echo !empty($_POST['pk_customer']) ? $_POST['is_admin'] : "" ?>"/>

                    <input type="checkbox" id="update_email_chkbox" style="<?php echo empty($_POST['pk_customer']) ? 'display:none' :  'display:block'?>"
                           name="update_email_chkbox" onclick="UpdateEmailToggle()">
                    <label for="update_email_chkbox" style="<?php echo empty($_POST['pk_customer']) ? 'display:none' :  'display:block'?>">New Email?</label>

                   <div style="<?php echo empty($_POST['pk_customer']) ? 'display:block' :  'display:none'?>" id="upt_email_div">
                       <input id="email_input" class="form-control" type="text" placeholder="Email" name="email"
                              value="<?php echo !empty($_POST['pk_customer']) ? $row[0] : "" ?>">
                   </div>



                    <input type="checkbox" style="<?php echo empty($_POST['pk_customer']) ? 'display:none' :  'display:block'?>" id="update_pass_chkbox" name="update_pass_chkbox" onclick="UpdatePassToggle()">
                    <label for="update_pass_chkbox" style="<?php echo empty($_POST['pk_customer']) ? 'display:none' :  'display:block'?>" id="update_pass_chkbox_label">New Pass?</label>
                    <div style="<?php echo empty($_POST['pk_customer']) ? 'display:block' :  'display:none'?>" id="upt_pass_div">
                        <input id="pass_input" class="form-control" type="password" placeholder="Type new password" name="pass">
                        <input id="confirm_pass_input" class="form-control" type="password" placeholder="Confirm new password"
                               name="pass_confirm">
                    </div>

                    <input class="form-control" type="text" placeholder="First name" name="first_name" required
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[2] : "" ?>">

                    <input class="form-control" type="text" placeholder="Last name" name="last_name" required
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[3] : "" ?>">
                    <div>
                        <input type="radio" id="sextChoice1" name="female" value="1" style="width: auto;"
                            <?php echo !empty($_POST['pk_customer']) && $row[5] == 1 ? "checked" : "" ?>>
                        <label for="sextChoice1">Female</label>

                        <input type="radio" id="sextChoice2" name="female" value="0" style="width: auto;"
                            <?php echo !empty($_POST['pk_customer']) && $row[5] == 1 ? "" : "checked" ?>>
                        <label for="sextChoice2">Male</label>
                    </div>
                    <p class="date_of_birth" style="text-align: center;">Date of birth:</p>
                    <input class="form-control" type="date" name="date_of_birth" id="date_of_birth"
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[4] : "" ?>" required>
                    <input class="form-control" type="number" step=".01" placeholder="Weight (Kgs)" name="weightKG"
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[6] : "" ?>" required>
                    <input class="form-control" type="text" placeholder="Height (feet)" name="heightft"
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[7] : "" ?>" required>
                    <input class="form-control" type="text" placeholder="Address" name="address"
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[8] : "" ?>" required>
                    <input class="form-control" type="text" placeholder="City" name="city"
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[9] : "" ?>" required>
                    <input class="form-control" type="text" placeholder="State" name="state"
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[10] : "" ?>" required>
                    <input class="form-control" type="text" placeholder="Zip code" name="zip_code"
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[11] : "" ?>" required>
                    <input class="form-control" type="text" placeholder="Country" name="country"
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[12] : "" ?>" required>
                    <input class="form-control" type="text" placeholder="Phone" name="phoneN"
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[13] : "" ?>" required>
                    <input class="form-control" type="text" placeholder="Language" name="language" r
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[14] : "" ?>" equired>
                    <input class="form-control" type="text" placeholder="Communication" name="communication"
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[15] : "" ?>" required>
                    <input class="form-control" type="text" placeholder="Contact time" name="contact_time"
                           value="<?php echo !empty($_POST['pk_customer']) ? $row[16] : "" ?>" required>
                    <button class="btn btn-success "><?php echo empty($_POST['pk_customer']) ? "Add customer" : "Update Customer" ?></button>
                </form>
            </div>
        </div>

        <hr/>


        </div>


    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>BRI<span>.</span></h3>
                        <p>
                            A108 Adam Street <br>
                            NY 535022, USA<br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="../index.php#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="../index.php#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="../index.php#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="../index.php#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="../index.php#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>BRI</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/purecounter/purecounter.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

<!-- sweetalert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</html>