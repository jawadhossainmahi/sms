<?php
include('../includes/functions.php');
if (isset($_POST['class_id'])) {
    $class_id = $_POST['class_id'];
    echo $class_id;
    $class_meta = get_metadata($class_id, 'section');
    $count = 0;
    $output = '<option value="">Select section</option>';
    foreach ($class_meta as  $meta) {
        $section = get_post(array('id' => $meta->meta_value));
        echo $section->title . "<br>";
        $output .=  '<option value="' . $section->id . '">' . $section->title . '</option>';
        $count++;
    }
    
    echo ($output);
    
    die;
}

if (isset($_POST['period_id'])) {
    $period_id = $_POST['period_id'];
    $output = '<option value="">Select Day</option>';
    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'staurday', 'sunday'];
    $name = array();
    $querry = mysqli_query($conn, "SELECT * FROM meta_data WHERE `meta_value` =$period_id  and `meta_key`='period_id'" );
    while($array = mysqli_fetch_assoc($querry)){
        $item_id = $array['item_id'];
        $sqli_name = mysqli_query($conn, "SELECT * FROM meta_data WHERE `item_id`='$item_id' AND `meta_key`='day_name'");
        while ($array2=mysqli_fetch_assoc($sqli_name)) {
            $name[] = $array2['meta_value'];
        }
    }
    $array_diff = array_diff($days,$name);
    foreach ($array_diff as $key => $value) {
        $output .= '<option value="'.$value.'">'.$value.'</option>';
    }
    if (count($array_diff) == 0 ) {
        $output ='<option value="" ><span style="color:red;">No Days found to enter, Please Select another period.</span></option>';
    }
    echo $output;
}
