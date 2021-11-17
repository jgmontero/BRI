<?php
session_start();
include "../backend/db_connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>User Management Page - BRI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/microscopeIcon.jpg" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

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
                <h2>Customers management</h2>
                <ol>
                    <li><a href="../index.php">Home</a></li>
                    <li>Customers Page</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <?php
        // print_r($_POST);

        $sql = "SELECT * FROM `customers` ";
        $where = " where 1 ";

        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            $where .= " and lower(email) LIKE lower('%{$email}%') ";
        }
        if (!empty($_POST['f_name'])) {
            $f_name = $_POST['f_name'];
            $where .= " and lower(first_name) LIKE lower('%{$f_name}%') ";
        }
        if (!empty($_POST['l_name'])) {
            $l_name = $_POST['l_name'];
            $where .= " and lower(last_name) LIKE lower('%{$l_name}%') ";
        }
        if (!empty($_POST['city'])) {
            $city = $_POST['city'];
            $where .= " and lower(city) LIKE lower('%{$city}%') ";
        }
        if (!empty($_POST['state'])) {
            $state = $_POST['state'];
            $where .= " and lower(state) LIKE lower('%{$state}%') ";
        }
        if (!empty($_POST['country'])) {
            $country = $_POST['country'];
            $where .= " and lower(country) LIKE lower('%{$country}%') ";
        }
        if (!empty($_POST['b_date']) && empty($_POST['b_date_min']) && empty($_POST['b_date_max'])) {
            $b_date = $_POST['b_date'];
            $where .= " and date_of_birth =  '{$b_date}' ";
        } else if (empty($_POST['b_date']) && !empty($_POST['b_date_min']) && !empty($_POST['b_date_max'])) {
            $b_date_min = $_POST['b_date_min'];
            $b_date_max = $_POST['b_date_max'];
            $where .= " and date_of_birth BETWEEN  '{$b_date_min}' AND  '{$b_date_max}' ";
        } else if (empty($_POST['b_date']) && !empty($_POST['b_date_min']) && empty($_POST['b_date_max'])) {
            $b_date_min = $_POST['b_date_min'];
            $where .= " and date_of_birth >=  '{$b_date_min}' ";
        } else if (empty($_POST['b_date']) && empty($_POST['b_date_min']) && !empty($_POST['b_date_max'])) {
            $b_date_max = $_POST['b_date_max'];
            $where .= " and date_of_birth  <=  '{$b_date_max}' ";
        }

        //print_r($sql);
        ?>
        <form method="post" action='../pages/user_management.php'
              style="margin-bottom: 15px;">
            <div class="row">
                <!--email filter-->
                <div class="col">
                    <input type="text" id="email" class="form-control" name="email"
                           placeholder="Email" value="<?php echo !empty($_POST['email']) ? $_POST['email'] : "" ?>"/>
                </div>
                <!--first name filter-->
                <div class="col">
                    <input type="text" id="f_name" class="form-control" name="f_name"
                           placeholder="First name"
                           value="<?php echo !empty($_POST['f_name']) ? $_POST['f_name'] : "" ?>"/>
                </div>
                <!--last name filter-->
                <div class="col">
                    <input type="text" id="l_name" class="form-control" name="l_name"
                           placeholder="Last name"
                           value="<?php echo !empty($_POST['l_name']) ? $_POST['l_name'] : "" ?>"/>
                </div>
                <!--City name filter-->
                <div class="col">
                    <input type="text" id="city" class="form-control" name="city"
                           placeholder="City" value="<?php echo !empty($_POST['city']) ? $_POST['city'] : "" ?>"/>
                </div>
                <!--State name filter-->
                <div class="col">
                    <input type="text" id="state" class="form-control" name="state"
                           placeholder="State" value="<?php echo !empty($_POST['state']) ? $_POST['state'] : "" ?>"/>
                </div>
                <!--Country name filter-->
                <div class="col">
                    <input type="text" id="country" class="form-control" name="country"
                           placeholder="Country"
                           value="<?php echo !empty($_POST['country']) ? $_POST['country'] : "" ?>"/>
                </div>
                <!--Bithdate filter-->
                <div class="col">
                    <div class="col"
                         id="b_date_range" <?php echo !empty($_POST['b_date']) ? 'style="display: none;"' : 'style="display: block;"' ?> >
                        <input type="date" id="b_date_range_min_input" class="form-control" name="b_date_min"
                               value="<?php echo !empty($_POST['b_date_min']) ? $_POST['b_date_min'] : "" ?>"/>
                        <label for="b_date_range">Minimum birth date</label>
                        <input type="date" id="b_date_range_max_input" class="form-control" name="b_date_max"
                               value="<?php echo !empty($_POST['b_date_max']) ? $_POST['b_date_max'] : "" ?>"/>
                        <label for="b_date_range_max">Maximum birth date</label>
                    </div>
                    <!-- no ranged start date-->
                    <div class="col"
                         id="b_date" <?php echo empty($_POST['b_date']) ? 'style="display: none;"' : 'style="display: block;"' ?>>
                        <input type="date" id="b_date_input" class="form-control" name="b_date"
                               style="display: block;"
                               value="<?php echo !empty($_POST['b_date']) ? $_POST['b_date'] : "" ?>"/>
                        <label for="b_date">Birth date</label>
                    </div>

                    <input type="checkbox" id="is_b_date_range" name="ranged_b_date" onclick="BDateRangeToggle()"
                        <?php echo empty($_POST['b_date']) ? 'checked' : '' ?>>
                    <label for="is_b_date_range">Birth date range</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-info " style="cursor: pointer;" id="search_btn">
                        Search
                    </button>
                    <button class="btn btn-dark " style="cursor: pointer;" id="update_btn_user"
                            onclick="ClearfilterUser()">
                        Clear filter
                    </button>
                </div>
            </div>
        </form>

        <div class="container" style="margin-left: 1px;">

            <form method="post" action='../pages/upt_add_del_customer_page.php'
                  onsubmit="return submitFormAddCustomer(this);" style="margin-bottom: 15px;">
                <input type="hidden" style="cursor: pointer; " name="action"
                       value="add"/>
                <input type="hidden" id="upt_pk_studies" style="cursor: pointer;"
                       name="pk_customer"/>
                <button class="btn btn-success " style="cursor: pointer;" id="update_btn">
                    Add a new customer
                </button>
            </form>
            <table class="table table-dark table-striped table-hover">
                <thead>
                <tr style="font-size: x-small;text-align: center;">

                    <th scope="col">email</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Birth date</th>
                    <th scope="col">Female</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Height</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Zip code</th>
                    <th scope="col">Country</th>
                    <th scope="col">Phone</th>
                    <th scope="col">language</th>
                    <th scope="col">Communication</th>
                    <th scope="col">Contact time</th>
                    <th scope="col">is_admin</th>
                    <th scope="col">root</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Make admin</th>
                </tr>
                </thead>
                <tbody>

                <?php
                // print_r($_POST);die;


                $resultSet = mysqli_query($connection, $sql . $where);

                while ($row = mysqli_fetch_row($resultSet)) { ?>
                    <tr style="font-size: x-small;text-align: center;">
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[2] . " " . $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
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
                        <td><?php echo $row[18]; ?></td>
                        <td><?php echo $row[19]; ?></td>
                        <td>
                            <form method="post" action="../backend/customer_register.php"
                                  onsubmit="return submitFormDelete(this);">
                                <input type="hidden" style="cursor: pointer;" name="action"
                                       value="del"/>
                                <input type="hidden" id="delete_pk_customer" style="cursor: pointer;"
                                       name="pk_customer"
                                       value="<?php echo $row[17]; ?>"/>
                                <button class="btn btn-danger "
                                        style="cursor: pointer;font-size: x-small;text-align: center;"
                                        id="delete_customer_btn">
                                    Delete
                                </button>
                            </form>
                        </td>
                        <!-- -->
                        <td>
                            <form method="post" action="../pages/upt_add_del_customer_page.php"
                                  onsubmit="return submitFormUpt(this);">
                                <input type="hidden" style="cursor: pointer;" name="action"
                                       value="upt"/>
                                <input type="hidden" id="upt_pk_customer" style="cursor: pointer;"
                                       name="pk_customer"
                                       value="<?php echo $row[17]; ?>"/>
                                <input type="hidden" id="is_admin" style="cursor: pointer;"
                                       name="is_admin"
                                       value="<?php echo $row[18]; ?>"/>
                                <button class="btn btn-success "
                                        style="cursor: pointer;font-size: x-small;text-align: center;"
                                        id="update_customer_btn">
                                    Update
                                </button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="../backend/customer_register.php"
                                  onsubmit="<?php echo $row[18] == 1 && $row[19] == 1 ? "return submitFormAdminDenied(this);" : "return submitFormAdmin(this);" ?> ">
                                <input type="hidden" style="cursor: pointer;" name="action"
                                       value="admin"/>
                                <input type="hidden" id="admin_pk_customer" style="cursor: pointer;"
                                       name="pk_customer" value="<?php echo $row[17]; ?>"/>
                                <input type="hidden" id="is_admin" style="cursor: pointer;"
                                       name="is_admin"
                                       value="<?php echo $row[18]; ?>"/>
                                <input type="hidden" id="admin_stand" style="cursor: pointer;"
                                       name="admin_stand"
                                       value="<?php echo $row[19]; ?>"/>
                                <button class="btn btn-success "
                                        style="cursor: pointer;font-size: x-small;text-align: center;"
                                        id="admin_customer_btn">
                                    <?php echo $row[18] == 0 ? "Make admin" : "Remove Admin" ?>
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

        <div class="row">
            <div class="col">
                <a href="#">
                    <img src="../assets/img/first_page.png" alt="" width="20" height="20">
                </a>
            </div>
            <div class="col">
                <a href="#">
                    <img src="../assets/img/back.png" alt="" width="20" height="20">
                </a>
            </div>

            <div class="col">
                <input type="text" id="r_p_pages" class="form-control" name="RowPerPage"
                       placeholder="Rows per page" value=""/>
            </div>
            <div class="col">
                <a href="#">
                    <img src="../assets/img/foward.png" alt="" width="20" height="20">
                </a>
            </div>
            <div class="col">
                <a href="#">
                    <img src="../assets/img/last_page.png" alt="" width="20" height="20">
                </a>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>