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
                    <h1>orders</h1>
              
                </div>
             
            </div>

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Recent Orders</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>total</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>txid</th>
                                <th>Date</th>
                                <th>Payment Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $get_payment = mysqli_query($con, "SELECT * FROM `payments`");
                            while ($row = mysqli_fetch_array($get_payment)) { ?>
                                <tr>
                                    <td>
                                        <p><?= $row['name'] ?></p>
                                    </td>
                                    <td>
                                        <p><?= $row['total'] . '₹' ?></p>
                                    </td>
                                    <td>
                                        <p><?= $row['address'] ?></p>
                                    </td>
                                    <td>
                                        <p><?= $row['phone'] ?></p>
                                    </td>
                                    <td>
                                        <p><?= $row['txid'] ?></p>
                                    </td>
                                 
                                    <td>
                                        <p><?= $row['date'] ?></p>
                                    </td>
                                    <td>
                                        <p><?= $row['status'] ?></p>
                                    </td>
                                    <td><span class="status process">Shipped</span></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>


        </main>

        <?php include 'php/footer.php'?>
    </div>
</body>
</html>