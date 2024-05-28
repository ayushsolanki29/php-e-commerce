<?php
include 'php/config.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--- primary meta tag-->
  <title>E Learning - The Best Program to Enroll for Exchange</title>
  <meta name="title" content="EduWeb - The Best Program to Enroll for Exchange">
  <meta name="description" content="This is an education html template made by codewithsadee">
  <?php include 'pages/header.php' ?>

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->
  <?php include 'pages/navabar.php' ?>

  <main>
    <article>
      <section class="section course" id="courses" aria-label="course">
        <div class="container">

          <p class="section-subtitle">All Cources Here</p>

          <h2 class="h2 section-title">Pick A Course To Get Started</h2>

          <ul class="grid-list">
            <?php


            $select_title = "SELECT * FROM `courses` WHERE 1";
            $run_cources = mysqli_query($con, $select_title);

            while ($row_cource = mysqli_fetch_array($run_cources)) {
              $cid = $row_cource['id'];
              $ctitle = $row_cource['title'];
              $subdescription = $row_cource['sub-description'];
              $cduration = $row_cource['duration'];
              $ccategory = $row_cource['category'];
              $clevel = $row_cource['level'];
              $clessons = $row_cource['lessons'];
              $cimg = $row_cource['img'];
              ?>
              <li>
                <div class="course-card">

                  <figure class="card-banner img-holder" style="--width: 370; --height: 220;">
                    <img src="assets/images/cources/<?= $cimg?>" width="370" height="220" loading="lazy"
                      alt="Build Responsive Real- World Websites with HTML and CSS" class="img-cover">
                  </figure>

                  <div class="abs-badge">
                    <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                    <span class="span">
                      <?= $cduration . ' Minutes' ?>
                    </span>
                  </div>

                  <div class="card-content">

                    <span class="badge">
                      <?= $clevel ?>
                    </span>

                    <h3 class="h3">
                      <a href="cource-details.php?t=<?= $ctitle ?>" class="card-title">
                        <?= $ctitle ?>
                      </a>
                    </h3>

                    <div class="wrapper">
                      <p>
                        <?= $subdescription ?>
                      </p>

                    </div>

                    <data class="price">
                      <?= $clevel ?>
                    </data>

                    <ul class="card-meta-list">

                      <li class="card-meta-item">
                        <ion-icon name="library-outline" aria-hidden="true"></ion-icon>
                        <?php   // Fetch the count of records where payment_status is 'Paid'
                          $select_totalless = "SELECT COUNT(*) AS totalless FROM `lessons` WHERE course_id = $clessons";
                          $run_select_totalless = mysqli_query($con, $select_totalless);

                          if ($run_select_totalless) {
                            $row_less = mysqli_fetch_assoc($run_select_totalless);
                            $total_lessions = $row_less['totalless'];
                          } else {
                            $total_lessions = 0;
                          } ?>
                        <span class="span">
                          <?= $total_lessions ?> Lessons
                        </span>
                      </li>



                    </ul>

                  </div>

                </div>
              </li>
              <?php
            }

            ?>


          </ul>
        </div>
      </section>

    </article>
  </main>


  <?php include 'pages/footer.php' ?>
</body>

</html>