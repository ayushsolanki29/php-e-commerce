<?php 
include '../assets/php/config.php';
session_start();
if (!isset($_SESSION['AdminID'])) {
    header("location:login.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
<?php include 'php/header.php'?>
    <title>Admin Panal</title>
</head>

<body>

    <?php include 'php/slidebar.php'; ?>
    <!-- Main Content -->
    <div class="content">
        <main>
            <div class="header">
                <div class="left">
                    <h1>users</h1>
              
                </div>
             
            </div>

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Total users </h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $get_users = mysqli_query($con, "SELECT * FROM `user`");
                            while ($row = mysqli_fetch_array($get_users)) { ?>

                            
                            <tr>
                                <td>
                                    <p><?= $row['name']?></p>
                                </td>
                                <td>
                                    <p><?= $row['email']?></p>
                                </td>
                                <td>
                                    <p><?= $row['date']?></p>
                                </td>
                                <td><span class="status delete">Delete</span></td>
                            </tr>
                       <?php }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </main>

        <?php include 'php/footer.php'?>
    </div>
</body>
</html>