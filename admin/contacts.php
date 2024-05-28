<?php
include '../php/config.php';
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
              Contact Us
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
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">actions</th>
          
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $run_cources_lessons_q = mysqli_query($con, "SELECT * FROM `contact` where 1");
              while ($run_cources_lessons = mysqli_fetch_assoc($run_cources_lessons_q)) {

                ?>
                <tr class="">
                  <td scope="row">
                    <?= $run_cources_lessons['name'] ?>
                  </td>
                  <td>
                    <?= $run_cources_lessons['email'] ?>
                  </td>
                  <td>
                    <?= $run_cources_lessons['msg'] ?>
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