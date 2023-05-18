<?php include('01_header.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    // echo "<pre>";
    // print_r( $_POST);
    
    $name = $_POST['name'];
    $type = $_POST['type'];
    $email = $_POST['email'];

   
   
    $password = password_hash( $_POST['password'], PASSWORD_DEFAULT);
   
    $insert_user_data_to_accounts = mysqli_query($conn, "INSERT INTO `accounts` (`id`, `name`, `type`, `email`, `password`) VALUES (NULL, '$name', '$type', '$email', '$password');");
    if ($insert_user_data_to_accounts ) {
        header("location:05_user_accounts.php?user=".$_GET['user']);
        $_SESSION['user_submit_msg']= "new ".$_GET['user']." submited in ".$_GET['user']." list. |success";
    }
    else {
        $_SESSION['user_submit_msg']= "Failed to new ".$_GET['user']."  submited in ".$_GET['user']." list. |danger";
    }
    
}

?>
<?php include('03_sidebar.php');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage <?php echo ucfirst($_REQUEST['user']); ?> Accounts</h1>
                
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Accounts</a></li>
                    <li class="breadcrumb-item active"><?php echo ucfirst($_REQUEST['user']); ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main contetn  -->
<section class="content">
    <div class="container-fluid">
        <!-- Info Boxes -->
        <?php
        if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'add-new') {
        ?>

            <form action="" method="POST" enctype="multipart/form-data" class="bg-secondary p-5">
                
                <?php
                if (isset($_SESSION['user_submit_msg'])) {
                ?>
                    <small class=" text-<?php echo explode("|", $_SESSION['user_submit_msg'])[1]; ?>"><?php echo explode("|", $_SESSION['user_submit_msg'])[0]; ?></small>
                <?php
                }

                ?>


                <h4>Add New Courses</h4>

                <div class="d-flex flex-row-reverse"><a name="" id="" class=" nav-link btn btn-success btn-sm m-2 " href="<?= $site_url; ?>main_admin_pages/05_user_accounts.php?user=<?=$_REQUEST['user']; ?>" role="button"><i class="fa fa-plus"></i>Manage Courses </a></div>
                <div class="mb-3">
                    <label for="text" class="text">Your Name</label>
                    <input required type="text" class="form-control" id="name" aria-describedby="title" name="name" placeholder="Courses Name">
                </div>
                <div class="mb-3" style="display:none;">
                    <label for="type" class="text">User Type</label>
                    <input  type="text" value="<?php echo $_REQUEST['user']; ?>" name="type">
                </div>
                <div class="mb-3">
                    <label for="email" class="text">Your Email</label>
                    <input required name="email" id="" type="email" class="form-control" >

                </div>
                <div class="mb-3">
                    <label for="Password " class="text">Password </label>
                    <input required name="password" id="" type="password" class="form-control" placeholder="Password">
                </div>

                <button class="btn btn-primary">Submit</button>
            </form>
        <?php
        } else {


        ?>

        <table class="table">
            <thead>
            <div class="d-flex flex-row-reverse"><a class="nav-link btn btn-success btn-sm m-2 " href="?user=<?php echo($_REQUEST['user']); ?>&action=add-new" role="button"><i class="fa fa-plus"></i>add new</a></div>
                <tr>
                    <th scope="col">SNO</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                
        <?php
        $i = 1;
        $sql = 'SELECT * FROM `accounts` Where `type`= "' . $_REQUEST['user'] . '"';
        $result = mysqli_query($conn, $sql);
        while ($table_array = mysqli_fetch_assoc($result)) {
            // print_r($table_array);
            
     ?>
                <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo ucwords( $table_array['name']);?></td>
                    <td><?php echo $table_array['email'];?></td>
                    <td><a class="btn btn-outline-danger" href="05_user_accounts.php?user=<?php echo $_REQUEST['user']?>&id=<?php echo $i;?>" >Delete</a></td>
                </tr>
        <?php $i++; } ?>
        
            </tbody>
        </table>
        <?php
        } 
        ?>
    </div>


</section>

</div>


<?php include('02_footer.php'); ?>