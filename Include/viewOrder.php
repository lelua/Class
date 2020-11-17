<?php

@session_start();
$userID = $_SESSION["userID"];
function createDatabaseConnection(){
    //1. Connection to Database.
    $server = "nba02whlntki5w2p.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbusername = "k4j7jgjpv0fuxdca";
    $dbpassword = "ltbt9xigi8kadool";
    $dbname = "ntlwav83cf7kfzeb";

    $conn = new mysqli($server, $dbusername, $dbpassword, $dbname);
    return $conn;
}

//1 Connection
$conn = createDatabaseConnection();

//2 First Query
$sql = "select * from orders where userID = $userID";

//3 Run First Query
$result = mysqli_query($conn, $sql);

//4 Show First Query Results
while ($row = $result->fetch_assoc()){
    echo "<h3>Order Number: ".$row["orderNum"]."</h3>";
    echo "<h3>Shipping Address: ".$row["shipAddress"]."</h3>";
    echo "<h3>Time: ".$row["orderdate"]."</h3>";

    // Second Query
    $sql2 = "select * from orderedProducts where orderID = ".$row["orderNum"];
    // Run Second Query
    $result2 = mysqli_query($conn, $sql2);
    while ($row2 = $result2->fetch_assoc()){
        echo "<p>ID: ".$row2["productID"]." Qty: ".$row2["qty"]."</p>";
    }
}