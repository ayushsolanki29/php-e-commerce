<?php
include 'php/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['forpass'])) {
    // Get the email and new password from the form
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    // Check if the email exists in the database
    $query = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) == 1) {
        // Email exists, update the user's password
        $query = "UPDATE users SET password=? WHERE email=?";
        $stmt = mysqli_prepare($con, $query);
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $email);
        mysqli_stmt_execute($stmt);

        // Display a success message using JavaScript alert
        echo '<script>alert("Your password has been reset. Please login with your new password.");</script>';
    } else {
        // Email not found in the database
        echo '<script>alert("The email address you entered is not associated with any account. Please try again.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--- primary meta tag-->
    <title>E Learning - The Best Program to Enroll for Exchange</title>
    <meta name="title" content="EduWeb - The Best Program to Enroll for Exchange">
    <meta name="description" content="This is an education html template made by codewithsadee">
    <?php include 'pages/header.php' ?>
    <style>
        :root {
            --main-color: hsl(170, 75%, 41%);
            --red: #e74c3c;
            --orange: #f39c12;
            --light-color: #888;
            --light-bg: #eee;
            --black: #2c3e50;
            --white: #fff;
            --border: .1rem solid rgba(0, 0, 0, .2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
        }

        html::-webkit-scrollbar {
            width: 1rem;
            height: .5rem;
        }

        html::-webkit-scrollbar-track {
            background-color: transparent;
        }

        html::-webkit-scrollbar-thumb {
            background-color: var(--main-color);
        }
        a{
            color:inherit;
        }
        a:nth-child(2){
            color:blue;
        }
    </style>
</head>

<body id="top">
    <!-- 
    - #HEADER
  -->
    <?php include 'pages/navabar.php' ?>
    <main>
        <article>
            <section class="section blog has-bg-image" id="blog" aria-label="blog"
                style="background-image: url('assets/images/blog-bg.svg')">
                <div class="container">
                    <section class="login-container">
                        <form method="post" >
                            <h3>Forget Password</h3>
                            <p>your email</p>
                            <input type="email" name="email" placeholder="enter your email" required maxlength="50"
                                class="box">
                            <p>your new password </p>
                            <input type="password" name="new_password" placeholder="enter your password" required maxlength="20"
                                class="box">
                            <button type="submit" class="btn has-before login" name="forpass" class="btn">Forget My Password</button>
                        </form>
                        <a href="register.php">Did not have an account??</a>
                    </section>

                </div>
            </section>
        </article>
    </main>

    <?php include 'pages/footer.php' ?>
</body>

</html>