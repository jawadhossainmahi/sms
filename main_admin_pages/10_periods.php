<?php include('01_header.php'); ?>
<?php include('03_sidebar.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $status = 'public';
    $type = 'period';

    $querry = mysqli_query($conn, "INSERT INTO `post` (`id`, `author`, `title`, `description`, `type`, `publishing_date`, `modified_date`, `status`, `parent`) VALUES (NULL, '1', '$title', 'epty', '$type', current_timestamp(), '2023-03-22 20:31:45.000000', '$status', '0')");



    if ($querry) {
        $item_id = mysqli_insert_id($conn);
        // echo "inserted".$item_id;
        mysqli_query($conn, "INSERT INTO `meta_data` (`id`, `item_id`, `meta_key`, `meta_value`) VALUES (NULL, '$item_id', 'from', '$from')");
        mysqli_query($conn, "INSERT INTO `meta_data` (`id`, `item_id`, `meta_key`, `meta_value`) VALUES (NULL, '$item_id', 'to', '$to')");
    }
}

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Period</h1>
                <small class="text-">

                </small>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Manage Period</a></li>
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
                            <th scope="col">Time</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $args = array(
                            'type' => 'period',
                            'status' => 'public',
                        );
                        $period = get_posts($args);
                        foreach ($period as $periods) {
                        ?>


                            <tr>
                                <th scope="row"><?php echo $i; ?> </th>

                                <td><?php echo $periods->title; ?> </td>
                                <?php
                                if (!empty(get_metadata($periods->id, 'from')) && !empty(get_metadata($periods->id, 'to'))) {
                                    $from = get_metadata($periods->id, 'from')[0]->meta_value;
                                    $to = get_metadata($periods->id, 'to')[0]->meta_value;

                                ?>
                                    <td>
                                        <?php echo date("h:i A", strtotime($from))  ?> - <?php echo date("h:i A", strtotime($to)) ?>
                                    </td>
                                <?php
                                } else {
                                    echo "<td> no time</td>";
                                }

                                ?>
                            </tr>
                        <?php

                            $i++;
                        } ?>
                    </tbody>
                </table>

            </div>
            <div class="col-lg-4">
                <div class="container">
                    <form action="" method="POST" class="bg-secondary p-5">
                        <h4>Add New period</h4>
                        <div class="mb-3">
                            <label for="text" class="text">Title</label>
                            <input type="text" class="form-control" id="title" aria-describedby="title" name="title" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <label for="text" class="text">From</label>
                            <input type="time" class="form-control" id="from" aria-describedby="from" name="from" placeholder="From">
                        </div>
                        <div class="mb-3">
                            <label for="text" class="text">To</label>
                            <input type="time" class="form-control" id="To" aria-describedby="To" name="to">
                        </div>

                        <button class="btn btn-primary" name="section_submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>




<?php include('02_footer.php'); ?>