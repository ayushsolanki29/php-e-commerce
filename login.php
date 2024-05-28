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

        .fp {
            color: red;
        }

        .reg {
            color: blue;
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
            <section class="section blog has-bg-image" id="blog" aria-label="blog" style="background-image: url('assets/images/blog-bg.svg')">
                <div class="container">
                    <section class="login-container">
                        <form action="php/actions.php" method="post">
                            <h3>login now</h3>
                            <p>your email </p>
                            <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
                            <p>your password </p>
                            <input type="password" name="pass" placeholder="enter your password" required maxlength="20" class="box">
                            <button type="submit" class="btn has-before login" name="login" class="btn">Login Now</button>
                        </form>
                        <a href="register.php" class="reg">Did not have an account??</a>
                        <a href="forpass.php" class="fp">Forget Password ??</a>
                    </section>
                </div>
            </section>
        </article>
    </main>

    <?php include 'pages/footer.php' ?>
</body>

</html>