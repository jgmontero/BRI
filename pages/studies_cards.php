<!doctype html>
<html lang="en">

<head>
    <title>Studies Cards</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <section id="studies" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="container mt-3">
                <div class="row" style="justify-content: space-around;">
                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="portfolio-flters">
                                <li data-filter="*" class="filter-active">All</li>
                                <li data-filter=".filter-30d">30 days or less to start</li>
                                <li data-filter=".filter-20d">20 days or less to start</li>
                                <li data-filter=".filter-10d">10 days or less to start</li>
                                <li data-filter=".filter-5d">5 days or less to start</li>
                                <li data-filter=".filter-started">Alredy started</li>
                                <li data-filter=".filter-ended">Ended</li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    include "../backend/db_connection.php";

                    $sql = "SELECT *,(DATEDIFF( `start_date`,now())) as days_to_start , (DATEDIFF(now(), `start_date`)) as days_to_end FROM `studies` WHERE 1 order by days_to_start  ";
                    $resultSet = mysqli_query($connection, $sql);
                    //print_r(mysqli_fetch_all($resultSet));die;
                    while ($row = mysqli_fetch_row($resultSet)) { ?>
                        <div class="card bg-primary mb-3 filter-" .<?php
                                                                        if ($row[19] <= 30) {
                                                                            echo "30d";
                                                                        } else if ($row[19] <= 20) {
                                                                            echo "20d";
                                                                        } else if ($row[19] <= 5) {
                                                                            echo "5d";
                                                                        } else if ($row[19] == 0) {
                                                                            echo "started";
                                                                        } else if ($row[20] < 0) {
                                                                            echo "ended";
                                                                        }

                                                                        ?> style="width: 18rem;">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo  $row[1]; ?></h5>
                                <p class="card-text">
                                    <?php echo  $row[12]; ?>
                                </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> Days left to start: <?php echo $row[19]; ?></li>
                                <li class="list-group-item"> <?php echo $row[2] . '/' . $row[3]; ?></li>
                                <li class="list-group-item"><?php echo '$' . $row[7]; ?></li>
                                <li class="list-group-item">Age: <?php echo "from " . $row[10] . " to " . $row[11] . " years old"; ?></li>
                                <li class="list-group-item"> Location: <?php echo $row[15]; ?></li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>