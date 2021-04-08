<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "villa_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}

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
?>