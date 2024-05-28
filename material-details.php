<?php
include 'php/config.php';

session_start();
if (isset($_GET['download']) && isset($_GET['i']) && isset($_GET['f']) && isset($_GET['a'])) {
  $userid = $_SESSION['userid'];
  $id = $_GET['i'];
  $ammount = $_GET['a'];
  $file = $_GET['f'];
  if ($_GET['download'] == "true") {
    $run_pay_done = mysqli_query($con, "INSERT INTO `payments`(`user_id`, `material_id`, `amount`) VALUES ('$userid','$id','$ammount')");
    if ($run_pay_done) {
      $update_down = mysqli_query($con, "UPDATE `materials` SET `downloads`=`downloads` + 1 WHERE id='$id'");
      if ($update_down) {
        header('Content-Description: File Download');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        readfile("assets/data/$file");
      } else {
        die('Error');
      }
    } else {
      echo "<script>alert('Payment Error')</script>";
      echo "<script>window.location.href = 'material-details.php'</script>";
    }
  } else {
    echo "error";
    header("location:index.php?err=403");
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
  <link rel="stylesheet" href="assets/css/cources.css">


</head>

<body id="top">


  <!-- 
    - #HEADER
  -->
  <?php include 'pages/navabar.php';

  if (isset($_GET['t'])) {
    $material_name = $_GET["t"];


    $run_materials = mysqli_query($con, "SELECT * FROM `materials` WHERE `title`='$material_name'");
    if (!mysqli_num_rows($run_materials) > 0) {
      header("location:materials.php");
      exit;
    }
    while ($row_materials = mysqli_fetch_array($run_materials)) {
      $mid = $row_materials['id'];
      $mtitle = $row_materials['title'];
      $msubtitle = $row_materials['sub-title'];
      $category = $row_materials['category'];
      $mtype = $row_materials['type'];
      $mdownloads = $row_materials['downloads'];
      $mdescription = $row_materials['description'];
      $mdate = $row_materials['date'];
      $mcontent = $row_materials['content'];
      $mprice = $row_materials['price'];
      $mimg = $row_materials['img'];
      $date = $row_materials['date'];

  ?>
      <div class="Card-center paymentpopup" style="backdrop-filter: blur(1px); user-select:none;">
        <div class="not-loged">
          <span class="title">Pay <?= $mprice . '₹' ?></span>
          <p><?= $mtitle ?></p>
          <div class="description">

            <img src="assets/images/qr.png" class="qr" alt="" width="100px" height="100px">
            <img src="assets/images/done.png" style="display: none;" alt="" class="done" width="100px" height="100px">
          </div>
          <br>
          <div class="actions" id="btn_per">
            <?php if (isset($_SESSION['userid'])) { ?>
              <button type="button" class="accept conitunue-btn">Continue</button>
            <?php } else { ?>
              <a href="login.php"><button type="button" class="accept">Login First</button></a>
            <?php } ?>



            <a href="material-details.php?download=true&i=<?= $mid ?>&f=<?= $mcontent ?>&a=<?= $mprice ?>"><button type="button" onclick="changeimg()" style="display: none;" class="accept payment-btn">Confirm <?= $mprice . '₹' ?></button></a>
          </div>
          <br>
          <a href="material-details.php?t=<?= $material_name ?>" class="pref">cencel</a>
        </div>
      </div>
      <main>
        <article>
          <section class="section course" id="courses" aria-label="course">
            <div class="container">

              <p class="section-subtitle">
                <?= $category ?>
              </p>

              <h2 class="h2 section-title">
                <?= $mtitle ?>
              </h2>

              <div class="cource-container">
                <div class="box">
                  <div class="images">
                    <div class="img-holder active">
                      <img src="assets/images/materials/<?= $mimg ?>">
                    </div>

                  </div>
                  <div class="basic-info">
                    <h1>
                      <?= $msubtitle ?>
                    </h1>



                    <span class='price'>
                      Price :
                      <?= $mprice . '₹' ?>
                    </span>

                    <div class="options">

                      <?php
                      if (isset($_SESSION['userid'])) {
                        $select_payment = "SELECT * FROM `payments` WHERE user_id = '" . $_SESSION['userid'] . "' AND material_id = '" . $mid . "'";
                        $res_payment = mysqli_query($con, $select_payment);
                        $row_payment = mysqli_fetch_assoc($res_payment);
                        if ($row_payment) {
                    ?>
                            <a href="material-details.php?download=true&i=<?= $mid ?>&f=<?= $mcontent ?>&a=<?= $mprice ?>"><button type="button">Download</button></a>
                    <?php
                        } else {
                    ?>
                            <button type="button" onclick="paymentpopup()">Purchase Now</button>
                    <?php
                        }
                    }
                    
                      
                      else{ ?>
                        <button type="button" onclick="paymentpopup()">Purchase Now</button>
                     <?php }
                      ?>



                      <a href="Feedback.php" class="secound">Feedback</a>
                    </div>

                  </div>
                  <div class="description">
                    <p>
                      <li><b> File Types :</b>
                        <?= $mtype ?>
                      </li>
                      <li><b>File Name :</b>
                        <?= $mcontent ?>
                      </li>
                      <li><b>Category :</b>
                        <?= $category ?>
                      </li>
                      <li><b>Downloads :</b>
                        <?= $mdownloads . ' Downloads' ?>
                      </li>
                      <li><b>Updaloaded on : </b>
                        <?= $date ?>
                      </li>
                    </p>
                    <p>
                      <?= $mdescription ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>

        </article>
      </main>

  <?php
    }
  } else {
    header("location:materials.php");
  }


  include 'pages/footer.php' ?>
</body>

</html>