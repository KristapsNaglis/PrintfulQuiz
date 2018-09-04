//Create variable for holding percentage
var P;

//Fill progressbar accordingly to what the percentage is
$(document).ready(function () {
    progressBarFill();
});

//Check to see if answer is selected
function validateForm() {
    
    //Create variable for holding value of form - #Form, and input - option
    var option = document.forms["Form"]["option"].value;

    //If statement to check if any of radio buttons are checked
    if (option == null || option === "") {
        alert("Please Fill All Required Fields");
        return false;
    }
}

//Calculate percentage for progressbar
function calculatePercentage() {

    //Formula for calculating percentage
    P = (currentQuestion / totalQuestions) * 100;

    //Return percentage variable
    return P;
}

//Fill progressbar accordingly to percentage
function progressBarFill() {

    //Create variable for progressbar - #progress
    var progress = $("#progress");

    //Change the value of progressbar accordingly to the percentage
    progress.attr("value", calculatePercentage())
}




