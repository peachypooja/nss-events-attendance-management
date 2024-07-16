<?php  
include 'partial/_dbconnector.php';
session_start();

if(!isset($_SESSION['vol_loggedin']) || $_SESSION['vol_loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<?php
include 'partial/_dbconnector.php';
//session_start();
//$vec_id = $_SESSION['vol_loggedin']['vec_no'];
//$sql = "SELECT `Hours` FROM `volunteer` WHERE `VEC_NO` = '$vec_no'";
//$result = mysqli_query($conn, $sql);
// if ($result) {
//     $row = mysqli_fetch_assoc($result);
//     $hours = $row['Hours'];
// }

require 'new.php';

$msg= false;
if ($hours <= 60) {
    $progressColorClass = 'bg-danger';
    $hours1 = 120 - $hours ;
    $progressmsg = "you have to complete $hours1 hours from 120";
} 
elseif ($hours <= 100 && $hours >= 60) {
    $progressColorClass = 'bg-warning'; 
    $hours1 = 120 - $hours;
    $progressmsg = "you have to complete $hours1 hours from 120";
} elseif ($hours >= 120 && $hours > 100) {
    $progressColorClass = 'bg-success';
    if ($hours >= 120) {
        $progressmsg = "Congratulation you have competed your 120 hours";
    }
    else{
        $hours1 = 120 - $hours;
        $progressmsg = "echo 'you have to complete $hours1 hours from 120 ";
    }
    
} else {
    $progressColorClass = 'bg-info'; // Default color (e.g., blue)
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Statistics</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    /* Custom CSS */

    /* body {
        background: linear-gradient(120deg, #6666ff, #ff6666, #f0f0f0);
        font-family: 'Arial', sans-serif;
        min-height: 100vh;
        margin: 0;
    } */
    body {
    background: linear-gradient(90deg, #89CFF1, #ccccff, #a190d6);
    font-family: 'Arial', sans-serif;
    min-height: 100vh;
    margin: 0;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .card-title {
        color: #e74c3c;
        /* Red font color */
    }

    .table {
        color: #333;
    }

    .table thead {
        background-color: #e74c3c;
        /* Red background for table header */
        color: #fff;
    }

    .table tbody tr:nth-child(odd) {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .table tbody tr:nth-child(even) {
        background-color: rgba(255, 255, 255, 0.2);
    }
    </style>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <!-- <h1>Hello, world!</h1> -->
    <?php 
    include 'partial/_header.php';
    require 'partial/_dbconnector.php';
    ?>
    <?php
include 'new.php';
// $vec_no = $_SESSION['volunteer_id']; 

?>
    <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="card p-4" style="width: 600px;">
                <h2 class="text-center card-title mb-4">Event Statistics</h2>

                <!-- Total Hours Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Total Hours</strong></h5>
                        <p class="card-text"> <?php echo $hours; ?></p>
                    </div>
                </div>

                <!-- Bar Graph -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Bar Graph</h5>
                        <div class="container mt-5">
                            <h3>Volunteer Hours Progress</h3>
                            <div class="progress">
                                <div class="progress-bar <?php echo $progressColorClass; ?>" role="progressbar"
                                    style="width: <?php echo $hours; ?>%;" aria-valuenow="<?php echo $hours; ?>"
                                    aria-valuemin="0" aria-valuemax="120"></div>
                            </div>
                            <p class="mt-2"><?php echo $progressmsg; ?> hours</p>
                        </div>
                    </div>
                </div>

                <!-- Total Events Table -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Events</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>sr no</th>
                                    <th>Date</th>
                                    <th>Event Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            require 'new.php';
                            $sql = "SELECT * FROM attendance WHERE Vol_id = '$vec_no'";

                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "
                                        <tr>
                                        <td>". $sno . "</td>
                                        <td>". $row['Date'] ."</td> 
                                        <td>". $row['Event_nm'] ."</td>
                                        </tr>";
                                    }
                                } else {
                                    echo "No events found for VEC ID $vec_no.";
                                }
                            } else {
                                echo "Error fetching events: " . mysqli_error($conn);
                            } 
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>