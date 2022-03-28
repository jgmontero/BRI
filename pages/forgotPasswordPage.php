<?php
session_start();
if (isset($_SESSION['user'])) {
    echo '<script>
    alert("existe una sesion iniciada para ' . $_SESSION['user'] . ' ");
    window.location = "../index.php"
    </script>';
}
///$_SESSION['invalidLogin']==true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Fogot password recovery</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>

<body>

<main>

    <div class="contenedor__todo" style="display: flex;justify-content: center;">


        <!--Formulario de forgot password-->
        <div class="contenedor__login-register" style="top: 0px;">
            <!--Login-->

            <form id="loginContainer" action="../backend/forgotPassword.php" onsubmit="return CheckForgotPassword(this)"
                  method="post" class="formulario__login" style="margin-top: 0px;">
                <h2>Email address recovery</h2>
                <input type="text" placeholder="Correo Electronico" name="email">
                <?php
                if (isset($_SESSION['invalidLoginRecover'])) {
                    if ($_SESSION['invalidLoginRecover'] == true) {
                        echo '<div id="wrongUserPass" style="display: block;background-color: #c84c4c;text-align: center;border: solid 0.5px red;"> 
<h3>Wrong user address</h3>
</div>';
                    }
                }
                ?>
                <div class="row" style="display: flex;flex-direction: column;text-align: center;">
                    <button>Recover</button>
                    <a href="../pages/login-registrer.php" class="logo me-auto me-lg-0">Back to login</a>
                </div>

            </form>
        </div>
    </div>

</main>

<script src="../assets/js/script.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>

</html>