<?php
include 'php/config.php';
session_start();
if (isset($_GET['u']) && isset($_GET['cid']) )
{
  if (isset($_SESSION['userid'])) {
    $uid = $_GET['cid'];
    header("location:quizz.php?cid=$uid");
  }else{
    header("location:login.php");
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
    $course_name = $_GET["t"];
    $select_title = "SELECT * FROM `courses` WHERE `title`='$course_name'";
    $run_cources = mysqli_query($con, $select_title);

    if (!mysqli_num_rows($run_cources) > 0) {
      header("location:cources.php");
      exit;
    }
    while ($row_cource = mysqli_fetch_array($run_cources)) {
      $cid = $row_cource['id'];
      $ctitle = $row_cource['title'];
      $csub_title = $row_cource['sub-title'];

      $cduration = $row_cource['duration'];
      $ccategory = $row_cource['category'];
      $clevel = $row_cource['level'];
      $clessons = $row_cource['lessons'];
      $cimg = $row_cource['img'];
      $cdescription = $row_cource['description'];
      $cdate = $row_cource['date'];
      $curl = $row_cource['url'];

    }
    ?>
    <main>
      <article>
        <section class="section course" id="courses" aria-label="course">
          <div class="container">

            <p class="section-subtitle">
              <?= $ccategory ?>
            </p>

            <h2 class="h2 section-title">
              <?= $ctitle ?>
            </h2>

            <div class="cource-container">
              <div class="box">
                <div class="images">
                  <div class="img-holder active">
                    <img src="assets/images/cources/<?= $cimg ?>">
                  </div>

                </div>
                <div class="basic-info">
                  <h1>
                    <?= $csub_title ?>
                  </h1>

                  <p class="section-subtitle">
                    <?= $ccategory ?>
                  </p>

                  <span>
                    <?= $clevel ?>
                  </span>

                  <div class="options">
                    <a href="videoplaylist.php?c=<?=  $cid?>">Watch Video</a>
                    <a href="cource-details.php?u=check&cid=<?= $cid ?>&t=<?=$course_name?>">Play Quizz</a>
                    <a href="Feedback.php">Feedback</a>
                  </div>
                </div>
                <div class="description">
                  <p>
                    <?= $cdescription ?>
                  </p>


                </div>
              </div>


              <div class="accordion">
                <?php
                $select_lession = "SELECT * FROM `lessons` WHERE `course_id` =  $clessons";
                $run_lession = mysqli_query($con, $select_lession);
                while ($row_lession = mysqli_fetch_array($run_lession)) {
                  $lession_head = $row_lession['head'];
                  $lession_dec = $row_lession['description'];
                  ?>
                  <div class="accordion-content">
                    <header>
                      <span class="title">
                        <?= $lession_head ?>
                      </span>
                      <ion-icon name="add"></ion-icon>

                    </header>

                    <p class="description">
                      <?= $lession_dec ?>
                    </p>
                  </div>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>
        </section>

      </article>
    </main>

    <?php
  } else {
    header("location:cources.php");
  }


  include 'pages/footer.php' ?>
</body>

</html>