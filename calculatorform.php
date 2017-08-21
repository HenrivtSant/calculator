<?php session_start();

if (isset($_COOKIE["page_count"])) {
    $page_count = $_COOKIE["page_count"] + 1;
} else {
    $page_count = 1;
}
setcookie("page_count", $page_count);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
</head>
<body>

    <h1>Calculator</h1>
    <?php
    $_POST = array(); //workaround for broken PHPstorm
    parse_str(file_get_contents('php://input'), $_POST);

        if (!(isset($_SESSION["name"]) || isset($_SESSION["email"]))) {
            $_SESSION["name"] = $_POST["usrnm"];
            $_SESSION["email"] = $_POST["mail"];
            $_SESSION["allcalculations"] = array();
        }

        print "User logged in is: {$_SESSION['name']}, with the email address: {$_SESSION['email']}";
        print "<br />Number of views: {$page_count}";
    ?>

    <p>Let's calculate!<br />
    Add a number in both fields and choose the action you want to perform on them.</p>

    <div>
        <form action="calculator.php" method="post">
            <label><input type="number" id="calcField" name="numberOne" placeholder="Enter a number"></label>
            <label><input type="number" id="calcField" name="numberTwo" placeholder="Enter a number"></label>
            <div>
                <label><input type="submit" value="Add" name="calcAction"></label>
                <label><input type="submit" value="Subtract" name="calcAction"></label>
                <label><input type="submit" value="Multiply" name="calcAction"></label>
                <label><input type="submit" value="Devide" name="calcAction"></label>
            </div>
        </form>

        <form action="calculator.php" method="post">
            <label><input type="text" id="calcField" name="calcInput" placeholder="Enter a number"></label>
            <div>
                <label><input type="submit" value="Calculate" name="calculate"></label>
            </div>
        </form>

        <form action="calculator.php" method="post">
            <label><input type="text" id="calcMultiple" name="calcMultipleNrs" placeholder="Enter a row of numbers"></label>
            <div>
                <label><input type="submit" value="+" name="calcAct"></label>
                <label><input type="submit" value="-" name="calcAct"></label>
                <label><input type="submit" value="*" name="calcAct"></label>
                <label><input type="submit" value="/" name="calcAct"></label><br />
                <label><input type="submit" value="Average" name="calcAct"></label>
                <label><input type="submit" value="Max" name="calcAct"></label>
                <label><input type="submit" value="Min" name="calcAct"></label>
            </div>
        </form>

        <!-- Excercise guess the dice -->
        <h3>Guess the dice</h3>

        <form method="post" action="dice.php">
            <input type="hidden" name='secretNumber' value=" <?php echo rand(1,6); ?> "/>
            <label><input type="image" name="guessOfDice" value="1"><img src="http://homeschoolclipart.com/wp-content/uploads/2015/04/Dice1.gif" width="100px"></label>
            <label><input type="image" name="guessOfDice" value="2"><img src="http://homeschoolclipart.com/wp-content/uploads/2015/04/Dice2.gif" width="100px"></label>
            <label><input type="image" name="guessOfDice" value="3"><img src="http://homeschoolclipart.com/wp-content/uploads/2015/04/Dice3.gif" width="100px"></label>
            <label><input type="image" name="guessOfDice" value="4"><img src="http://homeschoolclipart.com/wp-content/uploads/2015/04/Dice4.gif" width="100px"></label>
            <label><input type="image" name="guessOfDice" value="5"><img src="http://homeschoolclipart.com/wp-content/uploads/2015/04/Dice5.gif" width="100px"></label>
            <label><input type="image" name="guessOfDice" value="6"><img src="http://homeschoolclipart.com/wp-content/uploads/2015/04/Dice6.gif" width="100px"></label>
            <!--<br /><br /><label><input type="submit" value="guessOfDice"></label> -->
        </form>
    </div>

    <br /><a href='calculationresults.php'>See all results</a>;

</body>
</html>