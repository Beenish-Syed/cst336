<!DOCTYPE html>
<html>
    <head>
    <title> Holiday Card Generator</title>
    <style>
        @import url("css/styles.css");
    </style>
    </head>
    <body>
        <div id="header">
            <h1>Holiday Card Generator</h1>
            <h3>font is <?php echo $_GET['font']?></h3>
        </div>
        <form id="userInput" autocomplete="on">

            Select a Holiday:
            <select name="holiday">
                <option value="">Select One</option>
                <option value="christmas"<?php $holiday=$_GET['holiday'];if (isset($holiday) && $holiday=="christmas") echo "selected";?>>
                    Christmas</option>
                <option value="thanksgiving"<?php $holiday=$_GET['holiday'];if (isset($holiday) && $holiday=="thanksgiving") echo "selected";?>>
                    Thanksgiving</option>
                <option value="newyear"<?php $holiday=$_GET['holiday'];if (isset($holiday) && $holiday=="newyear") echo "selected";?>>
                    New Year</option>
            </select>

            <hr class="hline">

            Pick a font: 
            <br>
            <input type="radio" name="font" id="Pattaya" value="Pattaya"
            <?php $font=$_GET['font'];if (isset($font) && $font=="Pattaya") echo "checked";?>>
            <label id="font1" for="Pattaya">Pattaya</label><br>
            
            <input type="radio" name="font" id="Satisfy" value="Satisfy"
            <?php $font=$_GET['font'];if (isset($font) && $font=="Satisfy") echo "checked";?>>
            <label id="font2" for="Satisfy">Satisfy</label><br>
            
            <input type="radio" name="font" id="Indie Flower" value="Indie Flower"
            <?php $font=$_GET['font'];if (isset($font) && $font=="Indie Flower") echo "checked";?>>
            <label id="font3" for="Indie Flower">Indie Flower</label><br>
            
            <input type="radio" name="font" id="Pacifico" value="Pacifico"
            <?php $font=$_GET['font'];if (isset($font) && $font=="Pacifico") echo "checked";?>>
            <label id="font4" for="Pacifico">Pacifico</label><br><br>
            
            <hr class="hline">

            <br>
            <input id="heartsender" type="checkbox" name="style1" value="heartsender">
            <label for="heartsender">Heart With Your Name</label><br>
            
            <input id ="heartreceiver" type="checkbox" name="style2" value="heartreceiver">
            <label for="heartreceiver">Heart With Receiver's Name</label><br>
            <hr class="hline">
    
             Select a border:
            <select name="borderStyle">
                <option value="">Select One</option>
                <option value="noBorder" <?php $borderStyle=$_GET['borderStyle'];if (isset($borderStyle) && 
                $borderStyle=="noBorder") echo "selected";?>>
                    No Border</option>
                <option value="plainBorder" <?php $borderStyle=$_GET['borderStyle'];if (isset($borderStyle) && 
                $borderStyle=="plainBorder") echo "selected";?>>
                    Plain Border</option>
                <option value="borderWithDesign" <?php $borderStyle=$_GET['borderStyle'];if (isset($borderStyle) && 
                $borderStyle=="borderWithDesign") echo "selected";?>>
                    Dotted Border</option>
            </select>
    
            <br>
            <hr class="hline">
            Enter your name: 
            <input name="sender" type="text" value= "<?php echo $_GET['sender'];?>">
            <br>
            <hr class="hline">
            Enter the receiver's name:
            <input name="receiver" type="text" value= "<?php echo $_GET['receiver'];?>">
        
            <br>
            <hr class="hline">

            Enter your message here:
            <br>
            <textarea placeholder="Enter your message here" form="userInput" name="message" 
            id="messageArea" maxlength="50" ><?php echo $_GET['message'];?></textarea>
            <br><br>
            <input id="createButton" type="submit" value="Create Card"/>
        </form>
        <br>
        <hr class="hline">
        <?php
        include 'inc/functions.php';
        if(empty($_GET['holiday']) || empty($_GET['font']) || strlen(trim($_GET['message']))==0 ||
        empty($_GET['borderStyle'])|| empty($_GET['sender']) || empty($_GET['receiver']))
        {
          
            echo "<h2> Please make sure you have made a selection for all options</h2>";   
            
        }
        else
        {
            $holiday=$_GET['holiday'];
            $font=$_GET['font'];
            $message=$_GET['message'];
            $borderStyle=$_GET['borderStyle'];
            $sender=$_GET['sender'];
            $receiver=$_GET['receiver'];
            $style1=$_GET['style1'];
            $style2=$_GET['style2'];
            createCard($holiday,$font,$message,$borderStyle,$sender,$receiver,$style1,$style2);
        }
        ?>
        
    </body>
</html>