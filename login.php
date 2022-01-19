<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cactus Store - Login</title>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>
<body class="text-center">

<form action="includes/login_inc.php" class="form-signin" method="post">

    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <label for="inputEmail"  class="sr-only">Username</label>
    <input type="text"  id="inputEmail" name="username" class="form-control mb-2" placeholder="Username" >
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">

    </div>
    <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Login</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021-2023</p>
    <p class="lead">Not a member <a href="register.php">Register Here!</a></p>

</form>



</body>
</html>
