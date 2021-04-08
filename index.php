<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            .btn_con{
                text-align: center;
            }
            .btn{
               font-size: 45px; 
            }
        </style>
        <title>Quiz Home</title>
    </head>
    <body>
        <H1> Select your quiz type:</H1>
        <div class="btn_con">
        <form method="Post" action="./quiz.php">
            <button style="padding: 10px 64px 10px 64px;margin: 0px 0px 20px 0px" class="btn" name="qtype" value="easy">Easy</button><br>
            
            <button style="padding: 10px 29px 10px 29px ;margin: 0px 0px 20px 0px" class="btn" name="qtype" value="medium">Medium</button><br>
            
            <button style="padding: 10px 63px 10px 63px" class="btn" name="qtype" value="hard">Hard</button>
            
        </form>
        </div>
        Instructions:<br>
        • You will get only 30 seconds to attempt all questions.<br>
        • After 30 seconds, your response will be submitted automatically.<br>
        • Do not refresh the browser window. you will loose your quiz.
    </body>
</html>