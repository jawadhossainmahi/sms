<?php include('01_header.php'); ?>
<?php include('03_sidebar.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    $class_name = $_POST['class'];
    $section_name = $_POST['section'];
    $subject_name = $_POST['subject'];

    // $data_class = get_the_data_using_while_loop('classes','')
}

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Students Section</h1>

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
            <div class="col-lg-6">

                <form action="" method="POST" class="bg-secondary p-5">
                    <h4>Add New Section</h4>
                    <div class="mb-3">
                        <label for="text" class="text">Select Class</label>
                        <select name="class" id="class" class="form-control">
                            <option value="">Select Class</option>
                            <?php
                            $i = 1;
                            $args = array(
                                'type' => 'class',
                                'status' => 'public',
                            );
                            $classes = get_posts($args);
                            foreach ($classes as $class) {

                            ?>
                                <option value='<?php echo $class->id ?>'><?php echo ucwords($class->title) ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group" id="section_container" style="display: none;">
                        <label for="section">Select Section</label>
                        <select require name="section" id="section" class="form-control">
                            <option value="">-Select Section-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="text">Enter Your Subject</label>
                        <input type="text" class="form-control" id="subject" aria-describedby="subject" name="subject">
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>



            </div>
            <div class="col-lg-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SNO</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div> <!-- /row -->


</section>




<?php include('02_footer.php'); ?>