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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    $username=$conn->real_escape_string($username);
    $email=$conn->real_escape_string($email);
    $description=$conn->real_escape_string($description);



    $sql = "INSERT INTO userquestions (username,email,description)
VALUES ('$username','$email','$description')";

    if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
