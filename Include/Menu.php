<ul>
    <li><a href="index.php">Home</a></li>
    <?php include "category.php";?>
    <li><a href="AboutUs.php">About Us</a></li>
    <li><a href="cart.php">Cart</a></li>
    <li>include "login.php";</li>
    <?php
    @session_start();
        if (isset($_SESSION["userID"])){
            ?>
            <li><a href="viewOrder.php"My Orders</a></li>
    <?php
        }
    ?>
</ul>