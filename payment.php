<?php include 'assets/php/config.php';

if (isset($_POST['payment'])) {
    $fullname = $_POST['fullname'];
    $Address = $_POST['Address'];
    $phone = $_POST['phone'];
    $userid = $_POST['userid'];
    $total = $_POST['total'];

    $txid = 'ANON' . generateRandomToken(8) . 'TXID';
    $run_payment = mysqli_query($con, "INSERT INTO `payments`(`user_id`, `phone`, `address`, `name`, `total`, `txid`, `status`)  VALUES ('$userid','$phone','$Address','$fullname','$total','$txid','done')");
    $delete_cart = mysqli_query($con, "DELETE FROM `cart` WHERE `UserID`='$userid'");
    if (!$run_payment) {
        header("location: cart.php");
        exit;
    }
}else{
    header("location: cart.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Anon - eCommerce Website</title>

    <?php include 'assets/php/header.php' ?>
    <style>
        #card {
            position: relative;
            width: 520px;
            display: block;
            margin: auto;
            text-align: center;
            padding: 30px;

        }

        #upper-side {
            padding: 2em;
            background-color: #8BC34A;
            display: block;
            color: #fff;
            border-top-right-radius: 8px;
            border-top-left-radius: 8px;

        }



        #status {
            font-weight: lighter;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1em;
            margin-top: -.2em;
            margin-bottom: 0;
        }

        #lower-side {
            padding: 2em 2em 5em 2em;
            background: #fff;
            display: block;
            border-bottom-right-radius: 8px;
            border-bottom-left-radius: 8px;
            border: 1px solid #484646a9;
        }

        #message {
            margin-top: -.5em;
            color: #757575;
            letter-spacing: 1px;
        }

        #contBtn {
            position: relative;
            top: 1.5em;
            text-decoration: none;
            background: #8bc34a;
            color: #fff;
            margin: auto;
            padding: .8em 3em;
            -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
            -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
            box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
            border-radius: 25px;
            -webkit-transition: all .4s ease;
            -moz-transition: all .4s ease;
            -o-transition: all .4s ease;
            transition: all .4s ease;
        }

        #contBtn:hover {
            -webkit-box-shadow: 0px 15px 30px rgba(60, 60, 60, 0.40);
            -moz-box-shadow: 0px 15px 30px rgba(60, 60, 60, 0.40);
            box-shadow: 0px 15px 30px rgba(60, 60, 60, 0.40);
            -webkit-transition: all .4s ease;
            -moz-transition: all .4s ease;
            -o-transition: all .4s ease;
            transition: all .4s ease;
        }
    </style>

</head>

<body>
    <div class="overlay" data-overlay></div>

    <?php include 'assets/php/navbar.php' ?>
    <div class="payment-container">
        <div id='card'>
            <div id='upper-side'>
                <h3 id='status'>Payment Done </h3>
            </div>
            <div id='lower-side'>
                <p id='message'> Congratulations, Your order is places successful</p>
                <a href="profile.php?orderdetails=enctype" id="contBtn">Check Order</a>
            </div>
        </div>
    </div>
    <?php include 'assets/php/footer.php' ?>
</body>

</html>