<?php
if(empty($_POST)) {
    echo "you came directly.. not allowed";
    die();
}

$servername = "localhost";
$uname = "root";
$pwd = "";
$dbname = "villa_project";

// Create connection
$conn = mysqli_connect($servername, $uname, $pwd, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}

// fetches answers of quiz
// stores answers in an Array
// returns that array
function fetch_ans($conn, $tab_n) {
    $sql = "SELECT ans from ".$tab_n;
    $result = mysqli_query($conn, $sql);
    $ans = array();
    
    // return if no record found
    if(!mysqli_num_rows($result)) {
        echo "No results";
        return -1;
    }
    
    while($row = mysqli_fetch_assoc($result))
    {
        $ans[] = $row["ans"];
    }
    return $ans;
}

//Fetches Questions and their Answers from DB
//Generates Q & A list
function gen_q_ans($conn, $tab_n) {
    $sql = "SELECT * from ".$tab_n;
    $result = mysqli_query($conn, $sql);
    $r = 1;
    
    //return if no record found
    if(!mysqli_num_rows($result)) {
        echo "No results";
        return -1;
    }

    while($row = mysqli_fetch_assoc($result)) {
        $ques_s = "Q-".$r." ".$row['ques']."<br>";
        $ans_s = "Ans: ".$row["op_".$row['ans']]."";
        echo "<div class=\"qa_cont\">";
        echo $ques_s;
        echo $ans_s;
        echo "</div>";
        $r++;
    }
    return 1;
}

//fetches questions and options for quiz
//based on quiz type
//generates quiz
function gen_quiz($conn, $tab_n) {
    $sql = "SELECT ques, op_1, op_2, op_3, op_4 from ".$tab_n;
    $result = mysqli_query($conn, $sql);
    $r = 1;
    
    //return if no record found
    if(!mysqli_num_rows($result)) {
        echo "No results";
        return -1;
    }

    while($row = mysqli_fetch_assoc($result)) {
        $ques_s = "Q-".$r.": ".$row['ques']."<br>";
        echo "<div class=\"ques_cont\">";
        echo "<div style=\"font-weight:bold\">";
        echo $ques_s;
        echo "</div><div class=\"opt\">";
        $x = 1;
        while($x < 5) {
            $opt_s = $x.") ".$row['op_'.$x]." <input type=\"radio\" name=\"q".$r."\" value=\"".$x."\"><br>";
            echo $opt_s;
            $x++;
        }
        $r++;
        echo "</div></div><br>";
    }
    return 1;
}

?>