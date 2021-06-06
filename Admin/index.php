<?php

include('conn.php');

session_start();

if (!(isset($_SESSION['user_id']))) {
    header('Location: ./login.php');
}

if(isset($_POST['addService']))
{
    $ServiceName = $_POST['ServiceName'];
    $Description = $_POST['Description'];

    $aq = "INSERT INTO `services` (`service_name`, `service_description`) VALUES ('$ServiceName', '$Description')";
    
    if(mysqli_query($conn, $aq))
    {
        $_SESSION['addService_success'] = " Services Added Successfully";
    }
    else{
        $_SESSION['addService_error'] = " Error occurs, Try again";
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

            ?>



            <div class=" container mx-4 mt-4">
                <a class="button modal-button" data-target="addServices" style="float:right"><i class="fa fa-plus mr-2" style="color:#00d1b2;"></i> Add New Services</a>
                <div class="title">
                    <nav class="breadcrumb" aria-label="breadcrumbs">
                        <ul>
                            <li><a href="./">VenueHut</a></li>
                            <li class="is-active"><a aria-current="page" href="./">Dashboard</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="columns is-multiline m-4">

                <?php
                
                $ssq = "SELECT * FROM `services`";
                $result = mysqli_query($conn,$ssq);

                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
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
                                <a href="#" class="card-footer-item">Add New</a>
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
<script src="./assets/js/modal.js"></script>

</html>