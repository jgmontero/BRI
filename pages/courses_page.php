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
        <div class="container" style="margin-left: 1px;">

            <table class="table table-dark table-striped table-hover">
                <thead>
                <tr style="font-size: x-small;text-align: center;">
                    <th scope="col">svrkey</th>
                    <th scope="col">Study number</th>
                    <th scope="col">Title</th>
                    <th scope="col">Start date</th>
                    <th scope="col">End date</th>
                    <th scope="col">Group number</th>
                    <th scope="col">Requirements</th>
                    <th scope="col">Stipend</th>
                    <th scope="col">Weight restriction</th>
                    <th scope="col">Phase</th>
                    <th scope="col">Minimum age</th>
                    <th scope="col">Maximum age</th>
                    <th scope="col">Indication</th>
                    <th scope="col">Route admin.</th>
                    <th scope="col">Blood draws</th>
                    <th scope="col">Location</th>
                    <th scope="col">Schedule Type</th>
                    <th scope="col">Study length</th>
                    <th scope="col">Delete</th>
                 <!--<th scope="col">Edit</th> -->
                </tr>
                </thead>
                <tbody>

                <?php
                $sql = "SELECT * FROM `studies` ";
                $resultSet = mysqli_query($connection, $sql);

                while ($row = mysqli_fetch_row($resultSet)) { ?>
                    <tr style="font-size: x-small;text-align: center;">
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                        <td><?php echo $row[6]; ?></td>
                        <td><?php echo $row[7]; ?></td>
                        <td><?php echo $row[8]; ?></td>
                        <td><?php echo $row[9]; ?></td>
                        <td><?php echo $row[10]; ?></td>
                        <td><?php echo $row[11]; ?></td>
                        <td><?php echo $row[12]; ?></td>
                        <td><?php echo $row[13]; ?></td>
                        <td><?php echo $row[14]; ?></td>
                        <td><?php echo $row[15]; ?></td>
                        <td><?php echo $row[16]; ?></td>
                        <td><?php echo $row[17]; ?></td>
                        <td>
                            <form method="post" action='../backend/add_del_upt_study.php'
                                  onsubmit="return submitFormDelete(this);">
                                <input type="hidden" style="cursor: pointer;" name="action"
                                       value="del" />
                                <input type="hidden" id="delete_pk_studies" style="cursor: pointer;"
                                       name="pk_studies"
                                       value="<?php echo $row[18]; ?>" />
                                <button class="btn btn-danger " style="cursor: pointer;" id="delete_btn" >
                                    Delete
                                </button>
                            </form>
                        </td>
                       <!-- <td>
                            <form method="post" action='../backend/add_del_upt_study.php'
                                  onsubmit="return submitFormUpt(this);">
                                <input type="hidden" style="cursor: pointer;" name="action"
                                       value="upt" />
                                <input type="hidden" id="upt_pk_studies" style="cursor: pointer;"
                                       name="pk_studies"
                                       value="<?php echo $row[18]; ?>" />
                                <button class="btn btn-success " style="cursor: pointer;" id="update_btn" >
                                    Update
                                </button>
                            </form>
                        </td> -->
                    </tr>

                    <?php
                }
                ?>

                </tbody>
            </table>


        </div>

        <hr/>
        <button class="btn-dark" onclick="ShowHideAddCourse()">Add new study?</button>
        <div id="add_studies" style="margin-top: 15px;display: none">
            <form method="post" action='../backend/add_del_upt_study.php'>
                <input type="hidden" style="cursor: pointer;" name="action"
                       value="add"/>
                <div class="row">
                    <div class="col">
                        <div class="form-outline">
                            <input type="number" id="study_number" class="form-control" name="study_num" required
                                   placeholder="Study number"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="title" class="form-control" name="title" required placeholder="Title" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="date" id="s_date" class="form-control" name="s_date" required/>
                            <label class="form-label" for="s_date">Study start date</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="date" id="e_date" class="form-control" name="e_date" required/>
                            <label class="form-label" for="e_date">Study end date</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                        <div class="form-outline">
                            <input type="number" id="g_number" class="form-control" placeholder="Group number" required
                                   name="g_number"/>
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-outline">
                            <input type="text" id="requirement" class="form-control" placeholder="Requirements" required
                                   name="requirement"/>
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-outline">
                            <input type="number" id="stipend" class="form-control" placeholder="Stipend" required
                                   name="stipend"/>
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-outline">
                            <input type="number" id="phase" class="form-control" placeholder="Phase" required name="phase"/>
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-outline">
                            <input type="number" id="min_age" class="form-control"  required placeholder="Minimum age"
                                   name="min_age"/>
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-outline">
                            <input type="number" id="max_age" class="form-control"  required placeholder="Maximum age"
                                   name="max_age"/>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col" style="margin-top: 15px;">

                        <div class="form-outline">
                            <input type="text" id="r_admin" required class="form-control"
                                   placeholder="Route of administration"
                                   name="r_admin"/>
                        </div>
                    </div>
                    <div class="col" style="margin-top: 15px;">
                        <div class="form-outline">
                            <input type="number" id="b_draws" required class="form-control" placeholder="Blood draws"
                                   name="b_draws"/>
                        </div>
                    </div>
                    <div class="col" style="margin-top: 15px;">
                        <div class="form-outline">
                            <input type="number" id="svrkey" required class="form-control" placeholder="svrkey"
                                   name="svrkey"/>
                        </div>
                    </div>
                    <div class="col" style="margin-top: 15px;">
                        <div class="form-outline">
                            <input type="text" id="location" required class="form-control" placeholder="Location"
                                   name="location"/>
                        </div>
                    </div>

                    <div class="col" style="margin-top: 15px;">
                        <div class="form-outline">
                            <input type="text" id="sch_type"  required class="form-control" placeholder="Schedule type"
                                   name="sch_type"/>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col" style="margin-top: 15px;">
                        <div class="form-outline">
                            <input type="text" id="indication" required class="form-control" placeholder="Indication"
                                   name="indication"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="margin-top: 15px;">
                        <div class="form-outline">
                            <input type="text" id="s_length" required class="form-control" placeholder="Study length"
                                   name="s_length"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="margin-top: 15px;">
                        <div class="form-outline">
                            <input type="text" id="w_restriction" required class="form-control"
                                   placeholder="Weight restriction"
                                   name="w_restriction"/>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 15px;" class="text-center">
                    <button class="btn-dark" type="submit">Add a new study</button>
                </div>
            </form>

        </div>

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

<!-- JavaScript Bundle with Popper
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>-->
<!-- sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>