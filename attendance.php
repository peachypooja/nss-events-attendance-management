<?php
include 'partial/_dbconnector.php';
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
    header("location: index.php");
    exit;

}

?>


<?php
require 'partial/_dbconnector.php';
$show = false;
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_nm = $_POST['Event_nm'];
    $lead_id = $_POST['lead_id'];
    $hour = $_POST['hour'];
    $date = $_POST['date'];

    
    $maleCount = 0; 
    $femaleCount = 0; 

    

foreach ($_POST['vec_n'] as $key => $vec_no) {
    $attendance = isset($_POST['att'][$key]) ? 1 : 0;
    $gender = $_POST['gender'][$key];

    // Check if the attendance is 1 (volunteer is present) before inserting
    if ($attendance == 1) {
        $insertDataQuery = "INSERT INTO `attendance` (`Leader_id`, `Vol_id`, `Event_nm`, `hours`,`gender`, `Date`) VALUES ('$lead_id', '$vec_no', '$event_nm', '$hour','$gender' , '$date')";

            $result = mysqli_query($conn, $insertDataQuery);

            if ($result) {
                $showAlert = true;
            } else {
                echo $showError = "Something went wrong";
            }

           

        
        $gender = $_POST['gender'][$key];
        if ($gender == 'Male') {
            $maleCount++;
            $show = true;
            
        } elseif ($gender == 'Female') {
            $femaleCount++;
            $show = true;
        }
        
    }
    
}
     
}

?>


<?php

require 'partial/_dbconnector.php';
$show = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_nm = $_POST['Event_nm'];
    $hour = $_POST['hour'];


    foreach ($_POST['vec_n'] as $key => $vec_no) {
        $attendance = isset($_POST['att'][$key]) ? 1 : 0; // Check if the checkbox is checked

        if ($attendance == 1) {

            $updateHoursQuery = "UPDATE `volunteer` SET `Hours` = `Hours` + $hour WHERE `VEC_NO` = '$vec_no'";

            $result = mysqli_query($conn, $updateHoursQuery);

            if ($result) {
                $show = true;
            } else {
                echo $showError = "Something goes wrong";
            }
        }
    }
    if ($show) {

        header("location: total_attendance.php");

    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello
        <?php echo $_SESSION['username'] ?>
    </title>

    <!-- Include Bootstrap CSS and Google Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">


    <!-- Custom CSS for styling -->
    <style>
        /* body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(120deg, #f0e399, #c7c9979c, #f3f2c43f);
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
            margin: 0 auto;
            margin-top: 20px;
            max-width: 800px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 20px;
        }

        /* .card-header {
            
            
        } */
        /* Style the input to make it look like plain text */
        .text-input {
            border: none;
            background: none;
            outline: none;
        }

        .new:hover {
            outline: none;
            background-color: transparent;
        }

        .new:focus {
            display: none;
            border: none;
            /* outline: none;  */
            outline: none;
            background-color: transparent;
        }

        .card-title {
            font-size: 24px;
            padding: 20px;
            color: black;
        }

        .form-group label {
            font-weight: 700;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    include 'partial/_header.php';
    require 'partial/_dbconnector.php';
    ?>
    <?php
    require 'new2.php';
    ?>
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color:#007bff; color: #fff; text-align: center;">
                <h2 class="card-title">Attendance of Volunteers</h2>
            </div>
            <div class="card-body">
                <form action="/NSS/attendance.php" method="POST">
                    <div class="form-group">
                        <label for="Event_nm">Event name</label>
                        <select class="form-control" id="Event_nm" name="Event_nm">
                            <?php
                            // Assuming you have already established a database connection $conn
                            $sql = "SELECT * FROM events"; // Modify this query as needed

                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Use the event name as both the option value and label
                                    $eventName = $row['Name'];
                                    echo "<option value='$eventName'>$eventName</option>";
                                }
                            } else {
                                echo "<option value=''>No events found</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <select class="form-control" id="date" name="date">
                            <?php
                            // Assuming you have already established a database connection $conn
                            $sql = "SELECT * FROM events"; // Modify this query as needed

                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Use the event name as both the option value and label
                                    $eventDate = $row['Date'];
                                    echo "<option value='$eventDate'>$eventDate</option>";
                                }
                            } else {
                                echo "<option value=''>No events found</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lead_id">Leader_id</label>
                        <input class="form-control" id="lead_id" name="lead_id" value=<?php echo $lead_no; ?> readonly>

                    </div>
                    <!-- <div class="form-group">
                        <label for="hour">Hours</label>
                        <input type="number" class="form-control" id="hours" name="hour" value="0">
                    </div> -->
                    <div class="form-group">
                        <label for="hour">Hours</label>
                        <input type="number" class="form-control" id="hours" name="hour" value="0" min="1" max="40" oninput="validateHours()">
                    </div>

                    <script>
                        function validateHours() {
                            var hoursInput = document.getElementById("hours");
                            var hoursValue = parseInt(hoursInput.value);

                            if (hoursValue < 1) {
                                alert("Hours should be at least 1");
                                hoursInput.value = 1;
                            } else if (hoursValue > 40) {
                                alert("Hours should be at most 40");
                                hoursInput.value = 40;
                            }
                        }
                    </script>

                    <br>
                    <hr>
 

                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Gender</th>
                                <th scope="col">VEC_Code</th>
                                <th scope="col">Attendance</th>
                            </tr>
                        </thead>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `volunteer`";
                            $result = mysqli_query($conn, $sql);
                            $sno = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $sno = $sno + 1;

                                echo "
                                    <tr>
                                        <td>" . $sno . "</td>
                                        <td name='name1[]'>" . $row['Fname'] . "</td>
                                        <td name='sname1[]'>" . $row['surname'] . "</td>
                                        <td>
                                        " . $row['Gender'] . "
                                        <input type='hidden' name='gender[]' value=" . $row['Gender'] . ">
                                    </td>

                                        <td>" . $row['VEC_NO'] . "
                                            <input type='hidden' class='text-input' name='vec_n[]' type='text' value=" . $row['VEC_NO'] . " readonly>
                                        </td>
                                        <td>
                                            <div class='form-check'>
                                                <input type='checkbox' class='form-check-input' name='att[]' value='1'>
                                                <label class='form-check-label'> Present</label>
                                            </div>
                                        </td>
                                    </tr>";
                                
                            }
                            ?>
                        </tbody>
                    </table>
                    <button type='submit' class='btn btn-primary' onclick="showAlert(<?php echo $maleCount; ?>, <?php echo $femaleCount; ?>)"aQ Q   Q   >Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
    function showAlert(maleCount, femaleCount) {
        alert("Form submitted successfully!\nTotal Males: " + maleCount + "\nTotal Females: " + femaleCount);
        

    }
    
</script>



    <hr>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>