<?php


//1. Connection to Database.
$server = "nba02whlntki5w2p.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbusername = "k4j7jgjpv0fuxdca";
$dbpassword = "ltbt9xigi8kadool";
$dbname = "ntlwav83cf7kfzeb";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

//2. create a query
// take input from selected category;
if (isset($_GET["category"])){
    echo "<h1>".$_GET["category"]."</h1>";
    $sql = "select * from products where category = ".$_GET["category"];
}else{
    $sql = "select * from products";
}

//3. run the query on that connection
$result = mysqli_query($conn,$sql);

//4. show result
while ($row = $result->fetch_assoc()){
    ?>
    <div class="producttext">
        <p><?php echo $row["name"]; ?></p>
        <p><?php echo $row["price"]; ?></p>
    </div>

    <div class="productimg">
        <p><img src="<?php echo $row["image"]; ?>"</p>
    </div>

    <div class="addtocart">
        <form action="addtocart.php" method="post">
            <input name="productID" value="<?php echo $row["id"]; ?>" type="hidden">
            <input name="qty" type="number" placeholder="QTY" min="0">
            <input type="submit" value="Add to cart">
        </form>
    </div>

    <?php
}
