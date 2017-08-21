<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18-8-2017
 * Time: 10:26
 */
session_start();

if (isset($_COOKIE["page_count"])) {
    $page_count = $_COOKIE["page_count"] + 1;
} else {
    $page_count = 1;
}
setcookie("page_count", $page_count);


$_POST = array(); //workaround for broken PHPstorm
parse_str(file_get_contents('php://input'), $_POST);

    function calcMultipleNrs($nrs, $calcAct)
    {
        echo "The value of nrs is " . $nrs . "<br />";
        echo "The value of calcAct is " . $calcAct . "<br />";

        $trimString = trim($nrs);
        $splitNrs = split(" ", $trimString);
        $sumResult = 0;

        if ($calcAct == "+" || $calcAct == "-" || $calcAct == "*" || $calcAct == "/") {
            $sumResult = $splitNrs[0];

            for ($i = 1; $i < count($splitNrs); $i++) {
                $toEval = 'return ' . $sumResult . $calcAct . $splitNrs[$i] . ';';
                $sumResult = eval($toEval);

                echo "The value of toEval is " . $toEval . "<br />";
            }
        } elseif ($calcAct == "Average") {
            $sumResult = array_sum($splitNrs) / count($splitNrs);
        } elseif ($calcAct == "Max") {
            for ($i = 0; $i < count($splitNrs); $i++) {
                if ($sumResult < $splitNrs[$i]) {
                    $sumResult = $splitNrs[$i];
                }
            }
        } elseif ($calcAct == "Min") {
            $sumResult = $splitNrs[0];

            for ($i = 1; $i < count($splitNrs); $i++) {
                if ($sumResult > $splitNrs[$i]) {
                    $sumResult = $splitNrs[$i];
                }
            }
        }
        return $sumResult;
    }