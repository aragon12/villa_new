<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
        body{
            /*background-color:#26A69A;*/
            background-color: #03A9F4;
            color: white;
            padding: 20px 0px 0px 0px;
        }
        .btn_con{
            text-align: center;
        }
        .btn{
            background-color: inherit;
            font-size: 45px;
            border:none;
            color: white;
            box-shadow: 0 3px 4px 0 rgba(0,0,0,0.14), 0 3px 3px -2px rgba(0,0,0,0.12), 0 1px 8px 0 rgba(0,0,0,0.20);

        }
        .inst_cont{
            border: none;
            color: white;
            padding: 15px;
            margin: 25px 0px 0px 0px;
            box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.20);
        }
        .inst{
            line-height:1.5;
            padding: 0px 0px 0px 5px;
        }
        </style>
        <title>Quiz Home</title>
    </head>
    <body>
        <H1 align="center"> Select your quiz type</H1>
        <div class="btn_con">
        <form method="Post" action="./quiz.php">
            <button style="padding: 10px 64px 10px 64px;margin: 0px 0px 20px 0px" class="btn" name="qtype" value="easy">Easy</button><br>
            
            <button style="padding: 10px 29px 10px 29px ;margin: 0px 0px 20px 0px" class="btn" name="qtype" value="medium">Medium</button><br>
            
            <button style="padding: 10px 63px 10px 63px" class="btn" name="qtype" value="hard">Hard</button>
            
        </form>
        </div>
        <div class="inst_cont">
            <div style="font-size: 25px;font-weight:bold;">Instructions:</div><br>
            <div class="inst">
                • You will get only 30 seconds to attempt all questions.<br>
                • After 30 seconds, your response will be submitted automatically.<br>
                • Do not refresh the browser window. you will loose your quiz.
            </div>
        </div>
    </body>
</html>