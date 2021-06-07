<?php

include('conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $service;

    $sql = "SELECT * FROM `services` WHERE `service_Id` = '$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $service = $row['service_name'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>venueHut</title>
    <link rel="shortcut icon" type="image/jpg" href="./assets/image/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div class="wrapper">
        <!-- Navbar section -->
        <?php
        include('navbar.php');
        ?>
        <!-- End navbar section -->


        <!-- main section -->
        <div class="main_content">


            <div class=" container mx-4 mt-4">
                <div class="title">
                    <nav class="breadcrumb" aria-label="breadcrumbs">
                        <ul>
                            <li><a href="./">VenueHut</a></li>
                            <li class="is-active"><a aria-current="page"><?php echo $service; ?></a></li>
                        </ul>
                    </nav>
                </div>

                <div class="columns is-multiline m-4">

                    <?php

                    $ssq = "SELECT * FROM `venues` WHERE `service_Id` = $id";

                    $result = mysqli_query($conn, $ssq);

                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>

                        <!-- Services Section -->
                        <div class="column is-full is-desktop">
                            <div class="card">
                                <div class="card-content">
                                    <article class="media">
                                        <figure class="media-left">
                                            <p class="image is-128x128">
                                                <img src="../upload/<?php echo trim($row['venue_image']); ?>">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong><?php echo $row['venue_name']; ?></strong>
                                                    <br>
                                                    <?php echo $row['venue_description']; ?>
                                                    <br>
                                                    <small><i class="fas fa-map-marker-alt"></i> <?php echo $row['venue_location']; ?></small>
                                                    <br>
                                                    <strong><button class="button is-primary">Rs. <?php echo $row['venue_price']; ?> /-</button></strong>
                                                </p>
                                            </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- End Services Section -->


                    <?php
                    }

                    ?>


                </div>

            </div>

            <!-- footer section -->
            <div style="margin-top:270px;">
                <?php
                include('footer.php');
                ?>
            </div>
            <!-- End footer section -->

        </div>
        <!-- End main section -->

    </div>
</body>
<script src="./assets/js/script.js"></script>
<script src="./assets/js/message.js"></script>
<script src="./assets/js/modal.js"></script>

</html>