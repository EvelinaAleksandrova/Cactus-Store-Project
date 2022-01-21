<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cactus Store</title>
    <link rel="icon" type="image/x-icon" href="images/cactus%20(1).png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="style" href="css/home.css">

    <link rel="home" href="navigation/home.html">
    <link rel="article" href="navigation/articles.html">
    <link rel="about" href="navigation/about-us.html">
    <link rel="contact" href="navigation/contact.html">

    <link rel="cactus" href="navigation/cactus.php">

</head>
<body>

<!--- Navigation Start here ---->
<div class="topnav" id="myTopnav">
    <a href="navigation/home.html" class="active">
        <div class="logo-image">
            <img src="images/cactus%20(2).png" class="img-fluid" height="35px">
        </div>
    </a>
    <a href="navigation/articles.html">Articles</a>
    <a href="navigation/contact.html">Contacts</a>
    <a href="navigation/about-us.html">About us</a>
    <a href="/navigation/add-product.php">Admin</a>

    <div class="dropdown">
        <button class="dropbtn">Store
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="navigation/cactus.php">Cactus</a>
            <a href="#succulents">Succulents</a>
            <a href="#ground">Ground</a>
            <a href="#pots">Pots</a>
        </div>
    </div>
    <a href="/navigation/cart.php" class="cart">
        <div class="cart-image">
            <img src="images/shopping-cart.png" class="img-fluid" >
        </div>
    </a>


    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<div  style="text-align: center;background-color: rgba(195,197,195,0.08);padding-bottom: 30px;border-bottom: 1px solid black">
    <a style="font-size: 30px;color: orange;font-weight: bold;text-decoration: none;text-align: center;margin-right: 20px"
       href="/navigation/login.php"> Login</a>
    <a style="font-size: 30px;color: orange;font-weight: bold;text-decoration: none;text-align: center"
       href="/navigation/register.php"> Register</a>
</div>
<div class="header-container">
    <img  id="header-img" src="images/cactus-home.jpg" alt="" width="100%" height="auto">
    <a href="https://www.fontspace.com/category/title"><img id="title-cactus" src="https://see.fontimg.com/api/renderfont4/2OYRe/eyJyIjoiZnMiLCJoIjo4OCwidyI6MTI1MCwiZnMiOjcwLCJmZ2MiOiIjRkNCMTFFIiwiYmdjIjoiI0Y0RjRGNCIsInQiOjF9/Q2FjdHVzIFN0b3Jl/dryme-personal-use-bold.png" alt="Title fonts"></a>




</div>
<div class="footer">
    <p>&copy; 2022 Cactus Store. All rights reserved.</p>
</div>

<script src="script.js"></script>
</body>
</html>

