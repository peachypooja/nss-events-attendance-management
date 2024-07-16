<?php  
include 'partial/_dbconnector.php';
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: leader_login.php");
    exit;
}



?>

<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partial/_dbconnector.php';
    $eve_nm = $_POST["eve_nm"];
    $dt = $_POST["dt"];
    $t_incharge = $_POST["t_incharge"];
    $desc = $_POST["desc"];
    $male = 0;
    $female = 0;
    $sql = "INSERT INTO `events` (`Name`, `Date`,`Teacher_Incharge`, `Desc`, `Time`, `male`, `female`) 
                VALUES ('$eve_nm', '$dt','$t_incharge', '$desc', current_timestamp(),'$male','$female');";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $showAlert = true;
    }
    else{
        $showError = "Something is missing";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello <?php echo $_SESSION['username']?></title>
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

<body style="min-height: 100vh;">
<?php 
  include 'partial/_header.php';
  require 'partial/_dbconnector.php';
  ?>
<h4 class="alert-heading text-center mt-3">Welcome - <?php echo $_SESSION['username']?></h4>

<?php
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Event Added Successfully</strong>
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
        <div class="card shadow" style="width: 25rem; background-color: #f8f9fa; border: none; font-family: 'Arial, sans-serif';">
            <h1 class="card-header text-center" style="background-color: #007BFF; color: #fff; font-size: 24px; padding: 12px;">Add an Event</h1>
            <div class="card-body">

                <form action="/NSS/addEvent.php" method="post">
                    <div class="mb-3">
                        <label for="event" class="form-label">Name of Event <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="event" name="eve_nm" aria-describedby="event" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="date" name="dt" aria-describedby="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="t_incharge" class="form-label">Teacher Incharge <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="t_incharge" name="t_incharge" aria-describedby="t_incharge" required>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description of event <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>