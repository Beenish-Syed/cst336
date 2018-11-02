<!DOCTYPE html>
<html>
    <head>
        <title> Guessing Game </title>
    </head>
    <body>
        <form> 
        Guess a Number between 1-100:
        <input type="number" name="userGuess"/>
        <div><br><input type="submit" value="Enter"></div><br>
        </form>
        
 
    <?php
    
    $userGuess = $_GET['userGuess'];

    $turns=0;
    echo "your guess: ".$userGuess;
    echo "</br>";
    $number=rand(1,100);
    echo "number to be guessed: ".$number."</br>";
    while($turns<6)
    {
        checkGuess($number, $userGuess);
        $turns++;
    }

    function checkGuess($number, $userGuess)
    {
        if($number==$userGuess)
        {
            echo "You are correct!";
        }
        else if($number!=$userGuess)
        {
            echo "your guess is wrong.";
        }
    }
    ?>
    </body>
</html>