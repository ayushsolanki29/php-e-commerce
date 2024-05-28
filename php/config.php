<?php
$username = "root";
$password = "";
$server = 'localhost';
$db = "elearning2";


$con = mysqli_connect($server, $username, $password, $db);

if (!$con) {
    echo "Connection unsuccessful";
    die("Not Connected " . mysqli_connect_error());
}

if (!isset($_COOKIE['viewed'])) {
    $sql = "UPDATE settings SET `data1` = `data1` + 1 WHERE id = 1"; 
    $con->query($sql);

    setcookie('viewed', '1', time() + (5 * 24 * 60 * 60));
}

?>
