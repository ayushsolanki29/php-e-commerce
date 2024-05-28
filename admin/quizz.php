<?php
include '../php/config.php';
if (isset($_POST['add_question'])) {
    $cource = $_POST['courses'];
    $q_nuber = $_POST['q_nuber'];
    $question = $_POST['question'];
    $q_ans = $_POST['q_ans'];
    $opta = $_POST['opta'];
    $optb = $_POST['optb'];
    $optc = $_POST['optc'];
    $optd = $_POST['optd'];
    

    $run_add_c = mysqli_query($con, "INSERT INTO `questions`(`qno`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_answer`, `cource_id`)
     VALUES ('$q_nuber','$question','$opta','$optb','$optc','$optd','$q_ans','$cource')");
    if ($run_add_c) {
        echo "<script>alert('added success')</script>";
        echo "<script>window.location.href = 'quizz.php'</script>";
    } else {
        echo "<script>alert('Faild')</script>";
        echo "<script>window.location.href = 'quizz.php'</script>";
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
                                Add a New Question
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


                <form enctype="multipart/form-data" method="post">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="category" class="form-label">Cource</label> <br>
                                <select required class="form-select form-select-lg" name="courses" id="category">
                                    <option selected>Select courses</option>
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
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Question No:</label>
                                <input type="number" required class="form-control" name="q_nuber" placeholder="Enter Q number" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Correct Answer :</label>
                                <input type="number" required class="form-control" name="q_ans" placeholder="Enter Q number" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Question</label>
                        <input type="text" class="form-control" required name="question" id="" aria-describedby="helpId" placeholder="Enter Question" />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Option A</label>
                        <input type="text" class="form-control" required name="opta" id="" aria-describedby="helpId" placeholder="Enter Option" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Option B</label>
                        <input type="text" class="form-control" required name="optb" id="" aria-describedby="helpId" placeholder="Enter Option" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Option C</label>
                        <input type="text" class="form-control" required name="optc" id="" aria-describedby="helpId" placeholder="Enter Option" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">option D</label>
                        <input type="text" class="form-control" required name="optd" id="" aria-describedby="helpId" placeholder="Enter Option" />
                    </div>

                    <button type="clear" class="btn btn-danger mb-3">
                        Clear
                    </button>
                    <button type="submit" name="add_question" id="" class="btn btn-primary mb-3">
                        Save Question
                    </button>

                </form>
            </div>
        </div>
        <?php include 'pages/footer.php' ?>

</body>

</html>