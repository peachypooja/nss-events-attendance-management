<?php
$showAlert = false;
$showError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partial/_dbconnector.php';
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $sname = $_POST["sname"];
    $mtname = $_POST["mtname"];
    $DOB = $_POST["DOB"];
    $phone_no = $_POST["phone_no"];
    $vec_no = $_POST["vec_no"];
    $yoj = $_POST["yoj"];
    $class = $_POST["class"];
    $year = $_POST["year"];
    $bg = $_POST["bg"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];
    $password = ($_POST["password"]);
    $cpassword = ($_POST["cpassword"]);

    // Password requirements validation
    if (
        strlen($password) < 8 ||
        !preg_match("/[0-9]+/", $password) ||
        !preg_match("/[!@#$%^&*()\-_=+{};:,<.>]+/", $password) ||
        !preg_match("/[A-Z]+/", $password)
    ) {
        $showError = "Password does not meet requirements.";
    } elseif ($password !== $cpassword) {
        $showError = "Passwords do not match.";
    } 
    else {
        // Hash the password using password_hash() for storage
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $existSql = "SELECT * FROM `volunteer` WHERE username = '$username' AND vec_no = '$vec_no'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);

        if ($numExistRows > 0) {
            $showError = "Enter Valid Details";
        } else {
            $sql = "INSERT INTO `volunteer` (`Fname`, `Mname`, `surname`, `MTname`, `DOB`, `Phone_no`, `VEC_NO`, `YOJ`, `Class`, `year`, `Blood_grp`, `Gender`, `username`, `password`, `Hours`)
            VALUES ('$fname', '$mname', '$sname', '$mtname', '$DOB', '$phone_no', '$vec_no', '$yoj', '$class', '$year', '$bg', '$gender', '$username', '$password', '0');";
            $result = mysqli_query($conn, $sql);

            // if ($result) {
            //     $showAlert = true;
            // } else {
            //     $showError = "Error: Something went wrong while inserting into the database.";
            // }
            if (empty($showError)) {
                $showAlert = true;
            }
        }
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- <style>
    /* Custom CSS */
    body {
        background-color: #f5f5f5; /* Off-white or cream background */
        font-family: 'Arial', sans-serif;
        color: #333; /* Text color is dark gray */
        min-height: 100vh;
        margin: 0;
    }
    </style> -->
    <style>
        body {
        background: linear-gradient(90deg, #89CFF1, #ccccff, #a190d6);
        font-family: 'Arial', sans-serif;
        color: #333;
        min-height: 100vh;
        margin: 0;
        }
    </style>

    <!-- <link rel="stylesheet" href="style.css"> -->

    <!-- <link rel="stylesheet" href="Image\CSS\style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d304e9faef.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="justify-content-center align-items-center" style="min-height: 100vh;">
    <?php
    include 'partial/_header.php';
    ?>
    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulation you are successfully enrolled!!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if (!empty ($showError)) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div> ';
    }

    ?>


    <div class="container mt-5">
        <div class="card shadow" style="width: 600px; padding: 20px; margin: auto; border-radius: 25px;">
            <h1 class="card-header text-center">Enrollment Form</h1>
            <div class="card-body">
                <form action="/NSS/enroll.php" method="post">
                    <div class="md-5">
                        <div class="form-group">
                            <label for="Fname" class="form-label">First name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="fname" id="Fname" aria-describedby="Fname" required pattern="[A-Za-z]+" title="Only string values are allowed" required>
                        </div>
                    </div>
                    <div class="md-5">
                        <label for="Mname" class="form-label">Middle name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="mname" id="Mname" aria-describedby="Mname" required pattern="[A-Za-z]+" title="Only string values are allowed" required>
                    </div>
                    <div class="md-5">
                        <label for="Sname" class="form-label">Surname <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="sname" id="Sname" aria-describedby="Sname" required pattern="[A-Za-z]+" title="Only string values are allowed" required>
                    </div>
                    <div class="md-5">
                        <label for="mtname" class="form-label">Mother Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="mtname" id="mtname" aria-describedby="mtname" required pattern="[A-Za-z]+" title="Only string values are allowed" required>
                    </div>
                    <div class="md-5">
                        <label for="DOB" class="form-label">date of Birth <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="DOB" id="DOB" aria-describedby="DOB" required>
                    </div>

                    
                    <!-- <div class="md-5">
                        <label for="Pno" class="form-label">Phone number</label>
                        <input type="number" class="form-control" name="phone_no" id="Pno" aria-describedby="Pno" required>
                    </div> -->
                    <!-- <div class="md-5">
                        <label for="Pno" class="form-label">Phone number</label>
                        <input type="number" class="form-control" name="phone_no" id="Pno" aria-describedby="Pno" required pattern="[0-9]{10}" title="Phone number must be exactly 10 digits">
                    </div> -->
                    <div class="md-5">
                        <label for="Pno" class="form-label">Phone number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="phone_no" id="Pno" aria-describedby="Pno" required oninput="validatePhoneNumber(this)">
                    </div>
                    <script>
                    function validatePhoneNumber(input) {
                        const value = input.value;
                        const numericValue = value.replace(/\D/g, ''); // Remove non-numeric characters
                        if (numericValue.length === 10) {
                            input.setCustomValidity(''); // No validation error
                        } else {
                            input.setCustomValidity('Phone number must be exactly 10 digits');
                        }
                    }
                    </script>

                    <!-- <?php
                        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        //     $phone_no = $_POST["phone_no"];
                            
                        //     // Remove any non-numeric characters
                        //     $phone_no = preg_replace('/\D/', '', $phone_no);
                            
                        //     // Check if the phone number has exactly 10 digits
                        //     if (strlen($phone_no) === 10) {
                        //         // Valid phone number
                        //         // You can use $phone_no for further processing
                        //         echo "Valid phone number: " . $phone_no;
                        //     } else {
                        //         // Invalid phone number
                        //         echo "Phone number must be exactly 10 digits.";
                        //     }
                        // }
                    ?> -->

                    <div class="md-5">
                        <label for="VEC_No" class="form-label">VEC No <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="vec_no" id="VEC_No" aria-describedby="VEC_No" pattern="[A-Za-z0-9]+" title="Only letters and numbers are allowed" required>
                        <div id="VEC_No" class="form-text">Put your Enrollment number</div>
                    </div>
                    <div class="md-5">
                        <label for="yoj" class="form-label">Year of joining <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="yoj" id="yoj" aria-describedby="yoj" pattern="^\d+$" title="Only non-negative integers are allowed" required>
                    </div>

                    <!-- <div class="md-5">
                        <label for="yoj" class="form-label">Year of joining <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="yoj" id="yoj" aria-describedby="yoj" pattern="[0-9]+" title="Only non-negative integers are allowed" required>
                    </div> -->

                    <div class="md-5">
                        <label for="dept" class="form-label">Class <span class="text-danger">*</span></label>
                        <select class="form-select" id="dept" name="class" required>
                            <option>B.A. Culinary Arts</option>
                            <option>B.Sc Hospitality Studies</option>
                            <option>B.M.S.</option>
                            <option>B.Sc. Microbiology</option>
                            <option>B.Sc. Computer Science</option>
                            <option>B.Sc. Information Technology</option>
                            <option>B.Sc. Aeronautics </option>
                            <option>B.Sc. Aeronautics (Mechanical)</option>
                            <option>BAMMC</option>
                            <option>B.Sc. (Data Science)</option>
                            <option>B.Com. (Banking & Insurance)</option>
                            <option>B.Com.(Accounting & Finance)</option>
                        </select>
                    </div>
                    <div class="md-5">
                        <label for="year" class="form-label">YEAR <span class="text-danger">*</span></label>
                        <select class="form-select" id="year" name="year" required>
                            <option>FY</option>
                            <option>SY</option>
                            <option>TY</option>
                        </select>
                    </div>
                    <div class="md-5">
                        <label for="BG" class="form-label">Blood Group <span class="text-danger">*</span></label>
                        <select class="form-select" id="BG" name="bg" required>
                            <option>O+</option>
                            <option>O-</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                        </select>
                    </div>
                    <div class="md-5">
                        <label for="geneder" class="form-label">Gender <span class="text-danger">*</span></label>
                        <select class="form-select" id="geneder" name="gender" required>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="md-5">
                        <label for="username" class="form-label">username <span class="text-danger">*</span></label>
                        <input type="username" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="md-5">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye" id="passwordIcon"></i>
                            </button>
                        </div>
                        <p>Minimum 8 characters required (1 uppercase, 1 special character, 1 numeric)</p>
                    </div>



                    <div class="md-5">
                        <label for="cpassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                        <br>
                    </div>
                    <!-- <button type="submit" class="btn btn-outline-primary">Submit</button> -->

                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
            </div>
        </div>
        <p class="mt-3 text-center">If you are already enrolled, <a href="/NSS/login.php">click here to log
                in.</a></p>
    </div>
    <script>
$(document).ready(function() {
    $('#togglePassword').click(function() {
        var passwordInput = $('#password');
        var passwordIcon = $('#passwordIcon');
        
        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            passwordIcon.removeClass('fa-eye');
            passwordIcon.addClass('fa-eye-slash');
        } else {
            passwordInput.attr('type', 'password');
            passwordIcon.removeClass('fa-eye-slash');
            passwordIcon.addClass('fa-eye');
        }
    });
});
</script>


    <script src="https://kit.fontawesome.com/d304e9faef.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>