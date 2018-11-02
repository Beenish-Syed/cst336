<!DOCTYPE html>
<html>
    <head>
        <title>Roll Die</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        
        <div id="banner">
            <img id="leftImage" src="img/Dice.jpg" alt="rolling Dice"/>
            <h1 id="banner">Roll Die</h1>
        </div id="main">
            <hr/>
            <?php
            include 'inc/functions.php';
            
                //Global variables
                $player1Array=array();
                $player2Array=array();
                $player1Total=0;
                $player2Total=0;
                play();
            ?>
            </br>
            <div id="button">
            <form>
                    <input type="submit" value="Play Again!"/>
            <form/>
            </div>
        </div>
    </body>
</html>