<!-- Load database and start session -->
<?php include 'database.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Printful Tests - Jautajumi</title>
    <link rel="stylesheet" href="css/completeStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,900" rel="stylesheet">
</head>
<body>

<!-- Main container that holds everything -->
<div class="container">

    <!-- "Thank you" message that uses PHP username variable -->
    <div class="thankYouText">Thank you, <?php echo $_SESSION['inputName'] ?></div>

    <!-- Get results -->
    <div class="results">
        <!-- Displaying results that uses PHP SESSION variables -->
        <p>You answered right to <?php echo $_SESSION['score']; ?>
            out of <?php echo $_SESSION['totalQuestions'] ?> questions</p>
        <br>
        <!-- Button that redirects to homepage -->
        <a id="tryAgain" href="index.php">Try Again</a>
    </div>
</div>

</body>
</html>

<?php
//Set variables for use in database table - final_scores
$score = $_SESSION['score'];
$inputName = $_SESSION['inputName'];

//Create query for inserting values into database table
$query = "INSERT INTO `final_scores` ( username , score_final) VALUES ('$inputName' , '$score')";

//Run query
$insert_row = $mysqli->query($query) or die($mysqli->error . __LINE__);

//Clear PHP data
session_destroy();
