<?php include 'assets/php/config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Anon - eCommerce Website</title>

    <?php include 'assets/php/header.php' ?>
    <style>
        :root {
            --onyx: hsl(0, 0%, 25%);
            --azure: hsl(0, 100%, 70%);
            --white: hsl(0, 0%, 100%);
            --platinum: hsl(0, 0%, 91%);
            --gainsboro: rgb(218, 218, 218);
            --red-salsa: hsl(0, 77%, 60%);
            --dim-gray: hsl(0, 0%, 39%);
            --davys-gray: hsl(0, 0%, 38%);
            --spanish-gray: hsl(0, 0%, 62%);
            --quick-silver: hsl(0, 0%, 64%);
            --px: 50px;
            --radius: 5px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            border: none;
            background: none;
            font: inherit;
            cursor: pointer;
        }

        ion-icon,
        span {
            display: inline-block;
        }

        label,
        img {
            display: inline-block;
        }

        input,
        textarea {
            font: inherit;
            width: 100%;
        }

        input:focus,
        textarea:focus {
            outline: 2px solid var(--azure);
        }

        input::-webkit-inner-spin-button,
        input::-webkit-outer-spin-button {
            appearance: none;
            -webkit-appearance: none;
            margin: 0;
        }

        /* custom scrollbar style */

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: hsl(0, 0%, 80%);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: hsl(0, 0%, 60%);
        }

        /* main container */

        .cart-container {
            max-width: 1440px;
            min-width: 100%;
            margin: auto;
            display: flex;
            flex-direction: column;
        }

        .paymentPage {
            backdrop-filter: blur(10px);
        }

        .heading {
            font-size: 28px;
            font-weight: 6px;
            color: var(--onyx);
            border-bottom: 1px solid var(--gainsboro);
            padding: 20px 60px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .heading ion-icon {
            font-size: 40px;
        }

        .item-flex {
            display: flex;
            flex-grow: 1;
        }

        .no-item-cart {
            text-align: center;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .no-item-cart h1 {
            padding: 10px;
        }

        /* checkout section style */

        .checkout {
            width: 70%;
            padding: 40px var(--px);
            background: var(--white);
            border-right: 1px solid var(--gainsboro);
        }

        .section-heading {
            color: var(--onyx);
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 5px;
        }

        .payment-form {
            margin-bottom: 40px;
        }



        .label-default {
            padding-bottom: 10px;
            margin-bottom: 5px;
            font-size: 14px;
            color: var(--spanish-gray);
        }

        .input-default {
            background: var(--platinum);
            border-radius: var(--radius);
            color: var(--davys-gray);
            border: none;
        }

        .payment-form input,
        .payment-form textarea {
            padding: 10px 15px;
            font-size: var(--fs-18);
            font-weight: 5px;
        }

        .cardholder-name,
        .card-number {
            margin-bottom: 20px;
        }



        .input-flex {
            display: flex;
            align-items: center;
            gap: 30px;
        }


        .btn {
            border-radius: var(--radius);
        }

        .btn:active {
            transform: scale(0.99);
        }

        .btn:focus {
            color: var(--white);
            background: var(--azure);
            outline: 2px solid var(--azure);
            outline-offset: 2px;
        }

        .btn-prinary {
            background: var(--azure);
            font-weight: var(--fw-5);
            color: var(--white);
            padding: 13px 45px;
        }

        .btn-prinary b {
            margin-right: 10px;
        }

        /* cart section style */
        .cart {
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .cart-item-box {
            padding: 40px var(--px);
            margin-bottom: auto;
        }

        .product-card:not(:last-child) {
            margin-bottom: 20px;
        }

        .product-card {
            border: 1px solid var(--onyx);
            padding: 12px;
            border-radius: var(--radius);
        }

        .product-card .cart-card {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }

        .cart-card .product-img {
            border-radius: var(--radius);
        }

        .cart-card .detail .product-name {
            font-weight: 6px;
            font-size: 15px;
            color: var(--dim-gray);
            margin-bottom: 10px;
        }

        .cart-card .detail .wrapper {
            display: flex;
            gap: 10px;
        }


        .product-close-btn {
            cursor: pointer;
        }

        .product-qty button:active,
        .product-close-btn:active ion-icon {
            transform: scale(0.95);
        }

        .product-qty button ion-icon {
            --ionicon-stroke-width: 60px;
            font-size: 10px;
        }

        .product-close-btn {
            position: absolute;
            top: 0;
            right: 0;
        }

        .product-close-btn ion-icon {
            font-size: 25px;
            color: var(--quick-silver);
        }

        .product-close-btn:hover ion-icon {
            color: var(--red-salsa);
        }

        .discount-token {
            padding: 40px var(--px);
            border-top: 1px solid var(--gainsboro);
            border-bottom: 1px solid var(--gainsboro);
        }

        .wrapper-flex {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .wrapper-flex input {
            padding: 12px 15px;
            font-weight: 6px;
            letter-spacing: 2px;
        }

        .btn-outline {
            padding: 10px 20px;
            border: 1px solid var(--azure);
            color: var(--azure);
        }

        .btn-outline:hover {
            background: var(--azure);
            color: var(--white);
        }

        .amount {
            padding: 40px var(--px);
        }

        .amount>div {
            display: flex;
            justify-content: space-between;
        }

        .amount>div:not(:last-child) {
            margin-bottom: 10px;
        }

        .amount .total {
            font-size: 18px;
            font-weight: 7px;
            color: var(--onyx);
        }

        /* responseive */
        @media (max-width: 1200px) {

            .item-flex {
                flex-direction: column-reverse;
            }

            .checkout {
                width: 100%;
                border-right: none;
            }

            .btn-prinary {
                width: 100%;
            }

            .cart {
                display: grid;
                grid-template-columns: 1fr 1fr;
                width: 100%;
                border-bottom: 1px solid var(--gainsboro);
            }

            .cart .wrapper {
                margin-top: auto;

            }

            .cart .cart-item-box {
                border-right: 1px solid var(--gainsboro);
                margin-bottom: 0;

            }

            .discount-token {
                border-top: none;
            }

        }

        @media (max-width: 768px) {
            :root {
                --px: 40px;
            }

            .cart {
                grid-template-columns: 1fr;
            }

            .discount-token {
                border-top: 1px solid var(--gainsboro);
            }

            .wrapper-flex {
                gap: 20px;
            }
        }

        @media (max-width: 567px) {
            :root {
                --px: 20px;
            }

            .payment-method,
            .input-flex {
                flex-direction: column;
                gap: 20px;
            }

            .payment-method .method {
                width: 100%;
            }

            .input-flex .expire-date,
            .input-flex .cvv {
                width: 100%;
            }

            .expire-date .input-flex {
                flex-direction: row;
            }
        }
    </style>
</head>

<body>
    <div class="overlay" data-overlay></div>
    <?php include 'assets/php/navbar.php' ?>

    <div class="product-container">

        <div class="container">
            <?php

            if (isset($user['id'])) {
                $u_id = $user['id'];
            } else {
                $u_id = 0;
            }
            $fetch_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE `UserID` = '$u_id'");
            if (mysqli_num_rows($fetch_cart) > 0) {

                $subTotal = 0;
            ?>
                <main class="cart-container">
                    <div class="item-flex">
                        <section class="cart">
                            <div class="cart-item-box">
                                <h2 class="section-heading">Order Summary</h2>
                                <?php

                                while ($get_product = mysqli_fetch_array($fetch_cart)) {
                                    $cart_product = getProduts($get_product['product_id']);
                                    $subTotal += $cart_product['p_dis_price'];
                                ?>
                                    <div class="product-card">
                                        <div class="cart-card">
                                            <div class="img-box">
                                                <img src="assets/images/products/<?= $cart_product['p_img1'] ?>" alt="img not found" class="product-img" width="80px" />
                                            </div>
                                            <div class="detail">
                                                <h4 class="product-name">
                                                    <?= $cart_product['p_name'] ?>
                                                </h4>
                                                <div class="wrapper">
                                                    <div class="price">
                                                        <i class="fa-solid fa-indian-rupee-sign"></i> <span id="price">
                                                            ₹ <?= $cart_product['p_dis_price'] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-close-btn" onclick="window.location.href = 'assets/php/actions.php?delete_cart_item=true&cartid=<?= $get_product['id'] ?>'">
                                                <ion-icon name="close-circle-outline"></ion-icon>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <hr>
                                <?php
                                // Calculate shipping charges and total
                                $shippingCharges = 50; // Replace this with your shipping charges calculation
                                $total = $subTotal + $shippingCharges;
                                ?>
                                <div class="wrapper">
                                    <div class="amount">
                                        <div class="subtotal">
                                            <span>Subtotal</span><span><i class="fa-solid fa-indian-rupee-sign"></i> <span id="subtotal">
                                                    <?= $subTotal ?>₹
                                                </span></span>
                                        </div>
                                        <div class="discount">
                                            <span>Shipping Charges </span><span><i class="fa-solid fa-indian-rupee-sign"></i> <span id="discount">
                                                    <?= $shippingCharges ?>₹
                                                </span></span>
                                        </div>
                                        <div class="total">
                                            <span>Total</span><i class="fa-solid fa-indian-rupee-sign"></i> <span id="total">
                                                <?= $total ?>₹
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="checkout">
                            <h2 class="section-heading">Payment Details</h2>
                            <div class="payment-form">
                                <form method="post" action='payment.php'>
                                    <div class="cardholder-name">
                                        <label for="cardholder-name" class="label-default">
                                            Enter Name
                                        </label>

                                        <input type="text" name="fullname" placeholder="Enter Your Name" class="input-default" />
                                    </div>

                                    <div class="cardholder-name">
                                        <label for="cardholder-name" class="label-default">
                                            Address
                                        </label>
                                        <textarea name="Address" cols="60" rows="4" placeholder="Enter Your Address" class="input-default"></textarea>
                                    </div>
                                    <div class="card-number">
                                        <label for="card-number" class="label-default">
                                            Mobile Number
                                        </label>
                                        <input type="number" name="phone" id="card-number" placeholder="Enter Your Whatsapp Number for Delivery" class="input-default" />
                                    </div>

                                    <input type="hidden" name="userid" value="<?= $u_id ?>">
                                    <input type="hidden" name="total" value="<?= $total ?>">

                                    <button class="btn btn-prinary" type="submit" name="payment">
                                        <b>Pay </b> <span id="payAmount">
                                            <?= $total ?>₹
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </section>
                    </div>
                </main>
            <?php } else { ?>

                <div class="no-item-cart">
                    <h1>No Products in Cart!</h1>
                    <button class="btn btn-prinary" onclick="window.location.href = 'index.php'" type="button">
                        Shop Now
                    </button>
                </div>

            <?php  }

            ?>

        </div>



        <!--
    - FOOTER
  -->
        <?php include 'assets/php/footer.php' ?>
</body>

</html>