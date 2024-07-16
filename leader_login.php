<?php
$login = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    require 'partial/_dbconnector.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $exists=false;
    $sql = "Select * from leader where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: attendance.php");
    }
 
    else{
        $showError = "Invalid Credentials";
    }

}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leader Login - NSS</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<style>
    body {
    
    background: linear-gradient(90deg, #89CFF1, #ccccff, #a190d6);
    font-family: 'Arial', sans-serif;
    min-height: 100vh;
    margin: 0;
}
</style>

</head>

<body style="min-height: 100vh;">

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
     <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 25rem; border-radius: 20px; ">
            <h1 class="card-header text-center">Leader Login</h1>
            <div class="card-body">
                <form action="/NSS/leader_login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>

                    <p class="mt-3 text-center">If you are new, <a href="/NSS/enroll.php">click here to enroll yourself.</a></p>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>