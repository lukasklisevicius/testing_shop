
<?php
//logout.php
setcookie("type", "", time()-(3600 * 4));
setcookie("user_id", "", time()-(3600 * 4));
header("location:login.php");

?>