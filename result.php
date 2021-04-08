<?php
if(empty($_POST)) {
    echo "You are coming directly.. not allowed";
    die();
}
?>

<?php
require('./database.php'); 
?>

<?php
function isAnsRight($ans, $rans){
    if($_POST[$ans] == $rans) {
        return true;
    }
    return false;
}
$perf = array('Poor', 'Poor', 'Bad', 'Good', 'Strong', 'Strong');

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
?>

<?php
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
         Performance: <?php echo $perf[$score]; ?>
    </body>
</html>