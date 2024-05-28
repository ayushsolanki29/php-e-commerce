<?php
include '../php/config.php';
if (isset($_POST['add_lession'])) {
  $title = $_POST['title'];
  $cource = $_POST['cource'];

  if (isset($_FILES['cource_video']) && $_FILES['cource_video']['error'] === 0) {
    $filename = $_FILES['cource_video']['name'];

    $filename = time() . $filename;
    $destfile = '../assets/videos/' . $filename;
    move_uploaded_file($_FILES['cource_video']['tmp_name'], $destfile);

    $run_add_c = mysqli_query($con, "INSERT INTO `video_lessons`(`title`, `video_link`, `video_c_id`) VALUES ('$title','$filename','$cource')");
    if ($run_add_c) {
      echo "<script>alert('added success')</script>";
      echo "<script>window.location.href = 'video_lessions.php'</script>";
    } else {
      echo "<script>alert('Faild')</script>";
      echo "<script>window.location.href = 'video_lessions.php'</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>E Learning | Dashboard</title>
  <?php include 'pages/header.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../assets/favicon/safari-pinned-tab.svg" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php include 'pages/navbar.php' ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">
                Add a Video Lession
              </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="container">


        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">

            <label for="" class="form-label">Title</label> <br>
            <select required class="form-select form-select-lg" name="cource" id="">
              <option selected>Select Cource</option>
              <?php
              $run_cources = mysqli_query($con, "SELECT * FROM `video_course`");
              while ($row_cource = mysqli_fetch_array($run_cources)) {
              ?>
                <option value="<?= $row_cource['id'] ?>">
                  <?= $row_cource['video_title'] ?>
                </option>
              <?php } ?>
            </select>
          </div>


          <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" required class="form-control" name="title" id="" aria-describedby="helpId" placeholder="Enter title" />
          </div>

          <div class="mb-3">
            <div class="mb-3">
              <label for="" class="form-label">Choose Video</label>
              <input type="file" required class="form-control" name="cource_video" id="" placeholder="" aria-describedby="fileHelpId" />
              <div id="fileHelpId" class="form-text">only .mp4 and .mkv</div>
            </div>
          </div>


          <button type="clear" class="btn btn-danger mb-3">
            Clear
          </button>
          <button type="submit" name="add_lession" id="" class="btn btn-primary mb-3">
            Save Lession
          </button>



        </form>
      </div>
    </div>
    <?php include 'pages/footer.php' ?>

</body>

</html>