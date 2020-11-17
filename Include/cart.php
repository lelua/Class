<?php
@session_start();

$orderedProductIDs = $_SESSION["orderedProductIDs"];
$orderedProductQtys = $_SESSION["orderedProductQtys"];

$i = 0;
while ($i<sizeof($orderedProductIDs)){
    $orderedProductID = $orderedProductIDs[$i];
    $orderedProductQty = $orderedProductQtys[$i];
    $productName = getProductNameByProductID($orderedProductID);
    $price = getProductPriceByProductID($orderedProductID)
    echo "<p>Name: $productName Qty: $orderedProductQty Price: $price</p>";
    $i++;
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
 * @param $productID
 * @return mixed
 */
function getProductNameByProductID($productID){
    //1. Create DB
    $conn = createDatabaseConnection();

    //2. Create Query
    $sql = "select name from product where id=$productID";

    //3. Run Query
    $result = mysqli_query($conn, $sql);

    //4. Show Result
    while ($row=$result->fetch_assoc()){
        $name = $row["name"];
    }

}


/**
 * @param $productID
 */
function getProductPriceByProductID($productID){
    //1. Create DB
    $conn = createDatabaseConnection();

    //2. Create Query
    $sql = "select name from product where id=$productID";

    //3. Run Query
    $result = mysqli_query($conn, $sql);

    //4. Show Result
    while ($row=$result->fetch_assoc()){
        $price = $row["price"];
    }

}

