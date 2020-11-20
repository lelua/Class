<?php
if (isset($_POST["username"]) && isset ($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

// create database connection
    $server = "nba02whlntki5w2p.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbusername = "k4j7jgjpv0fuxdca";
    $dbpassword = "ltbt9xigi8kadool";
    $dbname = "ntlwav83cf7kfzeb";

    $conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

// create a query
    $sql = "select * from users
    where username = '$username' and
    password = '$password'";

// Run a Query
    $result = mysqli_query($conn, $sql);

//Show Results
    if ($result->num_rows == 1) {
        echo "you have logged in ";
        while ($row = $result->fetch_assoc()) {
            echo $row["firstname"];

            //Start a Session
            @session_start();

            //Set a Session Variable
            $_SESSION["userID"] = $row["id"];
            $_SESSION["firstname"] = $row["firstname"];

        }
    } else {
        echo "wrong username or password";
    }
}

if (!isset($_SESSION["userID"])) {
    ?>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        <input name="username" type="text" placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <input type="submit" value="Post">
    </form>
    <?php
}else{

    echo '<a href="logout.php">LOGOUT</a>';
    echo "<a href='index.php'>BACK TO HOME</a>";

}
?>