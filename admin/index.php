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
    <?php include 'php/header.php' ?>
    <title>Admin Panal</title>
</head>

<body>

    <?php include 'php/slidebar.php'; ?>
    <!-- Main Content -->
    <div class="content">
        <main>
            <div class="header">
                <div class="left">
                    <h1>Dashboard</h1>

                </div>

            </div>

            <!-- Insights -->
            <ul class="insights">
                <li>
                    <i class='bx bx-calendar-check'></i>
                    <?php
                    // Assuming $con is your database connection
                    $payments_count_query = mysqli_query($con, "SELECT COUNT(*) AS Orders FROM payments");
                    $payments_count = 0;
                    if ($payments_count_query) {
                        $payments_count_data = mysqli_fetch_assoc($payments_count_query);
                        $payments_count = $payments_count_data['Orders'];
                    }
                    ?>
                    <span class="info">
                        <h3><?php echo $payments_count; ?></h3>
                        <p>Total Orders</p>
                    </span>

                </li>
                <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <?php $views = mysqli_query($con, "SELECT `data1` FROM `settings` WHERE `id`=1");
                        $views1 = mysqli_fetch_array($views);
                        ?>
                        <h3>
                            <?= $views1['data1'] ?>
                        </h3>
                        <p>Site Visit</p>
                    </span>
                </li>
                <li><i class='bx bx-line-chart'></i>
                    <?php
                    // Assuming $con is your database connection
                    $product_query = mysqli_query($con, "SELECT COUNT(*) as product_count FROM product");
                    $product_count = 0;
                    if ($product_query) {
                        $product_data = mysqli_fetch_assoc($product_query);
                        $product_count = $product_data['product_count'];
                    }
                    ?>
                    <span class="info">
                        <h3><?php echo $product_count; ?></h3>
                        <p>Total Products</p>
                    </span>

                </li>
                <li><i class='bx bx-rupee'></i>
                    <?php
                    // Assuming $con is your database connection
                    $total_sales_query = mysqli_query($con, "SELECT SUM(total) AS total_sales FROM payments");
                    $total_sales = 0;
                    if ($total_sales_query) {
                        $total_sales_data = mysqli_fetch_assoc($total_sales_query);
                        $total_sales = $total_sales_data['total_sales'];
                    }
                    ?>
                    <span class="info">
                        <h3><?php echo $total_sales; ?>₹</h3>
                        <p>Total Sale</p>
                    </span>

                </li>
            </ul>
            <!-- End of Insights -->

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Recent Orders</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>total</th>
                                <th>txid</th>
                                <th>Date</th>
                                <th>Payment</th>
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
                                        <p><?= $row['txid'] ?></p>
                                    </td>
                                    <td>
                                        <p><?= $row['date'] ?></p>
                                    </td>
                                    <td><span class="status completed">Payment Done</span></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </main>

        <?php include 'php/footer.php' ?>
    </div>
</body>

</html>