<?php
require 'partial/_dbconnector.php';
session_start();
$show = false;

?>
<?php
// Database connection code

// Fetch data from the "volunteers" table
$sql = "SELECT * FROM volunteer";
$result = mysqli_query($conn, $sql);

// Create an array to store the volunteer data
$volunteers = array();
while ($row = mysqli_fetch_assoc($result)) {
    $volunteers[] = $row;
}

// mysqli_close($connection);
// ... Your existing PHP code for connecting to the database and fetching all volunteers ...

// Check if a search query is provided in the GET parameters
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM volunteer WHERE 
            Fname LIKE '%$search%' OR
            surname LIKE '%$search%' OR
            Phone_no LIKE '%$search%' OR
            VEC_NO LIKE '%$search%' OR
            Class LIKE '%$search%' OR
            year LIKE '%$search%' OR
            Gender LIKE '%$search%' OR  
            Hours LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    
    // Reset the $volunteers array to store the search results
    $volunteers = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $volunteers[] = $row;
    }
}

// ... Your existing PHP code for displaying volunteers ...

?>

<!DOCTYPE html>
<html>
<head>
    <title>Volunteers List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       body {
            background: linear-gradient(90deg, #89CFF1, #ccccff, #a190d6);
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            margin: 0;
            justify-content: center;
            align-items: center;
        }
        h2 {
            color: black; /* Replace with your desired color code */
        }
        .container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
            opacity: 0.9; /* Slightly increase opacity for better readability */
            margin-top: 20px;
        }

        .table {
            background-color: #f8f9fa;
            border-radius: 10px;
            margin-top: 20px;
            overflow: hidden; /* Hide overflowing content */
        }

        th, td {
            text-align: center;
            padding: 10px; /* Add padding for better spacing */
            font-size: 14px; /* Adjust font size for better readability */
        }

        th {
            background-color: #343a40;
            color: #4a4c66; /* Change text color to white for visibility */
            text-align: center;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
        }

/* Remove the bold font-weight from table rows */
        td {
            font-weight: normal;
        }

        /* Hover effect for table rows */
        tr:hover {
            background-color: #e0e0e0;

        }

    </style>
</head>
<body>
    <?php
        include 'partial/_header.php';
        require 'partial/_dbconnector.php';
    ?>
    <div class="container">
        <h2 style="text-align: center";><b>Volunteers List</b></h2>
        <div style="display: flex; justify-content: space-between;">
            <form action="" method="GET">
                <label for="search">Search Volunteers:</label>
                <input type="text" id="search" name="search" placeholder="Enter a keyword">
                <input type="submit" value="Search">
            </form>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>First Name</th>
                    <!-- <th>Middle Name</th> -->
                    <th>Surname</th>
                    <!-- <th>Mother's Name</th> -->
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th>VEC Number</th>
                    <!-- <th>Year of Joining NSS</th> -->
                    <th>Course Name</th>
                    <th>Course Year</th>
                    <!-- <th>Blood Group</th> -->
                    <th>Gender</th>
                    <th>Hours</th>
                    <!-- <th>Username</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $srno=0;
                foreach ($volunteers as $volunteer) : ?>
                    <tr>
                        <td><?php 
                        $srno=$srno+1;
                        echo $srno; ?></td>
                        <td><?php echo $volunteer['Fname']; ?></td>
                        <!-- <td><?php echo $volunteer['Mname']; ?></td> -->
                        <td><?php echo $volunteer['surname']; ?></td>
                        <!-- <td><?php echo $volunteer['MTname']; ?></td> -->
                        <td><?php echo $volunteer['DOB']; ?></td>
                        <td><?php echo $volunteer['Phone_no']; ?></td>
                        <td><?php echo $volunteer['VEC_NO']; ?></td>
                        <!-- <td><?php echo $volunteer['YOJ']; ?></td> -->
                        <td><?php echo $volunteer['Class']; ?></td>
                        <td><?php echo $volunteer['year']; ?></td>
                        <!-- <td><?php echo $volunteer['Blood_grp']; ?></td> -->
                        <td><?php echo $volunteer['Gender']; ?></td>
                        <td><?php echo $volunteer['Hours'];?></td>
                        <!-- <td><?php echo $volunteer['username']; ?></td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

