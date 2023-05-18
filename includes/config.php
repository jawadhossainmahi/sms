<?php

session_start();
$conn = mysqli_connect('localhost','root','','sms_database');
if ($conn) {
   
}
else{
    echo 'Failed to connet with database, please cheack your code again in includes/config.php in first 10 lines';
}

?>