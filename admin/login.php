<?php
include '../assets/php/config.php';
session_start();
if (isset($_SESSION['AdminID'])) {
    header("location:index.php");
    exit;
}

if (isset($_POST['admin_login'])) {
    $admindata = mysqli_query($con, "SELECT * FROM `admin` WHERE `id`='1'");
    while ($row = mysqli_fetch_array($admindata)) {

        if ($_POST['password'] == $row['password'] && $_POST['username'] == $row['username']) {
            $_SESSION['AdminID'] = generateRandomToken(10);
            header('Location: index.php');
        } else {
            //echo alert
            echo "<script>alert('cant access admin')</script>";
            // echo "<script>window.location.href = 'login.php'</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anon Admin Login</title>
    <link rel="stylesheet" href="styles/form.css">
</head>

<body>
    <div class="top3container">
        <section class="container">
            <header>Admin Login</header>
            <form method="post" class="form">
                <div class="input-box">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Enter Username" required />
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter Password" required />
                </div>
                <button type='submit' name='admin_login'>Auth Admin</button>
            </form>
        </section>
    </div>
</body>

</html>