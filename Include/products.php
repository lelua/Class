<?php


//1. Connection to Database.
$server = "nba02whlntki5w2p.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbusername = "k4j7jgjpv0fuxdca";
$dbpassword = "ltbt9xigi8kadool";
$dbname = "ntlwav83cf7kfzeb";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

//2. Create Query
$sql = "select * from products";

//3. Execute Query on the Connection
$result = mysqli_query($conn,$sql);

//4. Show Result (For This, Change the Names according to the myadmin Category Names and img src.)
while ($row = $result->fetch_assoc()){
    ?>
   <div>
    <p><?php echo $row["name"]; ?></p>
    <p><?php echo $row["price"]; ?></p>
    <p><img src="<?php echo $row["image"]; ?>"</p>
    <form action="addtocart.php" method="post">
        <input name="productID" value="<?php echo $row["id"]; ?>" type="hidden">
        <input name="qty" type="number" placeholder="QTY" min="0">
        <input type="submit" value="Add to cart">
    </form>
    </div>
<?php
}