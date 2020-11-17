<?php
// Take the Post from any Product. Take the Name from the Form Input = "Name".
$productID = $_POST["productID"];
$qty = $_POST["qty"];

//1. Start a Session
@session_start();
//2. get or set session variable
// If i dont have an ordered Products List in my session, I will create one.
    // If Something has Been In Our Shopping Cart Then it Will use this Code.
    if (isset($_SESSION["orderedProductIDs"])){
        $orderedProductIDs = $_SESSION["orderedProductIDs"];
        $orderedProductQtys = $_SESSION["orderedProductQtys"];

    }else{
        // If Nothing in our Shopping Cart Yet Then It will use this Code
        $orderedProductIDs = [];
        $orderedProductQtys = [];
        // array_push after this code.
    }
    // Put the New Ordered Product Lists Back to Session variables.
    $_SESSION["orderedProductIDs"] = $orderedProductIDs;
    $_SESSION["orderedProductQtys"] = $orderedProductQtys;

 // go back to previous page
header('Location '. $_SERVER['HTTP_REFERER']);
