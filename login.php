<?php
require('config.php');
error_reporting(0);
ini_set('display_errors', 0);

if(isset($_COOKIE["type"]))
{
 header("location:index.php");
}
$err = "";
if (isset($_POST['username'])){
 $username = stripslashes($_REQUEST['username']);
 $username = mysqli_real_escape_string($link,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($link,$password);
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".$password."'";
 $result = mysqli_query($link,$query);
 $row = mysqli_fetch_array($result_items, MYSQLI_ASSOC);
 $rows = mysqli_num_rows($result);
        if($rows==1){
   
     setcookie("type", $username, time()+(3600 * 4));
     header("location:index.php");
    
         }else{
            $err = "<div class='form' style='color:red' ><h3>Username or password is incorrect.</h3></div>";
 }
    }else{}
?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>

</head>
<body>

<div>
<h1>Log In</h1>
<form action="" method="post" name="login">
    <input type="text" name="username" placeholder="Username" required /><br><br>
    <input type="password" name="password" placeholder="Password" required /><br><br>
<input name="submit" type="submit" value="Login" />
<?php echo($err)?>
</form>
</div>
</body>
</html>