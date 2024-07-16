<?php  
include 'partial/_dbconnector.php';

// session_start();
$name = $_SESSION['username'];
$existSql = "SELECT * FROM `volunteer` WHERE username = '$name'";
$result = mysqli_query($conn, $existSql);
$numExistRows = mysqli_num_rows($result);
if ($numExistRows == 1){
    $row = mysqli_fetch_assoc($result);
    $vol_id = $row['vol_id'];
    $fname = $row['Fname'];
    $mname = $row['Mname'];
    $sname = $row['surname'];
    $mtname = $row['MTname'];
    $dob = $row['DOB'];
    $phone_no = $row['Phone_no'];
    $vec_no = $row['VEC_NO'];
    $yoj = $row['YOJ'];
    $class = $row['Class'];
    $year = $row['year'];
    $bdgrp = $row['Blood_grp'];
    $gen = $row['Gender'];
    $username = $row['username'];
    $password = $row['password'];
    $hours = $row['Hours'];

    
}


?>

