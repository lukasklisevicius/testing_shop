<?php

session_start();
$avg = 0;
foreach ($_SESSION as $test => $rate) {
   $avg += $rate;
}
$avg /= 5;

include_once 'config.php';
        $sql = "INSERT INTO `ratings`(`user_id`, `rating_avg`) VALUES ((SELECT id FROM users WHERE username = '".$_COOKIE["type"]."'),".$avg.")";
        mysqli_query($link, $sql);


        session_write_close();
        
        header("location: index.php")
 ?>

