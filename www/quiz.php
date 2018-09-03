<?php include 'database.php'; ?>
<?php include 'process.php'; ?>
<?php
//Set question number_format
$number = (int)$_GET['n'];

/*
 * Get Question
 */

$query = "SELECT * FROM `questions`  WHERE question_id = $number";

//Get result
$result = $mysqli->query($query) or die($mysqli->error . __LINE__);

$question = $result->fetch_assoc();


/*
 * Get Options
 */

$query = "SELECT * FROM `options`  WHERE question_id = $number";

//Get result
$choices = $mysqli->query($query) or die($mysqli->error . __LINE__);


/*
*  Get total questions
*/
$query = "SELECT * FROM `questions`";
//Get results
$results = $mysqli->query($query) or die($mysqli->error . __LINE__);

$total = $results->num_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Printful Tests - Jautajumi</title>
    <link rel="stylesheet" href="css/quizStyle.css">
    <link rel="stylesheet" href="css/quizStyleMobile.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,700,300i,900" rel="stylesheet">
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>

</head>
<body>
<script type="text/javascript">
    var currentQuestion = <?php echo $question['question_id']?>;
    var totalQuestions = <?php echo $total?>;
</script>

<div class="container">
    <div class="question">
        <p class="questionText">
            <?php echo $question['question_text']; ?>
        </p>
    </div>

    <div class="options">
        <form onsubmit="return validateForm()" method="post" action="process.php" class="form" id="form" name="Form">
            <ul class="optionsUL" id="options">
                <?php while ($row = $choices->fetch_assoc()): ?>
                    <li>
                        <input id="option" name="option" type="radio" value="<?php echo $row['options_id']; ?>"/>
                        <label> <?php echo $row['options_text'] ?> </label>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="buttonNext">
                <div class="buttonNextWrap">
                    <input type="submit" name="Submit" value="Submit" class="submit">
                </div>
                <div class="progressWrap">
                    <progress max="100" value="0" id="progress"></progress>
                    <p id="progressText"><?php echo $question['question_id']; ?> of <?php echo $total ?></p>
                </div>
            </div>
            <input type="hidden" name="number" value="<?php echo $number; ?>"/>
        </form>
    </div>

<script src="js/quizFunctions.js"></script>
</body>
</html>