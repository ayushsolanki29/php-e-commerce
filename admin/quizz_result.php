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
               Quizz Results
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
                <th scope="col">Quizz Id</th>
                <th scope="col">Username</th>
                <th scope="col">cource name</th>
                <th scope="col">Total Score</th>
                <th scope="col">user Score</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $run_cources_lessons_q = mysqli_query($con, "SELECT * FROM `quizz_results` where 1");
              while ($run_cources_lessons = mysqli_fetch_assoc($run_cources_lessons_q)) {

                ?>
                <tr class="">
                  <td scope="row">
                    <?= $run_cources_lessons['id'] ?>
                  </td>
                  <td>
                    <?php
                   $feedback_u_id = $run_cources_lessons['user_id'];
                   $select_user = "SELECT * FROM `users` WHERE `id`=$feedback_u_id";
                   $run_user = mysqli_query($con, $select_user);
                   while ($row_user = mysqli_fetch_array($run_user)) {
                    echo $username = $row_user['name'];
                   }
                    ?>
                  </td>
                  <td>
                    <?php
                   $feedback_u_id = $run_cources_lessons['course_id'];
                   $select_user = "SELECT * FROM `courses` WHERE `id`=$feedback_u_id";
                   $run_user = mysqli_query($con, $select_user);
                   while ($row_user = mysqli_fetch_array($run_user)) {
                    echo $username = $row_user['title'];
                   }
                   ?>
                  </td>
                  <td>
                    <?= $run_cources_lessons['score'] ?>
                  </td>
                  <td>
                    <?= $run_cources_lessons['total_score'] ?>
                  </td>
                  <td>
                    <?= $run_cources_lessons['date'] ?>
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