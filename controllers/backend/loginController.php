<?php
session_start();
include_once("../models/backend/loginModel.php");
if(isset($_SESSION['id'])){header("location: login.php");}

function setData(){
    $model = new LoginModel("localhost", "normateca", "root", "", "3305");
    $model->start_connection();

    $email = "";
    $pwd = "";
  
if(isset($_POST["email"]) && isset($_POST["password"])){
     $email = validate($_POST["email"]);
    $pwd = validate($_POST["password"]);

    if(empty($email) || empty($pwd)){
        header("Location: login.php?error=Something is missing.");
        exit();
    }
}




$result = $model->getInfo($email, $pwd);

if(mysqli_num_rows($result) === 1){
$row = mysqli_fetch_assoc($result);
    if($row["Email"] === $email && $row["Password"] === $pwd){
        echo "Logged In!";
        $_SESSION["Email"] = $row["Email"];
        $_SESSION["Password"] = $row["Password"];
        $_SESSION["Name"] = $row["Name"];
        $_SESSION["Last_name"] = $row["Last_name"];
        $_SESSION["id"] = $row["id"];
        header("Location: search.php");
        exit();

    }else{
        header("Location: login.php?error=Credentials incorrect or doesn't exists.");
        exit();
    }
}

else{
    header("Location: login.php");
    exit();
}


if(isset($_GET["logout"])){
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
}

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
}

?>