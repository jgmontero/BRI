<?php
session_start();
if (isset($_SESSION['user'])) {
    echo '<script>
    alert("existe una sesion iniciada para '. $_SESSION['user'] .' ");
    window.location = "../index.php"
    </script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Login & Register</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>

<body>

    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>Already registered?</h3>
                    <p>Login using your account</p>
                    <button id="btn__iniciar-sesion">Login</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>Do not have account yet?</h3>
                    <p>Start your session</p>
                    <button id="btn__registrarse">Register</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="../backend/customer_auth.php" method="get" class="formulario__login">
                    <h2>Start session</h2>
                    <input type="text" placeholder="Correo Electronico" name="email">
                    <input type="password" placeholder="Contraseña" name=pass>
                    <button>Login</button>
                </form>

                <!--Register-->
                <form action="../backend/customer_register.php" method="post" class="formulario__register">
                    <h2>Register</h2>
                    <input type="text" placeholder="Email" name="email">
                    <input type="password" placeholder="Password" name="pass">
                    <input type="password" placeholder="Confirm password" name="pass_confirm">
                    <input type="text" placeholder="First name" name="first_name">
                    <input type="text" placeholder="Last name" name="last_name">
                    <div>
                        <input type="radio" id="sextChoice1" name="female" value="1" style="width: auto;" checked>
                        <label for="sextChoice1">Female</label>

                        <input type="radio" id="sextChoice2" name="female" value="0" style="width: auto;">
                        <label for="sextChoice2">Male</label>
                    </div>
                    <p class="date_of_birth">Date of birth:</p>
                    <input type="date" name="date_of_birth" id="date_of_birth">
                    <input type="number" placeholder="Weight (Kgs)" name="weight">
                    <input type="text" placeholder="Height (feet)" name="height">
                    <input type="text" placeholder="Address" name="address">
                    <input type="text" placeholder="City" name="city">
                    <input type="text" placeholder="State" name="state">
                    <input type="text" placeholder="Zip code" name="zip_code">
                    <input type="text" placeholder="Country" name="country">
                    <input type="text" placeholder="Phone" name="phone">
                    <input type="text" placeholder="Language" name="language">
                    <input type="text" placeholder="Communication" name="communication">
                    <input type="text" placeholder="Contact time" name="contact_time">



                    <button>Register</button>
                </form>
            </div>
        </div>

    </main>

    <script src="../assets/js/script.js"></script>
</body>

</html>