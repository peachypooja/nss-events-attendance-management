<?php
include 'partial/_dbconnector.php';

session_start();

if (!isset($_SESSION['Admin_loggedin']) || $_SESSION['Admin_loggedin'] != true) {
    header("location: admin_login.php");
    exit;
}

?>
<?php

$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $leader_id = $_POST['leader_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (
        strlen($password) <= 8 ||
        !preg_match("/[0-9]+/", $password) ||
        !preg_match("/[!@#$%^&*()\-_=+{};:,<.>]+/", $password) ||
        !preg_match("/[A-Z]+/", $password)
    ) {
        $showError = "Password does not meet requirements.";
    } elseif ($password !== $confirm_password) {
        $showError = "Passwords do not match.";
    } else {
        $existSql = "SELECT * FROM `leader` WHERE username = '$username'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0) {
            $showError = "Username Already Exists";
        } else {
            if ($password == $confirm_password) {
                $sql = "INSERT INTO `leader` (`LEAD_NO`, `Name`, `username`, `password`) VALUES ('$leader_id', '$name', '$username', '$password')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $showAlert = true;
                } else {
                    $showError = true;
                }
            }
        }
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Leader</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <style>
        /* Custom gradient color for the card */
        .custom-card {
            background: linear-gradient(90deg, #f0e399, #c7c9979c, #f3f2c43f);
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            padding: 20px;
        }
    </style> -->
    <style>
    body {
        
        background: linear-gradient(90deg, #89CFF1, #ccccff, #a190d6);
        font-family: 'Arial', sans-serif;
        min-height: 100vh;
        margin: 0;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d304e9faef.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php
    include 'partial/_header.php';
    require 'partial/_dbconnector.php';
    ?>


    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulation Leader added successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div> ';
    }

    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Custom Gradient Card -->
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="text-center">Add Leader</h3>
                    </div>
                    <div class="card-body">
                        <form action="addLeader.php" method="POST">
                            <div class="form-group">
                                <label for="Event_nm">Leader ID:</label>
                                <select class="form-control" id="leader_id" name="leader_id" required>
                                    <?php
                                    $sql = "SELECT * FROM volunteer"; // Modify this query as needed

                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $vec_no1 = $row['VEC_NO'];
                                            echo "<option value='$vec_no1'>$vec_no1</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No id found</option>";
                                    }
                                    ?>
                                </select>
                                <!-- <label for="leader_id">Leader ID:</label>
                                <input type="text" class="form-control" id="leader_id" name="leader_id" required> -->
                            </div>
                            <div class="form-group">
                                <label for="name">Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye" id="passwordIcon"></i>
                            </button>
                        </div>
                        <p>Minimum 8 characters required (1 uppercase, 1 special character, 1 numeric)</p>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="confirm_password">Confirm Password: <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Leader</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                var passwordInput = $('#password');
                var passwordIcon = $('#passwordIcon');

                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    passwordIcon.removeClass('fa-eye');
                    passwordIcon.addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    passwordIcon.removeClass('fa-eye-slash');
                    passwordIcon.addClass('fa-eye');
                }
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/d304e9faef.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>