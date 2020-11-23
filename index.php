<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PetShop New Zealand</title>
    <link rel="stylesheet" href="CSS/style.css"
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,600&display=swap" rel="stylesheet">
</head>
<body>

<div id="login">
    <?php include "login.php"; ?>
</div>

<div id="menu">
    <?php include "Menu.php"; ?>
</div>


<div id="petlogo">
    <?php include "petlogo.php"; ?>
</div>

<div class="container">
    <img src="Images/puppyweb.jpg">
    <h1>WELCOME TO PET SHOP NEW ZEALAND</h1>
    <p>One Stop Shop For All Your Pet Needs</p>

</div>

<div id="products">
    <h1>Products</h1>
    <?php include "products.php"; ?>
</div>

<div id="footer">
    <p>PetShop New Zealand 2020</p>
</div>
</body>
</html>