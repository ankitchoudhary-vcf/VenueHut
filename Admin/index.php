<?php

include('conn.php');

session_start();

if (!(isset($_SESSION['user_id']))) {
    header('Location: ./login.php');
}

if (isset($_POST['addService'])) {
    $ServiceName = $_POST['ServiceName'];
    $Description = $_POST['Description'];

    $aq = "INSERT INTO `services` (`service_name`, `service_description`) VALUES ('$ServiceName', '$Description')";

    if (mysqli_query($conn, $aq)) {
        $_SESSION['addService_success'] = " Services Added Successfully";
    } else {
        $_SESSION['addService_error'] = " Error occurs, Try again";
    }
}

if (isset($_POST['addVenue'])) {
    $venueName = $_POST['VenueName'];
    $VenueLocation = $_POST['venueLocation'];
    $VenueDescription = $_POST['description'];
    $serviceId = $_POST['Id'];
    $userId = $_SESSION['user_id'];

    $file = rand(1000, 100000) . "-" . $_FILES['venueImage']['name'];
    $file_loc = $_FILES['venueImage']['tmp_name'];
    $file_size = $_FILES['venueImage']['size'];
    $file_type = $_FILES['venueImage']['type'];
    $folder = "../upload/";

    /* new file size in KB */
    $new_size = $file_size / 1024;
    /* new file size in KB */

    /* make file name in lower case */
    $new_file_name = strtolower($file);
    /* make file name in lower case */

    $final_file = str_replace(' ', '-', $new_file_name);

    if (move_uploaded_file($file_loc, $folder . $final_file)) {
        $sql = "INSERT INTO `venues` (`user_id`, `service_Id`, `venue_name`, `venue_location`, `venue_description`, `venue_image`) VALUES('$userId', '$serviceId', '$venueName', '$VenueLocation', '$VenueDescription', '$final_file')";
        if(mysqli_query($conn, $sql)){
            $_SESSION['venue_success'] = "Venue Added successfully";
        }
        else{
            $_SESSION['venue_error'] = "Error occurred, please try again";
        }
    } else {

        $_SESSION['upload_error'] = "Error occurred while uploading, please try again";
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

            if (isset($_SESSION['addService_success'])) {
            ?>

                <article class="message is-success">
                    <div class="message-header">
                        <p><?php echo $_SESSION['addService_success']; ?></p>
                        <button class="delete" aria-label="delete"></button>
                    </div>
                </article>

            <?php
                unset($_SESSION['addService_success']);
            }
            if (isset($_SESSION['addService_error'])) {
            ?>

                <article class="message is-warning">
                    <div class="message-header">
                        <p><?php echo $_SESSION['addService_error']; ?></p>
                        <button class="delete" aria-label="delete"></button>
                    </div>
                </article>

            <?php
                unset($_SESSION['addService_error']);
            }

            if (isset($_SESSION['venue_success'])) {
                ?>
    
                    <article class="message is-success">
                        <div class="message-header">
                            <p><?php echo $_SESSION['venue_success']; ?></p>
                            <button class="delete" aria-label="delete"></button>
                        </div>
                    </article>
    
                <?php
                    unset($_SESSION['venue_success']);
                }
                if (isset($_SESSION['upload_error'])) {
                ?>
    
                    <article class="message is-warning">
                        <div class="message-header">
                            <p><?php echo $_SESSION['upload_error']; ?></p>
                            <button class="delete" aria-label="delete"></button>
                        </div>
                    </article>
    
                <?php
                    unset($_SESSION['upload_error']);
                }
                if (isset($_SESSION['venue_error'])) {
                    ?>
        
                        <article class="message is-warning">
                            <div class="message-header">
                                <p><?php echo $_SESSION['venue_error']; ?></p>
                                <button class="delete" aria-label="delete"></button>
                            </div>
                        </article>
        
                    <?php
                        unset($_SESSION['venue_error']);
                    }

            ?>



            <div class=" container mx-4 mt-4">
                <div class="title">
                    <nav class="breadcrumb" aria-label="breadcrumbs">
                        <ul>
                            <li><a href="./">VenueHut</a></li>
                            <li class="is-active"><a aria-current="page">Dashboard</a></li>
                        </ul>
                    </nav>
                </div>
                <a class="button modal-button float-right" data-target="addServices"><i class="fa fa-plus mr-2" style="color:#00d1b2;"></i> Add New Services</a>
                <br>

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
                                    <div class="content">
                                        <?php echo $row['service_description']; ?>
                                    </div>
                                </div>
                                <footer class="card-footer">
                                    <a class="card-footer-item modal-button" data-target="addVenue" data-id="<?php echo $row['service_Id']; ?>">Add New Venue</a>
                                </footer>
                            </div>
                        </div>
                        <!-- End Services Section -->


                    <?php
                    }

                    ?>


                </div>

            </div>

            <!-- New Services Model -->
            <div class="modal" id="addServices">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Add New Services </p>
                        <button class="delete close" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="title">Enter the details to add new services</div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="field">
                                <label class="label" for="name">Service Name :</label>
                                <p class="control">
                                    <input class="input" type="text" id="name" name="ServiceName" placeholder="Enter the Service Name" required>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label" for="description">Service Description :</label>
                                <p class="control has-icons-left">
                                    <textarea class="textarea" name="Description" id="description" placeholder="Enter the Description of the Service" required></textarea>
                                </p>
                            </div>
                            <div class="field has-text-centered">
                                <p class="control">
                                    <button type="submit" class="button is-rounded is-fullwidth is-6 has-text-white is-primary" name="addService">
                                        Add Service
                                    </button>

                                </p>

                            </div>
                        </form>
                    </section>
                    <footer class="modal-card-foot">
                    </footer>
                </div>
            </div>
            <!-- End New Services Model -->


            <!-- Services Integration Model -->
            <div class="modal" id="addVenue">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Add New Venue </p>
                        <button class="delete close" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="title">Enter the details to add new venue</div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="field is-hidden">
                                <p class="control">
                                    <input class="input VenueId" type="text" name="Id">
                                </p>
                            </div>
                            <div class="field">
                                <label class="label" for="Venue_name">venue Name :</label>
                                <p class="control">
                                    <input class="input" type="text" id="Venue_name" name="VenueName" placeholder="Enter the Venue Name" required>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label" for="name">venue Location :</label>
                                <p class="control">
                                    <input class="input" type="text" id="name" name="venueLocation" placeholder="Enter the Venue Location" required>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label" for="description">venue Description :</label>
                                <p class="control has-icons-left">
                                    <textarea class="textarea" name="description" id="description" placeholder="Enter the Description of the Venue" required></textarea>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label" for="image">venue Image :</label>
                                <p class="control has-icons-left">
                                    <input type="file" accept=".gif, .png, .jpg, .jpeg" name="venueImage" id="image" required>
                                </p>
                            </div>
                            <div class="field has-text-centered">
                                <p class="control">
                                    <button type="submit" class="button is-rounded is-fullwidth is-6 has-text-white is-primary" name="addVenue">
                                        Add Venue
                                    </button>

                                </p>

                            </div>
                        </form>
                    </section>
                    <footer class="modal-card-foot">
                    </footer>
                </div>
            </div>
            <!-- End Services Integration Model -->


            <!-- footer section -->
            <div style="margin-top:202px;">
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