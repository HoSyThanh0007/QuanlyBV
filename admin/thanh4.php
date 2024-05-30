<?php
// Include file connect_db.php to establish database connection
include './connect_db.php';

// Check if maBN is set in the POST data
if(isset($_POST['maBN'])) {
    // Escape special characters to prevent SQL injection
    $maBN = mysqli_real_escape_string($con, $_POST['maBN']);

    // Query to select the patient name based on the maBN
    $query = "SELECT TenBN, ngayDT, ngayXuat, DATEDIFF(ngayXuat, ngayDT) AS tongNgay FROM bennhandieutri WHERE maBN = '$maBN'";

    // Perform the query
    $result = mysqli_query($con, $query);

    // Check if query was successful
    if($result) {
        // Fetch the patient data from the result set
        if ($row = mysqli_fetch_assoc($result)) {
            $response = array(
                'TenBN' => $row['TenBN'],
                'ngayDT' => $row['ngayDT'],
                'ngayXuat' => $row['ngayXuat'],
                'tongNgay' => $row['tongNgay']
            );
            // Return the patient data as JSON
            echo json_encode($response);
        } else {
            echo json_encode(array('error' => 'No patient found'));
        }
    } else {
        // If query fails, return an error message
        echo json_encode(array('error' => 'Error retrieving patient data'));
    }
} else {
    // If maBN is not set, return an error message
    echo json_encode(array('error' => 'Mã bệnh nhân không được đặt.'));
}

// Close the database connection
mysqli_close($con);
?>
