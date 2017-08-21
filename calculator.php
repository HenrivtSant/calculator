<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-8-2017
 * Time: 10:47
 */

session_start();

if (isset($_COOKIE["page_count"])) {
    $page_count = $_COOKIE["page_count"] + 1;
} else {
    $page_count = 1;
}
setcookie("page_count", $page_count);

include "calcmultiplenrs.php";
include  "header.html";

print "{$_SESSION["name"]}, email is {$_SESSION["email"]} <br />";
print "Number of views: {$page_count} <br />";


$_POST = array(); //workaround for broken PHPstorm
parse_str(file_get_contents('php://input'), $_POST);

// Create calculation functions
function add ($nr1, $nr2) {
    return $nr1 + $nr2;
}

function subtract ($nr1, $nr2) {
    return $nr1 - $nr2;
}

function multiply ($nr1, $nr2) {
    return $nr1 * $nr2;
}

function devide ($nr1, $nr2) {
    return $nr1 / $nr2;
}

$answer = "The result of your calculation is ";

    // First calculator with two input fields
    if (isset($_POST["numberOne"]) && isset($_POST["numberTwo"])) {
        if (is_numeric($_POST["numberOne"]) && is_numeric($_POST["numberTwo"])) {
            $nr1 = $_POST["numberOne"];
            $nr2 = $_POST["numberTwo"];
            $calcAction = $_POST["calcAction"];
            $result = 0;

            if ($calcAction == "Add") {
                $result = add($nr1, $nr2);
                echo $answer . $result;
            } elseif ($calcAction == "Subtract") {
                $result = subtract($nr1, $nr2);
                echo $answer . $result;
            } elseif ($calcAction == "Multiply") {
                $result = multiply($nr1, $nr2);
                echo $answer . $result;
            } elseif ($calcAction == "Devide") {
                $result = devide($nr1, $nr2);
                echo $answer . $result;
            }

            // Here the result are pushed into the session
            $calculation = array($_POST["calcAction"], $nr1, $nr2, $result);

            $allcalculations = array();
            if (isset($_SESSION["allcalculations"])) {
                $allcalculations = $_SESSION["allcalculations"];
            }

            array_push($allcalculations, $calculation);

            $_SESSION["allcalculations"] = $allcalculations;
        } else {
            echo "Please enter a number";
        }
    }

    // Second calculator with one field
    if (isset($_POST["calcMultipleNrs"])) {
        $calcResultOfRow = calcMultipleNrs($_POST["calcMultipleNrs"], $_POST["calcAct"]);
        echo $answer . $calcResultOfRow;
    }


    // Third calculator with one field
    if (isset($_POST["calcInput"])) {
        $calculation = $_POST["calcInput"];
        //echo $calculation;
        $calcResult = eval('return ' . $calculation . ';');
        echo $answer . $calcResult;
    }




echo "<br /><a href='calculatorform.php'>Do another calculation</a>";
echo "<br /><a href='calculationresults.php'>See all results</a>";

include "footer.html";

?>