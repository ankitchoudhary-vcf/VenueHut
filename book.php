<?php
include("conn.php");
session_start();

if (isset($_POST)) {
    if (isset($_SESSION['user'])) {
        $venue_id = $_POST['venue_id'];
        $venue_name = $_POST['venue_name'];
        $user_id = $_SESSION['user'];

        $bq = "INSERT INTO `bookvenue`(`user_id`, `venue_id`, `venue_name`, `payment_status`) VALUES($user_id, $venue_id, '$venue_name', 'Pending')";
        mysqli_query($conn, $bq);
    }
}

?>