<?php

include('conn.php');

session_start();

if(isset($_SESSION['user_id']))
{
    header('Location: ./');
}


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_id;

    $sq = "SELECT * FROM `admin_users` WHERE `user_name`='" . $username . "'";
    $result = mysqli_query($conn, $sq);
    // echo $sq;
    // echo $result;
    $ctr = 0;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if (password_verify($password, $row['Password'])) {
            $ctr = 1;
            $user_id  = $row['user_id'];
        }
    }

    if ($ctr == 1) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['success'] = "Successfully Logged In";
        
        header("Location: ./");
    } else {
?>
        <article class="message is-warning">
            <div class="message-header">
                <p>Invalid Username or Password</p>
                <button class="delete" aria-label="delete"></button>
            </div>
        </article>

<?php
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VenueHut</title>
    <link rel="shortcut icon" type="image/jpg" href="./assets/image/favicon.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div class="container is-light" style="margin-top: 100px;">
        <div id="login" class="my-6 px-6 notification is-white container column is-mobile is-one-third-desktop is-center">
            <div class="content">
                <div class="content has-text-centered">
                    <figure class="image is-64x64" style="margin: auto auto;">
                        <img src="./assets/image/favicon.png" alt="logo">
                    </figure>
                    <p class="title" style="margin: 5px;">Login</p>
                    <p>Use Your VenueHut Account</p>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input is-rounded" type="text" name="username" placeholder="Username" required>
                            <span class="icon is-small is-left">
                                <i class="fa fa-user"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input is-rounded" type="password" name="password" placeholder="Password" required>
                            <span class="icon is-small is-left">
                                <i class="fa fa-lock"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field has-text-centered">
                        <p class="control">
                            <button type="submit" class="button is-rounded is-fullwidth is-6 has-text-white is-primary" name="login">
                                Login
                            </button>
                        </p>
                    </div>
                    <div class="field has-text-centered">
                        <p>Create a new account <a href="./Registration.php" class="has-text-primary">Register here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="./assets/js/message.js"></script>

</html>