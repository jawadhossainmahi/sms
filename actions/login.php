<?php
include("../includes/config.php");
if (isset($_POST['login'])) {
    $email =$_POST['email'];
    $password =$_POST['password'];

    if (($email=="admin@gmail.com") && ($password=="admin")) {
        session_start();
        $_SESSION['login']=true;
        $_SESSION['email']=$email;
        header("location:../main_admin_pages/04_dashborde.php ");
    }
    else {
        echo 'Invalid Info';
    }
}

if(isset($_POST['class_submit'])){
    $title = $_POST['title'];
    $section = $_POST['section'];

   


}

?>