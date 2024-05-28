<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>video playlist</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <?php include './pages/header.php'; ?>

   <style>
      .playlist {
         margin: 0 4rem;
         margin-top: 10rem;
         margin-bottom: 5rem;
      }

      .playlist .playlist-details .row {
         display: flex;
         align-items: flex-end;
         gap: 3rem;
         flex-wrap: wrap;
         padding: 2rem;
      }

      .playlist .playlist-details .row .column {
         flex: 1 1 40rem;
      }

      .playlist .playlist-details .row .column .save-playlist {
         margin-bottom: 1.5rem;
      }

      .playlist .playlist-details .row .column .save-playlist button {
         border-radius: .5rem;
         background-color: #eee;
         padding: 1rem 1.5rem;
         cursor: pointer;
      }

      .playlist .playlist-details .row .column .save-playlist button i {
         font-size: 2rem;
         color: #2c3e50;
         margin-right: .8rem;
      }

      .playlist .playlist-details .row .column .save-playlist button span {
         font-size: 1.8rem;
         color: #888;
      }

      .playlist .playlist-details .row .column .save-playlist button:hover {
         background-color: #2c3e50;
      }

      .playlist .playlist-details .row .column .save-playlist button:hover i {
         color: white;
      }

      .playlist .playlist-details .row .column .save-playlist button:hover span {
         color: white;
      }

      .playlist .playlist-details .row .column .thumb {
         position: relative;
      }

      .playlist .playlist-details .row .column .thumb span {
         font-size: 1.8rem;
         color: #fff;
         background-color: rgba(0, 0, 0, .3);
         border-radius: .5rem;
         position: absolute;
         top: 1rem;
         left: 1rem;
         padding: .5rem 1.5rem;
      }

      .playlist .playlist-details .row .column .thumb img {
         height: 30rem;
         width: 100%;
         object-fit: cover;
         border-radius: .5rem;
      }

      .playlist .playlist-details .row .column .tutor {
         display: flex;
         align-items: center;
         gap: 2rem;
         margin-bottom: 2rem;
      }

      .playlist .playlist-details .row .column .tutor img {
         height: 7rem;
         width: 7rem;
         border-radius: 50%;
         object-fit: cover;
      }

      .playlist .playlist-details .row .column .tutor h3 {
         font-size: 2rem;
         color: #2c3e50;
         margin-bottom: .2rem;
      }

      .playlist .playlist-details .row .column .tutor span {
         font-size: 1.5rem;
         color: #888;
      }

      .playlist .playlist-details .row .column .details h3 {
         font-size: 2rem;
         color: black;
         text-transform: capitalize;
      }

      .playlist .playlist-details .row .column .details p {
         padding: 1rem 0;
         line-height: 2;
         font-size: 1.8rem;
         color: #888;
      }

      .playlist .playlist-videos .box-container {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
         gap: 1.5rem;
         justify-content: center;
         align-items: flex-start;
      }

      .playlist .playlist-videos .box-container .box {
         background-color: #eee;
         border-radius: .5rem;
         padding: 2rem;
         position: relative;
      }

      .playlist .playlist-videos .box-container .box i {
         position: absolute;
         top: 2rem;
         left: 2rem;
         right: 2rem;
         height: 20rem;
         border-radius: .5rem;
         background-color: rgba(0, 0, 0, .3);
         display: flex;
         align-items: center;
         justify-content: center;
         font-size: 5rem;
         color: #fff;
         display: none;
      }

      .playlist .playlist-videos .box-container .box:hover i {
         display: flex;
      }

      .playlist .playlist-videos .box-container .box img {
         width: 100%;
         height: 20rem;
         object-fit: cover;
         border-radius: .5rem;
      }

      .playlist .playlist-videos .box-container .box h3 {
         margin-top: 1.5rem;
         font-size: 1.8rem;
         color: #2c3e50;
      }

      .playlist .playlist-videos .box-container .box:hover h3 {
         color: #8e44ad;
      }

      .playlist .inline-btn {
         background-color: #8e44ad;
      }

      .playlist .inline-btn:hover {
         background-color: #2c3e50;
      }

      .playlist .inline-btn {
         display: inline-block;
      }

      .playlist .inline-btn {
         border-radius: 0.5rem;
         color: #fff;
         font-size: 1.8rem;
         cursor: pointer;
         text-transform: capitalize;
         padding: 1rem 3rem;
         text-align: center;
         margin-top: 1rem;
      }
   </style>
</head>

<body>
   <?php include './pages/navabar.php'; ?>

   <?php

   if (isset($_GET['c'])) {

      $channelId = $_GET["c"];

      $run_v = mysqli_query($con, "SELECT * FROM `video_course` WHERE `course_id`= '$channelId' ");
      while ($row_v = mysqli_fetch_array($run_v)) {
         $VideoLESSID = $row_v['id']; ?>
         <main class="playlist">
            <section class="playlist-details">
               <div class="row">
                  <div class="column">
                     <div class="thumb">
                        <img src="assets/images/cources/thumbnail/<?= $row_v['thub'] ?>" alt="">
                        <span>10 videos</span>
                     </div>

                  </div>
                  <div class="column">
                     <div class="tutor">
                        <img src="./assets/images/users/default.jpg" alt="">
                        <div>
                           <h3>john deo</h3>
                           <span>21-10-2022</span>
                        </div>
                     </div>

                     <div class="details">
                        <h3><?= $row_v['video_title'] ?></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum minus reiciendis, error sunt veritatis
                           exercitation deserunt velit doloribus itaque vol update.</p>
                        <a href="teacher_profile.html" class="inline-btn">view profile</a>
                     </div>
                  </div>
               </div>

            </section>

            <section class="playlist-videos">

               <h1 class="heading">playlist videos</h1>

               <div class="box-container">
                  <?php

                  $select_lession = mysqli_query($con, "SELECT * FROM `video_lessons` WHERE `video_c_id` = '$VideoLESSID'");
                  while ($row_vv = mysqli_fetch_array($select_lession)) { ?>
                     <a class="box" href="videopage.php?v=<?= $row_vv['id'] ?>&th=<?= $row_v['thub'] ?>">
                        <i class="fas fa-play"></i>
                        <img src="./assets/images/cources/thumbnail/<?= $row_v['thub'] ?>" alt="">
                        <span>10 videos</span>
                        <h3><?= $row_vv['title'] ?></h3>
                     </a>
                  <?php }

                  ?>


               </div>

            </section>
         </main>
   <?php }
   } ?>


   <footer class="footer">
      <?php include 'pages/footer.php'; ?>
   </footer>
   <!-- custom js file link  -->
   <script src="js/script.js"></script>


</body>

</html>