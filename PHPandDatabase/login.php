<?php
$username = $_POST["username"];
$password = $_POST["password"];


echo "username".$username;
echo "password".$password;

// Create a Database Connection:

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
$sql = "select * from users
where username = ".$username." and password = ".$password;


// Execute The Query
$result = mysqli_query($conn, $sql);

if ($result->num_rows == 1){
    echo "you have logged in";
    while ($row = $result->fetch_assoc()) {
        echo $row["id"];
    }
} else {
    echo "wrong username or password";
}

