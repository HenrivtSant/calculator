<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-8-2017
 * Time: 14:31
 */

session_start();

if (isset($_COOKIE["page_count"])) {
    $page_count = $_COOKIE["page_count"] + 1;
} else {
    $page_count = 1;
}
setcookie("page_count", $page_count);

print "{$_SESSION["name"]}, email is {$_SESSION["email"]}";
print "Number of views: {$page_count}";

$_POST = array(); //workaround for broken PHPstorm
parse_str(file_get_contents('php://input'), $_POST);


// Excercise guess the dice
echo "<h3>Guess the dice</h3>";

    if (isset($_POST['guessOfDice'])) {
        $dice = intval($_POST['secretNumber']);
        $guessOfDice = $_POST['guessOfDice'];

        if ($guessOfDice == $dice) {
            echo "You guessed correct!";
            echo "The value of the computer was $dice and you also chose $guessOfDice";
        } else {
            echo "You guessed wrong<br />";
            echo "The value of the computer was $dice and you chose $guessOfDice";
        }
    } else {
        echo "Er is geen waarde aangeklikt<br />";
    }

    echo "<br /><a href='calculator.php'>Probeer opniew</a>";
