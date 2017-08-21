<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21-8-2017
 * Time: 09:58
 */

session_start();

if (isset($_COOKIE["page_count"])) {
    $page_count = $_COOKIE["page_count"] + 1;
} else {
    $page_count = 1;
}
setcookie("page_count", $page_count);

print "<h1>Calculation Results</h1>";
print "User logged in is: {$_SESSION["name"]}, email is:  {$_SESSION["email"]}";
print "<br />Number of views: {$page_count}";

include "header.html";


?>
<br /><br />
<table>
    <thead>
        <tr>
            <th>calcAction</th>
            <th>Number 1</th>
            <th>Number 2</th>
            <th>Result</th>
        </tr>
    </thead>
    <tbody>
<?php


for ($i = 0; $i < count($_SESSION["allcalculations"]); $i++) {
    ?>
    <br />
    <tr>
        <?php for ($j = 0; $j < count($_SESSION["allcalculations"][$i]); $j++) {
            ?>
            <td><?php echo $_SESSION["allcalculations"][$i][$j]; ?></td>
            <?php
        }
}
?>
    </tr>
    </tbody>
</table>
<?php

echo "<br /><a href='calculatorform.php'>Calculator Form</a>";

include "footer.html";