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
        body {
            background:#26A69A;
            color: white;
        }
        .ques_cont {
            padding: 15px;
            font-size: 20px;
            box-shadow: 0 3px 4px 0 rgba(0,0,0,0.14), 0 3px 3px -2px rgba(0,0,0,0.12), 0 1px 8px 0 rgba(0,0,0,0.20);
        }
        .opt {
            font-size: 20px;
            line-height: 1.5;
            padding: 10px 8px 5px 8px;
        }
        .top_cont {
            text-align: center;
            padding: 20px 0px 20px 0px;
            font-size: 25px;
            box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.20);
        }
        .btn{
            background-color: #03A9F4;
            font-size: 45px;
            border:none;
            color: white;
            box-shadow: 0 3px 4px 0 rgba(0,0,0,0.14), 0 3px 3px -2px rgba(0,0,0,0.12), 0 1px 8px 0 rgba(0,0,0,0.20);

        }
    </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz</title>
    </head>
    <body>
        <div class="top_cont">
            GK Quiz<br>
            Difficulty: <?php echo $quiz; ?><br>
            Time left: <span style="color: #ef5350" id="cdtimer"></span>
        </div>
        <br>
            <script type="text/javascript">countDown(30,"cdtimer");</script>
        <form name="easy_quiz" action="./result.php" method="POST">
    <?php
    gen_quiz($conn, $quiz."_q_ans");
    ?>
         <input type="hidden" name="qtype" value="<?php echo $quiz?>">
         <div style="margin: 0px 10px 10px 0px ;text-align:center; ">
              <input style="padding:10px; font-size:30px" class="btn" type="submit">
             </div>
        </form>
    </body>
</html>

