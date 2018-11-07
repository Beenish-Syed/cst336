<?php
   $backgroundImage="img/sea.jpg";
   if(isset($_GET['keyword']))
   {
       include 'api/pixabayAPI.php';
       $keyword=$_GET['keyword'];
       $imageURLs=getImageURLs($keyword);
      $backgroundImage=$imageURLs[array_rand($imageURLs)];
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title> 
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style> 
            @import url("css/styles.css");
            body
            {
                background-image: url(<?=$backgroundImage?>);
            }
        </style>
    </head>
    <body>
        <br>
        <!-- html form goes here -->
        <?php
        if(!isset($imageURLs))
            echo "<h2> Type a keyword to display a slideshow with random images from Pixbay.com</h2>";
        else
        {
        ?>
            <!-- Display Carousel here-->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!--Indicators here -->
                <ol class="carousel-indicators">
                    <?php
                    for($i=0;$i<7;$i++)
                    {
                        echo "<li data-target='#carousel-example-generic' data-slide-to=' $i'";
                        echo($i==0)?"class='active'": "";
                        echo "></li>";
                    }
                    ?>
                </ol>
                <!--Wrapper for images -->
                <div class="carousel-inner" role="listbox">
                
                    <?php
                    for($i=0;$i<7;$i++)
                    {
                        do{
                            $randomIndex=rand(0,count($imageURLs));
                        }while(!isset($imageURLs[$randomIndex]));
                        echo '<div class="carousel-item';
                        echo ($i==0) ? "active"  :"";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                       
                        //echo "<img src='" . $imageURLs[$i] . "' width='200' >";
                        unset($imageURLs[$randomIndex]);
                    }?>
                </div>
                <!-- Controls here -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
         
        <?php   
        }// ending brace for else
        ?>
        <br> 
        <form>
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            <input type="radio" id="lhorizontal" name="layout" value="horizontal">
            <label for="Horizontal"></label><label for= "lhorizontal">Horizontal</label>
            <input type="radio" id="lvertical" name="layout" value="vertical">
            <label for="Vertical"></label><label for= "lvertical">Vertical</label>
            <select name="category">
                <option value="">Select One</option>
                <option value ="ocean">Sea</option>
                <option>Forest</option>
                <option>Mountain</option>
                <option>Snow</option>
            </select>
            <input type="submit" value="Search"/>
        </form>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>