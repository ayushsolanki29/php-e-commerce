<?php
include '../assets/php/config.php';
session_start();
if (!isset($_SESSION['AdminID'])) {
    header("location:login.php");
    exit;
}
if (isset($_POST['add_subcat'])) {
  $category = $_POST['category'];
  $sub_category = $_POST['sub_cat'];

  $run_subcat = mysqli_query($con, "INSERT INTO `sub_category`(`category_id`, `sub_category`) VALUES ('$category','$sub_category')");
  if ($run_subcat) {
    echo "<script>alert('added success')</script>";
    echo "<script>window.location.href = 'sub_category.php' </script>";
  } else {
    echo "<script>alert('Faild')</script>";
    echo "<script>window.location.href = 'sub_category.php' </script>";
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
  <!-- Main Content -->
  <div class="content">
    <main>
      <div class="header">
        <div class="left">
          <h1>Sub Category</h1>

        </div>

      </div>
      <div class="top3container">
        <section class="container">
          <form method="post"  class="form">
            <div class="select-box">
              <select name="category">
                <option hidden>choose category</option>
                <?php
                $select_cat = mysqli_query($con, "SELECT * FROM `category`");
                while ($selected_cat = mysqli_fetch_assoc($select_cat)) {
                  echo '<option value=' . $selected_cat['id'] . '>' . $selected_cat['title'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="input-box">
              <label>sub category </label>
              <input type="text" name="sub_cat" placeholder="Enter sub Category" required />
            </div>

            <button type="submit" name="add_subcat">Add Sub Category</button>
          </form>
        </section>
      </div>
    </main>

    <?php include 'php/footer.php' ?>
  </div>
</body>

</html>