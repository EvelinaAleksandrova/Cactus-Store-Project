<?php
error_reporting(0);
session_start();

$total = 0;

$connection = new PDO("mysql:host=localhost;dbname=cactusstore", 'root', '');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = isset($_GET['action']) ? $_GET['action'] : "";

//Cart

if ($action == 'addcart' && $_SERVER['REQUEST_METHOD'] == 'POST') {

    //Finding the product by code
    $query = "SELECT * FROM cactus WHERE productcode=:productcode";

    $stmt = $connection->prepare($query);
    $stmt->bindParam('productcode', $_POST['productcode']);
    $stmt->execute();
    $product = $stmt->fetch();

    $currentQty = $_SESSION['cactus'][$_POST['productcode']]['qty'] + 1;
    $_SESSION['cactus'][$_POST['productcode']] = array('qty' =>
        $currentQty, 'name' => $product['name'], 'image' => $product['image'], 'price' => $product['price']);
    $product = '';
    header("Location:cactus.php");
}

//Remove All Items
if ($action == 'emptyall') {
    $_SESSION['cactus'] = array();
    header("Location:cactus.php");
}

//Remove Item
if ($action == 'empty') {
    $productCode = $_GET['productcode'];
    $products = $_SESSION['cactus'];
    unset($products[$productCode]);
    $_SESSION['cactus'] = $products;
    header("Location:cart.php");
}

//Get all cactus products
$query = "SELECT * FROM cactus";
$stmt = $connection->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cactus Store</title>
    <link rel="icon" type="image/x-icon" href="../images/cactus%20(1).png">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/cactus.css">

    <link rel="home" href="/navigation/home.html">
    <link rel="article" href="/navigation/articles.html">
    <link rel="about" href="/navigation/about-us.html">
    <link rel="contact" href="/navigation/contact.html">
    <link rel="cart" href="/navigation/cart.php">


    <link rel="cactus" href="/navigation/cactus.php">
    <link rel="stylesheet" href="/css/cart.css"

</head>
<body>
<!--- Navigation Start here ---->
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

<div class="container">

    <?php if (!empty($_SESSION['cactus'])): ?>

        <nav class="navbar navbar-inverse">
            <div class="title-cactuses" style="text-align: center">
                <h1 style="font-size: 45px">Shopping Cart</h1>
            </div>
        </nav>


        <table class="table table-striped" style="background-color: #fff4e3;">
            <thead>
            <tr style="font-size: 20px;text-align: center">
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            </thead>
            <?php foreach ($_SESSION['cactus'] as $key => $product): ?>
                <tr>
                    <td><img src="<?php print $product['image'] ?>" width="250" height="100px"></td>
                    <td style="font-size: 20px"><?php print $product['name'] ?></td>
                    <td style="font-size: 20px"><?php print $product['price'] ?>&#160;leva</td>
                    <td style="font-size: 20px"><?php print $product['qty'] ?></td>
                    <td><a href="cart.php?action=empty&productcode=<?php print $key ?>"
                           class="btn btn-info">Remove</a>
                    </td>
                </tr>

                <?php $total = $total + $product['price']; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="5" align="right"><h4 style="color: #ffac00">Total Price:&#160;<?php print $total ?>
                        leva</h4></td>
            </tr>

        </table>


    <?php endif; ?>
<!--    <div class="remove-all-items"-->
<!--         style="margin-top:7px;margin-right:7px; background-color: rgba(127,255,212,0);text-align: center">-->
<!--        <a href="cactus.php?action=emptyall" id="remove-all-items"-->
<!--           style="background: rgba(127,255,212,0.03); color: red;font-weight: bold;font-size: 20px"-->
<!--        > REMOVE ALL ITEMS-->
<!--        </a>-->
<!--    </div>-->

</div>

<div class="form-make-order">
    <form action="make-order-to-database.php" class="form" method="post">

        <label for="username" class="sr-only">Name</label>
        <input id="username" name="username"
               class="form-control mb-2" placeholder="Name" required><br>

        <label for="email" class="sr-only">Email</label>
        <input name="email" id="email"
               class="form-control" placeholder="Email" required><br>

        <label for="phone" class="sr-only">Phone Number</label>
        <input name="phone" id="phone"
               class="form-control" placeholder="Phone Number" required><br>

        <label for="address" class="sr-only">Address</label>
        <input name="address" id="address"
               class="form-control" placeholder="Address for delivery.." required><br>

        <button class="order" name="order" type="submit">Make order</button>
    </form>

</div>

<script src="/script.js"></script>
</body>
</html>
