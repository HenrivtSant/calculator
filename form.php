<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-8-2017
 * Time: 15:01
 */
include "header.html";


$_POST = array(); //workaround for broken PHPstorm
parse_str(file_get_contents('php://input'), $_POST);



$firstName = $_POST["first_name"];
$lastName = $_POST["surname"];
$email = $_POST["email"];
$pizzaChoice = $_POST["pizza"];

$timeOfOrder = date("H,i", strtotime("+0 minutes"));
$timeOfDelivery = date("H:i", strtotime("+ 30 minutes"));
$timeOfOpening = "09:00";
$timeOfClosing = "23:59";

if ($timeOfOrder >= $timeOfOpening && $timeOfOrder <= $timeOfClosing) {
echo "<h3>Welcome {$firstName} !</h3>";
echo "<p>We received the following data from you: </p>";
echo "<p>Firstname: {$firstName}</p>";
echo "<p>Lastname: {$lastName}</p>";
echo "<p>Email: {$email}</p><br />";

echo "<p>You chose the {$pizzaChoice} pizza. Great choice!";
echo "<p>You can expect your pizza at {$timeOfDelivery}";

} elseif ($timeOfOrder <= $timeOfOpening) {
    echo "<p>We are closed now. We will be opened again tomorrow at {$timeOfOpening}.<br />";
    echo "<a href='form.html'>I want to place a new order now.</a>";
}

include "footer.html";
