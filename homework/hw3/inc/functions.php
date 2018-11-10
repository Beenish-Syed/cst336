<?php
function createCard($holiday, $font, $message, $borderStyle, $sender, $receiver,$style1,$style2)
{
    echo "<div id='card'>";
    switch($holiday)
    {
        case 'christmas':
            echo "<h2>Merry Christmas!</h2>";
            break;
        case 'thanksgiving':
            echo "<h2>Happy Thanksgiving!</h2>";
            break;
        case 'newyear':
            echo "<h2>Happy New Year!!</h2>";
            break;
    }
    $number=rand(1,4);
    $holName=$holiday;
    switch($borderStyle)
    {
        case 'noBorder':
           break;
        case 'plainBorder':
            $bord="solid";
            break;
        case 'borderWithDesign':
            $bord="dotted";
            break;
   }
   if(!empty($style1))
   {
       $style1='&#x2764';
   }
   if(!empty($style2))
   {
       $style2='&#x2764';
   }
        //echo "<div id='imageSide' style='background-image:img/$holName$number.jpg'>";
        echo "<img id='firstCorner' style='border:$bord' src='img/$holName$number.jpg'/>";
        echo "<br>";
        echo "Dear $receiver $style2";
        echo "<p style='font-family:$font'> $message </p>";
       echo "From: $sender $style1";
    echo "</div>";
}