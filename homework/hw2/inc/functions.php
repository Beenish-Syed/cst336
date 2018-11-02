<?php
function play()
{
    global $player1Array;
    global $player2Array;
   // global $player1Total;
    //global $player2Total;
    
    $rounds=5;
    while($rounds>-1)
    {
        $player1Array[$rounds]=rollDie();
        $player2Array[$rounds]=rollDie();
        $rounds--;
    }
    $count=0;
            
    displayRolls();
    $winner=findWinner();
    echo "<hr/>";
    echo "<br/>";
    echo "<br/>";
    
    displayWinner($winner);
    highestRoll();
}
        
function displayRolls()
{
    echo "<div class='display'>";
    global $player1Array;
    global $player2Array;
    global $player1Total;
    global $player2Total;
  
    echo "Player1 - rolls: ";
    for($i=0;$i<count($player1Array);$i++)
    {
        echo  " ".$player1Array[$i];
    }
    $player1Total=array_sum($player1Array);
    echo " ----- Total: ".$player1Total."</br>";
            
    echo "Player2 - rolls: ";
    for($i=0;$i<count($player2Array);$i++)
    {
        echo  "  ".$player2Array[$i];
    }
     
    $player2Total=array_sum($player2Array);
    echo " ----- Total: ". $player2Total ."</br>";
    echo "</div>";
}
            
function findWinner()
{
    global $player1Total;
    global $player2Total;
    if($player1Total>$player2Total)
    {
        return 1;
    }
    else if($player1Total<$player2Total)
    {
        return 2;
    }
    else if($player1Total==$player2Total)
    {
        return 0;
    }
}
function displayWinner($winner)
{
    echo "<div class='display'>";
    switch($winner)
    {
        case 0:
        echo "It's a Draw";
        break;
        case 1:
        echo "Player1 wins!";
        break;
        case 2:
        echo "Player2 wins!";
        break;
    }
    echo "</div>";
}
function highestRoll()
{
    global $player1Array;
    global $player2Array;
    sort($player1Array);
    sort($player2Array);
    echo "<div class='display'>";
    echo "Highest roll by player1: ". $player1Array[count($player1Array)-1]."</br>";
    echo "Highest roll by player2: ". $player2Array[count($player2Array)-1];
    echo "</div>";
    
    
}
function rollDie()
{
    $die1=rand(1,6);
    $die2=rand(1,6);
    $total=$die1+$die2;
    return $total;
}
?>