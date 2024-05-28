<?php
include 'php/config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--- primary meta tag-->
  <title>E Learning - The Best Program to Enroll for Exchange</title>
  <meta name="title" content="EduWeb - The Best Program to Enroll for Exchange">
  <meta name="description" content="This is an education html template made by codewithsadee">
  <?php include 'pages/header.php'?>

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->
  <?php include 'pages/navabar.php'?>

  <main>
    <article>
    <section class="section blog has-bg-image" id="blog" aria-label="blog"
        style="background-image: url('./assets/images/blog-bg.svg')">
        <div class="container">

          <p class="section-subtitle">Materials For Your Needs</p>

          <h2 class="h2 section-title">Get Your Perfect Materials</h2>

          <ul class="grid-list">
          <?php
              $run_materials = mysqli_query($con,  "SELECT * FROM `materials` where 1");

              while ($row_materials = mysqli_fetch_array($run_materials)) {
                $mid = $row_materials['id'];
                $mtitle = $row_materials['title'];
                $msubtitle= $row_materials['sub-title'];
                $mtype = $row_materials['type'];
                $mdownloads = $row_materials['downloads'];
                $mdescription = $row_materials['description'];
                $mdate = $row_materials['date'];
                $mimg = $row_materials['img'];
                ?>
           <li>
              <div class="blog-card">

                <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                  <img src="assets/images/materials/<?=$mimg?>" width="370" height="370" loading="lazy"
                    alt="Become A Better Blogger: Content Planning" class="img-cover">
                </figure>

                <div class="card-content">

                <a href="material-details.php?t=<?= $mtitle ?>" class="card-btn" aria-label="read more">
                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                  <a href="#" class="card-subtitle"><?= $mtype ?></a>

                  <h3 class="h3">
                    <a href="material-details.php?t=<?= $mtitle ?>" class="card-title"><?= $mtitle ?></a>
                  </h3>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                      <span class="span"><?= $mdate  ?></span>
                    </li>

                    <li class="card-meta-item">
                      <ion-icon name="chatbubbles-outline" aria-hidden="true"></ion-icon>
                      <span class="span"><?= $mdownloads ?> Downlaods</span>
                    </li>

                  </ul>

                  <p class="card-text">
                  <?=  $mdescription ?>
                  </p>

                </div>

              </div>
            </li>
          <?php }?>
          </ul>

          <img src="./assets/images/blog-shape.png" width="186" height="186" loading="lazy" alt=""
            class="shape blog-shape">

        </div>
      </section>

    </article>
  </main>


<?php include 'pages/footer.php'?>
</body>

</html>