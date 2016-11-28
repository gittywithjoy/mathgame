<?php
ob_start();
session_start();
?>
    <?php
$correct = $_SESSION["correct"];
$total = $_SESSION["total"];
$leftNum = rand(0,20);
$operators = array('+','-');
$operator = $operators[rand(0,1)];
$rightNum = rand(0,20);
$error = "";
if ($operator == '+'){
    $actualAnswer = $leftNum + $rightNum;
} else {
    $actualAnswer = $leftNum - $rightNum;
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $answer = $_POST["answer"];
    $yourAnswer = $answer;
    $answer = "";
    $theAnswer = $_POST["actualAnswer"];
    if ($yourAnswer == $theAnswer){
    $message = "Correct.";
    $correct = $correct + 1;
    $total = $total + 1;
}  else if(!is_numeric($_POST["answer"])){
        $message = "Please enter a number.";
    }
    else {
    $message = "Incorrect.";
    $total = $total + 1;
}
    $_SESSION["correct"] = $correct;
    $_SESSION["total"] = $total;
    
}



?>

        <!DOCTYPE HTML>
        <html lang="en">

        <head>
            <title>Math Game</title>
            <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
            <meta charset="utf-8" />
        </head>

        <body>
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="post" role="form" class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4">
                            <h1>Math Game</h1></div>
                        <div class="col-sm-4"><a href="index.php" class="btn btn-default btn-sm">Logout</a></div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-sm-offset-3">
                            <?php echo $leftNum?>
                        </label>
                        <label class="col-sm-2">
                            <?php echo $operator?>
                        </label>
                        <label class="col-sm-2">
                            <?php echo $rightNum?>
                        </label>
                        <div class="col-sm-3"></div>
                    </div>

                    <input type="hidden" name="actualAnswer" value="<?php echo htmlspecialchars($actualAnswer);?>" />

                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-4">
                            <input type="text" class="form-control" id="answer" name="answer" value="<?php echo htmlspecialchars($answer);?>" placeholder="Enter answer" size="6">
                        </div>
                        <div class="col-sm-5"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-4">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary btn-sm">
                                Submit</button>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </form>
                <hr />
                <div class="text-center">
                    <p>
                        <?php echo $message ?>
                    </p>
                    <p>Your answer:
                        <?php echo $yourAnswer ?>
                    </p>
                    <p>Actual answer:
                        <?php echo $theAnswer ?>
                    </p>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">Score:
                        <?php echo $correct?> /
                            <?php echo $total?>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </body>

        </html>