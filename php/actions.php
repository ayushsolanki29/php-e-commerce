<?php include 'config.php';
include 'functions.php';
session_start();

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $select_email = "SELECT * FROM `users`  WHERE `email`= '$email'";
    if (!mysqli_query($con, $select_email))
        die("something went wrong");
    $result1 = mysqli_query($con, $select_email);

    if (empty($name) || empty($email) || empty($password)) {
        echo "<script>alert('please Fill All Fields');</script>";
        echo "<script>window.location.href = '../register.php'</script>";
    } elseif (mysqli_num_rows($result1) == 0) {
        $register = mysqli_query($con, "INSERT INTO `users`( `name`, `email`, `password`) VALUES ('$name','$email','$hashedPassword')");
        if ($register) {
            echo "<script>alert('registered success');</script>";
            echo "<script>window.location.href = '../login.php'</script>";
        } else {
            echo "<script>alert('register Fail');</script>";
            echo "<script>window.location.href = '../register.php'</script>";
        }
    } else {
        echo "<script>alert('Email Already in use');</script>";
        echo "<script>window.location.href = '../register.php'</script>";
    }
}
if (isset($_GET['submit_data'])) {
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];

        // Get the JSON data sent from JavaScript
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data);

        // Access the score and cource_id from the JSON data
        $cource_id = $data->cource_id;
        $score = $data->score;
        $total_score = $data->total_score;

        mysqli_query($con, "INSERT INTO `quizz_results`(`user_id`, `course_id`, `score`, `total_score`) VALUES ('$userid','$cource_id','$score','$total_score')");
        echo "Quizz completed successfully";
    } else {
        echo "User not logged in";
    }
}


if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $select_email2 = "SELECT * FROM `users`  WHERE `email`= '$email'";
    if (!mysqli_query($con, $select_email2))
        die("something went wrong");
    $result2 = mysqli_query($con, $select_email2);

    if (empty($email) || empty($password)) {
        echo "<script>alert('please Fill All Fields');</script>";
        echo "<script>window.location.href = '../register.php'</script>";
    } elseif (mysqli_num_rows($result2) != 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            if (password_verify($password, $row["password"])) {
                session_start();
                $userid = $row["id"];
                $_SESSION['userid'] = $userid;
                setcookie("userid", $userid, strtotime('+30 days'), '/', '', false, true);
                header("Location: ../index.php");
            } else {
                echo "<script>alert('Wrong Password')</script>";
                echo "<script>window.location.href = '../login.php'</script>";
            }
        }
    } else {
        echo "<script>alert('This is email not exist!');</script>";
        echo "<script>window.location.href = '../login.php'</script>";
    }
}

if (isset($_POST['contact'])) {
    $con_name = $_POST['name'];
    $con_email = $_POST['email'];
    $con_msg = $_POST['msg'];
    $run_contact = mysqli_query($con, "INSERT INTO `contact`(`name`, `email`, `msg`) VALUES ('$con_name','$con_email','$con_msg')");

    if ($run_contact) { //validate the data
        echo "<script>alert('message sended');</script>";
        echo "<script>window.location.href = '../contact.php'</script>";
    } else {
        echo "<script>alert('Failed to send');</script>";
        echo "<script>window.location.href = '../contact.php'</script>";
    }
}

if (isset($_POST['feedback'])) {
    $f_rating = $_POST['rating'];
    $f_msg = $_POST['opinion'];
    $run_feedback = mysqli_query($con,"INSERT INTO `feedback`( `rating`, `msg`) VALUES ('$f_rating','$f_msg')");
    if ($run_feedback) { 
        echo "<script>alert('Feedback Message Sended');</script>";
        echo "<script>window.location.href = '../Feedback.php'</script>";
    } else {
        echo "<script>alert('Failed To Send Feedback');</script>";
        echo "<script>window.location.href = '../Feedback.php'</script>";
    }
}
