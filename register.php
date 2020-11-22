<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$address = $_POST["address"];
$phone = $_POST["phone"];

//1. Connection to Database.
$server = "nba02whlntki5w2p.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbusername = "k4j7jgjpv0fuxdca";
$dbpassword = "ltbt9xigi8kadool";
$dbname = "ntlwav83cf7kfzeb";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

//2. Create A Query
$sql = "INSERT INTO `users`(`id`, `firstname`, `lastname`, `username`, `password`, `address`, `phonenumber`)
VALUES (NULL,'$firstname','$lastname','$username','$password','$address','$phone')";

//3. Run Query
if (mysqli_query($conn, $sql)){
    echo "data has been inserted";
}else{
    echo "data has not been inserted";
}

echo "<a href='index.php'>Home</a>";