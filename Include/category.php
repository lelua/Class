<?php
//1. Connection to Database.
$server = "nba02whlntki5w2p.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbusername = "k4j7jgjpv0fuxdca";
$dbpassword = "ltbt9xigi8kadool";
$dbname = "ntlwav83cf7kfzeb";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

//2. Create Query
$sql = "select * from category";

//3. Execute Query on the Connection
$result = mysqli_query($conn,$sql);

//4. Show Result
while ($row = $result->fetch_assoc()){
    ?>
<li><a href=""><?php echo $row["name"]; ?></a></li>
<?php
}