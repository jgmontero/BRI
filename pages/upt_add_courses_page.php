<?php
session_start();
include "../backend/db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Courses Register Page - BRI</title>
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
<div>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body</p>
                </div>
                <div class="modal-footer"
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close
                </button>
                <button type="button" class="btn btn-primary">Save changes
                </button>
            </div>
        </div>
    </div>
</div>
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
                <li><a class="nav-link scrollto " href="../index.php#portfolio">Portfolio</a></li>
                <li><a class="nav-link scrollto" href="../index.php#team">Team</a></li>
                <?php
                $user = $_SESSION["user"];
                $sql = "SELECT * FROM `customers` WHERE email = '{$user}' ";
                $resultSet = mysqli_query($connection, $sql);
                $row = mysqli_fetch_row($resultSet);
                if ($row[18] == "1") { ?>
                    <li class="dropdown"><a><span>Management</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="./courses_page.php">Courses management</a></li>
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
                <h2>Studies Management Page</h2>
                <ol>
                    <li><a href="../index.php">Home</a></li>
                    <li>Studies</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <?php
        $row = null;
        if ($_POST['pk_studies']) {
            $pk_studies = $_POST['pk_studies'];
            $sql = "SELECT * FROM `studies` where pk_studies = {$pk_studies}";
            $resultSet = mysqli_query($connection, $sql);
            $row = mysqli_fetch_row($resultSet);
        }
        //print_r($row);

        ?>
        <div class="container" style="margin-left: 1px;">
            <div id="add_studies" style="margin-top: 15px;">
                <form method="post" action='../backend/add_del_upt_study.php' onsubmit="<?php echo $_POST['pk_studies'] ? 'return Uptstudy(this);': 'return Addstudy(this);' ?>" >
                    <input type="hidden" style="cursor: pointer;" name="action"
                           value="<?php echo $_POST['pk_studies'] ? "upt" : "add"  ?>"/>
                    <div class="row">
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" id="study_number" class="form-control" name="study_num" required
                                       placeholder="Study number" value="<?php echo $_POST['pk_studies'] ? $row[4]: ""  ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="title" class="form-control" name="title" required
                                       placeholder="Title" value="<?php echo $_POST['pk_studies'] ? $row[1]: "" ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="date" id="s_date" class="form-control" name="s_date" required
                                       value="<?php echo $_POST['pk_studies'] ? $row[2]: ""  ?>" />
                                <label class="form-label" for="s_date" >Study start date</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="date" id="e_date" class="form-control" name="e_date" required
                                       value="<?php echo $_POST['pk_studies'] ? $row[3]: ""  ?>"/>
                                <label class="form-label" for="e_date">Study end date</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <div class="form-outline">
                                <input type="number" id="g_number" class="form-control" placeholder="Group number"
                                       required name="g_number" value="<?php echo $_POST['pk_studies'] ? $row[5]: ""  ?>"/>
                            </div>
                        </div>
                        <div class="col">

                            <div class="form-outline">
                                <input type="text" id="requirement" class="form-control" placeholder="Requirements"
                                       required value="<?php echo $_POST['pk_studies'] ? $row[6]: ""  ?>"
                                       name="requirement"/>
                            </div>
                        </div>
                        <div class="col">

                            <div class="form-outline">
                                <input type="number" id="stipend" class="form-control" placeholder="Stipend" required
                                       value="<?php echo $_POST['pk_studies'] ? $row[7]: ""  ?>"
                                       name="stipend"/>
                            </div>
                        </div>
                        <div class="col">

                            <div class="form-outline">
                                <input type="number" id="phase" class="form-control" placeholder="Phase" required
                                       value="<?php echo $_POST['pk_studies'] ? $row[9]: ""  ?>"
                                       name="phase"/>
                            </div>
                        </div>
                        <div class="col">

                            <div class="form-outline">
                                <input type="number" id="min_age" class="form-control" required
                                       placeholder="Minimum age" value="<?php echo $_POST['pk_studies'] ? $row[10]: ""  ?>"
                                       name="min_age"/>
                            </div>
                        </div>
                        <div class="col">

                            <div class="form-outline">
                                <input type="number" id="max_age" class="form-control" required
                                       placeholder="Maximum age" value="<?php echo $_POST['pk_studies'] ? $row[11]: ""  ?>"
                                       name="max_age"/>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col" style="margin-top: 15px;">

                            <div class="form-outline">
                                <input type="text" id="r_admin" required class="form-control"
                                       placeholder="Route of administration" value="<?php echo $_POST['pk_studies'] ? $row[13]: ""  ?>"
                                       name="r_admin"/>
                            </div>
                        </div>
                        <div class="col" style="margin-top: 15px;">
                            <div class="form-outline">
                                <input type="number" id="b_draws" required class="form-control"
                                       placeholder="Blood draws" value="<?php echo $_POST['pk_studies'] ? $row[14]: ""  ?>"
                                       name="b_draws"/>
                            </div>
                        </div>
                        <div class="col" style="margin-top: 15px;">
                            <div class="form-outline">
                                <input type="number" id="svrkey" required class="form-control" placeholder="svrkey"
                                       name="svrkey" value="<?php echo $_POST['pk_studies'] ? $row[0]: ""  ?>"/>
                            </div>
                        </div>
                        <div class="col" style="margin-top: 15px;">
                            <div class="form-outline">
                                <input type="text" id="location" required class="form-control" placeholder="Location"
                                       name="location" value="<?php echo $_POST['pk_studies'] ? $row[15]: ""  ?>"/>
                            </div>
                        </div>

                        <div class="col" style="margin-top: 15px;">
                            <div class="form-outline">
                                <input type="text" id="sch_type" required class="form-control"
                                       placeholder="Schedule type" value="<?php echo $_POST['pk_studies'] ? $row[16]: ""  ?>"
                                       name="sch_type"/>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col" style="margin-top: 15px;">
                            <div class="form-outline">
                                <input type="text" id="indication" required class="form-control"
                                       placeholder="Indication" value="<?php echo $_POST['pk_studies'] ? $row[12]: ""  ?>"
                                       name="indication"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="margin-top: 15px;">
                            <div class="form-outline">
                                <input type="text" id="s_length" required class="form-control"
                                       placeholder="Study length" value="<?php echo $_POST['pk_studies'] ? $row[17]: ""  ?>"
                                       name="s_length"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="margin-top: 15px;">
                            <div class="form-outline">
                                <input type="text" id="w_restriction" required class="form-control"
                                       placeholder="Weight restriction" value="<?php echo $_POST['pk_studies'] ? $row[8]: ""  ?>"
                                       name="w_restriction"/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="pk_studies"
                           value="<?php echo $_POST['pk_studies'] ? $_POST['pk_studies'] : ""  ?>"
                           name="pk_studies"/>

                    <div style="margin-top: 15px;" class="text-center">

                            <button class="btn btn-success " style="cursor: pointer;" id="delete_btn"  >
                                <?php echo $_POST['pk_studies'] ?"Update study": "Add a new study"  ?>
                            </button>
                    </div>
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
<script src="../assets/vendor/php-email-form/validate.js"></script>
<script src="../assets/vendor/purecounter/purecounter.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

<!-- sweetalert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</html>