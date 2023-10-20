<?php
    $database_server='localhost';
    $database_username='root';
    $database_password='';
    $database_name='HardwareSP_db';

    $conn=mysqli_connect($database_server, $database_username, $database_password, $database_name);

    if(!$conn){die("Failed to connect to MySQL: " .mysqli_connect_error());}
?>
