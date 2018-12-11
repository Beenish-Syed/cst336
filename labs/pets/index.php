<!DOCTYPE html>
<?php
include 'inc/header.php';
?>
<!--add carousel component -->
<title>
    Pet Carousel
</title>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="inc/styles.css" rel= "stylesheet" type="text/css" />
</head>
    <!-- CAROUSEL ------------------------------------------------------------------->   
    <?php
    include 'dbConnection.php';
    $conn=getDatabaseConnection("pets");
    
    $sql="SELECT pictureURL FROM pets";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $url = $stmt->fetchALL(PDO::FETCH_ASSOC);
    ?>
    
    <div id="petCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php
        for($i=0; $i<sizeof($url);$i++)
        {
            echo "<li data-target='#petCarousel' data-slide-to='$i' class='active'></li>";
        }
        ?>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <?php
        for($i=0;$i<sizeof($url);$i++)
        {
            if($i==0)
            {
                echo "<div class= 'carousel-item active'>";
            }
            else
            {            
                echo "<div class= 'carousel-item'>";
            }
            echo "<img id='carImg' src='img/".$url[$i]['pictureURL']."'>";
            echo "</div>";
        }
        ?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#petCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#petCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
       
<!-- end CAROUSEL ------------------------------------------------------------------->        

<br><br>
<a class="btn btn-primary btn -lg" href="pets.php" role="button">Adopt</a>
<br><br>
<hr>

<?php
include 'inc/footer.php';
?>
