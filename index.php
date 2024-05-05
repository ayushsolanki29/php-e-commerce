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
  <main>

    <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

          <div class="slider-item">

            <img src="./assets/images/banner-1.jpg" alt="women's latest fashion sale" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">Trending item</p>

              <h2 class="banner-title">Women's latest fashion sale</h2>

              <p class="banner-text">
                starting at ₹<b>899</b>.00
              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>

          </div>

          <div class="slider-item">

            <img src="./assets/images/banner-2.jpg" alt="modern sunglasses" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">Trending accessories</p>

              <h2 class="banner-title">Modern sunglasses</h2>

              <p class="banner-text">
                starting at ₹ <b>1579</b>.00
              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>

          </div>

          <div class="slider-item">

            <img src="./assets/images/banner-3.jpg" alt="new fashion summer sale" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">Sale Offer</p>

              <h2 class="banner-title">New fashion summer sale</h2>

              <p class="banner-text">
                starting at ₹ <b>299</b>.99
              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="category">
      <div class="container">
        <div class="category-item-container has-scrollbar">
          <?php $category2 = mysqli_query($con, "SELECT * FROM `category`");
          while ($category_row2 = mysqli_fetch_assoc($category2)) { ?>
            <div class="category-item">
              <div class="category-img-box">
                <img src="assets/images/category/<?= $category_row2['icon'] ?>" alt="<?= $category_row2['title'] ?>" width="30">
              </div>

              <div class="category-content-box">

                <div class="category-content-flex">
                  <h3 class="category-item-title"><?= $category_row2['title'] ?></h3>

                  <p class="category-item-amount">(53)</p>
                </div>
                <a href="category.php?c=<?= $category_row2['id'] ?>" class="category-btn">Show all</a>
              </div>

            </div>
          <?php } ?>
        </div>
      </div>
    </div>


    <div class="product-container">

      <div class="container">


        <!--
          - SIDEBAR
        -->

        <div class="sidebar  has-scrollbar" data-mobile-menu>

          <div class="sidebar-category">

            <div class="sidebar-top">
              <h2 class="sidebar-title">Category</h2>

              <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
              </button>
            </div>

            <ul class="sidebar-menu-category-list">
              <?php $category3 = mysqli_query($con, "SELECT * FROM `category`");
              while ($category_row3 = mysqli_fetch_assoc($category3)) { ?>
                <li class="sidebar-menu-category">
                  <button class="sidebar-accordion-menu" data-accordion-btn>
                    <div class="menu-title-flex">
                      <img src="assets/images/category/<?= $category_row3['icon'] ?>" alt="clothes" width="20" height="20" class="menu-title-img">
                      <p class="menu-title"><?= $category_row3['title'] ?></p>
                    </div>

                    <div>
                      <ion-icon name="add-outline" class="add-icon"></ion-icon>
                      <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>

                  </button>

                  <ul class="sidebar-submenu-category-list" data-accordion>
                    <?php
                    $category_id1 =  $category_row3['id'];
                    $sub_category1 = mysqli_query($con, "SELECT * FROM `sub_category` WHERE `category_id`='$category_id1'");
                    while ($sub_category_row1 = mysqli_fetch_assoc($sub_category1)) { ?>
                      <li class="sidebar-submenu-category">
                        <a href="#" class="sidebar-submenu-title">
                          <p class="product-name"><?= $sub_category_row1['sub_category'] ?></p>
                          <data value="300" class="stock" title="Available Stock">300</data>
                        </a>
                      </li>
                    <?php } ?>
                  </ul>

                </li>
              <?php } ?>
            </ul>

          </div>

          <div class="product-showcase">

            <h3 class="showcase-heading">best sellers</h3>

            <div class="showcase-wrapper">

              <div class="showcase-container">
                <?php
                $product2 = mysqli_query($con, "SELECT * FROM `product` LIMIT 4");
                while ($product_row2 = mysqli_fetch_assoc($product2)) { ?>
                  <div class="showcase">
                    <a href="#" class="showcase-img-box">
                      <img src="./assets/images/products/<?= $product_row2['p_img1'] ?>" alt="11" width="75" height="75" class="showcase-img">
                    </a>

                    <div class="showcase-content">

                      <a href="product-details.php?p=<?= $product_row2['id'] ?>">
                        <h4 class="showcase-title"><?= $product_row2['p_name'] ?></h4>
                      </a>

                      <div class="price-box">
                        <p class="price"><?= $product_row2['p_dis_price'] ?> ₹</p>
                        <del><?= $product_row2['p_org_price'] ?> ₹</del>
                      </div>

                    </div>

                  </div>
                <?php } ?>

              </div>

            </div>

          </div>

        </div>



        <div class="product-box">
          <div class="product-main">
            <h2 class="title">New Products</h2>
            <div class="product-grid">
              <?php
              $product = mysqli_query($con, "SELECT * FROM `product`");
              while ($product_row = mysqli_fetch_assoc($product)) { ?>
                <div class="showcase">
                  <div class="showcase-banner">
                    <img src="assets/images/products/<?= $product_row['p_img1'] ?>" alt="img1" class="product-img default" width="300">
                    <img src="assets/images/products/<?= $product_row['p_img2'] ?>" alt="img2" class="product-img hover" width="300">
                    <div class="showcase-actions">
                      <button class="btn-action" onclick="window.location.href = 'product-details.php?p=<?= $product_row['id'] ?>'">
                        <ion-icon name="eye-outline"></ion-icon>
                      </button>
                      <button class="btn-action"  onclick="window.location.href = 'assets/php/actions.php?p=<?= $product_row['id'] ?>'">
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

        </div>

      </div>

    </div>





    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

    <div>

      <div class="container">

        <div class="testimonials-box">

          <!--
            - TESTIMONIALS
          -->

          <div class="testimonial">

            <h2 class="title">testimonial</h2>

            <div class="testimonial-card">

              <img src="./assets/images/testimonial-1.jpg" alt="alan doe" class="testimonial-banner" width="80" height="80">

              <p class="testimonial-name">Alan Doe</p>

              <p class="testimonial-title">CEO & Founder Invision</p>

              <img src="assets/images/category/quotes.svg" alt="quotation" class="quotation-img" width="26">

              <p class="testimonial-desc">
                Lorem ipsum dolor sit amet consectetur Lorem ipsum
                dolor dolor sit amet.
              </p>

            </div>

          </div>



          <!--
            - CTA
          -->

          <div class="cta-container">

            <img src="./assets/images/cta-banner.jpg" alt="summer collection" class="cta-banner">

            <a href="#" class="cta-content">

              <p class="discount">25% Discount</p>

              <h2 class="cta-title">Summer collection</h2>

              <p class="cta-text">Starting @ $10</p>

              <button class="cta-btn">Shop now</button>

            </a>

          </div>



          <!--
            - SERVICE
          -->

          <div class="service">

            <h2 class="title">Our Services</h2>

            <div class="service-container">

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="boat-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">Worldwide Delivery</h3>
                  <p class="service-desc">For Order Over $100</p>

                </div>

              </a>

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="rocket-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">Next Day delivery</h3>
                  <p class="service-desc">UK Orders Only</p>

                </div>

              </a>

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="call-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">Best Online Support</h3>
                  <p class="service-desc">Hours: 8AM - 11PM</p>

                </div>

              </a>

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="arrow-undo-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">Return Policy</h3>
                  <p class="service-desc">Easy & Free Return</p>

                </div>

              </a>

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="ticket-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">30% money back</h3>
                  <p class="service-desc">For Order Over $100</p>

                </div>

              </a>

            </div>

          </div>

        </div>

      </div>

    </div>

  </main>





  <!--
    - FOOTER
  -->
  <?php include 'assets/php/footer.php' ?>
</body>

</html>