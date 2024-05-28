<?php
include '../php/config.php';
if (isset($_POST['add_cource'])) {
    $sub_title = $_POST['sub-title'];
    $title = $_POST['title'];
    $Decription = $_POST['Decription'];
    $sub_decription = $_POST['sub-decription'];
    $Durestion = $_POST['Durestion'];
    $Category = $_POST['Category'];
    $Level = $_POST['Level'];

    $urls = $_POST['urls'];
    if (isset($_FILES['cource_img']) && $_FILES['cource_img']['error'] === 0) {
        $filename = $_FILES['cource_img']['name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extensions = ['png', 'jpg', 'jpeg'];

        if (in_array(strtolower($file_ext), $valid_extensions)) {
            $filename = time() . $filename;
            $destfile = '../assets/images/cources/' . $filename;
            move_uploaded_file($_FILES['cource_img']['tmp_name'], $destfile);
            $run_add_c = mysqli_query($con, "INSERT INTO `courses`(`title`, `sub-title`, `sub-description`, `duration`, `category`, `level`, `img`, `description`, `url`) 
            VALUES ('$title','$sub_title',' $sub_decription','$Durestion','$Category','$Level','$filename','$Decription','$urls')");
            if ($run_add_c) {
                echo "<script>alert('added success')</script>";
                echo "<script>window.location.href = 'cources.php'</script>";
            } else {
                echo "<script>alert('Faild')</script>";
                echo "<script>window.location.href = 'cources.php'</script>";

            }
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
                                Add a New Cource
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
                        <input type="text" class="form-control" required name="title" id="" aria-describedby="helpId"
                            placeholder="Enter title" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">sub-title</label>
                        <input type="text" class="form-control" required name="sub-title" id=""
                            aria-describedby="helpId" placeholder="Enter title" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Decription</label>
                        <textarea name="Decription" required class="form-control" placeholder="add a Decription" id=""
                            rows="2" cols="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">sub-decription</label>
                        <textarea name="sub-decription" required class="form-control" id=""
                            placeholder="add a sub decription"></textarea>
                    </div>
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Durestion</label>
                                <input type="text" required class="form-control" name="Durestion"
                                    placeholder="Duretion of cource" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label> <br>
                                <select required class="form-select form-select-lg" name="category" id="category">
                                    <option selected>Select Category</option>
                                    <?php
                                    $run_cources = mysqli_query($con, "SELECT * FROM `category` where 1");
                                    while ($row_cource = mysqli_fetch_array($run_cources)) {
                                        ?>
                                        <option value="<?= $row_cource['category'] ?>">
                                            <?= $row_cource['category'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Level</label>
                                <input type="text" required class="form-control" name="Level"
                                    placeholder="Enter Level" />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Choose Img</label>
                        <input type="file" required class="form-control" name="cource_img" id="" placeholder=""
                            aria-describedby="fileHelpId" />
                        <div id="fileHelpId" class="form-text">only imgs for thuimbnail</div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Url</label>
                        <input type="text" required class="form-control" name="urls" id="" aria-describedby="helpId"
                            placeholder="Enter Youtube or other urls" />
                    </div>

                    <button type="clear" name="" id="" class="btn btn-danger mb-3">
                        Clear
                    </button>
                    <button type="submit" name="add_cource" id="" class="btn btn-primary mb-3">
                        Save Cource
                    </button>



                </form>
            </div>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">title</th>
                                <th scope="col">sub-title</th>
                                <th scope="col">sub-description</th>
                                <th scope="col">duration</th>
                                <th scope="col">category</th>
                                <th scope="col">level</th>
                                <th scope="col">img</th>
                                <th scope="col">url</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $run_cources_select_q = mysqli_query($con, "SELECT * FROM `courses` where 1");
                            while ($run_cources_select = mysqli_fetch_assoc($run_cources_select_q)) {

                                ?>
                                <tr class="">
                                    <td scope="row">
                                        <?= $run_cources_select['id'] ?>
                                    </td>
                                    <td>
                                        <?= $run_cources_select['title'] ?>
                                    </td>
                                    <td>
                                        <?= $run_cources_select['sub-title'] ?>
                                    </td>
                                    <td>
                                        <?= $run_cources_select['sub-description'] ?>
                                    </td>
                                    <td>
                                        <?= $run_cources_select['duration'] . 'Minutes' ?>
                                    </td>
                                    <td>
                                        <?= $run_cources_select['category'] ?>
                                    </td>
                                    <td>
                                        <?= $run_cources_select['level'] ?>
                                    </td>
                                    <td>
                                        <img src="../assets/images/cources/<?= $run_cources_select['img'] ?>"
                                            class="img-fluid rounded-top" width="50px"
                                            alt="<?= $run_cources_select['title'] ?>" />

                                    </td>
                                    <td>
                                        <?= $run_cources_select['url'] ?>
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