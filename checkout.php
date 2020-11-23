<?php
@session_start();

$orderedProductIDs = $_SESSION["orderedProductIDs"];
$orderedProductQtys = $_SESSION["orderedProductQtys"];

$i = 0;
while ($i<sizeof($orderedProductIDs)){
    $orderedProductID = $orderedProductIDs[$i];
    $orderedProductQty = $orderedProductQtys[$i];
    $productName = getProductNameByProductID($orderedProductID);
    $price = getProductPriceByProductID($orderedProductID);
    echo "<p>Name: $productName Qty: $orderedProductQty Price: $price 
        Price: ".($price*$orderedProductQty)."</p>";
    $total = $total + ($price*$orderedProductQty);
    $i++;
}


echo "<p>Total: $total</p>";

function createDatabaseConnection(){
    //1. Connection to Database.
    $server = "nba02whlntki5w2p.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbusername = "k4j7jgjpv0fuxdca";
    $dbpassword = "ltbt9xigi8kadool";
    $dbname = "ntlwav83cf7kfzeb";

    $conn = new mysqli($server, $dbusername, $dbpassword, $dbname);
    return $conn;
}

/**
 * @param $productID
 * @return mixed
 */
function getProductNameByProductID($productID){
    //1. Create DB
    $conn = createDatabaseConnection();

    //2. Create Query
    $sql = "select name from products where id=$productID";

    //3. Run Query
    $result = mysqli_query($conn, $sql);

    //4. Show Result
    while ($row=$result->fetch_assoc()){
        $name = $row["name"];
    }
    return $name;
}

/**
 * @param $productID
 */
function getProductPriceByProductID($productID){
    //1. Create DB
    $conn = createDatabaseConnection();

    //2. Create Query
    $sql = "select price from products where id=$productID";

    //3. Run Query
    $result = mysqli_query($conn, $sql);

    //4. Show Result
    while ($row=$result->fetch_assoc()){
        $price = $row["price"];
    }
    return $price;
}

$userID = $_SESSION["userID"];
$shippingAddress = $_POST["shippingAddress"];
date_default_timezone_set("pacific/auckland") ;
$datetime = date("Y-m-d h:i:s");

function createAnOrder($userID, $shippingAddress, $datetime){
    //1 Connection
    $conn = createDatabaseConnection();
    //2 Make Query
    $sql = "INSERT INTO `orders`(`orderNum`, `userID`, `shipAddress`, `orderdate`) 
    VALUES (NULL,$userID,'$shippingAddress','$datetime')";
    //3 Run Query
    mysqli_query($conn, $sql);
    //4 I need my OrderID
    $orderID = mysqli_insert_id($conn);
    return $orderID;
}

function insertProductToOrderedTable($orderID, $productID, $qty){
    //1 Connection
    $conn = createDatabaseConnection();
    //2 Make Query
    $sql = "INSERT INTO `orderedProducts`(`orderedProductsID`, `orderID`, `productID`, `qty`) 
    VALUES (NULL,$orderID,$productID,$qty)";
    //3 Run Query
    mysqli_query($conn, $sql);
}

// Create My Order
$orderID = createAnOrder($userID, $shippingAddress, $datetime);
$i = 0;
while ($i < sizeof($orderedProductIDs)){
    $productID = $orderedProductIDs[$i];
    $qty = $orderedProductQty[$i];
    insertProductToOrderedTable($orderID, $productID, $qty);
    $i++;
}

//Clear my Shopping Cart
$_SESSION["orderedProductIDs"] = [];
$_SESSION["orderedProductQtys"] = [];

//Back to Home
?>
    <form action="index.php" method="post">
        <input type="submit" value="BACK TO HOME">
    </form>

<?php