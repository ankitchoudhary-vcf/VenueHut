<?php

$error  = '';

session_start();

if(isset($_GET['code']))
{
    
    include('conn.php');

    $verification_code = $_GET['code'];
    $vq = "SELECT * FROM `users` WHERE `verification_code` = '$verification_code'";
    $result = mysqli_query($conn, $vq);
    $ctr = 0; 
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $ctr =1;
    }
    if($ctr == 1)
    {
        $uq = "UPDATE `users` SET `status` = 'ENABLE' WHERE `verification_code` = '$verification_code'";
        if(mysqli_query($conn, $uq))
        {
            $_SESSION['success_message'] = 'Your Email Successfully verify, now you can login into this VenueHut Application';
            header('location:login.php');
        }
    }
    else
    {
        $error = 'something went wrong try again....';
    }
}

?>