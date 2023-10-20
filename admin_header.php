<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="CSS/admin_style.css">
    <title>Hardware heaven</title>
</head>


<body>
    <header class="header">
        <div class="flex">
            <a href="admin_page.php" class="logo">H<span>h</span></a>
            <nav class="navbar">
                <a href="admin_page.php">Home</a>
                <a href="admin_products.php">Products</a>
                <a href="admin_orders.php">Orders</a>
                <a href="admin_users.php">Users</a>
                <a href="admin_contacts.php">Messages</a>
            </nav>
            <div class="icons">
                <div id="menu-btn" class="fas fa-bars burger"></div>
                <div id="user-btn" class="fas fa-user icon"></div>
            </div>
            <div class="account-box">
                <div class="dropdown">
                    <p>Username: <span><?php echo $_SESSION['admin_name']; ?></span></p>
                    <p>Email: <span><?php echo $_SESSION['admin_email']; ?></span></p>
                    <p class="logout-parent"><a href="logout.php" class="delete-btn">Logout</a></p>
                    <div class="close-btn">&times;</div>

                </div>

            </div>
        </div>
    </header>
    <script src="./js/admin_script.js"></script>

</body>

</html>