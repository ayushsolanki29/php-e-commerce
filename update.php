<?php
include 'php/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <?php include 'pages/header.php' ?>
    <style>
        :root{
   --main-color:#8e44ad;
   --red:#e74c3c;
   --orange:#f39c12;
   --light-color:#888;
   --light-bg:#eee;
   --black:#2c3e50;
   --white:#fff;
   --border:.1rem solid rgba(0,0,0,.2);
}
        html{
            font-size:62.5%;
        }
        .form-container{
            margin-top: 100px;
   min-height: calc(100vh - 20rem);
   display: flex;
   align-items: center;
   justify-content: center;
}

.form-container form{
   background-color: var(--white);
   border-radius: .5rem;
   padding: 2rem;
   width: 50rem;
}

.form-container form h3{
   font-size: 2.5rem;
   text-transform: capitalize;
   color: var(--black);
   text-align: center;
}

.form-container form p{
   font-size: 1.7rem;
   color: var(--light-color);
   padding-top: 1rem;
}

.form-container form p span{
   color: var(--red);
}

.form-container form .box{
   font-size: 1.8rem;
   color: var(--black);
   border-radius: .5rem;
   padding: 1.4rem;
   background-color: var(--light-bg);
   width: 100%;
   margin: 1rem 0;
}



    </style>
</head>
<body>
    <?php include 'pages/navabar.php' ?>
    <section class="form-container">

        <form action="" method="post" enctype="multipart/form-data">
           <h3>update profile</h3>
           <p>update name</p>
           <input type="text" name="name" placeholder="Enter Your name" value="<?= $userdata['true']['name']; ?>" maxlength="50" class="box">
           <p>update email</p>
           <input type="email" name="email" placeholder="enter your email" value="<?= $userdata['true']['email']; ?>"  maxlength="50" class="box">
           <p>new password</p>
           <input type="password" name="new_pass" placeholder="enter your old password" maxlength="20" class="box">
           <p>update pic</p>
           <input type="file" accept="image/*" class="box">
           <input type="submit" value="update profile" name="submit" class="btn">
        </form>
     
     </section>

     <?php include 'pages/footer.php' ?>
</body>
</html>