<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "inventorymanagement";
    
    $conn = mysqli_connect($server, $username, $password, $database);

    if(!$conn) die("cannot connect with database");
?>