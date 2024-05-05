
<?php if (isset($_GET['login']) && !isset($_SESSION['userid'])) {
  if (isset($_POST['lsubmit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $select_email2 = "SELECT * FROM `user`  WHERE `email`= '$email'";
    if (!mysqli_query($con, $select_email2))
      die("something went wrong");
    $result2 = mysqli_query($con, $select_email2);

    if (empty($email) || empty($password)) {
      echo "<script>alert('please Fill All Fields');</script>";
    } elseif (mysqli_num_rows($result2) != 0) {
      while ($row = mysqli_fetch_assoc($result2)) {
        if (password_verify($password, $row["password"])) {
          echo "<script>alert('Login Successful! Welcome...');</script>";
          $_SESSION['userid'] = $row['id'];
          echo "<script>window.location.href = 'index.php'</script>";
        } else {
          echo "<script>alert('Wrong Password')</script>";
        }
      }
    } else {
      echo "<script>alert('This is email not exist!');</script>";
    }
  }


?>

  <div class="modal">
    <div class="modal-close-overlay"></div>

    <div class="modal-content">

      <button class="modal-close-btn" onclick="window.location.href='index.php'">
        <ion-icon name="close-outline"></ion-icon>
      </button>

      <div class="newsletter-img">
        <img src="./assets/images/newsletter.png" alt="subscribe newsletter" width="400" height="400">
      </div>

      <div class="newsletter">

        <form method="post">

          <div class="newsletter-header">

            <h3 class="newsletter-title">Login</h3>

            <p class="newsletter-desc">
              Login to your<b>account</b>
            </p>

          </div>

          <input type="email" name="email" class="email-field" placeholder="Email Address" required>
          <input type="password" name="pass" class="email-field" placeholder="Passowrd " required>

          <button type="submit" name="lsubmit" class="btn-newsletter">Login</button>

        </form>
        <a href="index.php?register=00" class="">dont have an account?</a>
      </div>

    </div>

  </div>
<?php } ?>
<?php

if (isset($_GET['register']) && !isset($_SESSION['userid'])) {

  if (isset($_POST['rsubmit'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $select_email = "SELECT * FROM `user`  WHERE `email`= '$email'";
    if (!mysqli_query($con, $select_email))
      die("something went wrong");
    $result1 = mysqli_query($con, $select_email);

    if (empty($name) || empty($email) || empty($password)) {
      echo "<script>alert('please Fill All Fields');</script>";
    } elseif (mysqli_num_rows($result1) == 0) {
      $register = mysqli_query($con, "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$name','$email','$hashedPassword')");
      if ($register) {
        echo "<script>alert('registered success');</script>";
        echo "<script>window.location.href='index.php?login';</script>";
      } else {
        echo "<script>alert('register Fail');</script>";
      }
    } else {
      echo "<script>alert('Email Already in use');</script>";
    }
  }

?>
  <div class="modal">
    <div class="modal-close-overlay"></div>
    <div class="modal-content">
      <button class="modal-close-btn" onclick="window.location.href='index.php'">
        <ion-icon name="close-outline"></ion-icon>
      </button>

      <div class="newsletter-img">
        <img src="./assets/images/newsletter.png" alt="subscribe newsletter" width="400" height="400">
      </div>

      <div class="newsletter">

        <form method="POST">

          <div class="newsletter-header">

            <h3 class="newsletter-title">Register</h3>

            <p class="newsletter-desc">
              Register your<b>account</b>
            </p>

          </div>

          <input type="text" name="name" class="email-field" placeholder="Name" required>
          <input type="email" name="email" class="email-field" placeholder="Email Address" required>
          <input type="password" name="password" class="email-field" placeholder="Passowrd" required>

          <button type="submit" name="rsubmit" class="btn-newsletter">Register</button>

        </form>
        <a href="index.php?login=00" class="">already have an account?</a>
      </div>
    </div>

  </div>

<?php } ?>
<header>
  <div class="header-top">

    <div class="container">

      <ul class="header-social-container">

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
        </li>

      </ul>

      <div class="header-alert-news">
        <p>
          <b>Free Shipping</b>
          This Week Order Over - ₹599
        </p>
      </div>

      <div class="header-top-actions">

        <select name="currency">

          <option value="INR">INR ₹</option>

        </select>

        <select name="language">

          <option value="en-US">English</option>

        </select>

      </div>

    </div>

  </div>

  <div class="header-main">

    <div class="container">

      <a href="#" class="header-logo">
        <img src="assets/images/logo/logo.svg" alt="Anon's logo" width="120" height="36">
      </a>

      <div class="header-search-container">
        <?php 
        if (isset($_SESSION['userid'])) {
        $user = getUserData($_SESSION['userid']);
        }else{
          $user['name'] = "user";
        }

        ?>
        <input type="search" name="search" class="search-field" placeholder="Hello <?= $user['name']?> Search Anything...">
        <button class="search-btn">
          <ion-icon name="search-outline"></ion-icon>
        </button>

      </div>

      <div class="header-user-actions">
        <div class="dropdown">
          <button class="action-btn" onclick="toggleDropdown()">
            <ion-icon name="person-outline"></ion-icon>
          </button>
          <div id="dropdown-content" class="dropdown-content">
            <?php if (isset($_SESSION['userid'])) { ?>
              <a href="profile.php">Profile</a>
              <a href="logout.php">Logout</a>
            <?php  } else { ?>
              <a href="index.php?login">Login</a>
              <a href="index.php?register">Register</a>
            <?php } ?>

          </div>
        </div>
        <?php 
        if (isset($_SESSION['userid'])) {
          $userid =  $_SESSION['userid'];
        }else{
          $userid =  0;
        }
   
        $cart_count = "SELECT COUNT(*) AS `user_count` FROM `cart` where `UserID`='$userid'";
        $result22 = mysqli_query($con, $cart_count);
        $row22 = mysqli_fetch_assoc($result22);
        ?>
        <button class="action-btn" onclick="window.location.href = 'cart.php'">
          <ion-icon name="bag-handle-outline"></ion-icon>
          <span class="count"><?=$row22['user_count'] ?></span>
        </button>

      </div>

    </div>

  </div>

  <nav class="desktop-navigation-menu">

    <div class="container">

      <ul class="desktop-menu-category-list">

        <li class="menu-category">
          <a href="index.php" class="menu-title">Home</a>
        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Categories</a>

          <div class="dropdown-panel">
            <?php
            $category = mysqli_query($con, "SELECT * FROM `category`");
            while ($category_row = mysqli_fetch_assoc($category)) {
            ?>
              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="category.php?c=<?= $category_row['id'] ?>"><?= $category_row['title'] ?></a>
                </li>
                <?php
                $category_id =  $category_row['id'];
                $sub_category = mysqli_query($con, "SELECT * FROM `sub_category` WHERE `category_id`='$category_id'");
                while ($sub_category_row = mysqli_fetch_assoc($sub_category)) { ?>
                  <li class="panel-list-item">
                    <a href="category.php?c=<?= $category_row['id'] ?>"><?= $sub_category_row['sub_category'] ?></a>
                  </li>
                <?php } ?>
                <li class="panel-list-item">
                  <a href="category.php?c=<?= $category_row['id'] ?>">
                    <?php
                    if (!empty($category_row['image'])) { ?>
                      <img src="assets/images/category/<?= $category_row['image'] ?>" alt="men's fashion" width="250" height="119">
                    <?php   }
                    ?>
                  </a>
                </li>

              </ul>
            <?php } ?>


          </div>
        </li>
        <?php
        $category1 = mysqli_query($con, "SELECT * FROM `category`");
        while ($category_row1 = mysqli_fetch_assoc($category1)) {
        ?>
          <li class="menu-category">
            <a href="category.php?c=<?= $category_row1['id'] ?>" class="menu-title"><?= $category_row1['title'] ?></a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>

  <div class="mobile-bottom-navigation">

    <button class="action-btn" data-mobile-menu-open-btn>
      <ion-icon name="menu-outline"></ion-icon>
    </button>

    <button class="action-btn">
      <ion-icon name="bag-handle-outline"></ion-icon>

      <span class="count">0</span>
    </button>

    <button class="action-btn">
      <ion-icon name="home-outline"></ion-icon>
    </button>

    <button class="action-btn">
      <ion-icon name="heart-outline"></ion-icon>
      <span class="count">0</span>
    </button>

    <button class="action-btn" data-mobile-menu-open-btn>
      <ion-icon name="grid-outline"></ion-icon>
    </button>
  </div>

  <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

    <div class="menu-top">
      <h2 class="menu-title">Menu</h2>

      <button class="menu-close-btn" data-mobile-menu-close-btn>
        <ion-icon name="close-outline"></ion-icon>
      </button>
    </div>

    <ul class="mobile-menu-category-list">

      <li class="menu-category">
        <a href="#" class="menu-title">Home</a>
      </li>

      <li class="menu-category">

        <button class="accordion-menu" data-accordion-btn>
          <p class="menu-title">Men's</p>

          <div>
            <ion-icon name="add-outline" class="add-icon"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
          </div>
        </button>

        <ul class="submenu-category-list" data-accordion>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Shirt</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Shorts & Jeans</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Safety Shoes</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Wallet</a>
          </li>

        </ul>

      </li>

      <li class="menu-category">

        <button class="accordion-menu" data-accordion-btn>
          <p class="menu-title">Women's</p>

          <div>
            <ion-icon name="add-outline" class="add-icon"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
          </div>
        </button>

        <ul class="submenu-category-list" data-accordion>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Dress & Frock</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Earrings</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Necklace</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Makeup Kit</a>
          </li>

        </ul>

      </li>

      <li class="menu-category">

        <button class="accordion-menu" data-accordion-btn>
          <p class="menu-title">Jewelry</p>

          <div>
            <ion-icon name="add-outline" class="add-icon"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
          </div>
        </button>

        <ul class="submenu-category-list" data-accordion>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Earrings</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Couple Rings</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Necklace</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Bracelets</a>
          </li>

        </ul>

      </li>

      <li class="menu-category">

        <button class="accordion-menu" data-accordion-btn>
          <p class="menu-title">Perfume</p>

          <div>
            <ion-icon name="add-outline" class="add-icon"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
          </div>
        </button>

        <ul class="submenu-category-list" data-accordion>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Clothes Perfume</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Deodorant</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Flower Fragrance</a>
          </li>

          <li class="submenu-category">
            <a href="#" class="submenu-title">Air Freshener</a>
          </li>

        </ul>

      </li>

      <li class="menu-category">
        <a href="#" class="menu-title">Blog</a>
      </li>

      <li class="menu-category">
        <a href="#" class="menu-title">Hot Offers</a>
      </li>

    </ul>

    <div class="menu-bottom">

      <ul class="menu-category-list">

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Language</p>

            <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">English</a>
            </li>
          </ul>

        </li>

        <li class="menu-category">
          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Currency</p>
            <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
          </button>

          <ul class="submenu-category-list" data-accordion>
            <li class="submenu-category">
              <a href="#" class="submenu-title">INR ₹</a>
            </li>


          </ul>
        </li>

      </ul>

      <ul class="menu-social-container">

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
        </li>

      </ul>

    </div>
  </nav>
</header>