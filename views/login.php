<?php
include_once("../controllers/backend/LoginController.php");
setData();
if(!isset($_SESSION['id'])){header("location: loginController.php");}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Normateca Log In</title>
    <link rel="stylesheet" href="../assets/css/login.css" />
</head>

<body>
    <header>
        <img src="../assets/images/arecibo.png" />
        <div>
            <h1>Normateca</h1>
            <h3><i> Universidad de Puerto Rico en Arecibo </i></h3>
        </div>
    </header>


    <section class="login">
        <form class="loginForm" action="loginController.php" method="post">
            <h1>Welcome to Normateca</h1>

            <h4>Fill out the following fields to log in:</h4>

            <label for="email">Email: </label>
            <input type="email" value="" name="email" id="email" placeholder="Enter your email" />
            <br />
            <label for="ssn">Password: </label>
            <input type="text" value="" name="ssn" id="ssn" placeholder="Enter your Password" />
            <br />
            <div>
                <input type="checkbox" name="Remember" id="Remember" />
                <label for="Remember" id="remblbl">Remember me</label>
            </div>

            <button class="btn" type="submit">Log In</button>
        </form>
    </section>
</body>

</html>