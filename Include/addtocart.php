<?php
$productID = $_POST["productID"];
$qty = $_POST["qty"];
echo $productID;
echo $qty;
/**
// Take the Post from any Product. Take the Name from the Form Input = "Name".
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$productID = $_POST["productID"];
$qty = $_POST["qty"];

//1. Start a Session
@session_start();
//2. get or set session variable
// If i dont have an ordered Products List in my session, I will create one.
// If Something has Been In Our Shopping Cart Then it Will use this Code.
if (isset($_SESSION["orderedProductIDs"])) {
    $orderedProductIDs = $_SESSION["orderedProductIDs"];
    $orderedProductQtys = $_SESSION["orderedProductQtys"];
    if (in_array($productID, $orderedProductIDs)) {
        $index = array_search($productID, $orderedProductIDs);
        $orderedProductQtys[$index] = $orderedProductQtys[$index] + $qty;

    } else {
        //this situation only happen if there is no same product in our shopping cart
        array_push($orderedProductIDs, $productID); // append one at bottom of the array
        array_push($orderedProductQtys, $qty);
    }
} else {
    //if nothing in our shopping cart yet
    $orderedProductIDs = [];
    $orderedProductQtys = [];
    array_push($orderedProductIDs, $productID); // append one at bottom of the array
    array_push($orderedProductQtys, $qty);
}

// Put the New Ordered Product Lists Back to Session variables.
$_SESSION["orderedProductIDs"] = $orderedProductIDs;
$_SESSION["orderedProductQtys"] = $orderedProductQtys;

// go back to previous page
header('Location ' . $_SERVER['HTTP_REFERER']);
*/