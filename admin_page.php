<?php
include 'conn.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

if(!isset($_SESSION['login_history_added'])){
    insertLoginHistory($admin_id, $_SERVER['REMOTE_ADDR'], $conn);
    $_SESSION['login_history_added'] = true;
}

function insertLoginHistory($admin_id, $ip_address, $conn) {
    $current_time = date('Y-m-d H:i:s');
    $insert_query = "INSERT INTO `login_history` (admin_id, ip_address, login_time) VALUES ('$admin_id', '$ip_address', '$current_time')";
    mysqli_query($conn, $insert_query) or die('insert query failed');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="CSS/admin_style.css">
    <title>Hardware haven</title>
</head>

<body>

    <?php include 'admin_header.php'; ?>
    <section class="dashboard">

        <h1 class="title">dashboard</h1>

        <div class="box-container">

            <div class="box">
                <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
                <h3>$<?php echo $total_pendings; ?>/-</h3>
                <p>total pendings</p>
            </div>

            <div class="box">
                <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
                <h3>$<?php echo $total_completed; ?>/-</h3>
                <p>completed payments</p>
            </div>

            <div class="box">
                <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
                <h3><?php echo $number_of_orders; ?></h3>
                <p>order placed</p>
            </div>

            <div class="box">
                <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
                <h3><?php echo $number_of_products; ?></h3>
                <p>products added</p>
            </div>

            <div class="box">
                <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
                <h3><?php echo $number_of_users; ?></h3>
                <p>normal users</p>
            </div>

            <div class="box">
                <?php 
            $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
                <h3><?php echo $number_of_admins; ?></h3>
                <p>admin users</p>
            </div>

            <div class="box">
                <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
                <h3><?php echo $number_of_account; ?></h3>
                <p>total accounts</p>
            </div>

            <div class="box">
                <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
                <h3><?php echo $number_of_messages; ?></h3>
                <p>new messages</p>
            </div>
            <div class="box">
            <div class="box">
    <?php
    $login_history = array();
    $select_logins = mysqli_query($conn, "SELECT login_time, admin_id FROM `login_history` ORDER BY login_time DESC LIMIT 5") or die('query failed');
    if(mysqli_num_rows($select_logins) > 0){
        while($fetch_logins = mysqli_fetch_assoc($select_logins)){
            $login_time = $fetch_logins['login_time'];
            $admin_id = $fetch_logins['admin_id'];
            $login_history[] = array('login_time' => $login_time, 'admin_id' => $admin_id);
        }
    }
    ?>
    <h3>Login History</h3>
    <?php
    if(!empty($login_history)) {
        foreach($login_history as $history) {
            $login_time = $history['login_time'];
            $admin_id = $history['admin_id'];
            echo "<p>Login Time: $login_time</p>";
            echo "<p>User ID: $admin_id</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>No login history available.</p>";
    }
    ?>
</div>



        </div>

    </section>

</body>

</html>
