<?php 
include '../assets/php/config.php';
session_start();
if (!isset($_SESSION['AdminID'])) {
    header("location:login.php");
    exit;
}
if (isset($_POST['add_category'])) {
    $title = $_POST['category'];

    if ($_FILES['category_icon']) {
        $fileData = $_FILES['category_icon'];
        $file_name   = time().$fileData['name'];
        $uploadPath = '../assets/images/category/' .  $file_name ;

            if (move_uploaded_file($fileData['tmp_name'], $uploadPath)) {
                $run_category = mysqli_query($con , "INSERT INTO `category` (`title`, `icon`) VALUES ('$title','$file_name')");
                if ($run_category) {
                    echo "<script>alert('Added success')</script>";
                    echo "<script>window.location.href = 'category.php' </script>";
                }else{
                    echo "<script>alert('Faild')</script>";
                    echo "<script>window.location.href = 'category.php' </script>";
                }

            }
    
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'php/header.php' ?>
    <title>category | Admin Panal</title>
</head>

<body>
    <?php include 'php/slidebar.php'; ?>
    <div class="content">
        <main>
            <div class="header">
                <div class="left">
                    <h1>Add Category</h1>
                </div>

            </div>
            <div class="top3container">
                <section class="container">
                    <form  method="POST"  enctype="multipart/form-data" class="form">

                        <div class="input-box">
                            <label>Category</label>
                            <input type="text" name="category" placeholder="Enter Category" required />
                        </div>
                        <div class="input-box">
                            <label>Icon</label>
                            <input type="file" name="category_icon" required />
                        </div>

                        <button name="add_category" type="submit">Add Category</button>
                    </form>
                </section>
            </div>
        </main>

        <?php include 'php/footer.php' ?>
    </div>
</body>

</html>