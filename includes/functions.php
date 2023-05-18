<?php
include('config.php');
// $conn = mysqli_connect('localhost','root','','sms_database');
function get_the_data_using_while_loop($table_name, $geting_data = '*')
{
    global $conn;

    $output = array();
    $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'sms_database'), "SELECT $geting_data FROM `$table_name`");
    while ($fetch_row = mysqli_fetch_assoc($result)) {

        $output[] = $fetch_row;
    }
    return $output;
}

function get_post(array $args =[]){
    global $conn;
    if (!empty($args)) {
        $condition = "WHERE 0";
        foreach ($args as $key => $value) {
            $value = (string)$value;
            $condition_arr[] = "$key = '$value'";
        }
        if ($condition_arr > 0) {
            $condition = "WHERE " . implode(" AND ", $condition_arr);
        }
    }
    $sql = "SELECT * FROM post $condition";
    $query = mysqli_query($conn, $sql);
    return mysqli_fetch_object($query);
}
function get_posts(array $args = [], string $type = 'object')
{
    global $conn;
    $condition = "WHERE 0 ";
    if (!empty($args)) {

        foreach ($args as $key => $value) {
            $value = (string)$value;
            $condition_arr[] = "$key = '$value'";
        }
        if ($condition_arr > 0) {
            $condition = "WHERE " . implode(" AND ", $condition_arr);
        }
    };

    $sql = "SELECT * FROM post $condition";
    $query = mysqli_query($conn, $sql);
    return data_output($query, $type);
}


function get_metadata($item_id,$meta_key='',$type= 'object'){
    global $conn;
    $query =mysqli_query($conn, "SELECT * FROM `meta_data` WHERE item_id = $item_id");
    if (!empty($meta_key)) {
        $query = mysqli_query($conn, "SELECT * FROM `meta_data` WHERE item_id = $item_id AND meta_key='$meta_key'");
    }
    return data_output($query,$type);
}

function data_output($query, $type = "object")
{
    global $conn;

    $output = array();
    if ($type == 'object') {
        while ($result = mysqli_fetch_object($query)) {
            $output[] = $result;
        }
    } else {
        while ($result = mysqli_fetch_assoc($query)) {
            $output[] = $result;
        }
    }
    return $output;
}
function get_user_data($user_id,$type='object'){
    global $conn;
    $query =mysqli_query($conn, "SELECT * FROM `accounts` WHERE id = $user_id");

    return data_output($query,$type);
}
?>