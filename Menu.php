<ul>
    <li><a href="index.php">HOME</a></li>
    <?php include "category.php"; ?>
    <li><a href="">ABOUT US</a></li>
    <li><a href="cart.php">CART</a></li>
    <li><a href="registerForm.html">REGISTER</a></li>
    <?php
    @session_start();
    if (isset($_SESSION["userID"])){
        ?>
        <li><a href="viewOrder.php">MY ORDERS</a></li>
        <?php
    }
    ?>
</ul>
