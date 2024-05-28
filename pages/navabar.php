<?php
include 'php/functions.php';

if (isset($_COOKIE['userid'])) {
  $_SESSION['userid'] = $_COOKIE['userid'];
}
if (isset($_SESSION['userid'])) {
  $userdata['true'] = getUserData($_SESSION['userid']);
}
?>

<header class="header" data-header>
  <div class="container">

    <a href="#" class="logo">
      <img src="./assets/images/logo.svg" width="162" height="50" alt="">
    </a>

    <nav class="navbar" data-navbar>

      <div class="wrapper">
        <a href="#" class="logo">
          <img src="./assets/images/logo.svg" width="162" height="50" alt="EduWeb logo">
        </a>

        <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>
      </div>

      <ul class="navbar-list">

        <li class="navbar-item">
          <a href="index.php#home" class="navbar-link" data-nav-link>Home</a>
        </li>

        <li class="navbar-item">
          <a href="index.php#about" class="navbar-link" data-nav-link>About</a>
        </li>

        <li class="navbar-item">
          <a href="index.php#courses" class="navbar-link" data-nav-link>Courses</a>
        </li>

        <li class="navbar-item">
          <a href="index.php#blog" class="navbar-link" data-nav-link>Materials</a>
        </li>

        <li class="navbar-item">
          <a href="contact.php" class="navbar-link" data-nav-link>Contact</a>
        </li>

      </ul>

    </nav>

    <div class="header-actions">




      <?php if (isset($_SESSION['userid'])) {
      ?>
        <button class="header-action-btn" id="user-btn">
          <ion-icon name="person-circle-outline"></ion-icon>
        </button>
        <a href="logout.php" class="btn has-before">
          <span class="span">Logout</span>
          <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
        </a>
      
      <?php
      } else {
      ?> <a href="login.php" class="btn has-before">
          <span class="span">Login</span>

          <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
        </a>
      <?php
      } ?>



      <button class="header-action-btn" aria-label="open menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
      </button>

    </div>

    <div class="overlay" data-nav-toggler data-overlay></div>

  </div>
</header>

<?php
if (isset($_SESSION['userid'])) {
?>
  <div class="profile" id="profile">
    <img src="assets\images\users\<?= $userdata['true']['profile']; ?>" class="image" alt="">
    <h3 class="name"><?= $userdata['true']['name']; ?></h3>
    <p class="role">student</p>
    <a href="profile.php" class="pbtn">Profile</a>
  </div>
<?php
}
?>