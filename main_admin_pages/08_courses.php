<?php include('01_header.php'); ?>


<?php
$uploadOK = 1;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $amount = $_POST['amount'];
    $images = $_FILES['images']['name'];

    $target_destination = "../uploads/images/";
    echo $target_destination;
    $target_files = $target_destination . basename($_FILES['images']['name']);
    $iamgeFileType = strtolower(pathinfo($target_files, PATHINFO_EXTENSION));
    
    $_SESSION['course_notice'] = null;


    // cheak if file already exists
    if (file_exists($target_files)) {
        echo "";
        $_SESSION['course_notice'] = 'Sorry, file already exists|danger';
        $uploadOK = 0;
    }

    // cheak file size
    elseif ($_FILES['images']['size'] >= 500000) {
        echo "";
        $_SESSION['course_notice'] = 'Sorry, Your file is too large|danger';
        $uploadOK = 0;
    }
    elseif ($iamgeFileType != 'jpg' && $iamgeFileType != 'png' && $iamgeFileType != 'jpeg' && $iamgeFileType != 'gif') {
        echo "";
        $_SESSION['course_notice'] = 'Sorry, Your file is not a image file|danger';
        $uploadOK = 0;
    }

    elseif($uploadOK == 0) {
        $_SESSION['course_notice'] = 'your file is not uploaded|danger';
        
    } else {
        if (move_uploaded_file($_FILES['images']['tmp_name'], $target_files)) {
            $insert_courses_querry = mysqli_query($conn, "INSERT INTO `courses` (`name`, `category`, `duration`, `images`,`amount`) VALUES ( '$name', '$category', '$duration', '$images','$amount')");
            $_SESSION['course_notice'] = 'course has been submited succesfully|success';
            header('location:08_courses.php');
            
        } else {
            echo 'sorry failed to upload';
        }
    }
    
}

?>
<?php include('03_sidebar.php'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Courses</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Manage Courses</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main contetn  -->
<section class="content">
    <div class="container-fluid">
        <?php
        if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'add-new') {
        ?>

            <form action="" method="POST" enctype="multipart/form-data" class="bg-secondary p-5">
                <?php
                if (isset($_SESSION['course_notice'])) {
                ?>
                    <small class=" text-<?php echo explode("|", $_SESSION['course_notice'])[1]; ?>"><?php echo explode("|", $_SESSION['course_notice'])[0]; ?></small>
                <?php
                }

                ?>


                <h4>Add New Courses</h4>

                <div class="d-flex flex-row-reverse"><a name="" id="" class=" nav-link btn btn-success btn-sm m-2 " href="<?= $site_url; ?>main_admin_pages/08_courses.php" role="button"><i class="fa fa-plus"></i>Manage Courses </a></div>
                <div class="mb-3">
                    <label for="text" class="text">Courses Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="title" name="name" placeholder="Courses Name">
                </div>
                <div class="mb-3">
                    <label for="category" class="text">Category</label>
                    <select name="category" id="" class="form-control">
                        <option value="">Select Category</option>
                        <option value="Web Desigb & Development">Web Desigb & Development</option>
                        <option value="App Development">App Development</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="duration" class="text">Duration </label>
                    <input name="duration" id="" type="number" class="form-control" placeholder="hour">

                </div>
                <div class="mb-3">
                    <label for="Amount" class="text">Amount </label>
                    <input name="Amount" id="" type="number" class="form-control" placeholder="Amount (tk)">
                </div>

                <div class="mb-3">
                    <input type="file" name="images">
                </div>



                <button class="btn btn-primary">Submit</button>
            </form>
        <?php
        } else {


        ?>
            <!-- table part  -->
            <table class="table">
                <div class="d-flex flex-row-reverse"><a class="nav-link btn btn-success btn-sm m-2 " href="?action=add-new" role="button"><i class="fa fa-plus"></i>add new</a></div>
                <thead>
                    <tr>
                        <th scope="col">SNO</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $courses_sql = "SELECT * FROM `courses`";
                    $result_courses = mysqli_query($conn, $courses_sql);
                    $i = 1;
                    while ($course_fetching_row = mysqli_fetch_assoc($result_courses)) {

                    ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><img width="50px" src="../uploads/images/<?= $course_fetching_row['images']; ?>"></td>
                            <td><?= $course_fetching_row['name']; ?></td>
                            <td><?= $course_fetching_row['category']; ?></td>
                            <td><?= $course_fetching_row['duration']; ?></td>
                            <td><?= $course_fetching_row['date']; ?></td>
                            <td><a name="" id="" class="btn btn-success" href="#" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php
                        $i++;
                       
                    }

                    ?>
                </tbody>
            </table>
        <?php
        }

        ?>



    </div> <!-- /row -->


</section>




<?php include('02_footer.php'); ?>