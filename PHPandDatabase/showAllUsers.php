<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show All Users</title>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>firstname</th>
        <th>lastname</th>
        <th>username</th>
        <th>password</th>
        <th>address</th>
        <th>phone</th>
    </tr>
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
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["firstname"]."</td>";
        echo "<td>".$row["lastname"]."</td>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["password"]."</td>";
        echo "<td>".$row["address"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>