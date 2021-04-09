<?php
if(empty($_POST)) {
    echo "you came directly.. not allowed";
    die();
}

require('./database.php');

$quiz = $_POST['qtype'];
?>

<html>
    <head>
    <script type="text/javascript">
    function countDown(secs, elem) {
        var disp = document.getElementById(elem);
        disp.innerHTML = secs+"s";
        if(secs < 1) {
        document.forms["easy_quiz"].submit();
        } else {
            secs--;
            setTimeout('countDown('+secs+',"'+elem+'")',1000);
        }
    }
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <style type="text/css">
        table {
            width: 100%;
            border: 1px solid black;
            font-size: 20px;
        }
        td {
            text-align: center;
            padding: 10px 0px 10px 0px;
        }
    </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz</title>
    </head>
    <body>
        <table>
            <tr>
                <td>GK Quiz<br>
                Difficulty: <?php echo $quiz; ?><br>
                Time left: <span style="color: red" id="cdtimer"></span>
            </tr>
        </table>
        <br>
            <script type="text/javascript">countDown(30,"cdtimer");</script>
        <form name="easy_quiz" action="./result.php" method="POST">
    <?php
    gen_quiz($conn, $quiz."_q_ans");
    ?>
         <input type="hidden" name="qtype" value="<?php echo $quiz?>">
         <div style="margin: 0px 10px 10px 0px ;text-align:center; ">
              <input style="padding:10px; font-size:30px" type="submit">
             </div>
        </form>
    </body>
</html>

