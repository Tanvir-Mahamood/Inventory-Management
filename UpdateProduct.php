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

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $product_id = $_POST['id'];
            $product_name = $_POST['name'];
            $product_category = $_POST['category'];
            $product_price = $_POST['price'];
            $product_stock = $_POST['stock'];

            $sql = "SELECT * FROM `products` WHERE `id` = '$product_id';";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num > 0) {
                $sql = "UPDATE `products` SET `name` = '$product_name', `category` = '$product_category', `price` = '$product_price', `stock` = '$product_stock' WHERE `products`.`id` = '$product_id';";
                $result = mysqli_query($conn, $sql);
            }
            
        }
    }
?>

<!-- UpdateProduct.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Product</title>
    <link href="https:/cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require 'partials/_nav.php' ?>
    <div class="container mt-5">
        <h2>Update Product</h2>
        <form action="/inventory_management/UpdateProduct.php" method="post">
            <label>Product ID:</label>
            <input type="text" name="id" class="form-control">
            <label>Name:</label>
            <input type="text" name="name" class="form-control">
            <label>Category:</label>
            <input type="text" name="category" class="form-control">
            <label>Price:</label>
            <input type="number" name="price" class="form-control">
            <label>Stock:</label>
            <input type="number" name="stock" class="form-control">
            <label>Status:</label>
            <select class="form-select">
                <option value="">Select Status</option>
                <option value="Available">Available</option>
                <option value="Out of Stock">Out of Stock</option>
            </select>
            <button class="btn btn-primary mt-3">Update Product</button>
        </form>
    </div>
</body>
</html>
