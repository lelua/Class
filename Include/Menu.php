<div class="menulist">
    <ul>
        <li><a href="index.php">HOME</a></li>
        <?php include "category.php";?>
        <li><a href="register.php">ABOUT US</a></li>
        <li><a href="cart.php">CART</a></li>
        <?php
        @session_start();
            if (isset($_SESSION["userID"])){
                ?>
                <li><a href="viewOrder.php"My Orders</a></li>
        <?php
            }
        ?>
    </ul>
</div>
