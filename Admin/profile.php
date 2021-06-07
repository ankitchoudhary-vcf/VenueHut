<?php

include('conn.php');

session_start();

if (!(isset($_SESSION['user_id']))) {
    header('Location: ./login.php');
}

$userID = $_SESSION['user_id'];
$username;
$address;
$image;

$sql = "SELECT * FROM `admin_users` WHERE `user_id` = '$userID'";
$result =  mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    $username = $row['user_name'];
    $address = $row['Address'];
    $image = $row['image'];
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
                            <li class="is-active"><a aria-current="page">Profile</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="columns is-multiline m-4">
                    <div class="column is-half is desktop">
                        <div class="media">
                            <figure class="image is-256x256">
                                <?php
                                if (!($image)) {
                                ?>
                                    <img class="is-rounded" src="https://bulma.io/images/placeholders/256x256.png">
                                    <button class="button modal-button is-outlined is-primary m-2" data-target="EditImage"><i class="fa fa-edit mr-2"></i>Edit Image</button>

                                <?php
                                } else {
                                ?>
                                    <img class="is-rounded" src="../upload/<?php echo $image; ?>">
                                    <button class="button modal-button is-outlined is-primary m-2" data-target="EditImage"><i class="fa fa-edit mr-2"></i>Edit Image</button>
                                <?php
                                }

                                ?>
                            </figure>

                        </div>
                    </div>

                    <div class="column is-half is desktop box">

                        <div class="title">
                            Username : <span class="title is-4">
                                <?php echo $username; ?>
                            </span>
                        </div>
                        <div class="title">
                            Address : <span class="title is-4">
                                <?php echo $address; ?>
                            </span>
                        </div>
                        <div>
                            <button class="button is-outlined is-primary modal-button float-right" data-target="EditProfile"><i class="fa fa-edit mx-2"></i>Edit Profile</button>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Edit Image Section -->

            <div class="modal" id="EditImage">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Edit your Profile Image </p>
                        <button class="delete close" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="title">Select your Profile Image</div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="field">
                                <p class="control">
                                    <input type="file" name="Image" accept=".png, .jpg, .gif, .jpeg" required>
                                </p>
                            </div>
                            <div class="field has-text-centered">
                                <p class="control">
                                    <button type="submit" class="button is-rounded is-fullwidth is-6 has-text-white is-primary" name="EditImage">
                                        Update Image
                                    </button>
                                </p>
                            </div>
                        </form>
                    </section>
                    <footer class="modal-card-foot">
                    </footer>
                </div>
            </div>

            <!-- End Edit Image Section -->


            <!-- Edit Profile Section -->

            <div class="modal" id="EditProfile">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Edit your Profile </p>
                        <button class="delete close" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="field">
                                <label for="username" class="label">Username</label>
                                <p class="control">
                                    <input class="input" id="username" type="input" name="username" value="<?php echo $username; ?>" required>
                                </p>
                            </div>
                            <div class="field">
                                <label for="address" class="label">Address</label>
                                <p class="control">
                                    <textarea id="address" class="textarea" name="address"><?php echo $address; ?></textarea>
                                </p>
                            </div>
                            <div class="field has-text-centered">
                                <p class="control">
                                    <button type="submit" class="button is-rounded is-fullwidth is-6 has-text-white is-primary" name="EditProfile">
                                        Update
                                    </button>
                                </p>
                            </div>
                        </form>
                    </section>
                    <footer class="modal-card-foot">
                    </footer>
                </div>
            </div>

            <!-- End Edit Profile Section -->

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