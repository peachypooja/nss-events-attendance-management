<?php
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'partial/_dbconnector.php';
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    // $VEC_NO = $_POST["VEC_NO"];

    $sql = "SELECT * FROM volunteer WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);

        if ($num == 1) {
            $login = true;
            session_start();
            $_SESSION['vol_loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            // Fetch the VEC_NO from the result
            $row = mysqli_fetch_assoc($result);
            $_SESSION['vec_no'] = $row['VEC_NO'];

            header("location: index.php");
        } else {
            $showError = "Invalid Credentials";
        }
    } else {
        $showError = "Database Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- <style>
      body {
        background: linear-gradient(120deg, #6666ff, #ff6666, #f0f0f0);
        font-family: 'Arial', sans-serif;
        min-height: 100vh;
        margin: 0;
    }
    </style> -->
    <style>
        body {
            /* background: linear-gradient(120deg, #f0e399, #c7c9979c, #f3f2c43f); */
            background: linear-gradient(90deg, #89CFF1, #ccccff, #a190d6);
            font-family: 'Arial', sans-serif;
            /* background-image: url("Image/volunteer.png"); */
            align-items: center;
            justify-content: center;
        }

        .custom-card {
            
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            
            background-color: #fff;
            padding: 20px;
        }
    </style>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body center>
    <?php 
  include 'partial/_header.php';
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
   <div class="container my-4">
        <div class="card custom-card" style="border-radius: 25px; margin-top: 10px;">
            <div class="card-body">
                <h1 class="card-title text-center">Login to our website</h1>
                
                <form action="/NSS/login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Login</button>
                </form>
                <p class="mb-0">If you are new, then <a href="/NSS/enroll.php">click here to enroll yourself.</a></p>
                <p class="mb-0">If you are a Leader, then <a href="/NSS/leader_login.php">click here to login.</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>