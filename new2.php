<?php  
include 'partial/_dbconnector.php';

// session_start();
$name = $_SESSION['username'];
$existSql = "SELECT * FROM `leader` WHERE username = '$name'";
$result = mysqli_query($conn, $existSql);
$numExistRows = mysqli_num_rows($result);
if ($numExistRows == 1){
    $row = mysqli_fetch_assoc($result);
    $lead_no = $row['LEAD_NO'];
    $name = $row['Name'];
    $username = $row['username'];
    $password = $row['password'];    
}


?>

