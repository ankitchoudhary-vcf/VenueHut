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

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

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
                                            <input type="hidden" value="<?php echo $row['venue_name'] ?>" id="venue_name" name="venue_name">
                                            <br>
                                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> <?php echo $row['venue_location']; ?></small>

                                        </div>
                                        <div class="price my-4">
                                            <p style="font-size:medium;">RS. <?php echo $row['venue_price']; ?>/-</p>
                                        </div>
                                        <div class="action">
                                            <a class="btn" id="share"><i class="fa fa-share"></i>Share</a>
                                            <button type="button" class="btn" style="background: #0042F5; color: #ffffff; border: none;" data-toggle="modal" data-target="#BookModal"> Book Now </button>
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
                                        <input type="hidden" id="price" name="price" value="<?php echo $row['venue_price'] ?>">
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

    <!-- Book Now Modal Start -->
    <div class="modal fade" id="BookModal" tabindex="-1" role="dialog" aria-labelledby="BookModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Book Venue Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="payform">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="number">Enter Number of Persons : </label>
                            <input type="number" class="form-control" id="number" placeholder="Enter Number" value="1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Data For Venue : </label>
                            <input type="date" class="form-control" id="date" required>
                        </div>
                        <br>
                        <p>
                        <h2>Total Amount : </h2> <span id="amount">Rs. 400 /- </span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" style="background: #0042F5; color: #ffffff; border: none;" class="btn btn-primary">Pay Now</button>
                        <button type="button" style="background: #808080; color: #ffffff; border: none;" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Book Now Modal End -->

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
        var number = document.getElementById("number");
        var price = document.getElementById("price");
        price = price.value.split(" ");
        price = parseInt(price[0], 10);
        var amount = document.getElementById("amount");
        amount.innerHTML = "Rs. " + price * number.value + " /-";
        number.onchange = function() {
            amount.innerHTML = "Rs. " + price * number.value + " /-";
        }
        var pay = document.getElementById("payform");
        pay.addEventListener("submit", function(e) {
            var a = document.getElementById('venue_name'); 

            var options = {
                "key": "rzp_test_kDRMFVjPewVsOC", // Enter the Key ID generated from the Dashboard
                "amount": price*number.value*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": a.value,
                "description": "Test Transaction",
                "image": "https://images.unsplash.com/photo-1553729459-efe14ef6055d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjZ8fHBheW1lbnR8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60",
                "handler": function(response) {
                    alert(response.razorpay_payment_id);
                    alert(response.razorpay_order_id);
                    alert(response.razorpay_signature)
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();

        });
    </script>
</body>

</html>