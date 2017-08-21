<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18-8-2017
 * Time: 15:26
 */
if (isset($_COOKIE["page_count"])) {
    $page_count = $_COOKIE["page_count"] + 1;
} else {
    $page_count = 1;
}
setcookie("page_count", $page_count);

print "Number of views: {$page_count}";


// Excercise 7: Sessions and Cookies
echo "<h3>Excercise 7: Sessions and Cookies</h3>";
?>
<form method="post" action="calculatorform.php">
    <label><input type="textbox" name="usrnm" placeholder="Username"></label>
    <label><input type="textbox" name="mail" placeholder="Email"></label>
    <label><input type="submit" name="submit" value="Submit"></label>
</form>
<?php

