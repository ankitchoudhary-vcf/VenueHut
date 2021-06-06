<?php

include('conn.php');

session_start();

if (!(isset($_SESSION['user_id']))) {
    header('Location: ./login.php');
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

            <?php

            if (isset($_SESSION['success'])) {
            ?>

                <article class="message is-success">
                    <div class="message-header">
                        <p>Successfully Login</p>
                        <button class="delete" aria-label="delete"></button>
                    </div>
                </article>

            <?php
                unset($_SESSION['success']);
            }

            ?>



            <div class=" container mx-4 mt-4">
                <a class="button" href="#" style="float:right"><i class="fa fa-plus mr-2" style="color:#00d1b2;"></i> Add New Services</a>
                <div class="title">
                    <nav class="breadcrumb" aria-label="breadcrumbs">
                        <ul>
                            <li><a href="./">VenueHut</a></li>
                            <li class="is-active"><a aria-current="page" href="./">Dashboard</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="columns is-multiline m-4">

                    <!-- Services Section -->
                    <div class="column is-half is-desktop">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Component
                                </p>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                                </div>
                            </div>
                            <footer class="card-footer">
                                <a href="#" class="card-footer-item">Add New</a>
                            </footer>
                        </div>
                    </div>
                    <!-- End Services Section -->



                </div>

            </div>


            <!-- footer section -->
            <?php
            include('footer.php');
            ?>
            <!-- End footer section -->

        </div>
        <!-- End main section -->

    </div>
</body>
<script src="./assets/js/script.js"></script>
<script src="./assets/js/message.js"></script>

</html>