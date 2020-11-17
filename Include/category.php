<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

//4. Show Result (In between the 'index.', add the heroku app page or the link to the page.)
while ($row = $result->fetch_assoc()){
    ?>
<li><a href="index.php?category=<?php echo $row["id"]; ?>"<?php echo $row["name"]; ?></a></li>
<?php
}