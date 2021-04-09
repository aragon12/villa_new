<?php
if(empty($_POST)) {
    echo "You are coming directly.. not allowed";
    die();
}

$quiz = $_POST['qtype'];
require('./database.php'); 

//matches two options
//returns true if they are equal
function isAnsRight($ans, $rans){
    if($_POST[$ans] == $rans) {
        return true;
    }
    return false;
}
$perf = array('Poor', 'Poor', 'Bad', 'Good', 'Strong', 'Strong');

// calculate the user's score
function calcScore($ans_l) {
    $sc = 0;
    for($i = 0; $i < 5; $i++) {
        $kk = "q".($i+1);
        if(isAnsRight($kk, $ans_l[$i])) {
            $sc++;
        }
    }
    return $sc;
}

//fetch answer key and store in any array
$data = fetch_ans($conn, $_POST['qtype']."_q_ans");

$tot = 5;
$score = calcScore($data); 
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz Result</title>
    </head>
    <body>
        <H1 align="center">Result:</H1>
         Right Answers: <?php echo $score ; ?><br>
         Wrong Answers: <?php echo ($tot - $score); ?><br>
         Performance: <?php echo $perf[$score]; ?><br>
         <H2>Correct Answers:</H2>
         <?php gen_q_ans($conn, $quiz."_q_ans"); ?>
    </body>
</html>