<?php

include('conn.php');

if (isset($_POST['contact'])) {
    
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
                            <li class="is-active"><a aria-current="page">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <hr style="width:100%;color:black;border: 2px solid;">

                <div class="title">Contact Us</div>
                <div class="columns is-multiline m-4 is-centered">

                    <div class="column is-half notification box">
                        <form method="post" enctype="multipart/form">
                            <div class="field">
                                <label class="label">Your Name</label>
                                <div class="control">
                                    <input class="input" type="text" name="name" placeholder="Enter Your Name" required>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Your Email</label>
                                <div class="control ">
                                    <input class="input" type="email" name="email" placeholder="Enter Your Email Address" required>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Your Phone Number</label>
                                <div class="control">
                                    <input class="input" type="text" name="phone" placeholder="Enter Your Phone Number" required>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Describe what you want to contact me for here</label>
                                <div class="control">
                                    <textarea class="textarea" name="message" placeholder="Your message" required></textarea>
                                </div>
                            </div>

                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-primary" type="submit" name="contact">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>

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