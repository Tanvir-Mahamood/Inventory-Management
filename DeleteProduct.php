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

            $sql = "SELECT * FROM `products` WHERE `id` = '$product_id';";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num > 0) {
                $sql = "DELETE FROM `products` WHERE `products`.`id` = '$product_id'";
                $result = mysqli_query($conn, $sql);
            }
            
        }
    }
?>

<!-- DeleteProduct.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Product</title>
    <link href="https:/cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="Dashboard.html">Inventory Admin Panel</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Delete Product</h2>
        <form action="/inventory_management/DeleteProduct.php" method="post">
            <label>Product ID:</label>
            <input type="text" name="id" class="form-control">
            <button class="btn btn-danger mt-3">Delete Product</button>
        </form>
    </div>
</body>
</html>
