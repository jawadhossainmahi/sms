<?php include('01_header.php'); ?>
<?php include('03_sidebar.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title_class = $_POST['title'];
    $section = implode(',', $_POST['section']);

    $sql_insert_class_form = "INSERT INTO `classes` (`title`,`section`) VALUES ('$title_class','$section')";
    $section_insert = mysqli_query($conn, $sql_insert_class_form);
}

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Students Classes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Manage Students Classes</a></li>
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
            // $showing = false;
        ?>
            <form action="" method="POST" class="bg-secondary p-5">
                <div class="d-flex flex-row-reverse"><a name="" id="" class="btn btn-success btn-sm m-2" href="?" role="button"><i class="fa fa-plus"></i> Class List</a></div>
                <h4>Add New Class</h4>
                <div class="mb-3">
                    <label for="text" class="text">Title</label>
                    <input type="text" class="form-control" id="title" aria-describedby="title" name="title">

                </div>

                <div class="mb-3">
                    <?php
                    $section = "SELECT * FROM `section`";
                    $result = mysqli_query($conn, $section);
                    while ($row_section = mysqli_fetch_assoc($result)) {
                        echo "<div class='form-check form-check-inline'>
                        <input class='form-check-input' type='checkbox' name='section[]' id='' value=" . $row_section['id'] . ">
                        <label class='form-check-label' for=''>" . $row_section["title"] . "</label>
                      </div>";
                    }




                    ?>
                </div>



                <button class="btn btn-primary" name="class_submit">Submit</button>
            </form>

        <?php
        } else {


        ?>
            <table class="table">
        
                <div class="d-flex flex-row-reverse"><a name="" id="" class="btn btn-success btn-sm m-2" href="?action=add-new" role="button"><i class="fa fa-plus"></i>add new</a></div>
                <thead>
                    <tr>
                        <th scope="col">SNO</th>
                        <th scope="col">Title</th>
                        <th scope="col">Sections</th>
                        <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $i=1;
                     $args = array(
                        'type' =>'class',
                        'status' => 'public',
                    );
                    $classes = get_posts($args);
                    foreach($classes as $class){
                    ?>

                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $class->title;?></td>
                            <td>
                            <?php
                            $class_meta= get_metadata($class->id,'section');
                            foreach ($class_meta as  $meta_data) {
                                $section = get_post(array('id'=>$meta_data->meta_value));
                               
                                    echo $section->title."<br>";
                                
                                
                            }
                            ?>
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
</div> 




<?php include('02_footer.php'); ?>