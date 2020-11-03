<?php
// Create a Database Connection
$server = "nba02whlntki5w2p.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbusername = "k4j7jgjpv0fuxdca";
$dbpassword = "ltbt9xigi8kadool";
$dbname = "ntlwav83cf7kfzeb";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

if ($conn->error){
    echo $conn->error;
}else{
    echo "connected";
}

// Write a Query
$sql = "select * from users";

// Execute The Query
$result = mysqli_query($conn, $sql);

// Show Results
while ($row = $result->fetch_assoc()) {
    echo $row["id"];
}
