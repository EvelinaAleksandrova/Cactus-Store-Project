<?php
session_start();

// This page can be accessed only after login
// Redirect user to login page, if user email is not available in session


if (!isset($_SESSION["email"])) {
    header("location: login.php");
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cactus Store - Add Product</title>
    <link rel="icon" type="image/x-icon" href="../images/cactus%20(1).png">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/cactus.css">
    <link rel="stylesheet" href="/css/add-product.css">


    <link rel="home" href="/navigation/home.html">
    <link rel="article" href="/navigation/articles.html">
    <link rel="about" href="/navigation/about-us.html">
    <link rel="contact" href="/navigation/contact.html">


    <link rel="cactus" href="/navigation/cactus.php">

</head>
<body class="text-center">



<div class="topnav" id="myTopnav">
    <a href="home.html" class="active">
        <div class="logo-image">
            <img src="/images/cactus%20(2).png" class="img-fluid" height="35px">
        </div>
    </a>
    <a href="articles.html">Articles</a>
    <a href="contact.html">Contacts</a>
    <a href="about-us.html">About us</a>
    <a href="add-product.php">Admin</a>
    <a href="logout.php">Logout</a>

    <div class="dropdown">
        <button class="dropbtn">Store
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">

            <a href="cactus.php">Cactus</a>
            <a href="#succulents">Succulents</a>
            <a href="#ground">Ground</a>
            <a href="#pots">Pots</a>

        </div>

    </div>
    <a href="cart.php" class="cart">
        <div class="cart-image">
            <img src="/images/shopping-cart.png" class="img-fluid">
        </div>
    </a>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>





<div class="form-add-product">

    <form action="add-product-to-database.php" class="form" method="post">
        <div class="title-cactuses" style="text-align: center">
            <h1 style="font-size: 35px">Add product</h1>
        </div>

        <label for="name" class="sr-only">Name</label>
        <input id="name" name="name"
               class="form-control mb-2" placeholder="Name" required><br>

        <label for="price" class="sr-only">Price</label>
        <input name="price" id="price"
               class="form-control" placeholder="Price" required><br>

        <label for="sort" class="sr-only">Sort</label>
        <input name="sort" id="sort"
               class="form-control" placeholder="Sort" required><br>

        <label for="image" class="sr-only">Image</label>
        <input name="image" id="image"
               class="form-control" placeholder="Image path" required><br>

        <label for="productcode" class="sr-only">Product code</label>
        <input name="productcode" id="productcode"
               class="form-control" placeholder="Product Code" required><br>

        <button class="add-product" name="submit" type="submit">Add Product</button>

    </form>

</div>

</body>
</html>
