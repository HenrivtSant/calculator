// Check the form
function checkForm() {
    var fields = ["first_name", "surname", "email", "pizza"];

    var noTextErrorsFound = true;
    var noPizzaErrorsFound = true;

    for (var i = 0; i < fields.length; i++) {

        // get one of the input elements from the field array
        var input = document.getElementsByName(fields[i])[0];

        if (input.type.toLowerCase() === "text") {
            if (input.value === "") {
                noTextErrorsFound = false;
            }
        }
        else if(input.type.toLowerCase() === "radio")
        {
            if (document.querySelector("input[name=pizza]:checked") == undefined) {
                noPizzaErrorsFound = false;
            }
        }

        if (noTextErrorsFound == false) {
            // CSS Styling
            input.style.border = "1px solid red";
            input.style.backgroundColor = "#ff9999";
            input.placeholder = "Please fill in this field.";
        }

        if (noPizzaErrorsFound == false) {
            // CSS Styling
            document.getElementById("pizza").style.border = "1px solid red";
        }
    }

    return noTextErrorsFound && noPizzaErrorsFound ;
}

var request = new XMLHttpRequest();

// Generate a random number
setInterval(function randomNumberAjax() {
    var url = "http://localhost:63342/test/randomnumber.php";

    // Create a connection
    request.onreadystatechange = incomingData;
    request.open("GET", url, true);
    request.send(null);

}, 1000 * 5); // repeat function every 5 seconds

function incomingData() {
    // Display the requested data (from randomNumberAjax(); function)
    if (request.readyState == 4 && request.status == 200) {

        // everything is ok!
        // check for http status code
        document.getElementById("randomDiv").style.visibility="visible";
        document.getElementById("randomNumber").innerHTML = request.responseText;
    }
}