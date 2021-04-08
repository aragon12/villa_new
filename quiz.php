<?php
if(empty($_POST)) {
    echo "you came directly.. not allowed";
    die();
}

$quiz = $_POST['qtype'];
?>

<html>
    <head>
    <script type="text/javascript">
    function countDown(secs, elem) {
        var disp = document.getElementById(elem);
        disp.innerHTML = secs;
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz</title>
    </head>
    <body>
        You have
            <span id="cdtimer"></span>
            <script type="text/javascript">countDown(30,"cdtimer");</script> second left.<br><br>
        <form name="easy_quiz" action="./result.php" method="POST">
    <?php
    require('./quiz/'.$quiz.'_q.php');
    ?>
         <input type="hidden" name="qtype" value="<?php echo $quiz?>">
        <input type="submit">
        </form>
    </body>
</html>

