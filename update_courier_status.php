<?php
include 'conn.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courier_id = $_POST['courier_id'];
    $status = $_POST['status'];

    // Update the courier status in the database
    $update_query = mysqli_query($conn, "UPDATE courier SET status = '$status' WHERE id = '$courier_id'");

    if ($update_query) {
        echo 'Courier status updated successfully!';
    } else {
        echo 'Failed to update the courier status. Please try again.';
    }
} else {
    echo 'Invalid request method. Please use POST.';
}
?>
