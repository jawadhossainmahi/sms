<?php
include('header.php');
?>

<section class="bg-light vh-100 d-flex">
<div class="col-3 m-auto">
    <div class="card">
        <div class="card-body">
            <div class="text-center m-3"><i class="fa fa-user fa-3x"></i></div>
            <form action="actions/login.php" method="post">
                <div class="md-form m-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">

                </div>
                <div class="md-form m-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Your Password">
                </div>
                <div class="text-center">
                <button class="btn btn-lg btn-dark" name="login">login</button></div>
            </form>
        </div>
    </div>
</div>
</section>




<?php
include('footer.php');
?>