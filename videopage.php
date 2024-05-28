<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>watch</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <?PHP include 'pages/header.php'; ?>
   <style>
      :root {
         --bg: #eee;
         --light-color: #888;
         --main-color: #8e44ad;
         --border: 0.1rem solid rgba(0, 0, 0, 0.2);
         --black: #2c3e50;
         --red: #e74c3c;
         --orange: #f39c12;
      }

      .videopage {
         margin: 0 6rem;
         margin-top: 10rem;
         margin-bottom: 5rem;
      }

      .videopage .heading {
         font-size: 2.5rem;
         color: var(--black);
         margin-bottom: 2.5rem;
         border-bottom: var(--border);
         padding-bottom: 1.5rem;
         text-transform: capitalize;
      }


      .videopage .watch-video .video-container {
         background-color: var(--bg);
         border-radius: 0.5rem;
         padding: 2rem;
      }

      .videopage .watch-video .video-container .video {
         position: relative;
         margin-bottom: 1.5rem;
      }

      .videopage .watch-video .video-container .video video {
         border-radius: 0.5rem;
         width: 100%;
         object-fit: contain;
         background-color: #000;
      }

      .videopage .watch-video .video-container .title {
         font-size: 2rem;
         color: var(--black);
      }

      .videopage .watch-video .video-container .info {
         display: flex;
         margin-top: 1.5rem;
         margin-bottom: 2rem;
         border-bottom: var(--border);
         padding-bottom: 1.5rem;
         gap: 2.5rem;
         align-items: center;
      }

      .videopage .watch-video .video-container .info p {
         font-size: 1.6rem;
         color: #888;
         display: block;
         margin-block-start: 1em;
         margin-block-end: 1em;
         margin-inline-start: 0px;
         margin-inline-end: 0px;
      }

      .videopage .watch-video .video-container .info p span {
         color: #888;
      }

      .videopage .watch-video .video-container .info i {
         margin-right: 1rem;
         color: var(--main-color);
      }

      .videopage .watch-video .video-container .tutor {
         display: flex;
         align-items: center;
         gap: 2rem;
         margin-bottom: 1rem;
      }

      .videopage .watch-video .video-container .tutor img {
         border-radius: 50%;
         height: 5rem;
         width: 5rem;
         object-fit: cover;
      }

      .videopage .watch-video .video-container .tutor h3 {
         font-size: 2rem;
         color: var(--black);
         margin-bottom: 0.2rem;
      }

      .videopage .watch-video .video-container .tutor span {
         font-size: 1.5rem;
         color: #888;
      }

      .videopage .watch-video .video-container .flex {
         display: flex;
         align-items: center;
         justify-content: space-between;
         gap: 1.5rem;
      }

      .videopage .watch-video .video-container .flex button {
         border-radius: 0.5rem;
         padding: 1rem 1.5rem;
         font-size: 1.8rem;
         cursor: pointer;
         background-color: #ddd;
      }

      .videopage .watch-video .video-container .flex button i {
         margin-right: 1rem;
         color: var(--light-color);
      }

      .videopage .watch-video .video-container .flex button span {
         color: #888;
      }

      .videopage .watch-video .video-container .flex button:hover {
         background-color: var(--black);
      }

      .videopage .watch-video .video-container .flex button:hover i {
         color: #fff;
      }

      .videopage .watch-video .video-container .flex button:hover span {
         color: #fff;
      }

      .videopage .watch-video .video-container .description {
         line-height: 1.5;
         font-size: 1.7rem;
         color: #888;
         margin-top: 2rem;
      }

      .videopage .comments .add-comment {
         background-color: var(--bg);
         border-radius: 0.5rem;
         padding: 2rem;
         margin-bottom: 3rem;
      }

      .videopage .comments .add-comment h3 {
         font-size: 2rem;
         color: var(--black);
         margin-bottom: 1rem;
      }

      .videopage .comments .add-comment textarea {
         outline: none;
         height: 20rem;
         resize: none;
         background-color: #fff;
         border-radius: 0.5rem;
         border: var(--border);
         padding: 1.4rem;
         font-size: 1.8rem;
         color: var(--black);
         width: 100%;
         margin: 0.5rem 0;
      }

      .videopage .comments .box-container {
         display: grid;
         gap: 2.5rem;
         background-color: var(--bg);
         padding: 2rem;
         border-radius: 0.5rem;
      }

      .videopage .comments .box-container .box {
         background-color: var(--bg);
         padding: 2rem;
      }

      .videopage .comments .box-container .box .user {
         display: flex;
         align-items: center;
         gap: 1.5rem;
         margin-bottom: 2rem;
      }

      .videopage .comments .box-container .box .user img {
         height: 5rem;
         width: 5rem;
         border-radius: 50%;
      }

      .videopage .comments .box-container .box .user h3 {
         font-size: 2rem;
         color: var(--black);
         margin-bottom: 0.2rem;
      }

      .videopage .comments .box-container .box .user span {
         font-size: 1.5rem;
         color: var(--light-color);
      }

      .videopage .comments .box-container .box .comment-box {
         border-radius: 0.5rem;
         background-color: white;
         padding: 1rem 1.5rem;
         white-space: pre-line;
         margin: 0.5rem 0;
         font-size: 1.8rem;
         color: var(--black);
         line-height: 1.5;
         position: relative;
         z-index: 0;
      }

      .videopage .comments .box-container .box .comment-box::before {
         content: "";
         position: absolute;
         top: -1rem;
         left: 1.5rem;
         background-color: white;
         height: 1.2rem;
         width: 2rem;
         clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
      }

      .videopage .flex-btn {
         display: flex;
         gap: 1rem;
      }

      .videopage .inline-btn {
         background-color: var(--main-color);
      }

      .videopage .inline-option-btn {
         background-color: var(--orange);
      }

      .videopage .inline-delete-btn {
         background-color: var(--red);
      }

      .videopage .inline-btn:hover,
      .inline-option-btn:hover,
      .inline-delete-btn:hover {
         background-color: #2c3e50;
      }

      .videopage .inline-btn,
      .videopage .inline-option-btn,
      .videopage .inline-delete-btn {
         display: inline-block;
      }

      .videopage .inline-btn,
      .videopage .inline-option-btn,
      .videopage .inline-delete-btn {
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
   <?PHP include 'pages/navabar.php';
   if (isset($_POST['add_comment'])) {
      $cuser_id = $_POST['user_id'];
      $cvideo_id = $_POST['video_id'];
      $ccomment_box = $_POST['comment_box'];

      $run_com = mysqli_query($con, "INSERT INTO `comments`(`user_id`, `video_id`, `comment`) VALUES ('$cuser_id','$cvideo_id','$ccomment_box')");
      if ($run_com) {
         header("Refresh:0");
      } else {
         header("Refresh:0");
      }
   }
   if (isset($_GET['v'])) {
      $video_id = $_GET['v'];
      $video_thumb = $_GET['th'];
   }
   $select_v = mysqli_query($con,  "SELECT * FROM `video_lessons` WHERE `id` = '$video_id'");
   while ($fetch_vid = mysqli_fetch_array($select_v)) { ?>
      <main class="videopage">
         <section class="watch-video">
            <div class="video-container">
               <div class="video">
                  <video src="assets/videos/<?= $fetch_vid['video_link'] ?>" controls poster="assets/images/cources/thumbnail/<?= $video_thumb ?>" id="video"></video>
               </div>
               <h3 class="title"><?= $fetch_vid['title'] ?></h3>
               <div class="info">
                  <p class="date"><i class="fas fa-calendar"></i><span><?= $fetch_vid['date'] ?></span></p>
                  <p class="date"><i class="fas fa-heart"></i><span>44 likes</span></p>
               </div>
               <div class="tutor">
                  <img src="./assets/images/users/default.jpg" alt="">
                  <div>
                     <h3><?= $userdata['true']['name'] ?></h3>
                     <span>student</span>
                  </div>
               </div>
               <form action="" method="post" class="flex">
                  <a href="./videoplaylist.php" class="inline-btn">view playlist</a>
                  <button><i class="far fa-heart"></i><span>like</span></button>
               </form>
               <p class="description">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque labore ratione, hic exercitationem
                  mollitia obcaecati culpa dolor placeat provident porro.
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid iure autem non fugit sint. A, sequi
                  rerum architecto dolor fugiat illo, iure velit nihil laboriosam cupiditate voluptatum facere cumque nemo!
               </p>
            </div>

         </section>

         <section class="comments">

            <h1 class="heading">5 comments</h1>

            <form method="post" class="add-comment">
               <h3>add comments</h3>
              
                  <input type="hidden" name="video_id" value="<?= $video_id ?>">
                  <input type="hidden" name="user_id" value="<?= $userdata['true']['id'] ?>">
                  <textarea name="comment_box" placeholder="enter your comment" required maxlength="1000" cols="30" rows="10"></textarea>
                  <input type="submit" value="add comment" class="inline-btn" name="add_comment">
            
            </form>

            <h1 class="heading">user comments</h1>

            <div class="box-container">

               <?php
               $videoID =  $fetch_vid['id'];
               $get_Comments = mysqli_query($con, "SELECT * FROM `comments` WHERE `video_id` = '$videoID' ORDER BY `comments`.`id` DESC");
               while ($get_com_data = mysqli_fetch_array($get_Comments)) { ?>
                  <div class="box">
                     <?php $c_user = getUserData($get_com_data['user_id']) ?>
                     <div class="user">
                        <img src="./assets/images/users/<?= $c_user['profile'] ?>" alt="">
                        <div>
                           <h3><?= $c_user['name'] ?></h3>
                           <span><?= $get_com_data['date'] ?></span>
                        </div>
                     </div>
                     <div class="comment-box"><?= $get_com_data['comment'] ?></div>
                  </div>
               <?php }

               ?>




            </div>

         </section>
      </main>
   <?php }
   ?>

   <?PHP include 'pages/footer.php'; ?>

</body>

</html>