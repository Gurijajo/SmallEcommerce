<?php
include 'conn.php';

session_start();

$message = array();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select_users = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die('Query Failed');

    if (mysqli_num_rows($select_users) > 0) {
        $row = mysqli_fetch_assoc($select_users);
        if($row['user_type']=='admin'){
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin_page.php');
        }elseif($row['user_type']=='user'){
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');
        }
    } else {
        $message[] = 'Invalid email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Hardware haven</title>
</head>

<body>

<?php 
include 'header.php';
if(isset($message)){
    if (is_array($message)) {
        foreach ($message as $msg) {
            echo '
            <div class="message"> <span>'.$msg.'</span>
            <i class="fas fa-times close-icon" onclick="removeMessage(this)"></i>
            </div>
            ';
        }
    } 
}
?>>
    <div class="container">
        <div class="form-container">
            <form action="" method="post">
                <h3>Login</h3>
                <input type="email" name="email" placeholder="Email" required class="box">
                <input type="password" name="password" placeholder="Password" class="box">
                <input type="submit" name="submit" value="Sign In" class="btn">
                <p>Don't have an account? <a href="register.php">Register Now</a></p>
            </form>
        </div>
    </div>
    <script>
        function removeMessage(element) {
            element.parentElement.remove();
        }
    </script>
    <?php 
    include 'footer.php';
    ?>

<script src="js/script.js"></script>
</body>

</html>
