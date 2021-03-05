<?php

include "config.php"; // Using database connection file here

$sql_remove = "DELETE FROM `cart` WHERE `user_id` = (SELECT `id` FROM `users` WHERE `username` = '".$_COOKIE["type"]."')";
mysqli_query($link, $sql_remove);
if($sql_remove)
{
    mysqli_close($link); // Close connection
    header("location:index.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>