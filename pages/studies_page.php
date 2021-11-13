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
        $sql = "SELECT * FROM `studies` ";
        $where = " where 1 ";
        //title filter
        if (!empty($_POST['title'])) {
            $title = $_POST['title'];
            $where .= " and lower(title) LIKE lower('%{$title}%') ";
        }
        //start date filter
        if (!empty($_POST['s_date']) && empty($_POST['s_date_min']) && empty($_POST['s_date_max'])) {
            $s_date = $_POST['s_date'];
            $where .= " and start_date >=  '{$s_date}'";
        } else if (empty($_POST['s_date']) && !empty($_POST['s_date_min']) && !empty($_POST['s_date_max'])) {
            $s_date_min = $_POST['s_date_min'];
            $s_date_max = $_POST['s_date_max'];
            $where .= " and start_date BETWEEN  '{$s_date_min}' AND   '{$s_date_max}'";
        } else if (empty($_POST['s_date']) && !empty($_POST['s_date_min']) && empty($_POST['s_date_max'])) {
            $s_date_min = $_POST['s_date_min'];
            $where .= " and start_date >=  '{$s_date_min}'";
        } else if (empty($_POST['s_date']) && empty($_POST['s_date_min']) && !empty($_POST['s_date_max'])) {
            $s_date_max = $_POST['s_date_max'];
            $where .= " and start_date  <=  '{$s_date_max}'";
        }
        //end date filter (to do: check it)
        if (!empty($_POST['e_date']) && empty($_POST['e_date_min']) && empty($_POST['e_date_max'])) {
            $s_date = $_POST['e_date'];
            $where .= " and end_date <=  '{$s_date}'";
        } else if (empty($_POST['e_date']) && !empty($_POST['e_date_min']) && !empty($_POST['e_date_max'])) {
            $s_date_min = $_POST['e_date_min'];
            $s_date_max = $_POST['e_date_max'];
            $where .= " and end_date BETWEEN  '{$s_date_min}' AND   '{$s_date_max}'";
        } else if (empty($_POST['e_date']) && !empty($_POST['e_date_min']) && empty($_POST['e_date_max'])) {
            $s_date_min = $_POST['e_date_min'];
            $where .= " and end_date >=  '{$s_date_min}'";
        } else if (empty($_POST['e_date']) && empty($_POST['e_date_min']) && !empty($_POST['e_date_max'])) {
            $s_date_max = $_POST['e_date_max'];
            $where .= " and end_date  <=  '{$s_date_max}'";
        }
        //min age filter
        if (!empty($_POST['min_age'])) {
            $min_age = $_POST['min_age'];
            $where .= " and minimum_elegible_age  >=  '{$min_age}'";
        }
        //max age filter
        if (!empty($_POST['max_age'])) {
            $max_age = $_POST['max_age'];
            $where .= " and maximum_elegible_age  <=  '{$max_age}'";
        }
        //stipend filter
        if (!empty($_POST['stipend'])) {
            $stipend = $_POST['stipend'];
            $where .= " and stipend =  '{$stipend}'";
        } else {
            if (!empty($_POST['stipend_min']) && !empty($_POST['stipend_max'])){
                $stipend_min = $_POST['stipend_min'];
                $stipend_max = $_POST['stipend_max'];
                $where .= " and stipend >= '{$stipend_min}' and stipend <= '{$stipend_max}'";
            } else if (!empty($_POST['stipend_min']) && empty($_POST['stipend_max'])){
                $stipend_min = $_POST['stipend_min'];
                $where .= " and stipend >= '{$stipend_min}' ";
            }else if (empty($_POST['stipend_min']) && !empty($_POST['stipend_max'])){

                $stipend_max = $_POST['stipend_max'];
                $where .= " and stipend <= '{$stipend_max}'";
            }
        }


       // print_r($sql . $where)
        ?>

        <form method="post" action='../pages/courses_page.php'
              style="margin-bottom: 15px;">
            <div class="row">
                <div class="col">
                    <input type="text" id="title" class="form-control" name="title"
                           placeholder="Title" value="<?php echo !empty($_POST['title']) ? $_POST['title'] : "" ?>"/>
                </div>
                <!--range start date-->
                <div class="col">
                    <!--ranged start date-->
                    <div class="col"
                         id="s_date_range" <?php echo !empty($_POST['s_date']) ? 'style="display: none;"' : 'style="display: block;"' ?> >
                        <input type="date" id="s_date_range_min_input" class="form-control" name="s_date_min"
                               value="<?php echo !empty($_POST['s_date_min']) ? $_POST['s_date_min'] : "" ?>"/>
                        <label for="s_date_range">Minimum start date</label>
                        <input type="date" id="s_date_range_max_input" class="form-control" name="s_date_max"
                               value="<?php echo !empty($_POST['s_date_max']) ? $_POST['s_date_max'] : "" ?>"/>
                        <label for="s_date_range_max">Maximum start date</label>
                    </div>
                    <!-- no ranged start date-->
                    <div class="col"
                         id="s_date_no_range" <?php echo empty($_POST['s_date']) ? 'style="display: none;"' : 'style="display: block;"' ?>>
                        <input type="date" id="s_date_no_range_input" class="form-control" name="s_date"
                               style="display: block;"
                               value="<?php echo !empty($_POST['s_date']) ? $_POST['s_date'] : "" ?>"/>
                        <label for="s_date_no_range">Start date</label>
                    </div>

                    <input type="checkbox" id="is_start_range" name="ranged_s_date" onclick="StartDateRangeToggle()"
                        <?php echo empty($_POST['s_date']) ? 'checked' : '' ?>>
                    <label for="is_start_range">Start date range</label>
                </div>
                <!--range end date-->
                <div class="col">
                    <!--ranged end date-->
                    <div class="col"
                         id="e_date_range" <?php echo !empty($_POST['e_date']) ? 'style="display: none;"' : 'style="display: block;"' ?>>
                        <input type="date" id="e_date_range_min_input" class="form-control" name="e_date_min"
                               value="<?php echo !empty($_POST['e_date_min']) ? $_POST['e_date_min'] : "" ?>"/>

                        <label for="e_date_range">Minimum end date</label>
                        <input type="date" id="e_date_range_max_input" class="form-control" name="e_date_max"
                               value="<?php echo !empty($_POST['e_date_max']) ? $_POST['e_date_max'] : "" ?>"/>
                        <label for="e_date_range_max">Maximum end date</label>
                    </div>
                    <!--no ranged end date-->
                    <div class="col"
                         id="e_date_no_range" <?php echo empty($_POST['e_date']) ? 'style="display: none;"' : 'style="display: block;"' ?>>
                        <input type="date" id="e_date_no_range_input" class="form-control" name="e_date"
                               style="display: block;"
                               value="<?php echo !empty($_POST['e_date']) ? $_POST['e_date'] : "" ?>"/>
                        <label for="e_date_no_range">End date</label>
                    </div>


                    <input type="checkbox" id="is_end_range" name="ranged_e_date" onclick="EndDateRangeToggle()"
                        <?php echo empty($_POST['e_date']) ? 'checked' : '' ?>>
                    <label for="is_end_range">End date range</label>

                </div>
                <!--min age-->
                <div class="col">

                    <input type="number" id="min_age" class="form-control" placeholder="Minimum age"
                           name="min_age" value="<?php echo !empty($_POST['min_age']) ? $_POST['min_age'] : "" ?>"/>
                </div>
                <!--max age-->
                <div class="col">
                    <input type="number" id="max_age" class="form-control" placeholder="Maximum age"
                           name="max_age" value="<?php echo !empty($_POST['max_age']) ? $_POST['max_age'] : "" ?>"/>
                </div>
                <!--ranged stipend-->
                <div class="col">
                    <div class="col"
                         id="stipend_range" <?php echo !empty($_POST['stipend']) ? 'style="display: none;"' : 'style="display: block;"' ?> >
                        <input type="number" id="stipend_range_min_input" class="form-control" name="stipend_min"
                               value="<?php echo !empty($_POST['stipend_min']) ? $_POST['stipend_min'] : "" ?>"
                               placeholder="Minimum stipend"/>

                        <input type="number" id="stipend_range_max_input" class="form-control" name="stipend_max"
                               value="<?php echo !empty($_POST['stipend_max']) ? $_POST['stipend_max'] : "" ?>"
                               placeholder="Maximum stipend"/>

                    </div>
                    <!-- no ranged stipend-->
                    <div class="col"
                         id="stipend_no_range" <?php echo empty($_POST['stipend']) ? 'style="display: none;"' : 'style="display: block;"' ?>>

                        <input type="number" id="stipend_input" class="form-control" placeholder="Stipend"
                               name="stipend" value="<?php echo !empty($_POST['stipend']) ? $_POST['stipend'] : "" ?>"/>
                    </div>


                    <input type="checkbox" id="is_stipend_range" name="ranged_stipend" onclick="StipendRangeToggle()"
                        <?php echo empty($_POST['stipend']) ? 'checked' : '' ?>>
                    <label for="is_stipend_range">Stipend range</label>

                </div>
                <div class="col">
                    <button class="btn btn-info " style="cursor: pointer;" id="search_btn">
                        Search
                    </button>
                    <button class="btn btn-dark " style="cursor: pointer;margin-top: 10px;" id="update_btn" onclick="Clearfilter()">
                        Clear filter
                    </button>
                </div>
            </div>
        </form>

        <div class="container" style="margin-left: 1px;">
            <form method="post" action='../pages/upt_add_courses_page.php'
                  onsubmit="return submitFormAdd(this);" style="margin-bottom: 15px;">
                <input type="hidden" style="cursor: pointer; " name="action"
                       value="add"/>
                <input type="hidden" id="upt_pk_studies" style="cursor: pointer;"
                       name="pk_studies"/>
                <button class="btn btn-success " style="cursor: pointer;" id="update_btn">
                    Add a new study
                </button>
            </form>
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
                    <!---->
                    <th scope="col">Edit</th>
                </tr>
                </thead>
                <tbody>

                <?php
                // print_r($_POST);die;


                $resultSet = mysqli_query($connection, $sql . $where);

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
                                       value="del"/>
                                <input type="hidden" id="delete_pk_studies" style="cursor: pointer;"
                                       name="pk_studies"
                                       value="<?php echo $row[18]; ?>"/>
                                <button class="btn btn-danger " style="cursor: pointer;" id="delete_btn">
                                    Delete
                                </button>
                            </form>
                        </td>
                        <!-- -->
                        <td>
                            <form method="post" action='../pages/upt_add_courses_page.php'
                                  onsubmit="return submitFormUpt(this);">
                                <input type="hidden" style="cursor: pointer;" name="action"
                                       value="upt"/>
                                <input type="hidden" id="upt_pk_studies" style="cursor: pointer;"
                                       name="pk_studies"
                                       value="<?php echo $row[18]; ?>"/>
                                <button class="btn btn-success " style="cursor: pointer;" id="update_btn">
                                    Update
                                </button>
                            </form>
                        </td>
                    </tr>

                    <?php
                }
                ?>

                </tbody>
            </table>
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
<!-- sweetalert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</html>