<?php
include "./db_connection.php";
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $email = $_POST['email'];
    $pass = $_POST["pass"];
    $pass_confirm = $_POST["pass_confirm"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $female = $_POST["female"];
    $date_of_birth = $_POST["date_of_birth"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip_code = $_POST["zip_code"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $language = $_POST["language"];
    $communication = $_POST["communication"];
    $contact_time = $_POST["contact_time"];


// server-side validations
//email
    $email_user = explode('@', $email);
    if (count($email_user) != 2) {
        echo '<script>
      alert("Invalid email format");
      window.location = "../pages/login-registrer.php"
      </script>';
    }
    if (count(explode('.', $email_user[1])) != 2) {
        echo '<script>
      alert("Invalid email format.");
      window.location = "../pages/login-registrer.php"
      </script>';

    }
    $email_check_query = "select * from customers where email = '$email'";
    $check_unique_email = mysqli_query($connection, $email_check_query);
    if (mysqli_num_rows($check_unique_email) > 0) {
        echo '<script>
      alert("email address already used");
      window.location = "../login-registrer.php"
      </script>';
    }
//pass
    if ($pass != $pass_confirm) {
        echo '<script>
      alert("password and password confirmation fields should match");
      window.location = "../login-registrer.php"
      </script>';
    }
// pass encrypt md5 sha512 
    $pass = hash('md5', $pass);
    $pass = hash('sha1', $pass . $email);

    $QUERY = " INSERT INTO customers
       (`email`, `password`, `first_name`, `last_name`, `date_of_birth`, `female`, `weight`, `height`, `address`, `city`,
       `state`, `zip_code`, `country`, `phone`, `language`, `communication`, `contact_time`)
       VALUES ('$email','$pass','$first_name','$last_name','$date_of_birth', $female , $weight,'$height','$address','$city','$state',
      '$zip_code','$country','$phone','$language', '$communication','$contact_time')";

    $execute = mysqli_query($connection, $QUERY);
    if ($execute) {
        echo '<script>
      alert("Your user was inserted");
      window.location = "../index.php"
      </script>';
    } else {
        echo "<script>
      alert('something bad happens ')
      window.location = '../index.php'
      </script>";
    }
}
if (isset($_POST['action']) && $_POST['action'] == 'del') {

    $pk_customer = $_POST['pk_customer'];
    $sql = "DELETE FROM `customers` WHERE pk_customers = {$pk_customer}";
    $execute = mysqli_query($connection, $sql);

    header("location: ../pages/user_management.php");
}
if (isset($_POST['action']) && $_POST['action'] == 'upt') {

    //print_r($_POST); die;

    $email = $_POST['email'];
    $pass = $_POST["pass"];
    $pass_confirm = $_POST["pass_confirm"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $female = $_POST["female"];
    $date_of_birth = $_POST["date_of_birth"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip_code = $_POST["zip_code"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $language = $_POST["language"];
    $communication = $_POST["communication"];
    $contact_time = $_POST["contact_time"];
    $pk_customer = $_POST['pk_customer'];
// server-side validations
//email
    if (isset($_POST['update_email_chkbox'])) {
        $email_user = explode('@', $email);
        if (count($email_user) != 2) {
            echo '<script>
      alert("Invalid email format");
      window.location = "../pages/user_management.php"
      </script>';
        }
        if (count(explode('.', $email_user[1])) != 2) {
            echo '<script>
      alert("Invalid email format.");
    window.location = "../pages/user_management.php"
      </script>';

        }
        $email_check_query = "select * from customers where email = '$email' and pk_customers != {$pk_customer}";
        $check_unique_email = mysqli_query($connection, $email_check_query);
        if (mysqli_num_rows($check_unique_email) > 0) {
            echo '<script>
      alert("email address already used");
      window.location = "../pages/user_management.php"
      </script>';
        }
        if ($pass != $pass_confirm) {
            echo '<script>
      alert("password and password confirmation fields should match");
      window.location = "../pages/user_management.php"
      </script>';
        }
// pass encrypt md5 sha512
        $pass = hash('md5', $pass);
        $pass = hash('sha1', $pass . $email);
    } else if (isset($_POST['update_pass_chkbox'])) {
        if ($pass != $pass_confirm) {
            echo '<script>
      alert("password and password confirmation fields should match");
      window.location = "../pages/user_management.php"
      </script>';
        }
// pass encrypt md5 sha512
        $pass = hash('md5', $pass);
        $pass = hash('sha1', $pass . $email);
    }

    //do insert query, then the delete query
    $update = "UPDATE `customers` 
SET `email`='{$email }',`first_name`='{$first_name}',`last_name`='{$last_name }',
`date_of_birth`='{$date_of_birth }',`female`={$female },`weight`='{$weight }',`height`='{$height }',
`address`='{$address }',`city`='{$city }',`state`='{$state }',`zip_code`='{$zip_code }',`country`='{$country }',
`phone`='{$phone }',`language`='{$language }',`communication`='{$communication }',`contact_time`='{$contact_time }'
";
    //if pass came in
    if (isset($_POST['update_pass_chkbox']) || isset($_POST['update_email_chkbox'])) {
        $update .= ", `password` = '{$pass}'  ";
    }
    //adding where pk
    $where = " where `pk_customers`= '{$pk_customer}' ";
    //joining the query
    $sql = $update . $where;

    $execute = mysqli_query($connection, $sql);
    $is_admin = $_POST['is_admin'];
    if ($execute) {

        if ($is_admin == 1) {
            echo '<script>
      alert("The user was modified");
      window.location = "../pages/user_management.php"
      </script>';
        } else {
            echo '<script>
      alert("Your user was modified");
      window.location = "../index.php"
      </script>';
        }

    } else {
        if ($is_admin == 1) {
            echo "<script>
      alert('something bad happens ')
     window.location = \"../pages/user_management.php\"
      </script>";
        } else {
            echo "<script>
      alert('something bad happens ')
      window.location = '../index.php'
      </script>";
        }

    }


}
if (isset($_POST['action']) && $_POST['action'] == 'admin') {
    $pk_customer = $_POST['pk_customer'];
    $is_admin = $_POST['is_admin'];
    $admin_stand = $_POST['admin_stand'];

    if ($admin_stand == 0) {
        $is_admin = $is_admin == 0 ? $is_admin = 1 : $is_admin = 0;
        $update = "UPDATE `customers` 
SET  `is_admin`={$is_admin}
 where `pk_customers`= {$pk_customer} ";
        $execute = mysqli_query($connection, $update);

    } else if ($admin_stand == 1 && $is_admin == 0) {
        $is_admin=1;
        $update = "UPDATE `customers` 
SET  `is_admin`={$is_admin}
 where `pk_customers`= {$pk_customer} ";
        $execute = mysqli_query($connection, $update);

    }


    header("location: ../pages/user_management.php");
}
mysqli_close($connection);
