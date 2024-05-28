<?php
include '../php/config.php';
if (isset($_POST['add_material'])) {
    $sub_title = $_POST['sub-title'];
    $title = $_POST['title'];
    $Decription = $_POST['Decription'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $category = $_POST['category'];

    $img_ready = false;
    $content_ready = false;
    $new_name = "";

    if (isset($_FILES['cource_img']) && $_FILES['cource_img']['error'] === 0) {
        $filename = $_FILES['cource_img']['name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extensions = ['png', 'jpg', 'jpeg'];

        if (in_array(strtolower($file_ext), $valid_extensions)) {
            $thum_img = time() . $filename;
            $destfile = '../assets/images/materials/' . $thum_img;
            move_uploaded_file($_FILES['cource_img']['tmp_name'], $destfile);
            $img_ready = true;
        }
    }
    if (isset($_FILES['conent_file']) && $_FILES['conent_file']['error'] === 0) {
        $filename = $_FILES['conent_file']['name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

        $new_name = time() . '.'. $file_ext;
        $destfile1 = '../assets/data/' . $new_name;
        move_uploaded_file($_FILES['conent_file']['tmp_name'], $destfile1);
        $content_ready = true;

    }



    $run_add_c = mysqli_query($con, "INSERT INTO `materials`(`title`, `category`, `sub-title`, `type`, `description`, `content`, `price`, `img`) 
    VALUES ('$title','$category','$sub_title','$type','$Decription','$new_name','$price','$thum_img')");
    if ($run_add_c && $content_ready && $img_ready) {
        echo "<script>alert('added success')</script>";
        echo "<script>window.location.href = 'materials.php'</script>";
    } else {
        echo "<script>alert('Faild')</script>";
        echo "<script>window.location.href = 'materials.php'</script>";

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
                                Add a New Material
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
                            aria-describedby="helpId" placeholder="Enter sub title" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Decription</label>
                        <textarea name="Decription" required class="form-control" placeholder="add a Decription" id=""
                            rows="2" cols="3"></textarea>
                    </div>

                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Price</label>
                                <input type="text" required class="form-control" name="price"
                                    placeholder="set price for material" />
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
                                <label for="" class="form-label">File Type</label>
                                <input type="text" required class="form-control" name="type"
                                    placeholder="Enter File type for Conent" />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Choose Thumbnail</label>
                        <input type="file" required class="form-control" name="cource_img" id="" placeholder=""
                            aria-describedby="fileHelpId" />
                        <div id="fileHelpId" class="form-text">only imgs for thuimbnail</div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Choose Conent File</label>
                        <input type="file" required class="form-control" name="conent_file" id="" placeholder=""
                            aria-describedby="fileHelpId" />
                        <div id="fileHelpId" class="form-text">Like .zip, .rar, .pdfs </div>
                    </div>


                    <button type="clear" class="btn btn-danger mb-3">
                        Clear
                    </button>
                    <button type="submit" name="add_material" id="" class="btn btn-primary mb-3">
                        Save material
                    </button>



                </form>
            </div>
        </div>
        <?php include 'pages/footer.php' ?>

</body>

</html>