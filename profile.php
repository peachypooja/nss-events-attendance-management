<?php  
include 'partial/_dbconnector.php';

session_start();

if(!isset($_SESSION['vol_loggedin']) || $_SESSION['vol_loggedin']!=true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
  require 'new.php';
  
  ?>
    <br><br>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="card-body text-center"
                style="background-color:beige;   background-size: cover; background-position: center; background-repeat: no-repeat;">
                <img src="Image\NSSnew.gif" class="img-thumbnail mb-3" alt="NSS Image"
                    style="max-width: 150px; margin: 0 auto;">
                <h3 class="card-title"><?php echo $username; ?></h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Name:
                    </strong><?php echo $fname .' '. $mname.' '.$sname.' '.$mtname ; ?></li>
                <li class="list-group-item"><strong>DOB: </strong><?php echo $dob; ?></li>
                <li class="list-group-item"><strong>Phone Number: </strong> <?php echo $phone_no; ?></li>
                <li class="list-group-item"><strong>Blood Group: </strong> <?php echo $bdgrp; ?></li>
                <li class="list-group-item"><strong>Gender: </strong> <?php echo  $gen; ?></li>
                <li class="list-group-item"><strong>Enrollment Number: </strong> <?php echo $vec_no ; ?></li>
                <li class="list-group-item"><strong>Year of Joining: </strong> <?php echo $yoj; ?></li>
                <li class="list-group-item"><strong>Class: </strong> <?php echo $class; ?></li>
                <li class="list-group-item"><strong>Year: </strong> <?php echo $year; ?></li>

            </ul>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>


