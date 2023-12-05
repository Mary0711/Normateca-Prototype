<?php
include_once("../db/db_info.php");
// Function to authenticate user


class LoginModel extends DB
{
    public function getInfo($email, $pwd)
    {
        $query = "SELECT * FROM admin WHERE Email = '$email' AND Password='$pwd'";
        return $this->run_query($query);
    }

}
?>