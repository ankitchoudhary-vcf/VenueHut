<?php

include('conn.php');

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
                            <li class="is-active"><a aria-current="page">Dashboard</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="columns is-multiline m-4">

                    <?php

                    $ssq = "SELECT * FROM `services`";
                    $result = mysqli_query($conn, $ssq);

                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>

                        <!-- Services Section -->
                        <div class="column is-half is-desktop">
                            <div class="card">
                                <header class="card-header">
                                    <p class="card-header-title">
                                        <?php echo $row['service_name']; ?>
                                    </p>
                                </header>
                                <div class="card-content">
                                <article class="media" style="height:100%;">
                                        <figure class="media-left">
                                            <p class="image is-128x128 is-square">
                                                <img src="../upload/<?php echo trim($row['service_Image']); ?>">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <?php echo $row['service_description']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <footer class="card-footer">
                                    <a class="card-footer-item" href="./venue.php?id=<?php echo $row['service_Id']; ?>">View venue</a>
                                </footer>
                            </div>
                        </div>
                        <!-- End Services Section -->


                    <?php
                    }

                    ?>


                </div>

            </div>

            <!-- footer section -->
            <div>
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