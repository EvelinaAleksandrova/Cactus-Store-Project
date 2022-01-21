<?php
//$connection = mysqli_connect('localhost', 'root');
//if(!$connection){
//    die("Database Connection Failed") . mysqli_error($connection);
//}
//$selectDb = mysqli_select_db($connection, 'cactusstore');
//if(!$selectDb){
//    die("Database Selection Failed.") . mysqli_error($connection);
//}
//$sql = "SELECT * FROM cactus";
////$fea = $connection->query($sql);
//$result = mysqli_query($connection, $sql);
//
//?>

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
    header("Location:cactus.php");
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

    <link rel="cactus" href="/navigation/cactus.php">

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

<div class="title-cactuses" style="text-align: center">
    <h1 style="font-size: 45px">Cactuses</h1>
</div>



<!--<div class="row">-->
<!--    <div class="container" style="width:600px;">-->
<!--        --><?php //foreach ($products as $product): ?>
<!--            <div class="col-md-4">-->
<!--                <div class="thumbnail"><img src="--><?php //print $product['image'] ?><!--" alt="Lights">-->
<!--                    <div class="caption">-->
<!--                        <p style="text-align:center;">--><?php //print $product['name'] ?><!--</p>-->
<!--                        <p style="text-align:center;color:#04B745;"><b>$-->
<?php //print $product['price'] ?><!--</b></p>-->
<!---->
<!---->
<!--                        <form method="post" action="cactus.php?action=addcart">-->
<!--                            <p style="text-align:center;color:#04B745;">-->
<!--                                <button type="submit" class="btn btn-warning">Add To Cart</button>-->
<!--                                <input type="hidden" name="sku" value="-->
<?php //print $product['productcode'] ?><!--">-->
<!--                            </p>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        --><?php //endforeach; ?>
<!--    </div>-->
<!--</div>-->

<div class="cactus-container">
    <?php foreach ($products as $product): ?>

        <div class="card">
            <img src="<?php echo $product['image']; ?>" alt="Avatar"
                 style="width:100%"
                 height="300px">
            <div class="container">
                <h4><b><?php echo $product['name']; ?></b></h4>
                <p style="text-align: center; margin-top: 0"><b>
                        Sort:</b>&#160;<?php echo $product['sort']; ?></p>
                <p style="font-size: 24px"><b>Price</b>&#160;
                <p style="color: orange; text-align: center; font-size: 30px; margin-top: 0">
                    <b><?php echo $product['price']; ?></b>&#160;leva</p>
                </p>
                <!--                <a class="btn-add-to-cart" href="" role="button">Add to Cart</a>-->
                <form method="post" action="cactus.php?action=addcart">
                    <p style="text-align:center;">
                        <button type="submit" class="btn-add-to-cart">Add To Cart</button>
                        <input type="hidden" name="productcode" value="<?php print $product['productcode'] ?>">
                    </p>
                </form>
            </div>
        </div>
    <?php endforeach; ?>

</div>


<!--<div class="cactus-container">-->
<!--    --><?php //while ($cactusProduct = mysqli_fetch_assoc($result)) { ?>
<!---->
<!--        <div class="card">-->
<!--            <img src="--><?php //echo $cactusProduct['image']; ?><!--" alt="Avatar"-->
<!--                 style="width:100%"-->
<!--                 height="300px">-->
<!--            <div class="container">-->
<!--                <h4><b>--><?php //echo $cactusProduct['name']; ?><!--</b></h4>-->
<!--                <p style="text-align: center; margin-top: 0"><b>-->
<!--                        Sort:</b>&#160;--><?php //echo $cactusProduct['sort']; ?><!--</p>-->
<!--                <p style="font-size: 24px"><b>Price</b>&#160;-->
<!--                <p style="color: orange; text-align: center; font-size: 30px; margin-top: 0">-->
<!--                    <b>--><?php //echo $cactusProduct['price']; ?><!--</b>&#160;leva</p>-->
<!--                </p>-->
<!--                <a class="btn-add-to-cart" href="" role="button">Add to Cart</a>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    --><?php //} ?>
<!---->
<!--</div>-->
<!---->
<div class="footer">
    <p>&copy; 2022 Cactus Store. All rights reserved.</p>
</div>
<script src="/script.js"></script>

</body>
</html>