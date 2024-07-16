<?php
include 'partial/_dbconnector.php';

session_start();

if (!isset($_SESSION['Admin_loggedin']) || $_SESSION['Admin_loggedin'] != true) {
    header("location: admin_login.php");
    exit;
}

?>
<?php
require 'partial/_dbconnector.php';
if (isset($_GET['delete'])) {
    $ld_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `leader` WHERE `ld_id` = $ld_id";
    $result = mysqli_query($conn, $sql);
    header('Location: del_leader.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details Form</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <style>
        body {
            background: linear-gradient(90deg, #5a4aebe1, #d4d4cdef, #df4d4dea);
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            margin: 0;
        }
    </style> -->
    <style>
        body {
        
        background: linear-gradient(90deg, #89CFF1, #ccccff, #a190d6);
        font-family: 'Arial', sans-serif;
        min-height: 100vh;
        margin: 0;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <?php
    include 'partial/_header.php';
    require 'partial/_dbconnector.php';
    ?>
    <div class="container mt-5">
        <!-- Card for Total Event Details -->
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title">Total Event Details</h2>
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Leader NO</th>
                            <th scope="col">username</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM leader";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo "
                                <tr>
                                    <td>" . $sno . "</td>
                                    <td>" . $row['Name'] . "</td>
                                    <td>" . $row['LEAD_NO'] . "</td>
                                    <td>" . $row['username'] . "</td>
                                    <td><button class='delete btn btn-sm btn-primary' id=" . $row['ld_id'] . ">Delete</button> </td>
                                </tr>
                                ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <script>
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("deleted");
                ld_id = e.target.id;

                if (confirm("Are you sure you want to delete this note!")) {
                    console.log("yes");
                    window.location = `del_leader.php?delete=${ld_id}`;
                } else {
                    console.log("no");
                }
            })
        })
    </script>






    <!-- Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>

</html>