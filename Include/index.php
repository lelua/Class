<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Include Exercise</title>
    <link rel="stylesheet" href="CSS/style.css"
</head>
<body>

<div id="header">
    <?php include "Menu.php"; ?>
    <?php include "headerimage.php"; ?>
</div>

<div id="userpass">
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        <input name="username" type="text" placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <input type="submit" value="Post">
    </form>
    <?php include "login.php"; ?>
</div>

<div id="main"</div>
    <h1>Products</h1>
    <?php include "products.php"; ?>

<div id="footer">Contact Information</div>
</body>
</html>