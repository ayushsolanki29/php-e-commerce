<?php
include '../assets/php/config.php';
session_start();
if (!isset($_SESSION['AdminID'])) {
    header("location:login.php");
    exit;
}
if (isset($_POST['add_product'])) {
  $p_name = $_POST["p_name"];
  $catID = $_GET['c'];
  $sub_category = $_POST["sub_category"];
  $p_or_price = $_POST["p_or_price"];
  $p_dis_price = $_POST["p_dis_price"];
  $disc = $_POST["disc"];


  if ($_FILES['img1']) {
    $fileData = $_FILES['img1'];
    $file_name   = time() . $fileData['name'];
    $uploadPath = '../assets/images/products/' .  $file_name;

    if (move_uploaded_file($fileData['tmp_name'], $uploadPath)) {
      $img1 =  $file_name;
    }
  }
  if ($_FILES['img2']) {
    $fileData2 = $_FILES['img2'];
    $file_name2   = time() . $fileData2['name'];
    $uploadPath2 = '../assets/images/products/' .  $file_name2;

    if (move_uploaded_file($fileData2['tmp_name'], $uploadPath2)) {
      $img2 =  $file_name2;
    }
  }

  if (  $img1  && $img2) {
    $run_product = mysqli_query($con, "INSERT INTO `product`(`p_name`, `p_category`, `p_subcategory`, `p_org_price`, `p_dis_price`, `p_description`, `p_img1`, `p_img2`) 
    VALUES ('$p_name','$catID','$sub_category','$p_dis_price','$p_or_price','$disc','$img1','$img2')");
    if ($run_product) {
      echo "<script>alert('Added Success')</script>";
      echo "<script>window.location.href = 'product.php' </script>";
    }else{
      echo "<script>alert('Faild to add')</script>";
      echo "<script>window.location.href = 'product.php' </script>";
    }
  }

}
?>
<!doctype html>
<html lang="en">

<head>
  <?php include 'php/header.php' ?>
  <title>Admin Panal</title>
</head>

<body>

  <?php include 'php/slidebar.php'; ?>
  <div class="content">
    <main>
      <div class="header">
        <div class="left">
          <h1>Product</h1>
        </div>
      </div>

      <div class="top3container">

        <section class="container">
          <form method="get"  class="form">
            <div class="select-box">
              <select name="c">

                <?php if (isset($_GET['c'])) {
                  $catID = $_GET['c'];
                  $select_cat_q = "SELECT * FROM `category` WHERE id = '$catID'";
                } else {
                  $select_cat_q = "SELECT * FROM `category`";
                } ?>

                <option hidden>choose category</option>

                <?php
                $select_cat = mysqli_query($con, $select_cat_q);
                while ($selected_cat = mysqli_fetch_assoc($select_cat)) { ?>
                  <option value='<?= $selected_cat['id'] ?>' <?php
                                                              if (isset($_GET['c'])) {
                                                                echo "selected ";
                                                              } ?>> <?= $selected_cat['title'] ?></option>
                <?php  } ?>
              </select>
              <?php if (!isset($_GET['c'])) { ?>
                <button type="submit">Fetch Data</button>
              <?php } else { ?>
                <button type="button" style="background: #D32F2F;" onclick="window.location.href = 'product.php'">Clear Filter</button>
              <?php } ?>
            </div>
          </form>
          <br><br><br>

          <form method="post" enctype="multipart/form-data" class="form">
            <div class="input-box">
              <label>Title</label>
              <input type="text" placeholder="Enter Title" name="p_name" required />
            </div>
            <div class="input-box">
              <div class="columm">


                <div class="select-box">
                  <select name="sub_category">
                    <option hidden>choose sub category</option>
                    <?php
                    if (isset($_GET['c'])) {
                      $catID = $_GET['c'];
                    } else {
                      $catID = 0;
                    }

                    $select_cat1 = mysqli_query($con, "SELECT * FROM `sub_category` WHERE `category_id` = '$catID'");
                    while ($selected_cat1 = mysqli_fetch_assoc($select_cat1)) {
                      echo '<option value=' . $selected_cat1['sub_category'] . '>' . $selected_cat1['sub_category'] . '</option>';
                    }
                    ?>
                  </select>
                </div>

              </div>
            </div>
            <div class="input-box address">
              <label>Price</label>
              <div class="column">
                <input type="text" placeholder="Discounted Price" name="p_or_price" required />
                <input type="text" placeholder="Original Price" name="p_dis_price" required />
              </div>
            </div>

            <div class="input-box">
              <label>Description</label>
              <textarea placeholder="Enter   description" name="disc" required></textarea>
            </div>
            <div class="input-box">
              <label>2 Images for Thumbnail</label>
              <div class="column">
                <input type="file" name="img1" required />
                <input type="file" name="img2" required />
              </div>
            </div>
            <button name="add_product" type="submit">Add Product</button>
          </form>
        </section>
      </div>
    </main>

    <?php include 'php/footer.php' ?>
  </div>
</body>

</html>