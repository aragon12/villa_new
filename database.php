<?php
if(empty($_POST)) {
    echo "you came directly.. not allowed";
    die();
}
?>

<?php
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
function fetch_ans($conn, $tab_n) {
    $sql = "SELECT ans from ".$tab_n;
    $result = mysqli_query($conn, $sql);
    $ans = array();
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result))
        {
            $ans[] = $row["ans"];
        }
        return $ans;
        
    } else {
        echo "No results";
        return -1;
        
    }
    
}

//fetches questions and options for quiz
//based on quiz type
//generates quiz
function gen_quiz($conn, $tab_n) {
    $sql = "SELECT ques, op_1, op_2, op_3, op_4 from ".$tab_n;
    $result = mysqli_query($conn, $sql);
    $r = 1;
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result))
        {
            $ques_s = "Q-".$r.": ".$row['ques']."<br>";
            echo $ques_s;
            $x = 1;
            while($x < 5) {
                $opt_s = $x.") ".$row['op_'.$x]." <input type=\"radio\" name=\"q".$r."\" value=\"".$x."\"><br>";
                echo $opt_s;
                $x++;
            }
            $r++;
            echo "<br>";
        }
        return 1;
        
    } else {
        echo "No results";
        return -1;
        
    } 
}

?>