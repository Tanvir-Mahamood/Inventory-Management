<?php

if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)) {
  $loggedin = true;
}
else {
  $loggedin = false;
}

echo 
'<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/inventory_management/dashboard.php">Dynamic Inventory Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/inventory_management/dashboard.php">Home</a>
        </li>';
        if(!$loggedin) {
          echo '<li class="nav-item">
          <a class="nav-link" href="/inventory_management/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/inventory_management/signup.php">Signup</a>
          </li>';
        }
        if($loggedin) {
          echo '<li class="nav-item">
            <a class="nav-link" href="/inventory_management/logout.php">Logout</a>
          </li>';
          echo '<li class="nav-item">
            <a class="nav-link" href="/inventory_management/addproduct.php">Add Product</a>
          </li>';
        }
      echo '</ul>
      
    </div>
  </div>
</nav>';
?>