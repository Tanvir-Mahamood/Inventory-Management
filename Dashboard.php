<?php 
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) {
        header("location: login.php");
        exit;
    }
    else {
        $user_id = 0;
        if(isset($_SESSION['id'])) {
            $user_id =  $_SESSION['id'];
        }
        include 'partials/_dbconnect.php'; // connection
    }
?>

<!-- Dashboard.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https:/cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php require 'partials/_nav.php' ?>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="Dashboard.html">Inventory Admin Panel</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Product Dashboard</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($user_id != 0) {
                        $sql = "SELECT * FROM `products`";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $sno += 1;
                            echo "<tr>
                                <td>". $row['id'] . "</td>
                                <td>". $row['name'] . "</td>
                                <td>". $row['category'] . "</td>
                                <td>". $row['price'] . "</td>
                                <td>". $row['stock'] . "</td>
                                <td>" ?> 
                                <a href="UpdateProduct.php" class="btn btn-warning btn-sm">Update</a>
                                <a href="DeleteProduct.php" class="btn btn-danger btn-sm">Delete</a>
                                <?php
                                echo "</td>
                                </tr>";
                        }
                    }
        ?>
            </tbody>
        </table>
    </div>
</body>

</html>