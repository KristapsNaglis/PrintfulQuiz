<?php session_start(); ?>
<?php include 'database.php'; ?>
<?php

//Reset score if needed
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

//All actions that will happen when user submits an answer
if (isset($_POST['Submit'])) {

    //Create variables
    $number = $_POST['number'];
    $selectedOption = $_POST['option'];
    $next = $number + 1;

    /*
    *  Get total questions
    */

    $query = "SELECT * FROM `questions`";

    //Get results
    $results = $mysqli->query($query) or die($mysqli->error . __LINE__);

    //Total questions
    $total = $results->num_rows;

    //Set total as session variable
    $_SESSION['totalQuestions'] = $total;

    /*
     *  Get correct choice
     */
    $query = "SELECT * FROM `options` WHERE question_id = $number AND options_answer = 1";

    //Get result
    $result = $mysqli->query($query) or die($mysqli->error . __LINE__);

    //Get row
    $row = $result->fetch_assoc();

    //Set correct choice
    $correctOption = $row['options_id'];

    //Add to score if the answer is right
    if ($correctOption == $selectedOption) {
        $_SESSION['score']++;
    }

    /*
     * Insert each answer into database
     */

    //Create variables
    $score = $_SESSION['score'];
    $inputName = $_SESSION['inputName'];

    //Create query for inserting values into database table
    $query = "INSERT INTO `answers` ( username , options_id , score) VALUES ('$inputName' , '$selectedOption' , '$score')";

    //Run query
    $insert_row = $mysqli->query($query) or die($mysqli->error . __LINE__);

    //Check if last question
    if ($number == $total) {
        header("Location: complete.php");
        exit();
    } else {
        header("Location: quiz.php?n=" . $next);
    }
}

//Processing for index page, checking for missing statements and selecting different quizzes
if (isset($_POST['SubmitName'])) {
    $inputName = @$_POST['inputName'];
    $_SESSION['inputName'] = $inputName;

    $quizSelect = @$_POST['quizSelect'];

    $quiz1 = 'quiz1';
    $quiz2 = 'quiz2';

    $_SESSION['inputName'] = $inputName;

    if ($inputName) {
        if ($quizSelect == $quiz1) {
            header("Location: quiz.php?n=1");
        }
        if ($quizSelect == $quiz2) {
            header("Location: quiz2.php?n=1");
        }
    } else {
        echo "<script>
alert('Please Fill All Required Fields');
window.location.href='index.php';
</script>";
    }

}