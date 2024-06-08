<?php include 'assets/php/config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Anon - eCommerce Website</title>

  <?php include 'assets/php/header.php' ?>

</head>

<body>


  <div class="overlay" data-overlay></div>


  <?php include 'assets/php/navbar.php' ?>

  <div class="product-container">

    <div class="container">
      <?php if (isset($_GET['p'])) {
        $product_id = $_GET['p'];
        $get_product = mysqli_query($con, "SELECT * FROM `product` WHERE `id`='$product_id'");
        while ($fetched_product = mysqli_fetch_assoc($get_product)) {
      ?>

          <div class="product-featured">
            <div class="showcase-wrapper has-scrollbar">
              <div class="showcase-container">
                <div class="showcase">
                  <div class="showcase-banner">
                    <img src="./assets/images/products/<?= $fetched_product['p_img1'] ?>" alt="<?= $fetched_product['p_name'] ?>" class="showcase-img">
                  </div>

                  <div class="showcase-content">


                    <h3 class="showcase-title"><?= $fetched_product['p_name'] ?></h3>


                    <p class="showcase-desc">
                      <?= $fetched_product['p_description'] ?>
                    </p>

                    <div class="price-box">
                      <p class="price"><?= $fetched_product['p_dis_price'] ?> ₹</p>
                      <del><?= $fetched_product['p_org_price'] ?> ₹</del>
                    </div>

                    <button  class="add-cart-btn" type="button"  onclick="window.location.href = 'assets/php/actions.php?p=<?= $fetched_product['id'] ?>'">add to cart</button>

                    <div class="showcase-status">
                      <div class="wrapper">
                        <p>
                          already sold: <b>20</b>
                        </p>

                        <p>
                          available: <b>40</b>
                        </p>
                      </div>

                      <div class="showcase-status-bar"></div>
                    </div>

                    <div class="countdown-box">

                      <p class="countdown-desc">
                        Hurry Up! Offer ends in:
                      </p>

                      <div class="countdown">

                        <div class="countdown-content">

                          <p class="display-number">02</p>

                          <p class="display-text">Days</p>

                        </div>

                        <div class="countdown-content">
                          <p class="display-number">02</p>
                          <p class="display-text">Hours</p>
                        </div>

                        <div class="countdown-content">
                          <p class="display-number">55</p>
                          <p class="display-text">Min</p>
                        </div>

                        <div class="countdown-content">
                          <p class="display-number">04</p>
                          <p class="display-text">Sec</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>

<?php }
      } else {
        echo "<script>window.location.href = 'index.php' </script>";
      } ?>

<!--
    - FOOTER
  -->
<?php include 'assets/php/footer.php' ?>
</body>

</html>