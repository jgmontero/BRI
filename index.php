<?php
session_start();
include "./backend/db_connection.php";
/*if (isset($_SESSION['user'])) {
//echo 'Welcome '. $_SESSION['user'];
}*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Biscayne Research Institute</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/microscopeIcon.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="index.php">BRI<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto " href="#studies">Studies</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                <?php
                if (isset($_SESSION['user'])) {


                    $user = $_SESSION['user'];
                    $sql = "SELECT * FROM `customers` WHERE email = '{$user}' ";
                    $resultSet = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_row($resultSet);
                    if ($row[18] == '1') {


                        ?>
                        <li class="dropdown"><a href="#"><span>Management</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="./pages/studies_page.php">Studies management</a></li>
                                <li><a href="./pages/user_management">User Management</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                }
                ?>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>


                <li><a class="nav-link scrollto" href=<?php
                    echo isset($_SESSION['user'])
                        ?
                        "./backend/customer_auth_destroy_session.php"
                        : "./pages/login-registrer.php"
                    ?>> <?php echo isset($_SESSION['user']) ? 'Logout ' . explode('@', $_SESSION['user'])[0] . '?' : 'Login/Register' ?> </a>
                </li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

        <a href="#about" class="get-started-btn scrollto">Get Started</a>

    </div>
</header>
<!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
                <h1>Powerful Research Solutions With BRI<span>.</span></h1>
                <h2>We are team of talented people with the goal of better world</h2>
            </div>
        </div>

        <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-store-line"></i>
                    <h3><a href="">At you service</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-bar-chart-box-line"></i>
                    <h3><a href="">Transparent data</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-calendar-todo-line"></i>
                    <h3><a href="">Always on schedule </a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-paint-brush-line"></i>
                    <h3><a href="">Excellent treatment</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-database-2-line"></i>
                    <h3><a href="">Data management</a></h3>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                    <img src="assets/img/about.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right"
                     data-aos-delay="100">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                        </li>
                        <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate
                            velit.
                        </li>
                        <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda
                            mastiro dolore eu fugiat nulla pariatur.
                        </li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                        cupidatat non proident
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Clients Section ======= -->

    <!--
    <section id="clients" class="clients">
        <div class="container" data-aos="zoom-in">

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section> -->
    <!-- End Clients Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="image col-lg-6" style='background-image: url("assets/img/features.jpg");'
                     data-aos="fade-right"></div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
                    <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                        <i class="bx bx-receipt"></i>
                        <h4>Est labore ad</h4>
                        <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                        <i class="bx bx-cube-alt"></i>
                        <h4>Harum esse qui</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                        <i class="bx bx-images"></i>
                        <h4>Aut occaecati</h4>
                        <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                        <i class="bx bx-shield"></i>
                        <h4>Beatae veritatis</h4>
                        <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
                <p>Check our Services</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a href="#studies">Lorem Ipsum</a></h4>
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                     data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="#studies">Sed ut perspiciatis</a></h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                     data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4><a href="#studies">Magni Dolores</a></h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4><a href="#studies">Nemo Enim</a></h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-slideshow"></i></div>
                        <h4><a href="#studies">Dele cardo</a></h4>
                        <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-arch"></i></div>
                        <h4><a href="#studies">Divera don</a></h4>
                        <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="text-center">
                <h3>Call To Action</h3>
                <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                    anim id est laborum.</p>
                <a class="cta-btn" href="#about">Call To Action</a>
            </div>

        </div>
    </section>
    <!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="studies" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Studies</h2>
                <p>Check our studies</p>
            </div>
            <!--  <div className="row" data-aos="fade-up" data-aos-delay={100}>
                  <div className="col-lg-12 d-flex justify-content-center">
                      <ul id="portfolio-flters">
                          <li data-target="*" data-aos="fade-up" data-aos-delay={100} className="target-active">All</li>
                          <li data-target="lotsd" data-aos="fade-up" data-aos-delay={100}> More 30 days to start</li>
                          <li data-target="30d" data-aos="fade-up" data-aos-delay={100}> Between 30 and 20 days to start
                          </li>
                          <li data-target="20d" data-aos="fade-up" data-aos-delay={100}>Between 20 days and 10 to start
                          </li>
                          <li data-target="10d" data-aos="fade-up" data-aos-delay={100}>Between 10 and 5 days to start
                          </li>
                          <li data-target="5d" data-aos="fade-up" data-aos-delay={100}>Less 5 days to start</li>
                          <li data-target="started" data-aos="fade-up" data-aos-delay={100}>Already started</li                      <!--  <li data-target="ended" data-aos="fade-up" data-aos-delay={100}>Ended</li>
                      </ul>
                  </div>
              </div>-->

        </div>
        <div class="studies-container">
            <div class="studies">
                <?php

                $sql = "SELECT *,(DATEDIFF( `start_date`,now())) as days_to_start , 
                            (DATEDIFF(`end_date`,now())) as days_to_end 
                            FROM `studies` WHERE (DATEDIFF( `start_date`,now())) >=0 order by days_to_start";
                $resultSet = mysqli_query($connection, $sql);
                // print_r(mysqli_fetch_all($resultSet));die;
                while ($row = mysqli_fetch_row($resultSet)) {

                    ?>


                    <div class="square-flip"  onclick="flipCard(this)" data-id="<?php
                    if ($row[19] > 30) {
                        echo "lotsd";
                    } else if ($row[19] <= 30 && $row[19] > 20) {
                        echo "30d";
                    } else if ($row[19] <= 20 && $row[19] > 10) {
                        echo "20d";
                    } else if ($row[19] <= 10 && $row[19] > 5) {
                        echo "10d";
                    } else if ($row[19] <= 5 && $row[19] > 0) {
                        echo "5d";
                    } /*else if ($row[19] <= 0 && $row[20] > 0) {
                        echo "started";
                    } else if ($row[19] <= 0 & $row[20] < 0) {
                        echo "ended";
                    }*/
                    ?>">
                        <div  class='square'
                            <?php
                            if ($row[19] > 30) {
                                echo "style='background: linear-gradient(135deg, #77cacad4 0%,#50ffff 49%,#06ebf7 100%);;'";
                            } else if ($row[19] <= 30 && $row[19] > 20) {
                                echo "style='background:linear-gradient(135deg, #5b6b8aa1 0%,#383ac8 49%,#0443ffb0 100%);'";
                            } else if ($row[19] <= 20 && $row[19] > 10) {
                                echo "style='background: linear-gradient(135deg, #000 0%,#1e2080 49%,#2c00ff 100%);'";
                            } else if ($row[19] <= 10 && $row[19] > 5) {
                                echo "style='background: linear-gradient(135deg, #000 0%,#e36d34 49%,#ff7800 100%);'";
                            } else if ($row[19] <= 5 && $row[19] >= 0) {
                                echo "style='background: linear-gradient(135deg, #000 0%,#e33434 49%,#ff0005 100%)'";
                            } /*else if ($row[19] <= 0 && $row[20] > 0) {
                                echo "style='background: #4c8823;'";
                            } else if ($row[19] <= 0 & $row[20] < 0) {
                                echo "style='background: #484848;'";
                            }*/
                            ?>>
                            <div class="square-container">
                                <div class="row flexcol">
                                    <div class="col ">
                                        <div class="row">
                                           <h3>
                                               <?php echo  $row[4] ."-". $row[5]." ".$row[15]; ?>
                                           </h3>
                                        </div>
                                        <div class="row">
                                            <h3><?php echo $row[2] . '-' . $row[3]; ?></h3>
                                        </div>
                                    </div>
                                    <div class="col ">
                                        <h3><?php
                                            if ($row[19] > 0) {
                                                echo "<h4 class=\"text-center\"> Days to start: $row[19]</h4>";
                                            }  elseif ($row[19] == 0) {
                                                echo "<h4 class=\"text-center\"> Starts today</h4>";
                                            }elseif ($row[20] > 0) {
                                                echo "<h4 class=\"text-center\"> Days to finish: $row[20]</h4>";
                                            } elseif ($row[20] == 0) {
                                                echo "<h4 class=\"text-center\"> Finish today</h4>";
                                            } else {
                                                echo "<h4 class=\"text-center\"> Finished</h4>";
                                            }
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                                <div class="align-center" style="margin-top: 7rem;">

                                    <h2 class="textshadow"><?php echo $row[1]; ?></h2>
                                    <h3><?php echo $row[12]; ?></h3>

                                    <h5>
                                        <?php echo '$' . $row[7]; ?>
                                    </h5>
                                    <h3>
                                        <?php echo "From " . $row[10] . " to " . $row[11] . " years old"; ?>
                                    </h3>
                                </div>

                            </div>
                            <div class="flip-overlay"></div>
                        </div>
                        <div class='square2' style="background: linear-gradient(135deg, #b3afaf 0%,#686868 49%,#444 100%);">
                            <div class="square-container2">
                                <div class="align-center">
                                    <div class="portfolio-info">
                                        <h3><strong>Requirement</strong>: <?php echo $row[6]; ?></h3>
                                        <h3><strong>Weight restriction </strong>: <?php echo $row[8]; ?></h3>
                                        <h3><strong>Route of administration </strong>: <?php echo $row[13]; ?></h3>
                                        <h3><strong>Blood draws</strong>: <?php echo $row[14]; ?></h3>
                                        <h3><strong>Location</strong>: <?php echo $row[15]; ?></h3>
                                        <h3><strong>Schedule </strong>: <?php echo $row[16]; ?></h3>
                                        <h3><strong>Study length </strong>: <?php echo $row[17]; ?></h3>
                                    </div>
                                </div>
                                <?php
                                if (isset($_SESSION['user'])) {
                                    $email = $_SESSION['user'];
                                    $svrkey = $row[0];}
                                ?>
                                <form method="post" action=<?php
                                echo isset($_SESSION['user'])
                                    ?
                                    "./backend/un_subscribe.php"
                                    : "./pages/login-registrer.php"
                                ?>>
                                    <input type="hidden" style="cursor: pointer;" name="study_pk"
                                           value="<?php echo $row[18]; ?>"/>
                                    <input type="hidden" style="cursor: pointer;" name="email" value="<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ""; ?>" />
                                    <input type="hidden" style="cursor: pointer;" name="svrkey" value="<?php echo $row[0]; ?>" />
                                    <input type="hidden" style="cursor: pointer;" name="title" value="<?php echo $row[1]; ?>" />
                                    <input type="hidden" style="cursor: pointer;" name="DtoS" value="<?php echo $row[19]; ?>" />
                                    <input type="hidden" style="cursor: pointer;" name="Sdate" value="<?php echo $row[2]; ?>" />
                                    <a style="cursor: pointer;" class="boxshadow kallyas-button"
                                       onclick="this.parentNode.submit();"><?php
                                        if (isset($_SESSION['user'])) {

                                            $verify_subscription = mysqli_query($connection, "SELECT * 
                        from customer_studies 
                        where email = '$email' and svrkey = '$svrkey'");
                                            echo (mysqli_num_rows($verify_subscription) > 0) ? 'Unsubscribe' : 'Subscribe' ;
                                        } else {
                                            echo 'Log-in/Register';
                                        }

                                        ?></a>
                                </form>

                            </div>
                            <div class="flip-overlay"></div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>


        </div>
    </section>
    <!-- End Portfolio Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row no-gutters">
                <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start"
                     data-aos="fade-right" data-aos-delay="100"></div>
                <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch" data-aos="fade-left"
                     data-aos-delay="100">
                    <div class="content d-flex flex-column justify-content-center">
                        <h3>Voluptatem dignissimos provident quasi (you may removed or make it work, you decide)</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                        </p>
                        <div class="row">
                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="bi bi-emoji-smile"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="65"
                                          data-purecounter-duration="2" class="purecounter"></span>
                                    <p><strong>Happy Clients</strong> consequuntur voluptas nostrum aliquid ipsam
                                        architecto ut.</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="bi bi-journal-richtext"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="85"
                                          data-purecounter-duration="2" class="purecounter"></span>
                                    <p><strong>Projects</strong> adipisci atque cum quia aspernatur totam laudantium et
                                        quia dere tan</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="bi bi-clock"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="35"
                                          data-purecounter-duration="4" class="purecounter"></span>
                                    <p><strong>Years of experience</strong> aut commodi quaerat modi aliquam nam ducimus
                                        aut voluptate non vel</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="bi bi-award"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="20"
                                          data-purecounter-duration="4" class="purecounter"></span>
                                    <p><strong>Awards</strong> rerum asperiores dolor alias quo reprehenderit eum et
                                        nemo pad der</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .content-->
                </div>
            </div>

        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i> Proin iaculis purus consequat sem
                                cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies
                                eget id, aliquam eget nibh et. Maecen
                                aliquam, risus at semper.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i> Export tempor illum tamen malis
                                malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore
                                eram velit sunt aliqua noster fugiat irure
                                amet legam anim culpa.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i> Enim nisi quem export duis labore
                                cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram
                                duis noster aute amet eram fore quis
                                sint minim.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i> Fugiat enim eram quae cillum
                                dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim
                                duis veniam ipsum anim magna sunt elit fore
                                quem dolore labore illum veniam.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i> Quis quorum aliqua sint quem legam
                                fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt
                                culpa nulla illum cillum fugiat legam
                                esse veniam culpa fore nisi cillum quid.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    <!-- End testimonial item -->
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Team (Replace with your staff)</h2>
                <p>Check our Team</p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="200">
                        <div class="member-img">
                            <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Sarah Jhonson</h4>
                            <span>Product Manager</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="300">
                        <div class="member-img">
                            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="400">
                        <div class="member-img">
                            <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <!-- ======= Contact map
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact (in Order to work, a google map embed api key is required https://developers.google.com/maps/documentation/embed/get-api-key)</h2>
                <p>Contact Us</p>
            </div>

            <div>
                <iframe style="border:0; width: 100%; height: 270px;"
                        src="https://www.google.com/maps/embed/v1/place?q=Key%20Biscayne?key=YOUR_API_KEY"
                working source                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                        frameborder="0" allowfullscreen></iframe>
            </div> ======= -->

            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>compan address</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>support staff email</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>your number</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                       required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                   required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                      required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Send Message</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Section -->

</main>
<!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>Gp<span>.</span></h3>
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
            &copy; Biscayne Research Institute <strong><span>BRI</span></strong>. WE WORK FOR YOU
        </div>
        <!-- <div class="credits">
    All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
    </div>
    </div>
</footer>
<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="./assets/js/main.js"></script>
</body>

</html>