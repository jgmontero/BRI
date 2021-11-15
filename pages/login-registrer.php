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
                    <input type="text" placeholder="Correo Electronico" name="email" required>
                    <input type="password" placeholder="Contraseña" name=pass required>
                    <button>Login</button>
                </form>

                <!--Register-->
                <form action="../backend/customer_register.php" method="post" class="formulario__register">
                    <h2>Register</h2>
                    <input type="hidden" style="cursor: pointer; " name="action"
                           value="add"/>
                    <input type="text" placeholder="Email" name="email" required>
                    <input type="password" placeholder="Password" name="pass" required>
                    <input type="password" placeholder="Confirm password" name="pass_confirm" required>
                    <input type="text" placeholder="First name" name="first_name" required>
                    <input type="text" placeholder="Last name" name="last_name" required>
                    <div>
                        <input type="radio" id="sextChoice1" name="female" value="1" style="width: auto;" checked>
                        <label for="sextChoice1">Female</label>

                        <input type="radio" id="sextChoice2" name="female" value="0" style="width: auto;">
                        <label for="sextChoice2">Male</label>
                    </div>
                    <p class="date_of_birth">Date of birth:</p>
                    <input type="date" name="date_of_birth" id="date_of_birth" required>
                    <input type="number" step=".01" placeholder="Weight (Kgs)" name="weight" required>
                    <input type="text" placeholder="Height (feet)" name="height" required>
                    <input type="text" placeholder="Address" name="address" required>
                    <input type="text" placeholder="City" name="city" required>
                    <input type="text" placeholder="State" name="state" required>
                    <input type="text" placeholder="Zip code" name="zip_code" required>
                    <input type="text" placeholder="Country" name="country" required>
                    <input type="text" placeholder="Phone" name="phone" required>
                    <input type="text" placeholder="Language" name="language" required>
                    <input type="text" placeholder="Communication" name="communication" required>
                    <input type="text" placeholder="Contact time" name="contact_time" required>
                    <button>Register</button>
                </form>
            </div>
        </div>

    </main>

    <script src="../assets/js/script.js"></script>
</body>

</html>