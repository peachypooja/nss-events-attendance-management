$maleCount = 0; // Initialize male count
$femaleCount = 0; // Initialize female count

// Inside the loop where you process the form submission
foreach ($_POST['vec_n'] as $key => $vec_no) {
    $attendance = isset($_POST['att'][$key]) ? 1 : 0; // Check if the checkbox is checked

    // Check if the attendance is 1 (volunteer is present) before inserting
    if ($attendance == 1) {
        $insertDataQuery = "INSERT INTO `attendance` (`Leader_id`, `Vol_id`, `Event_nm`, `hours`,`gender`, `Date`) VALUES ('$lead_id', '$vec_no', '$event_nm', '$hour','$gender' , '$date')";

            $result = mysqli_query($conn, $insertDataQuery);

            if ($result) {
                $showAlert = true;
            } else {
                echo $showError = "Something went wrong";
            }

        // Update the male and female counts
        $gender = $_POST['gender'][$key];
        if ($gender === 'Male') {
            $maleCount++;
        } elseif ($gender === 'Female') {
            $femaleCount++;
        }
    }
}

foreach ($_POST['vec_n'] as $key => $vec_no) {
        //$name = $_POST['name1'][$key];
        //$surname = $_POST['sname1'][$key];
        $attendance = isset($_POST['att'][$key]) ? 1 : 0; // Check if the checkbox is checked

        // Check if the attendance is 1 (volunteer is present) before inserting
        if ($attendance == 1) {
            // Insert volunteer data into the single table
            $insertDataQuery = "INSERT INTO `attendance` (`Leader_id`, `Vol_id`, `Event_nm`, `hours`, `Date`) VALUES ('$lead_id', '$vec_no', '$event_nm', '$hour', '$date')";

            $result = mysqli_query($conn, $insertDataQuery);

            if ($result) {
                $showAlert = true;
            } else {
                echo $showError = "Something went wrong";
            }
        }
    }
}

// After the loop, you can display the counts
echo "Total Male Volunteers: " . $maleCount;
echo "Total Female Volunteers: " . $femaleCount;



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
    <tbody>
        <?php
        $sql = "SELECT * FROM `volunteer`";
        $result = mysqli_query($conn, $sql);
        $sno = 0;
        $maleCount = 0; // Initialize male count
        $femaleCount = 0; // Initialize female count
        while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;

            echo "
            <tr>
                <td>" . $sno . "</td>
                <td name='name1[]'>" . $row['Fname'] . "</td>
                <td name='sname1[]'>" . $row['surname'] . "</td>
                <td>" . $row['Gender'] . "</td>
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

            // Update the male and female counts
            if ($row['Gender'] === 'Male') {
                $maleCount++;
            } elseif ($row['Gender'] === 'Female') {
                $femaleCount++;
            }
        }
        ?>
    </tbody>
</table>

<!-- Table to display the count of male and female volunteers -->
<table class="table">
    <thead>
        <tr>
            <th>Gender</th>
            <th>Count</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Male</td>
            <td><?php echo $maleCount; ?></td>
        </tr>
        <tr>
            <td>Female</td>
            <td><?php echo $femaleCount; ?></td>
        </tr>
    </tbody>
</table>
