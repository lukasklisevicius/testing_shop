<?php
error_reporting(0);
ini_set('display_errors', 0);

function store(){
    echo $_SESSION['results'];
}
session_start();
$_SESSION['result1'] = $_GET['rate'];
fonction 

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style>
    .box{border:1px solid black; padding: 10px;text-align: center; margin: 10px;}
</style>
</head>
<body>

<div>
<h1>Rate my page:</h1>
<div class="box">
    <h4>how much you liked my page?</h4>
    <p>rate from 1 to 5</p>
    <div>
        <form action="testpage2.php" method="get" name="rates" required>
    1:<input type="radio" name="rate" value="1" onclick="submit()"/>
    2:<input type="radio" name="rate" value="2" onclick="submit()"/>
    3:<input type="radio" name="rate" value="3" onclick="submit()"/>
    4:<input type="radio" name="rate" value="4" onclick="submit()""/>
    5:<input type="radio" name="rate"value="5" onclick="submit()"/>
</form>
        </div>
    </div>
</div>
</body>
</html>
