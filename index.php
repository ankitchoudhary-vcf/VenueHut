<?php
include("conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>venueHut</title>


    <!-- Favicon -->
    <link rel="shortcut icon" type="image/jpg" href="./img/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>



    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="img/favicon.png" alt="Logo"> <span class="mx-2" style="font-weight: bold; font-size:large;">venueHut</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="./search.php" method="post">
                        <div class="search">
                            <input type="text" placeholder="Search" name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <?php

                    session_start();

                    if (isset($_SESSION['user'])) {
                    ?>
                        <div class="logout">
                            <a class="btn" href="./logout.php">Logout</a>
                        </div>

                    <?php
                    }
                    else {
                        ?>
                         <div class="login">
                            <a class="btn" style="margin: -14% 0 0 0;" href="./login.php">Login</a>
                            <a class="btn" style="margin: -14% 0 0 0;" href="./Registration.php">Sign Up</a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->

    <!-- Main Slider Start -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php"><i class="fa fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#services"><i class="fa fa-shopping-bag"></i>Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./contact.php"><i class="fa fa-address-book"></i>Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="header-slider normal-slider">
                        <div class="header-slider-item">
                            <img src="img/f2.jpg"  style="width:600px; height:400px;" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Welcome to venueHut</p>
                                <a class="btn" href="tel:xxxxxxxxxx">Contact Now</a>
                            </div>
                        </div>
                        <div class="header-slider-item">
                            <img src="img/f8.jpg"  style="width:600px; height:400px;" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>We help you to plan your special day</p>
                                <a class="btn" href="tel:xxxxxxxxxx">Contact Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="header-img">
                        <div class="img-item">
                            <img src="img/f10.jpg" style="width:208px; height:200px;" />
                            <a class="img-text" href="./category.php?category=Charger">
                                <p>Birthday Venue</p>
                            </a>
                        </div>
                        <div class="img-item">
                            <img src="img/f5.jpg" style="width:208px; height:200px;" />
                            <a class="img-text" href="./category.php?category=Tempered%20Glass">
                                <p>Weeding Venue</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="call-to-action">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>call us for any queries</h1>
                </div>
                <div class="col-md-6">
                    <a href="tel:xxxxxxxxxx">+91 xxxxxxxxxx</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <!-- Latest Products -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header" id="services">
                <h1>Our Services</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                <?php

                $ssq = "SELECT * FROM `services`";
                $result = mysqli_query($conn, $ssq);

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="./venue.php?id=<?php echo $row['service_Id']; ?>"><?php echo $row['service_name']; ?></a>
                            </div>
                            <div class="product-image">
                                <a href="./venue.php?id=<?php echo $row['service_Id']; ?>">
                                    <img src="./upload/<?php echo trim($row['service_Image']); ?>" alt="Services Image" height="350px" width="auto">
                                </a>
                            </div>
                            <div class="product-price">
                                <h3 style="font-size:medium;"><?php echo $row['service_description']; ?></h3>
                                <a class="btn" href="./venue.php?id=<?php echo $row['service_Id']; ?>" target="_blank">View Venue</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- New Product End -->


    <!-- Footer Start -->
    <?php
    include('./footer.php');
    ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>