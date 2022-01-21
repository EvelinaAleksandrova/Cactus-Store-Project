
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cactus Store - Register</title>
    <link rel="icon" type="image/x-icon" href="../images/cactus%20(1).png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/login.css">

    <link rel="home" href="/navigation/home.html">
    <link rel="article" href="/navigation/articles.html">
    <link rel="about" href="/navigation/about-us.html">
    <link rel="contact" href="/navigation/contact.html">

    <link rel="cactus" href="/navigation/cactus.php">
</head>
<body>
<div class="text-center">
    <!--- Navigation Start here ---->
    <div class="topnav" id="myTopnav">
        <a href="home.html" class="active">
            <div class="logo-image">
                <img src="../images/cactus%20(2).png" class="img-fluid" height="35px">
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
                    <img src="/images/shopping-cart.png" class="img-fluid" >
                </div>
            </a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
    <script src="../script.js"></script>

    <h1 style="text-align: center">
        Register
    </h1>

    <div class="login-form">

        <form action="register.php" class="form-signin" method="post" name="form1">

            <label for="user"  class="sr-only">Name</label>
            <input type="text"  id="user" name="name" class="form-control mb-2" placeholder="Name" required>


            <label for="user"  class="sr-only">Email</label>
            <input type="email"  id="user" name="email" class="form-control mb-2" placeholder="Email" required>

            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>


            <button class="btn-login" name="register" type="submit">Register</button>
            <p class="lead">Member <a href="login.php">Login Here!</a></p>



            <?php
            session_start();

            $databaseHost     = 'localhost';
            $databaseName     = 'cactusstore';
            $databaseUsername = 'root';
            $databasePassword = '';

            $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


            // Check If form submitted, insert user data into database.
            if (isset($_POST['register'])) {
            $name     = $_POST['name'];
            $email    = $_POST['email'];
            $password = $_POST['password'];

            // If email already exists, throw error
            $email_result = mysqli_query($mysqli, "select 'email' from users where email='$email' and password='$password'");

            // Count the number of row matched
            $user_matched = mysqli_num_rows($email_result);

            // If number of user rows returned more than 0, it means email already exists
            if ($user_matched > 0) {
            echo "<br/><br/><strong>Error: </strong> User already exists with the email id '$email'.";
            } else {
            // Insert user data into database
            $result   = mysqli_query($mysqli, "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')");

            // check if user data inserted successfully.
            if ($result) {
            echo "<br/><br/>User Registered successfully.";
            } else {
            echo "Registration error. Please try again." . mysqli_error($mysqli);
            }
            }
            }

            ?>
        </form>
    </div>



</body>
</html>
