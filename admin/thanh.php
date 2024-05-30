
<?php
// Include file connect_db.php to establish database connection
include './connect_db.php';

// Check if maBN is set in the POST data
if(isset($_POST['maBN'])) {
    // Escape special characters to prevent SQL injection
    $maBN = mysqli_real_escape_string($con, $_POST['maBN']);

    // Query to select the patient name based on the maBN
    $query = "SELECT tenBN FROM benhnhan1 WHERE maBN = '$maBN'";

    // Perform the query
    $result = mysqli_query($con, $query);

    // Check if query was successful
    if($result) {
        // Fetch the patient name from the result set
        $row = mysqli_fetch_assoc($result);
        $tenBN = $row['tenBN'];

        // Return the patient name
        echo $tenBN;
    } else {
        // If query fails, return an error message
        echo "Error retrieving patient name";
    }
} else {
    // If maBN is not set, return an error message
    echo "Mã bệnh nhân không được đặt.";
}

// Close the database connection
mysqli_close($con);
?>
