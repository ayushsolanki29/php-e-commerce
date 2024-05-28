<?php
include '../php/config.php';
if (isset($_POST['add_cource'])) {
    $title = $_POST['title'];
    $Cource = $_POST['Cource'];
    
    if (isset($_FILES['cource_img']) && $_FILES['cource_img']['error'] === 0) {
        $filename = $_FILES['cource_img']['name'];
    
        $filename = time() . $filename;
        $destfile = '../assets/images/cources/thumbnail/' . $filename;
        move_uploaded_file($_FILES['cource_img']['tmp_name'], $destfile);
    
        $run_q = mysqli_query($con , "INSERT INTO `video_course`(`video_title`,`thub`,`course_id`) VALUES ('$title','$filename','$Cource')");
        if ($run_q) {
            // echo "<script>alert('added success')</script>";
            // echo "<script>window.location.href = 'videos.php'</script>";
        }else{
            // echo "<script>alert('Faild')</script>";
            // echo "<script>window.location.href = 'videos.php'</script>";
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
                                Add Video
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
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" required class="form-control" name="title" placeholder="Enter Video Title" />
                    </div>

                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="category" class="form-label">Cource</label> <br>
                                <select required class="form-select form-select-lg" name="Cource" id="category">
                                    <option selected>Select Cource</option>
                                    <?php
                                    $run_cources = mysqli_query($con, "SELECT * FROM `courses`");
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
                                <label for="" class="form-label">Choose Img</label>
                                <input type="file"  class="form-control" name="cource_img" id="" placeholder="" aria-describedby="fileHelpId" />
                                <div id="fileHelpId" class="form-text">only imgs for thuimbnail</div>
                            </div>

                        </div>
                    </div>



                    <button type="clear" name="" id="" class="btn btn-danger mb-3">
                        Clear
                    </button>
                    <button type="submit" name="add_cource" id="" class="btn btn-primary mb-3">
                        Save Video
                    </button>



                </form>
            </div>

        </div>
        <?php include 'pages/footer.php' ?>

</body>

</html>