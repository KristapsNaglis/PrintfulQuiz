<!-- Start session -->
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
        <p>You anwered right to <?php echo $_SESSION['score']; ?>
            out of <?php echo $_SESSION['totalQuestions'] ?> questions</p>
        <br>
        <!-- Button that redirects to homepage -->
        <a id="tryAgain" href="index.php">Try Again</a>
    </div>
</div>

</body>
</html>

<!-- PHP code that clears all the PHP data after loading this final page -->
<?php
session_destroy();