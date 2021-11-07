<?php
session_start();
include "../backend/db_connection.php";

$study_pk = $_POST['study_pk'];
$sql = "SELECT *,(DATEDIFF( `start_date`,now())) as days_to_start ,
                 (DATEDIFF(now(), `end_date`)) as days_to_end 
                 FROM `studies` WHERE pk_studies='{$study_pk}' order by days_to_start  ";
//print_r($sql);die;
$resultSet = mysqli_query($connection, $sql);
// print_r(mysqli_fetch_all($resultSet));
$row = mysqli_fetch_row($resultSet);


/*if (isset($_SESSION['user'])) {
echo 'Welcome '. $_SESSION['user'];
}*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Studies Details - BRI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/microscopeIcon.jpg" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
                    <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="../index.php#about">About</a></li>
                    <li><a class="nav-link scrollto" href="../index.php#services">Services</a></li>
                    <li><a class="nav-link scrollto active" href="../index.php#studies">Studies</a></li>
                    <li><a class="nav-link scrollto" href="../index.php#team">Team</a></li>
                    <li class="dropdown"><a href="../index.php#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="../index.php#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

            <a href="../index.php#about" class="get-started-btn scrollto">Get Started</a>

        </div>
    </header>
    <!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Studies Details</h2>
                    <ol>
                        <li><a href="../index.php">Home</a></li>
                        <li>Studies Details</li>
                    </ol>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="portfolio-info">

                            <h3><?php echo $row[1]; ?></h3>
                            <ul>
                                <li><strong>Start date</strong>: <?php echo $row[2]; ?></li>
                                <li><strong>Finish date</strong>: <?php echo $row[3]; ?></li>
                                <li><strong>Status</strong><?php if ($row[19] <= 0 && $row[20] >= 0) {
                                                                echo " Started ";
                                                            } else if ($row[19] <= 0 & $row[20] <= 0) {
                                                                echo " Ended";
                                                            } else {
                                                                echo " Starts in " . $row[19] . " days";
                                                            } ?></li>
                                <li><strong>Requierement</strong>: <?php echo $row[6]; ?>></li>
                                <li><strong>Payment</strong>: $<?php echo $row[7]; ?></li>
                                <li><strong>Weight restriction </strong>: <?php echo $row[8]; ?></li>
                                <li><strong>Minimum age </strong>: <?php echo $row[10]; ?></li>
                                <li><strong>Maximum age </strong>: <?php echo $row[11]; ?></li>
                                <li><strong>Route of administration </strong>: <?php echo $row[13]; ?></li>
                                <li><strong>Blood draws</strong>: <?php echo $row[14]; ?></li>
                                <li><strong>Location </strong>: <?php echo $row[15]; ?></li>
                                <li><strong>Schedule </strong>: <?php echo $row[16]; ?></li>
                                <li><strong>Study length </strong>: <?php echo $row[17]; ?></li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>Indications</h2>
                            <p>
                                <?php echo $row[12]; ?>
                            </p>

                        </div>
                        <?php
                        $email = $_SESSION['user'];
                        $svrkey = $row[0];
                        $verify_subscription = mysqli_query($connection, "SELECT * 
                        from customer_studies 
                        where email = '$email' and svrkey = '$svrkey'");
                        ?>
                        <form method="post" action="../backend/un_subscribe.php">
                            <input type="hidden" style="cursor: pointer;" name="email" value="<?php echo $email; ?>" />
                            <input type="hidden" style="cursor: pointer;" name="svrkey" value="<?php echo $svrkey; ?>" />
                            <a style="cursor: pointer;" onclick="this.parentNode.submit();"><?php echo (mysqli_num_rows($verify_subscription) > 0)  ?  'Unsubscribe' : 'Subscribe'   ?></a>
                        </form>

                    </div>

                </div>

            </div>
        </section>
        <!-- End Portfolio Details Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>BRI<span>.</span></h3>
                            <p>
                                A108 Adam Street <br> NY 535022, USA<br><br>
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
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
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
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>