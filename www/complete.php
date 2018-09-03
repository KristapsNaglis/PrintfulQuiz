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

    <div class="container">
        <div class="thankYouText">Thank you, <?php echo $_SESSION['inputName'] ?></div>

        <div class="results">
            <p>You anwered right to <?php echo $_SESSION['score']; ?>
                out of <?php echo $_SESSION['totalQuestions'] ?> questions</p>
            <br>
            <a id="tryAgain" href="index.php">Try Again</a>
        </div>
    </div>

    </body>
    </html>

<?php
session_destroy();