<?php
$connection = mysqli_connect('localhost', 'root','cactusstore');
if (mysqli_connect_errno()) {
    echo "Database Connection Failed" . mysqli_connect_error();
    die();
}
//$selectDb = mysqli_select_db($connection, 'cactusstore');
//if(!$selectDb){
//    die("Database Selection Failed.") . mysqli_error($connection);
//}
//$sql = "SELECT * FROM cactus";
////$fea = $connection->query($sql);
//$result = mysqli_query($connection, $sql);
