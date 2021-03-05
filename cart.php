<?php
require_once 'config.php';

$sql = "SELECT item_id,items.name AS 'item name',COUNT(item_id) AS counter 
FROM `cart`
JOIN items USING (item_id)
GROUP BY item_id";
$result = mysqli_query($link, $sql);


function renderCartList($result){

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo "<tr>";
    echo "<td>".$row["item name"]."</p>";
    echo "<td>".$row["counter"]."</td>";
    echo '</tr>';
}}?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
    table, th, td {border: 1px solid black; text-align: center;}
    table{width: 40%;border-collapse: collapse;}
    a{text-decoration: none; color: black;}
    button {margin-top: 10px;}
</style>
<title>Testing Shop</title>
</head>
<body>
    <table>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
        </tr>
        <tbody>
            <?php renderCartList($result)?>
        </tbody>
    </table>
    <button><a href="delete.php">Homepage</button>
</body>
</html>