<?php
include '../php/config.php';

if (isset($_POST['add_lession'])) {

  $title = $_POST['title'];
  $Decription = $_POST['Decription'];
  $cource = $_POST['cource'];

  $run_add_c = mysqli_query($con, "INSERT INTO `lessons`(`course_id`, `head`, `description`) VALUES ('$cource ','$title','$Decription')");
  $run_update_c = mysqli_query($con, "UPDATE `courses` SET `lessons`='$cource' WHERE id=$cource ");

  if ($run_add_c && $run_update_c) {
    echo "<script>alert('added success')</script>";
    echo "<script>window.location.href = 'lessons.php'</script>";
  } else {
    echo "<script>alert('Faild')</script>";
    echo "<script>window.location.href = 'lessons.php'</script>";

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
      <img class="animation__shake" src="../assets/favicon/safari-pinned-tab.svg" alt="AdminLTELogo" height="60"
        width="60">
    </div>

    <?php include 'pages/navbar.php' ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">
                Add a New Lession
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


        <form method="post">
          <div class="mb-3">

            <label for="" class="form-label">Cource</label> <br>
            <select required class="form-select form-select-lg" name="cource" id="">
              <option selected>Select Cource</option>
              <?php
              $run_cources = mysqli_query($con, "SELECT * FROM `courses` where 1");
              while ($row_cource = mysqli_fetch_array($run_cources)) {
                ?>
                <option value="<?= $row_cource['id'] ?>">
                  <?= $row_cource['title'] ?>
                </option>
              <?php } ?>
            </select>
          </div>


          <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" required class="form-control" name="title" id="" aria-describedby="helpId"
              placeholder="Enter title" />
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Decription</label>
            <textarea required name="Decription" class="form-control" id="" rows="2" cols="3"></textarea>
          </div>


          <button type="clear" class="btn btn-danger mb-3">
            Clear
          </button>
          <button type="submit" name="add_lession" id="" class="btn btn-primary mb-3">
            Save Lession
          </button>



        </form>
      </div>
      <div class="container">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Cource title</th>
                <th scope="col">Lession Head</th>
                <th scope="col">Description</th>
          
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $run_cources_lessons_q = mysqli_query($con, "SELECT * FROM `lessons` where 1");
              while ($run_cources_lessons = mysqli_fetch_assoc($run_cources_lessons_q)) {

                ?>
                <tr class="">
                  <td scope="row">
                    <?= $run_cources_lessons['id'] ?>
                  </td>
                  <td>
                    <?php
                   $lession_c_id = $run_cources_lessons['course_id'];
                    $select_lession = "SELECT * FROM `courses` WHERE `lessons` =   $lession_c_id";
                    $run_lession = mysqli_query($con, $select_lession);
                    while ($row_lession = mysqli_fetch_array($run_lession)) {
                    echo  $lession_head = $row_lession['title'];
                    } ?>
                  </td>
                  <td>
                    <?= $run_cources_lessons['head'] ?>
                  </td>
                  <td>
                    <?= $run_cources_lessons['description'] ?>
                  </td>

                  <td>
                    <button type="button" class="btn btn-danger"> Delete </button>
                    <button type="button" class="btn btn-primary"> Edit </button>

                  </td>

                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php include 'pages/footer.php' ?>

</body>

</html>