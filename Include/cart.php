<?php
@session_start();

$orderedProductIDs = $_SESSION["orderedProductIDs"];
$orderedProductQtys = $_SESSION["orderedProductQtys"];
print_r($orderedProductQtys);
$total=0;
$i = 0;
while ($i<sizeof($orderedProductIDs)){
    $orderedProductID = $orderedProductIDs[$i];
    $orderedProductQty = $orderedProductQtys[$i];
    $productName = getProductNameByProductID($orderedProductID);
    $price = getProductPriceByProductID($orderedProductID);
    echo "<p>Name: $productName Qty: $orderedProductQty Unit Price: $price
         Price: ".(floatval($price)."</p>";
    $total = $total + (floatval($price)*floatval($orderedProductQty));
    $i++;
}
echo "<p>Total: $total</p>";

if (isset($_SESSION["userID"])){
?>

<form action="checkout.php" method="post">
    <textarea name="shippingAddress" rows="10" cols="50"></textarea>
    <input type="submit" value="Checkout">

</form>

<?php
}else{
    echo "you need to login";
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


