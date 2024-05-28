<?php
include 'config.php';

function getUserData($user_id)
{
    global $con;
    $query = "SELECT * FROM users WHERE id='$user_id'";
    $run = mysqli_query($con, $query);
    return mysqli_fetch_assoc($run);
}


?>