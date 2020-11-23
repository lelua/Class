<?php
@session_start();

$orderedProductIDs = $_SESSION["orderedProductIDs"];
$orderedProductQtys = $_SESSION["orderedProductQtys"];

$total=0;
$i = 0;
while ($i<sizeof($orderedProductIDs)){
    $orderedProductID = $orderedProductIDs[$i];
    $orderedProductQty = $orderedProductQtys[$i];
    $productName = getProductNameByProductID($orderedProductID);
    $price = getProductPriceByProductID($orderedProductID);
    echo "<h4>NAME: $productName<br><br>QTY: $orderedProductQty<br><br>UNIT PRICE: $price</h4>";
    $total = $total + floatval(ltrim($price, '$'))*$orderedProductQty;
    $i++;
}
echo "<h2>SHOPPING TOTAL: $total</h2>";

if (isset($_SESSION["userID"])){
?>
    <form action="checkout.php" method="post">
        <textarea name="shippingAddress" rows="10" cols="50"></textarea>
        <br>
        <input type="submit" value="CHECKOUT">
    </form>
    <form action="index.php" method="post">
        <input type="submit" value="BACK TO HOME">
    </form>

<?php
}else{
    echo "Please Login To Complete Your Order.";
}

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
 * @name ProductName
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
 * @name ProductPrice
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


