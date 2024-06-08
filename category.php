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


      <!--
    - SIDEBAR
  -->


      <div class="product-box">

        <!--
      - PRODUCT MINIMAL
    -->




        <!--
      - PRODUCT FEATURED
    -->

        <?php if (isset($_GET['c'])) {
          $category_id = $_GET['c'];
          $get_category = mysqli_query($con, "SELECT * FROM `category` WHERE `id`='$category_id'");
          while ($fetched_category = mysqli_fetch_assoc($get_category)) {
        ?>

            <div class="product-main">

              <h2 class="title"><?= $fetched_category['title'] ?></h2>

              <div class="product-grid">
                <?php
                $get_product = mysqli_query($con, "SELECT * FROM `product` WHERE `p_category`='$category_id'");
                while ($product_row = mysqli_fetch_assoc($get_product)) {
                ?>
                  <div class="showcase">
                  <div class="showcase-banner">
                    <img src="assets/images/products/<?= $product_row['p_img1'] ?>" alt="img1" class="product-img default" width="300">
                    <img src="assets/images/products/<?= $product_row['p_img2'] ?>" alt="img2" class="product-img hover" width="300">
                    <div class="showcase-actions">
                      <button class="btn-action" onclick="window.location.href = 'product-details.php?p=<?= $product_row['id'] ?>'">
                        <ion-icon name="eye-outline"></ion-icon>
                      </button>
                      <button class="btn-action" type="button" onclick="window.location.href = 'assets/php/actions.php?p=<?= $product_row['id'] ?>'">
                        <ion-icon name="bag-add-outline"></ion-icon>
                      </button>
                    </div>
                  </div>

                  <div class="showcase-content">
                    <a href="#" class="showcase-category"><?= $product_row['p_subcategory'] ?></a>

                    <h3>
                      <a href="#" class="showcase-title"><?= $product_row['p_name'] ?></a>
                    </h3>

                    <div class="price-box">
                      <p class="price"><?= $product_row['p_dis_price'] ?> ₹</p>
                      <del><?= $product_row['p_org_price'] ?> ₹</del>
                    </div>

                  </div>

                </div>
                <?php } ?>
              </div>

            </div>
        <?php }
        } else {
          echo "<script>window.location.href = 'index.php' </script>";
        } ?>
      </div>

    </div>

  </div>



  <!--
    - FOOTER
  -->
  <?php include 'assets/php/footer.php' ?>
</body>

</html>