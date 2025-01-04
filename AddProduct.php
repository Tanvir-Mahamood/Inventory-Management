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
            $product_name = $_POST['name'];
            $product_category = $_POST['category'];
            $product_price = $_POST['price'];
            $product_stock = $_POST['stock'];
            
            $sql = "INSERT INTO `products` (`name`, `category`, `price`, `stock`) VALUES ('$product_name', '$product_category', '$product_price', '$product_stock');";
            $result = mysqli_query($conn, $sql);

        }
    }
?>
<!-- AddProduct.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https:/cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require 'partials/_nav.php' ?>


    <div class="container mt-5">
        <h2>Add Product</h2>
        <form id="addProductForm" action="/inventory_management/AddProduct.php" method="post">
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" id="productName" placeholder="Enter product name" required>
            </div>
            <div class="mb-3">
                <label for="productCategory" class="form-label">Category</label>
                <input type="text" name="category" class="form-control" id="productCategory" placeholder="Enter category" required>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" id="productPrice" placeholder="Enter price" required>
            </div>
            <div class="mb-3">
                <label for="productStock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" id="productStock" placeholder="Enter stock quantity" required>
            </div>
            <button type="submit" class="btn btn-success">Add Product</button>
        </form>
    </div>
</body>
</html>
