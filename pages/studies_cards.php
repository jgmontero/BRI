<!doctype html>
<html lang="en">

<head>
    <title>Studies Cards</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <div class="row">

            <?php
            include "../backend/db_connection.php";
           
            $sql = "SELECT * FROM `studies`";
            $resultSet = mysqli_query($connection, $sql);
            //print_r(mysqli_fetch_all($resultSet));die;
            while ($row = mysqli_fetch_row($resultSet)) {
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/<?php echo $row[3]; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo  $row[1]; ?></h5>
                            <p class="card-text">
                                <?php echo $row[2].'/'.$row[3]; ?>
                                
                            </p>
                            <p class="card-text">
                                 <?php echo '$'.$row[7]; ?>
                            </p>
                            <p class="card-text">
                                Age <?php echo "from ".$row[10]." to ".$row[11]." years old"; ?>
                         
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>