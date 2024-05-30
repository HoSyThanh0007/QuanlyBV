<?php
// Include the database connection file
include './connect_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the patient ID from the request
    $maBN = $_POST['maBN'];

    // Update the status in the database from "Chưa khám bệnh" to "Đã khám bệnh"
    $updateQuery = "UPDATE tt SET trangThai = 'Đã khám bệnh' WHERE maBN = '$maBN'";
    if (mysqli_query($con, $updateQuery)) {
        echo "success"; // Return success message
    } else {
        echo mysqli_error($con); // Return error message
    }
}

// Close the database connection
mysqli_close($con);
?>
