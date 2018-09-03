var P;

$(document).ready(function () {
    progressBarFill();
});

//Check to see if answer is selected
function validateForm() {
    var option = document.forms["Form"]["option"].value;
    if (option == null || option === "") {
        alert("Please Fill All Required Fields");
        return false;
    }
}

//Calculate percentage for progressbar
function calculatePercentage() {
    P = currentQuestion / totalQuestions;
    P = P * 100;

    return P;
}

//Fill progressbar accordingly to percentage
function progressBarFill() {
    var progress = $("#progress");

    progress.attr("value", calculatePercentage())
}




