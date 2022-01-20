<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "cactusstore";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
    die('Could not Connect MySql Server:' .mysql_error());
}

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sort = $_POST['sort'];
    $image = $_POST['image'];
    $productcode = $_POST['productcode'];

    $sql = "INSERT INTO cactus (name,price,sort,image,productcode)VALUES ('$name','$price','$sort','$image','$productcode')";
    if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
