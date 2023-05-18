<?php
include('header.php');

?>

<div id="main-i" class="m-0" style="height:500px; width:auto;background: linear-gradient(45deg, black, transparent);color: aliceblue;">
    <div class="container-fluid my-0">

        <div class="row">
            <div class="col-lg-6 m-0 p-5">
                <div class="p-5">
                    <h1 class="display-3 font-weight-bold">School Management System</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia magnam totam saepe minima quae aut a neque nobis cupiditate dolorem, sint voluptatibus. Ipsa quas, consequuntur amet itaque aut corrupti tenetur vero laudantium vel?</p>
                    <button class="btn btn-dark btn-lg">Call to Action

                    </button>
                </div>
            </div>
            <div class="col-lg-6 m-0 p-4 ">
                <div class="w-50  mx-auto card position-relative">
                    <div class="card-body">
                        <form action="" method="post" class="text-dark">
                            <h4 class="text-dark text-center">Admition Form</h4>
                            <div class="form-outline mb-4">
                                <input type="text" id="name" name="name" class="form-control" />
                                <label class="form-label" for="form12">Your Name</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="email" class="form-control" />
                                <label class="form-label" for="form12">Your Email</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="number" id="number" name="number" class="form-control" />
                                <label class="form-label" for="form12">Your Mobile</label>
                            </div>
                            <div class="form-outline ">
                                <input type="number" id="class" name="class" class="form-control" />
                                <label class="form-label" for="form12">Your Class</label>
                            </div>
                            <button type="submit" class="btn btn-dark btn-block">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- about us starts -->
<section class='py-5'>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-3 ">
                <h2 class="text-center text-dark">About us</h2>
                <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. In quidem eius, quaerat incidunt consectetur pariatur natus quos dolores dolore sunt fuga beatae? Eligendi explicabo ducimus atque! Pariatur consequuntur iure laborum.</p>
                <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe excepturi aspernatur enim maxime quis eos, repellendus dignissimos accusamus velit voluptates ipsum ex, distinctio eum pariatur laborum voluptas! Velit, voluptatum nobis.
                </p>
                <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe excepturi aspernatur enim maxime quis eos, repellendus dignissimos accusamus velit voluptates ipsum ex, distinctio eum pariatur laborum voluptas! Velit, voluptatum nobis.
                </p>
                <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe excepturi aspernatur enim maxime quis eos, repellendus dignissimos accusamus velit voluptates ipsum ex, distinctio eum pariatur laborum voluptas! Velit, voluptatum nobis.
                </p>
                <a href="#Our Cources" class="btn btn-dark">Know more</a>
            </div>
            <div class="col-lg-6 p-5 " style="background: url(https://source.unsplash.com/random/360x400?table,computer,dark); background-position: center; background-repeat: no-repeat; background-size: cover;margin-top:5rem ;margin-bottom:5rem;">

            </div>
        </div>
    </div>
</section>
<!-- about us ends -->

<!-- for our cources -->

<section class="py-5" id="courses">
    <div>
        <div class="text-center mb-3">
            <h2 class="text">Our Currses</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, cupiditate.</p>
        </div>
        <div class="container courses my-5">
            <div class="row row-cols-1 row-cols-md-3 g-4 ">
                <?php
                $slq_fetch_from_cource = mysqli_query($conn, "SELECT * FROM `courses` ORDER BY id DESC");
                while ($fetch_array_from_courses = mysqli_fetch_assoc($slq_fetch_from_cource)) {



                ?>
                    <div class="col ">
                        <div class="card h-100">
                            <img height="260px" width="200px" src="uploads/images/<?php
                                                                                    echo $fetch_array_from_courses['images'];

                                                                                    ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title "><?php echo $fetch_array_from_courses['name']; ?>
                                </h5>

                                <p class="card-text mb-0 pb-0 "><b><?php echo $fetch_array_from_courses['category']; ?></b></p>
                                <p class="card-text mt-0 pt-0">Duration : <?php echo $fetch_array_from_courses['duration']; ?> hour<br>Price : <?php $fetch_array_from_courses['amount']; ?>/-tk</p>
                            </div>
                        </div>
                    </div>

                <?php
                }

                ?>


            </div>
        </div>
    </div>
</section>

<!-- our teachers -->

<section class="py-5 bg-light">
    <div class="text-center mb-5">
        <h2 class="font-weight-bold">Our Teachers</h2>
        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse illum suscipit velit, omnis unde expedita quae iste eveniet ipsum odit.</p>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $sql = 'SELECT * FROM `accounts` Where `type`= "teacher"';
            $result = mysqli_query($conn, $sql);
            while ($table_array = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-lg-3 my-5">
                    <div class="card position-relative">
                        <div class="col-7 position-absolute box " style="top:-60px;">
                            <img style="height: 100px;width: 100px;" src="https://source.unsplash.com/random/360x360?user,id,facebook" class="img-fluid rounded-circle m-4" alt="">
                        </div>
                        <div class="card-body pt-5 mt-4">
                            <div class="card-title mb-0 p-0"><?php echo $table_array['name'] ?> Sir </div>
                            <p class="card-text">
                                <b>
                                    Cources :</b>5
                                <hr>
                                <b>Ratings:</b>
                                <?php
                                $rating = 1;
                                while ($rating <=$table_array['ratings']) {
                                ?>  
                                <i class="fa fa-star text-warning"></i>
                                <?php
                                $rating++;
                                }
                                
                                ?>
                                <hr>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
            }

            ?>
        </div>
    </div>
</section>


<!-- Achivements -->
<section class="py-5" style="height:auto; width:auto;background: linear-gradient(300deg, transparent,black );color: aliceblue;">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5" style="height:400px;">
                    <h2>Achivements</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint corrupti, ducimus excepturi optio perferendis molestias autem distinctio. Dolorem dicta facilis ratione ad quam, nisi eos perspiciatis, nihil quae debitis illum?
                    </p>
                    <img width="300px" src="https://source.unsplash.com/random/360x360?table,computer,dark" alt="" class="img-fluid rounded-1 align-items-center ">
                </div>
                <div class="col-lg-6">
                    <div class="row ">
                        <div class="col-lg-6 my-3">
                            <div class="border rounded">
                                <div class=" card-body text-center text-dark p-3">
                                    <span class=""><i class=" fa fa-graduation-cap fa-2x"></i></span>
                                    <h2 class="my-4 font-weight-bold">334</h2>
                                    <hr>
                                    <h3>Graduates</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 my-3">
                            <div class="border rounded">
                                <div class=" card-body text-center text-dark p-3">
                                    <span class=""><i class=" fa fa-graduation-cap fa-2x"></i></span>
                                    <h2 class="my-4 font-weight-bold">334</h2>
                                    <hr>
                                    <h3>Graduates</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 my-3">
                            <div class="border rounded">
                                <div class="card-body text-center text-dark p-3">
                                    <span class=""><i class=" fa fa-graduation-cap fa-2x"></i></span>
                                    <h2 class="my-4 font-weight-bold">334</h2>
                                    <hr>
                                    <h3>Graduates</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 my-3">
                            <div class="border rounded">
                                <div class=" card-body text-center text-dark p-3">
                                    <span class=""><i class=" fa fa-graduation-cap fa-2x"></i></span>
                                    <h2 class="my-4 font-weight-bold">334</h2>
                                    <hr>
                                    <h3>Graduates</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- testimmonial -->
<section class="py-4">
    <div class="text-center mb-5">
        <h2 class="font-weight-bold">What pepole Says</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam dolorum, minus dolore fugit non quaerat sit at enim corrupti assumenda.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="boder rounded  text-center position-relative ">

                    <div class="p-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis illo architecto libero autem aut aliquam dolorum perferendis dignissimos consectetur placeat adipisci modi blanditiis sunt hic quod inventore, ullam praesentium eveniet. Reprehenderit, laborum eaque ad eveniet vero dolorum earum consectetur repellat accusamus, aliquam, iure suscipit!
                    </div>
                </div>
                <div class="text-center mt-n2">
                    <img src="img/6.jpg" alt="" srcset="" class="rounded-circle border " width="100px">
                    <h4>Name Of Candidate</h4>
                    <p><i>Description</i></p>
                </div>
            </div>
            <div class="col-6">
                <div class="boder rounded  text-center position-relative ">

                    <div class="p-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis illo architecto libero autem aut aliquam dolorum perferendis dignissimos consectetur placeat adipisci modi blanditiis sunt hic quod inventore, ullam praesentium eveniet. Reprehenderit, laborum eaque ad eveniet vero dolorum earum consectetur repellat accusamus, aliquam, iure suscipit!
                    </div>
                </div>
                <div class="text-center mt-n2">
                    <img src="img/6.jpg" alt="" srcset="" class="rounded-circle border " width="100px">
                    <h4>Name Of Candidate</h4>
                    <p><i>Description</i></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("footer.php");

?>