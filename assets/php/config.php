<?php


$db = "anon_fashion";
$username = "root";
$password = "";
$host = "localhost";

$con = mysqli_connect($host, $username, $password, $db);
if (!$con) {
    echo "Faild to connect";
}

function getUserData($user_id)
{
    global $con;
    $query = "SELECT * FROM `user` WHERE `id`='$user_id'";
    $run = mysqli_query($con, $query);
    return mysqli_fetch_assoc($run);
}
function getProduts($p_id) {
    global $con;
    $query = "SELECT * FROM `product` WHERE `id`='$p_id'";
    $run = mysqli_query($con, $query);
    return mysqli_fetch_assoc($run);
}
function generateRandomToken($length)
{
    $token = '';
    $characters = '0123456789';

    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[random_int(0, $max)];
    }
    return $token;
}
?>