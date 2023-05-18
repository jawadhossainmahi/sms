<?php include('01_header.php'); ?>
<?php include('03_sidebar.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];

    $_SESSION['error'] = 'Ttile inserted successfully|success';
    $sql_insert_section_form = "INSERT INTO `section` (`title`) VALUES ('$title')";
    $section_insert = mysqli_query($conn, $sql_insert_section_form);

}

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Students Section</h1>
                <small class="text-">

                </small>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Manage Students Section</a></li>
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
        <div class="row">
            <div class="col-lg-8">
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">SNO</th>

                            <th scope="col">Title</th>
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                     $args = array(
                        'type' =>'section',
                        'status' => 'public',
                    );
                    $posts = get_posts($args);
                    foreach($posts as $section){
                    ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?> </th>
                               
                                <td><?php echo $section->title; ?> </td>
                            </tr>
                        <?php
                        
                            $i++;
                        } ?>
                    </tbody>
                </table>

            </div>
            <div class="col-lg-4">
                <div class="container">
                    <form action="07_section.php" method="POST" class="bg-secondary p-5">
                        <h4>Add New Section</h4>
                        <div class="mb-3">
                            <label for="text" class="text">Title</label>
                            <input type="text" class="form-control" id="title" aria-describedby="title" name="title">
                        </div>
                        <button class="btn btn-primary" name="section_submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 

</section>




<?php include('02_footer.php'); ?>