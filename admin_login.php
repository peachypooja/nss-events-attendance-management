<?php
$login = false;
$showError = false;
$username1 = "admin";
$password1 = "poojaa";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    require 'partial/_dbconnector.php';
    $username = $_POST["username"];
    $password = ($_POST["password"]);
    $exists=false;

    if ($username == $username1 && $password == $password1){
        $login = true;
        session_start();
        $_SESSION['Admin_loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: index.php");
    }
 
    else{
        $showError = "Invalid Credenstials";
    }

}

?>
<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
    body {
    
    background: linear-gradient(90deg, #89CFF1, #ccccff, #a190d6);
    font-family: 'Arial', sans-serif;
    min-height: 100vh;
    margin: 0;
    }
    </style>
</head>

<body>

    <?php 
   include 'partial/_header.php';
  require 'partial/_dbconnector.php';
  ?>
   <?php
    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulation</strong> You are succesfully logged in!!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if($showError){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div> ';
        }
    
?>
   <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="border-radius: 20px;" >
                    <div class="card-header">
                        <h3 class="text-center">Admin Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="/NSS/admin_login.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div><br>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>