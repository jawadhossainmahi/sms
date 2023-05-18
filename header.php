<!-- next video will be video no 4 link :https://www.youtube.com/watch?v=di46tz1FQ44&list=PLthQvVh2q_NVWh1gsu5szAkxBG4FGZoVd&index=4 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.misn.css" rel="stylesheet" /> -->

    <!-- font awsome kit  -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/7c5c4e41f8.css" crossorigin="anonymous">
    <style>

    </style>

</head>

<body>

    <?php
    // include('includes/config.php');
    include('includes/functions.php');

    ?>

    <!-- navbar starts -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                </ul>
                <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
                <!-- <div class="container-fluid"> -->
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    <!-- Icons -->
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <!-- Icon dropdown -->
                    <li class="nav-item me-3 me-lg-0 dropdown">


                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if ((isset($_SESSION['login'])) && ($_SESSION['email'] == 'admin@gmail.com')) {
                                echo '<li>
                            <a class="dropdown-item" href="main_admin_pages/04_dashborde.php">Admin Panal</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="actions/login_out.php">logout</a>
                        </li>
                        
                        ';
                            } else if (isset($_SESSION['login'])) {
                                echo '<li>
                            <a class="dropdown-item" href="actions/login_out.php">logout</a>
                        </li>';
                            } else {
                                echo '<li>
                            <a class="dropdown-item" href="login.php">login</a>
                        </li>';
                            }
                            ?>

                            <li>
                                <a class="dropdown-item" href="#">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>



                </ul>
                <!-- </div> -->
                <!-- </nav> -->
            </div>
        </div>
    </nav>
    <!-- navbar ends -->