<?php 
    session_start();
    include 'conn.php';

    $message = array(); 

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
        $user_type = $_POST['user_type'];
    
        $select_users = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'") or die('Query Failed');
        
        if(mysqli_num_rows($select_users) > 0 ){
            $message[] = 'User already exists!';
        } else {
            if($password != $cpassword){
                $message[] = 'Confirm Password does not match!';
            } else {
                $insert_query = "INSERT INTO users (name, email, password, user_type) VALUES ('$name', '$email', '$password', '$user_type')";
                if(mysqli_query($conn, $insert_query)) {
                    $message[] = 'Registered Successfully!';
                    header('location: login.php');
                } else {
                    $message[] = 'Error in registration!';
                }
            }
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

<body>
    <div class="container">
        <div class="form-container">
            <form action="" method="post">
                <h3>Register Now</h3>
                <input type="text" name="name" placeholder="Name" required class="box">
                <input type="email" name="email" placeholder="Email" required class="box">
                <input type="password" name="password" placeholder="Password" required class="box">
                <input type="password" name="cpassword" placeholder="Confirm Your Password" required class="box">
                <select name="user_type" id="user_choice">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <input type="submit" name="submit" value="Sign Up" class="btn">
                <p>Already have an account? <a href="login.php">Login Now</a></p>
            </form>
        </div>
    </div>

    <script>
    function removeMessage(element) {
        element.parentElement.remove();
    }
    </script>


</body>

</html>