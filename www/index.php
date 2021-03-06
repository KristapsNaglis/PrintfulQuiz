<?php session_start(); ?>
<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Printful Tests</title>
    <link rel="stylesheet" href="css/mainStyle.css">
    <link rel="stylesheet" href="css/mainStyleMobile.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono|Roboto:300,300i,900" rel="stylesheet">
    <meta id="viewport" name="viewport" content ="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body>

<!-- Main container that holds everything -->
<div class="container">

    <!-- Column where all content stands -->
    <div class="selectionColumn">

        <!-- Homepage main heading -->
        <div class="heading">
            <p id="quizHeading">Testa uzdevums<br>
            <p id="monospace">@printful</p>
        </div>

        <div class="content">

            <!-- Name input field -->
            <form id="nameForm" action="process.php" method="post">
                <div class="name">
                    <input id="inputName" name="inputName" type="text" autocomplete="off">
                </div>

                <!-- Quiz selection field -->
                <div class="quiz">
                    <select name="quizSelect" class="quizSelect">
                        <option value="quiz1" name="quiz1">Quiz 1</option>
                        <option value="quiz2" name="quiz2">Quiz 2</option>
                    </select>
                </div>

                <!-- Button to start the quiz -->
                <div class="start">
                    <div class="startButtonDiv">
                        <input type="submit" name="SubmitName" value="Start Quiz" class="startButton">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
