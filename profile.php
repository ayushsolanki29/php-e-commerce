<?php include 'assets/php/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Anon - eCommerce Website</title>

    <?php include 'assets/php/header.php' ?>
    <style>
        .Card-center {
            position: fixed;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            backdrop-filter: blur(5px);
            display: flex;
            height: 100%;
            align-items: center;
            justify-content: center;
            z-index: 99999999999999999;
        }

        .detail_profile {
            border-radius: 16px;
            box-shadow: 0 30px 30px -25px rgba(0, 38, 255, 0.205);
            padding: 10px;
            background-color: #fff;
            color: #697e91;
            max-width: 500px;


        }

        .detail_profile strong {
            font-weight: 600;
            color: #425275;
        }

        .detail_profile .inner {
            align-items: center;
            padding: 20px;
            padding-top: 40px;
            background-color: #ecf0ff;
            border-radius: 12px;
            position: relative;
        }

        .detail_profile .pricing {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #bed6fb;
            border-radius: 99em 0 0 99em;
            display: flex;
            align-items: center;
            padding: 0.625em 0.75em;
            font-size: 1.25rem;
            font-weight: 600;
            color: #425475;
        }

        .detail_profile .pricing small {
            color: #707a91;
            font-size: 0.75em;
            margin-left: 0.25em;
        }

        .detail_profile .title {
            font-weight: 600;
            font-size: 1.25rem;
            color: #425675;
        }

        .detail_profile .title+* {
            margin-top: 0.75rem;
        }

        .detail_profile .info+* {
            margin-top: 1rem;
        }

        .detail_profile .features {
            display: flex;
            flex-direction: column;
        }

        .detail_profile .features li {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail_profile .features li+* {
            margin-top: 0.75rem;
        }

        .detail_profile .features .icon {
            background-color: pink;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
        }

        .detail_profile .features .icon ion-icon {
            width: 14px;
            height: 14px;
        }

        .detail_profile .features+* {
            margin-top: 1.25rem;
        }

        .detail_profile .action {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .detail_profile .button {
            background-color: hsl(0, 100%, 70%);
            border-radius: 6px;
            color: #fff;
            font-weight: 500;
            font-size: 1.125rem;
            text-align: center;
            border: 0;
            outline: 0;
            width: 100%;
            padding: 0.625em 0.75em;
            text-decoration: none;
        }

        .detail_profile .button:hover,
        .detail_profile .button:focus {
            background-color: hsl(0, 100%, 70%);
            color: #000;
        }

        .product_details_more {
            border: 1px dotted hsl(0, 100%, 70%);
            border-radius: 10px;
            padding: 3% 8%;
            background: white;
        }

        .user-profile {
            margin-top: 50px;
        }

        .user-profile .pinfo {
            background-color: white;
            border-radius: 0.25rem;
            padding: 1rem;
        }

        .user-profile .pinfo .puser {
            text-align: center;
            margin-bottom: 1rem;
            padding: 0.5rem;
        }

        .user-profile .pinfo .puser .pimg {
            height: 8rem;
            width: 8rem;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 0.5rem;
        }

        img {
            display: inline-block;
        }

        .pbtn {
            background-color: hsl(0, 100%, 70%);
            color: white;
            display: inline-block;
            border-radius: 0.25rem;
            font-size: 1.2rem;
            cursor: pointer;
            text-transform: capitalize;
            padding: 0.5rem 1.5rem;
            text-align: center;
            margin-top: 0.5rem;
        }

        .user-profile .pinfo .puser h3 {
            font-size: 1.6rem;
            color: black;
        }

        .user-profile .pinfo .puser p {
            font-size: 1.3rem;
            padding: 0.2rem 0;
        }

        .user-profile .pinfo .pbox-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .user-profile .pinfo .pbox-container .pbox {
            background-color: #eee;
            border-radius: 0.25rem;
            padding: 1rem;
            flex: 1 1 20rem;
        }

        .user-profile .pinfo .pbox-container .pbox .pflex {
            display: flex;
            text-align: center;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.5rem;
        }

        .user-profile .pinfo .pbox-container .pbox .pflex ion-icon {
            font-size: 1.6rem;
            color: white;
            padding: 0.5rem;
            background-color: #2c3e50;
            text-align: center;
            border-radius: 0.25rem;
            height: 2.5rem;
            width: 2.5rem;
            line-height: 4.9rem;
        }

        .user-profile .pinfo .pbox-container .pbox .pflex span {
            font-size: 2rem;
            color: black;
        }

        .user-profile .pinfo .pbox-container .pbox .pflex p {
            color: black;
            font-size: 1.3rem;
            flex-direction: column;
        }
    </style>

</head>

<body>
    <div class="overlay" data-overlay></div>

    <?php include 'assets/php/navbar.php';

    if (!isset($_SESSION['userid'])) {
       echo "<script>window.location.href = 'index.php'</script>";
        exit;
    }
    ?>
    <main>
        <section class="user-profile">
            <div class="container">
                <h1 class="pheading"> <?= $user['name'] ?>'s profile</h1>

                <div class="pinfo">
                    <div class="puser">
                        <img src="assets\images\users\default.jpg" class="img" alt="" />
                        <h3> </h3>
                        <p>Email:- <?= $user['email'] ?> </p>
                        <a href="#" class="pbtn">update profile</a>
                    </div>

                    <div class="pbox-container">
                        <div class="pbox">
                            <div class="pflex">
                                <ion-icon name="book"></ion-icon>
                                <div> <?php
                                        $order_count = "SELECT COUNT(*) AS `order_count` FROM `payments` WHERE `user_id`= '$userid'";
                                        $order_count1 = mysqli_query($con, $order_count);

                                        $order_count11 = mysqli_fetch_array($order_count1)



                                        ?>
                                    <span> <?= $order_count11['order_count'] ?></span>
                                    <p>Your Orders</p>
                                </div>
                            </div>
                            <a href="profile.php?orderdetails=enctype" class="pbtn">Check Orders</a>
                        </div>

                        <div class="pbox">
                            <div class="pflex">
                                <ion-icon name="heart"></ion-icon>
                                <div>
                                    <span> 00</span>
                                    <p>Reviews</p>
                                </div>
                            </div>
                            <a href="profile.php?quiezz=enctype" class="pbtn">Your Reviews</a>
                        </div>

                        <div class="pbox">
                            <div class="pflex">
                                <ion-icon name="chatbubble"></ion-icon>
                                <div>



                                    <span> <?= $row22['user_count'] ?></span>
                                    <p>Your Cart</p>
                                </div>
                            </div>
                            <a href="cart.php" class="pbtn">View Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <?php if (isset($_GET['orderdetails'])) { ?>

        <div class="Card-center">
            <div class="detail_profile">
                <div class="inner">

                    <span class="pricing">

                        <span><?= $order_count11['order_count'] ?><small> Orders</small></span>
                    </span>

                    <p class="title">Your Orders</p>
                    <p class="info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, doloremque.</p>

                    <ul class="features">
                        <?php
                        $select_order = "SELECT * FROM `payments` WHERE `user_id`= '$userid'";
                        $run_order = mysqli_query($con, $select_order);

                        while ($row_order = mysqli_fetch_array($run_order)) {
                            $txid = $row_order['txid'];
                            $name = $row_order['name'];
                            $phone = $row_order['phone'];
                            $address = $row_order['address'];
                            $phone = $row_order['phone'];
                            $payment_status = $row_order['status'];
                            $total = $row_order['total'];
                            $date = $row_order['date'];

                        ?> <li class="product_details_more">
                                <div style="display:flex;flex-direction: column;">
                                    <span></span>
                                    <span>txid : <strong><?= $txid ?></strong></span>
                                    <span>name : <strong><?= $name ?></strong></span>
                                    <span>phone : <strong><?= $phone ?></strong></span>
                                    <span>address : <strong><?= $address ?></strong></span>
                                    <span>payment_status : <strong><?= $payment_status ?></strong></span>
                                    <span>total : <strong><?= $total . '₹' ?></strong></span>
                                    <span>date : <strong><?= $date ?></strong></span>
                                </div>
                            </li><?php }
                                    ?>

                    </ul>
                    <div style="text-align: center;">
                        <a href="profile.php">okay i understand</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } ?>
    <?php include 'assets/php/footer.php' ?>
</body>

</html>