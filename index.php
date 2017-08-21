<!DOCTYPE html>
<>
    <head>
        <title>PHP Excercises</title>
    </head>


    <>
        <h1>PHP Excersises</h1>
        <?php
        $_POST = array(); //workaround for broken PHPstorm
        parse_str(file_get_contents('php://input'), $_POST);

        // Excersise 1: PHP Calculator
        echo "<h3>Exercise 1: PHP Calculator</h3>";
        print "Hello PHP Calculator<br />";
        echo "<hr /><br />";

        // Excersise 2: Variables and Operators
        echo "<h3>Excersise 2: Variables and Operators</h3>";
            $nr1 = 16;
            $nr2 = 23;

            echo "\$nr1 + \$nr2 = " . ($nr1 + $nr2) . "<br />";
            echo "\$sum = \$nr1 + \$nr2" . $sum = $nr1 + $nr2 . "<br />";
            echo "\$sum = " . $sum;
            echo "\$sum *= (\$nr1 * \$nr2) = " . $sum *= ($nr1 * $nr2) . "<br />";

            echo "<hr /><br />";

        // Excersise 3: Functions and Scope
        echo "<h3>Excersise 3: Functions and Scope</h3>";
            print "The time is now " . date("r") . "<br /><br />";

            // Variables
            global $firstName;
            global $lastName;
            $firstName = "Pipo";
            $lastName = "the Clown";


            // Create calculation functions
            function add ($nr1, $nr2) {
                global $firstName;
                global $lastName;
                static $nrCalls = 0;
                $nrCalls++;
                print "Add function is called {$nrCalls} times by {$firstName} {$lastName}.<br />";
                return $nr1 + $nr2;
            }

            function subtract ($nr1, $nr2) {
                global $firstName;
                global $lastName;
                static $nrCalls = 0;
                $nrCalls++;
                print "Subtract function is called {$nrCalls} times by {$firstName} {$lastName}.<br />";
                return $nr1 - $nr2;
            }

            function multiply ($nr1, $nr2) {
                global $firstName;
                global $lastName;
                static $nrCalls = 0;
                $nrCalls++;
                print "Multiply function is called {$nrCalls} times by {$firstName} {$lastName}.<br />";
                return $nr1 * $nr2;
            }

            function divide ($nr1, $nr2) {
                global $firstName;
                global $lastName;
                static $nrCalls = 0;
                $nrCalls++;
                print "Divide function is called {$nrCalls} times by {$firstName} {$lastName}.<br />";
                return $nr1 / $nr2;
            }

            // Execute calculations in variables to use later on
            $addresult = add(1, 5);
            $subtractresult = subtract(1, 5);
            $multiplyresult = multiply(1, 5);
            $divideresult = divide(1, 5);

            // Echo the results on the screen
            echo "<h5>Let/'s add 1 and 5</h5>";
            echo "<p>The result is: {$addresult}.</p><br />";

            echo "<h5>Let/'s subtract 1 and 5</h5>";
            echo "<p>The result is: {$subtractresult}.</p><br />";

            echo "<h5>Let/'s multiply 1 and 5</h5>";
            echo "<p>The result is: {$multiplyresult}.</p><br />";

            echo "<h5>Let/'s divide 1 and 5</h5>";
            echo "<p>The result is: {$divideresult}.</p><br />";

            echo "<hr /><br />";

        // Extra excercise 4: More working with variables
        echo "<h3>Extra excercise 4: More working with variables</h3>";
            $name = "Albert Einstein";
            print "Hello World";
            print "<p>My name is $name</p>";

            print "<p>Here you can:</p>";
                print "<ul>";
                    print "<li>Find information about $name</li>";
                    print "<li>Find books about $name</li>";
                    print "<li>Find films starring $name</li>";
                    print "<li>Find videos by $name</li>";
                print "</ul>";

        echo "<hr /><br />";

        // Extra excercise 5: Passing variables into the script via URL
        echo "<h3>Extra excercise 5: Passing variables into the script via URL</h3>";
            if (isset($_GET["name"])) {
                $name = $_GET["name"];
                print "Hello $name";
                print "<br />My, you are looking good today!";
            }
            else {
                print "\$_GET['name'] is not set";
            }

        echo "<hr /><br />";

        // Extra excercise 6: Passing more than one variable
        echo "<h3>Extra excercise 6: Passing more than one variable</h3>";
            $colour =@$_GET['colour'];

            $name =@$_GET['name'];

            $name = "<span style='color:$colour'>$name</span>";

            print "Hello World!";
            print "<p>My name is $name</p>";

            print "<p>Here you can:</p>";
                print "<ul>";
                    print "<li>Find information about $name</li>";
                    print "<li>Find books about $name</li>";
                    print "<li>Find films starring $name</li>";
                    print "<li>Find videos by $name</li>";
                print "</ul>";

        echo "<hr /><br />";

        // Extra excercise 8: An interactive page with user defined style
        echo "<h3>Extra excercise 8: An interactive page with user defined style";
        if (isset($_GET['colour'])) {
            $colour = $_GET["colour"];

            print "<div style='background-color: $colour'>";
            print "<p>Change background color</p>";
            print "<a href='index.php?colour=red'>Red</a><br />";
            print "<a href='index.php?colour=green'>Green</a><br />";
            print "<a href='index.php?colour=blue'>Blue</a><br />";
            print "<a href='index.php?colour=yellow'>Yellow</a><br />";
            print "<a href='index.php?colour=white'>White</a><br />";
            print "<a href='index.php?colour=black'>Black</a><br />";
            print "</div>";
        } else {
            print "<br /> \$_GET['colour'] is not set";
        }

        echo "<hr /><br />";

        // Control structures
        // Excercise 1: Control Structures
        echo "<h2>Control Structures</h2>";
        echo "<h3>Excercise 1: Control Structures</h3>";
            error_reporting(E_ALL);

            if (!isset($_GET['name'])) {
                ?>
                <form method="get" action="">
                    <label><input type="textbox" name="name" value=""></label>
                    <label><input type="submit" value="Send"></label><br/><br/>
                </form>
                <?php
            } else {
                $name = $_GET['name'];
                print "Hello <strong>$name</strong>";
                print "<br />My goodness <strong>$name</strong>, you are looking good today!";
            }

        echo "<hr /><br />";

        // Excercise 2: Using Comparison Operators
        echo "<h3>Excercise 2: Using Comparison Operators</h3>";
            error_reporting(E_ALL);

            if (!isset($_GET['name'])) {
                ?>
                <form method="get" action="">
                    <label><input type="textbox" name="name" value=""></label>
                    <label><input type="submit" value="Send"></label><br/><br/>
                </form>
                <?php
            } elseif ($_GET['name'] == 'Henri') {
                $name = $_GET['name'];
                print "<p>What an amzing name, <strong>$name</strong></p>";
                print "<br /><p>You must be a true superstar, <strong>$name</strong>, unrivalled among your peers!</p>";
            } else {
                $name = $_GET['name'];
                print "Hello <strong>$name</strong>";
                print "<br />My goodness <strong>$name</strong>, you are looking good today!";
            }

        echo "<hr /><br />";

        // Excercise 3: Logical Operators
        echo "<h3>Excercise 3: Logical Operators</h3>";
            error_reporting(E_ALL);

            if (!isset($_GET['send'])) {
                ?>
                <form method="get" action="">
                    <label>Enter Forename: <input type="textbox" name="forename" value=""></label><br />
                    <label>Enter Last name: <input type="textbox" name="lastname" value=""></label><br />
                    <label><input type="submit" name="send" value="Send"></label>
                </form>
                <?php
            } elseif (empty($_GET['forename']) || empty($_GET['lastname'])) {
                print "<p>Please enter both a forename and a lastname</p><br />";
                print "<a href='index.php'>Go back</a>";
            } else {
                print "<p>Forename: " . $_GET['forename'] . "</p>";
                print "<p>Last name: " . $_GET['lastname'] . "</p>";
            }

        echo "<hr /><br />";

        // Excercise 4: Switch
        echo "<h3>Excercise 4: Switch</h3>";
        error_reporting(E_ALL);

        if (!isset($_POST['name'])) {
            ?>
            <form method="post" action="index.php">
                <label><input type="textbox" name="name" value=""></label>
                <label><input type="submit" value="Send"></label><br/><br/>
            </form>
            <?php
        } else {
            $name = $_POST['name'];
            switch ($name) {
                case "Henri":
                    echo "$name is a great name";
                    break;
                case "Piet":
                    echo "$name is een Hollandse naam";
                    break;
                default:
                    echo "Hi $name, have you seen Henri around?";
                    break;
            }
        }

        echo "<hr /><br />";

        // Functions
        // Extra excercise 1: Functions
        echo "<h2>Functions</h2>";
        // Date page was last modified
        date_default_timezone_set('UTC');
        echo "Page was last modified on: " . date("F d Y H:i:s.", getlastmod());


        echo "<h3>Excercise 1: Functions";
            ?>
            <form method="post" action="">
                <label><input type="textbox" name="sentence" placeholder="Fill in some text here"></label>
                <label><input type="submit" name="submit" value="Submit"></label>
            </form>
            <?php

            if (isset($_POST["sentence"])) {
                if (strpos($_POST["sentence"], "Henri") === false) {
                    print $_POST["sentence"];
                } else {
                    print "<p>I see you mentioned my name</p>";
                    print $_POST["sentence"];
                }
            }

            ?>
            <form method="post" action="">
                <label><input type="textbox" name="startSentence" placeholder="Fill in a sentence"></label>
                <label><input type="textbox" name="replaceWord" placeholder="Fill in a word to change"></label>
                <label><input type="textbox" name="replaceValue" placeholder="What to change into?"></label>
                <label><input type="submit" name="submit" value="Submit"></label>
            </form>
            <?php

            if (isset($_POST["startSentence"]) && isset($_POST["replaceWord"]) && isset($_POST["replaceValue"])) {
                print $_POST["startSentence"]. "<br />";
                print str_replace($_POST["replaceWord"], $_POST["replaceValue"], $_POST["startSentence"]);
            } else {
                print "Please fill in all the fields";
            }

        echo "<hr /><br />";



        ?>


    </body>


</html>
