<?php
include("conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $service;
    $Venue;

    $sid = "SELECT `service_Id`, `venue_name` FROM `venues` WHERE `venue_id` = '$id'";
    $result = mysqli_query($conn, $sid);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $service_id = $row['service_Id'];
    $Venue = $row['venue_name'];
    $sql = "SELECT * FROM `services` WHERE `service_Id` = '$service_id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $service = $row['service_name'];
    }
}

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


    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="./index.php" class="nav-item nav-link">Home</a>
                        <a href="./index.php#services" class="nav-item nav-link">Services</a>
                        <a href="./contact.php" class="nav-item nav-link">Contact Us</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.php">
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
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="./index.php#services">Services</a></li>
                <li class="breadcrumb-item"><a href="./venue.php?id=<?php echo $service_id; ?>"><?php echo $service; ?></a></li>
                <li class="breadcrumb-item active"><?php echo $Venue; ?></li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->



    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php

                    $ssq = "SELECT * FROM `venues` WHERE `venue_id` = $id";

                    $result = mysqli_query($conn, $ssq);

                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">

                                        <img src="./upload/<?php echo trim($row['venue_image']); ?>" alt="Venue Image" height="350px" width="auto">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title">
                                            <h2><?php echo $row['venue_name']; ?></h2>
                                            <br>
                                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> <?php echo $row['venue_location']; ?></small>

                                        </div>
                                        <div class="price my-4">
                                            <p style="font-size:medium;">RS. <?php echo $row['venue_price']; ?>/-</p>
                                        </div>
                                        <div class="action">
                                            <a class="btn" id="share"><i class="fa fa-share"></i>Share</a>
                                            <a class="btn" href="./order.php?id=<?php echo $id ?>&url=<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" target="_blank"><i class=" fa fa-shopping-bag"></i>Book Now</a>
                                        </div>
                                        <div id="shareCard" style="display:none; margin-top:10px;">
                                            <input type="text" style="border:none;" value="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" id="share-url" readonly ">
                                                <button class=" btn btn-light" id="share-btn"><i class="fas fa-copy"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Venue description</h4>
                                        <strong><?php echo $row['venue_name']; ?></strong>
                                        <br>
                                        <?php echo $row['venue_description']; ?>
                                        <br>
                                        <br>
                                        <small><i class="fas fa-map-marker-alt"></i> <?php echo $row['venue_location']; ?></small>
                                        <br>
                                        <strong><a class="button is-primary mt-6">Rs. <?php echo $row['venue_price']; ?> /-</a></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                    <div class="product">
                        <div class="section-header">
                            <h1>Related Venues</h1>
                        </div>

                        <div class="row align-items-center product-slider product-slider-3">
                            <?php

                            $ssq = "SELECT * FROM `venues` WHERE `service_Id` = $service_id";

                            $result = mysqli_query($conn, $ssq);

                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            ?>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#"><?php echo $row['venue_name']; ?></a>
                                        </div>
                                        <div class="product-image">
                                            <a href="./venue-detail.php?id=<?php echo $row['venue_id']; ?>">
                                                <img src="./upload/<?php echo trim($row['venue_image']); ?>" alt="Product Image" height="350px" width="auto">
                                            </a>
                                        </div>
                                        <div class="product-price">
                                            <h3 style="font-size:medium;"><i class="fas fa-map-marker-alt"></i> <?php echo $row['venue_location']; ?></h3>

                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product List End -->


    <!-- Footer Start -->
    <?php
    include('./footer.php');
    ?>
    <!-- Footer  End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        var share = document.querySelector('#share');
        share.onclick = function() {
            document.querySelector('#shareCard').style.display = 'block';
        }
        window.onclick = function(event) {
            if (event.target == document.querySelector('#shareCard')) {
                document.querySelector('#shareCard').style.display = "none";
            }
        }
        var share_btn = document.getElementById("share-btn");
        share_btn.onclick = function() {
            document.getElementById("share-url").select();
            document.execCommand('copy');
            console.log("copy");
        };
    </script>
</body>

</html>