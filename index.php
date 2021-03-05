<?php
//error_reporting(0);
//ini_set('display_errors', 0);

require_once 'config.php';

$sql_items = "SELECT items.item_id,items.name ,category.name as category,state.name AS state,items.price 
FROM items 
LEFT JOIN category ON items.item_category_id=category.category_id
LEFT join state ON items.item_state_id=state.state_id";
$result_items = mysqli_query($link, $sql_items);
       
        function createBtn($a){
        echo "<button><a href='cart.php'>Cart</a></button>";
    }


$item_id = "";
if(array_key_exists('added', $_GET)){
    $item_id = (int) $_GET["added"];
    $sql_insert = "INSERT INTO `cart`(`user_id`, `item_id`) VALUES ((SELECT id FROM users WHERE username ='".$_COOKIE["type"]."'),".$item_id.")";
    $sql_insert_mysqli = mysqli_query($link, $sql_insert);   
}


function renderList($result_items){

    while($row = mysqli_fetch_array($result_items, MYSQLI_ASSOC)){
    echo "<div class='card'>";
    echo '<div>';
    echo "<p><strong>".$row["name"]."</strong></p>";
    echo "<p> category: ".$row["category"]."</p>";
    if (!empty($row["state"])){
        echo "<p>".$row["state"]."</p>";
        }
    echo "<p>price: ".$row["price"]."\xE2\x82\xAc </p>";
    echo '</div>';
    echo "<div><form action='index.php' method='get'>"
    . "<input type='submit' name='input_cart' value='Add to cart'>"
    . "<input type='hidden' name='added' value='".$row["item_id"]."'></form></div>";
    echo "</div>";
}}

$sql_avg = "SELECT * FROM ratings";
$sql_avg_set = mysqli_query($link,$sql_avg);
function printRate($a){
   $row = mysqli_fetch_array($a, MYSQLI_ASSOC);
if(!empty($row['user_id'])){
        echo "<div class='rate'>Ratings average: ".$row['rating_avg']."</div>";
    }else {
        echo '<button><a href="testpage.php">Rate my page</a></button>';
    }
}
    



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>testing Shop</title>
<style>
    nav {text-align: right;padding: 10px;display: flex;justify-content: space-between;}
    a{text-decoration: none; color: black;}
    main{display: flex;}
    .rate {color: greenyellow}
    .card{box-sizing: border-box;text-align: center;border: 1px solid black;margin: 10px;padding: 10px; width: 150px; height: 200px; display: flex;flex-direction: column}
</style>
</head>
<body>
    <nav>
        <div><?php echo "logged in: ".$_COOKIE["type"]; ?></div>
        <?php printRate($sql_avg_set)?>
        <div>
            <?php 
            if(array_key_exists("added", $_GET)){
        $result_items = mysqli_query($link, $sql_items);
        createBtn($result_items);
            }  
            ?>
        <button><a href="logout.php">Logout</a></button>
        
        </div>
    </nav>
    <main>
        <?php renderList($result_items);?>
    </main>
      
</body>
</html>
