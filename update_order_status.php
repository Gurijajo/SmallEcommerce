<?php
include 'conn.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    // Update the order status in the database
    $update_query = mysqli_query($conn, "UPDATE orders SET status = '$status' WHERE id = '$order_id'");

    if ($update_query) {
        echo 'Order status updated successfully!';
    } else {
        echo 'Failed to update the order status. Please try again.';
    }
} else {
    echo 'Invalid request method. Please use POST.';
}
?>
