<?php
require 'partial/_dbconnector.php';
session_start();
$show = false;

// for male and female count
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['Event_nm']) && isset($_POST['date'])) {
        $event_name = $_POST['Event_nm'];
        $date = $_POST['date'];

        $query_male = "SELECT COUNT(*) as male_count FROM attendance WHERE Event_nm = '$event_name' AND gender = 'Male' AND Date = '$date'";
        $result_male = mysqli_query($conn, $query_male);
        $row_male = mysqli_fetch_assoc($result_male);
        $male_count = $row_male['male_count'];

        $query_female = "SELECT COUNT(*) as female_count FROM attendance WHERE Event_nm = '$event_name' AND gender = 'Female' AND Date = '$date'";
        $result_female = mysqli_query($conn, $query_female);
        $row_female = mysqli_fetch_assoc($result_female);
        $female_count = $row_female['female_count'];

        $total = $male_count + $female_count;

        $show = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details Form</title>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
    <div class="container mt-5">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sr.No</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Teacher_Incharge</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM events"; 
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "
                        <tr>
                            <td>" . $sno . "</td>
                            <td>" . $row['Name'] . "</td>
                            <td>" . $row['Teacher_Incharge'] . "</td>
                            <td>" . $row['Date'] . "</td>
                    
                            </tr>";}
                ?>
                
            </tbody>
        </table>
    </div>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-danger text-white">
                <h2 class="card-title">Check total no. of participaints</h2>
            </div>
            <div class="card-body">
                <form action="total_attendance.php" method="POST">
                    <div class="form-group">
                        <label for="Event_nm">Event Name</label>
                        <input list="eventList" class="form-control" id="Event_nm" name="Event_nm">
                        <datalist id="eventList">
                            <?php
                            // Assuming you have already established a database connection $conn
                            $sql = "SELECT * FROM events"; // Modify this query as needed

                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $eventName = $row['Name'];
                                    echo "<option value='$eventName'>";
                                }
                            } else {
                                echo "<option value=''>No events found</option>";
                            }
                            ?>
                        </datalist>
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input list="eventDates" class="form-control" id="date" name="date">
                        <datalist id="eventDates">
                            <?php
                            // Assuming you have already established a database connection $conn
                            $sql = "SELECT DISTINCT Date FROM events"; // Modify this query as needed

                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Use the event date as the option label
                                    $eventDate = $row['Date'];
                                    echo "<option value='$eventDate'>";
                                }
                            } else {
                                echo "<option value=''>No events found</option>";
                            }
                            ?>
                        </datalist>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if ($show) {
        echo "<div class='container mt-5'>
                        <div class='card shadow'>
                            <div class='card-header bg-primary text-white'>
                                <h2 class='card-title'>Event Attendance Details</h2>
                            </div>
                            <div class='card-body'>
                                <h4>Total Male Attendance for $event_name on $date is :- $male_count</h4>
                                <h4>Total Female Attendance for $event_name on $date is :- $female_count</h4>
                                <h4>Total Attendance for $event_name on $date is :- $total</h4>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>";
    }






    ?>

    <!-- Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>