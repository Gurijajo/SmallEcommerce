<?php
include 'conn.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
   exit();
}


if (isset($_POST['create_courier'])) {
   $courier_name = $_POST['courier_name'];
   $contact_number = $_POST['courier_phone'];
   $email = $_POST['courier_email'];
   $address = $_POST['courier_address'];


   $insert_courier_query = mysqli_query($conn, "INSERT INTO courier (name, contact_number, email, address, status) VALUES ('$courier_name', '$contact_number', '$email', '$address', 'free')");

   if ($insert_courier_query) {
      $message = 'Courier has been created successfully!';
   } else {
      $message = 'Failed to create the courier. Please try again.';
   }
}

if (isset($_GET['order_id'])) {
   $order_id = $_GET['order_id'];

   
   $select_order_query = mysqli_query($conn, "SELECT * FROM orders WHERE id = '$order_id'");
   $order_details = mysqli_fetch_assoc($select_order_query);

   $user_id = $order_details['user_id'];
   $placed_on = $order_details['placed_on'];
   $name = $order_details['name'];
   $number = $order_details['number'];
   $email = $order_details['email'];
   $address = $order_details['address'];
   $total_products = $order_details['total_products'];
   $total_price = $order_details['total_price'];
   $payment_method = $order_details['method'];
   $payment_status = $order_details['payment_status'];
}


if (isset($_POST['assign_courier'])) {
   $courier_id = $_POST['courier_id'];

   
   $update_query = mysqli_query($conn, "UPDATE orders SET courier_id = '$courier_id', payment_status = 'completed' WHERE id = '$order_id'");
   $update_courier_status_query = mysqli_query($conn, "UPDATE courier SET status = 'busy' WHERE id = '$courier_id'");

   if ($update_query && $update_courier_status_query) {
      $message = 'Order has been assigned to the courier successfully!';
   } else {
      $message = 'Failed to assign the order to a courier. Please try again.';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign to Courier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/admin_style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="orders">
        <h1 class="title">Assign Order to Courier</h1>

        <div class="box">
            <p> User ID: <span><?php echo $user_id; ?></span></p>
            <p> Placed on: <span><?php echo $placed_on; ?></span></p>
            <p> Name: <span><?php echo $name; ?></span></p>
            <p> Number: <span><?php echo $number; ?></span></p>
            <p> Email: <span><?php echo $email; ?></span></p>
            <p> Address: <span><?php echo $address; ?></span></p>
            <p> Total Products: <span><?php echo $total_products; ?></span></p>
            <p> Total Price: <span>$<?php echo $total_price; ?>/-</span></p>
            <p> Payment Method: <span><?php echo $payment_method; ?></span></p>
            <p> Status: <span><?php echo $payment_status; ?></span></p>
            <?php
         if (isset($order_details['courier_id'])) {
            $courier_id = $order_details['courier_id'];
            $select_courier_query = mysqli_query($conn, "SELECT * FROM courier WHERE id = '$courier_id'");
            $courier_details = mysqli_fetch_assoc($select_courier_query);

            if ($courier_details) {
               $courier_name = $courier_details['name'];
               $courier_status = $courier_details['status'];

               echo "<p> Courier ID: <span>$courier_id</span></p>";
               echo "<p> Courier Name: <span>$courier_name</span></p>";
               echo "<p> Courier Status: <span>$courier_status</span></p>";
            }
         }   
?>


            <form action="" method="post">
                <div class="form-group">
                    <label for="courier_id">Courier ID:</label>
                    <input type="text" id="courier_id" name="courier_id" required>
                </div>
                <input type="submit" value="Assign" name="assign_courier" class="option-btn">
            </form>
        </div>
    </section>

    <section class="courier-form">
        <h1 class="title">Add Courier</h1>

        <div class="box">
            <form action="" method="post">
                <div class="form-group">
                    <label for="courier_name">Courier Name:</label>
                    <input type="text" id="courier_name" name="courier_name" required>
                </div>
                <div class="form-group">
                    <label for="courier_phone">Courier Phone:</label>
                    <input type="text" id="courier_phone" name="courier_phone" required>
                </div>
                <div class="form-group">
                    <label for="courier_email">Courier Email:</label>
                    <input type="text" id="courier_email" name="courier_email" required>
                </div>
                <div class="form-group">
                    <label for="courier_address">Courier Address:</label>
                    <input type="text" id="courier_address" name="courier_address" required>
                </div>
                <input type="submit" value="Add" name="create_courier" class="option-btn">
            </form>
        </div>
    </section>

    <script src="../js/admin_script.js"></script>
    <script>
    $(document).ready(function() {
        setTimeout(function() {

            $.post("update_order_status.php", {
                    order_id: <?php echo $order_id; ?>,
                    status: 'completed'
                })
                .done(function(response) {
                    console.log(response);
                })
                .fail(function(error) {
                    console.log(error);
                });


            $.post("update_courier_status.php", {
                    courier_id: <?php echo $courier_id; ?>,
                    status: 'free'
                })
                .done(function(response) {
                    console.log(response);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }, 60000);
    });
    </script>
</body>

</html>