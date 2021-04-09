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
function calcScore($ans_l, $q_c) {
    $sc = 0;
    for($i = 0; $i < $q_c; $i++) {
        $kk = "q".($i+1);
        if(isAnsRight($kk, $ans_l[$i])) {
            $sc++;
        }
    }
    return $sc;
}

//fetch answer key and store in any array
$data = fetch_ans($conn, $_POST['qtype']."_q_ans");

$tot = count($data);
$score = calcScore($data, $tot);
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
    body{
        background: #FF9800;
        color: white;
    }
    td {
        padding: 15px;
        width: 50%;
    }
    table {
        width: 100%;
        box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.20);
        font-size: 20px;
    }
    .qa_cont {
        border: none;
        margin: 10px 0px 0px 0px;
        font-size: 20px;
        padding: 10px;
        box-shadow: 0 3px 4px 0 rgba(0,0,0,0.14), 0 3px 3px -2px rgba(0,0,0,0.12), 0 1px 8px 0 rgba(0,0,0,0.20);
    }
    </style>
        <title>Quiz Result</title>
    </head>
    <body>
        <table>
            <tr>
                <td style="text-align: center; font-weight: bold;border-bottom: 1px solid black" colspan=2>Result
            </tr>
            <tr>
                <td style="color: green">Right Answers:
                <td><?php echo $score ; ?><br>
            </tr>
                <td style="color: red">Wrong Answers:
                <td><?php echo ($tot - $score); ?><br>
            </tr>
            <tr>
                <td>Performance:
                <td><?php echo $perf[$score]; ?><br>
            </tr>
            <tr>
                <td>Difficulty:
                <td><?php echo ucwords($quiz); ?>
            </tr>
        </table>
         <H2>Correct Answers:</H2>
         <?php gen_q_ans($conn, $quiz."_q_ans"); ?>
         <div style="margin: 5px 0px 0px 0px;text-align: center;font-size: 25px">
             <a href="/">Home</a>
         </div>
    </body>
</html>