<?php include('01_header.php'); ?>
<?php include('03_sidebar.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $class = $_POST['class'];
    $section = $_POST['section'];
    $teacher_id = $_POST['teacher_id'];
    $period = $_POST['period'];
    $day_name = $_POST['day_name'];
    $subject = lcfirst($_POST['subject']);
    $status = 'public';
    $author = 1;
    $type = 'timetable';

    $querry = mysqli_query($conn, "INSERT INTO `post` (`id`, `author`, `title`, `description`, `type`, `publishing_date`, `modified_date`, `status`, `parent`) VALUES (NULL, '$author', 'title', 'epty', '$type', current_timestamp(), '2023-03-22 20:31:45.000000', '$status', '0')");
    if ($querry) {
        $item_id = mysqli_insert_id($conn);
    }

    $metadata = array(
        'class_id' => $class,
        'section_id' => $section,
        'teacher_id' => $teacher_id,
        'period_id' => $period,
        'day_name' => $day_name,
        'subject_id' => $subject,
        'status' => $status,
    );
    foreach ($metadata as $key => $value) {
        mysqli_query($conn, "INSERT INTO `meta_data` (`id`, `item_id`, `meta_key`, `meta_value`) VALUES (NULL, '$item_id', '$key', '$value')");
    }
}

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Time Table</h1>
                <button name="" id="add_new" onclick="" class="btn btn-primary" href="" role="button">Add new</button>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Manage Time Table</a></li>
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

        <div class="card" id="table">

            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="text" class="text">Select Class</label>
                                <select required name="class" id="class" class="form-control">
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
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" id="section_container">
                                <label for="section">Select Section</label>
                                <select required name="section" id="section" class="form-control">
                                    <option value="">-Select Class First-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Timing</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:small;">
                            <?php
                            $args = array(
                                'type' => 'period',
                                'status' => 'public',
                            );
                            $periods = get_posts($args);
                            foreach ($periods as $period) {
                            ?>
                                <tr>
                                    <?php
                                    if (!empty(get_metadata($period->id, 'from')) && !empty(get_metadata($period->id, 'to'))) {

                                        $from = get_metadata($period->id, 'from')[0]->meta_value;
                                        $to = get_metadata($period->id, 'to')[0]->meta_value;

                                    ?>
                                        <td>
                                            <?php echo date("h:i A", strtotime($from))  ?> - <?php echo date("h:i A", strtotime($to)) ?>
                                        </td>
                                    <?php
                                    } else {
                                        echo "<td> no time</td>";
                                    }
                                    ?>
                                    <?php
                                    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'staurday', 'sunday'];
                                    foreach ($days as $day) {
                                        $querry = mysqli_query($conn, "SELECT * FROM post as p INNER JOIN meta_data as md on (md.item_id = p.id) INNER JOIN meta_data as mp on (mp.item_id = p.id) WHERE p.type = 'timetable' AND p.status = 'public' AND md.meta_key = 'day_name' AND md.meta_value = '$day' AND mp.meta_key = 'period_id' AND mp.meta_value = '$period->id'");
                                    ?>

                                        <?php
                                        if (mysqli_num_rows($querry) > 0) {
                                            while ($timetable = mysqli_fetch_object($querry)) {
                                        ?>
                                                <td>
                                                    <p>
                                                        <b>Teacher</b>:
                                                        <?php
                                                        $get_teacher_id = array();
                                                        $get_teacher_id = get_metadata($timetable->item_id, 'teacher_id')[0]->meta_value;
                                                        echo (get_user_data($get_teacher_id)[0]->name);
                                                        ?><br>
                                                        <b>Class</b>: <?php
                                                                        $class_id = get_metadata($timetable->item_id, 'class_id',)[0]->meta_value;
                                                                        if (empty(get_post(array('id' => $class_id))->title)) {
                                                                            echo 'null';
                                                                        } else {
                                                                            echo get_post(array('id' => $class_id))->title;
                                                                        }
                                                                        ?><br>

                                                        <b>Section</b>:<?php $section_id = get_metadata($timetable->item_id, 'section_id',)[0]->meta_value;
                                                                        if (empty(get_post(array('id' => $section_id))->title)) {
                                                                            echo 'null';
                                                                        } else {
                                                                            echo get_post(array('id' => $section_id))->title;
                                                                        }
                                                                        ?><br>
                                                        <b>Subject</b>: <?php $subject_id = get_metadata($timetable->item_id, 'subject_id',)[0]->meta_value;
                                                                        if (empty(get_post(array('id' => $subject_id))->title)) {
                                                                            echo 'null';
                                                                        } else {
                                                                            echo (get_post(array('id' => $subject_id))->title);
                                                                        }
                                                                        ?>
                                                    </p>
                                                </td>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <td>
                                                off
                                            </td>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- /row -->




        <!-- form section  -->



        <div class="card d-none" id='form'>
            <div class="card-body">

                <form action="" method="POST">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="text" class="text">Select Class</label>
                            <select required name="class" id="class1" class="form-control">
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
                    </div>
                    <div class="mb-3">
                        <div class="form-group" id="section_container1">
                            <label for="section">Select Section</label>
                            <select required name="section" id="section1" class="form-control" required>
                                <option value="">-Select Class First-</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group" id="">
                            <label for="section">Select Teacher</label>
                            <select required name="teacher_id" id="teacher" class="form-control">
                                <option value="">Select Teacher</option>
                                <?php
                                $sql = 'SELECT * FROM `accounts` Where `type`= "teacher"';
                                $result = mysqli_query($conn, $sql);
                                while ($table_array = mysqli_fetch_assoc($result)) {
                                ?>

                                    <option value="<?php echo $table_array['id']; ?>"><?php echo ucwords($table_array['name']); ?> Sir</option>
                                <?Php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group" id="">
                            <label for="section">Select Period</label>
                            <select required name="period" id="period" class="form-control">
                                <option value="">Select Period</option>

                                <?php
                                $args = array(
                                    'type' => 'period',
                                    'status' => 'public',
                                );
                                $periods = get_posts($args);
                                foreach ($periods as $key => $period) { ?>

                                    <option value="<?php echo $period->id; ?>"><?php echo $period->title ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3" id="day_container">
                        <div class="form-group">
                            <label for="section">Select Day</label>
                            <select required name="day_name" id="day" class="form-control">
                                <option value="">Select Period First</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group" id="">
                            <label for="section">Select Subject</label>
                            <select required name="subject" id="subject" class="form-control">
                                <option value="">Select Subject</option>
                                <?php
                                $i = 1;
                                $args = array(
                                    'type' => 'subject',
                                    'status' => 'public',
                                );
                                $subjects = get_posts($args);
                                foreach ($subjects as $subject) {

                                ?>
                                    <option value='<?php echo $subject->id ?>'><?php echo ucwords($subject->title) ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>



    </div>
</section>

<script>

</script>

<?php include('02_footer.php'); ?>