<?php
include 'inc/header.php';

//this file displays all the pets and their info
function getPetList()
{
    include 'dbConnection.php';
    $conn=getDatabaseConnection("pets");
    
    $sql="SELECT * FROM pets";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $record;
}

//print_r($pets);
?>

<html>
    <head>
        <title>All pets information</title>
        
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="inc/styles.css" rel= "stylesheet" type="text/css" />
    </head>
    <body>
        <div id="ourPets">
            <h1>Our Pets!</h1>
            <br><br>
        <hr>
         </div>
    


<div class='container'>
   <table class="table table-hover table table-bordered">
    
        <thead>
            <tr>
                <td><strong>Pet Name</strong></td>
                <td><strong> Type</strong> </td>
                <td><strong> Adopt </strong></td>
            </tr>
        </thead>
    
    <tbody>
    <?php
    $pets = getPetList();
    foreach($pets as $pet)
    {
        echo "<tr>";
        echo "<td>";
        //echo "Name: ";
        echo "<a href='#' class='petLink' id='".$pet['id']."'>" .$pet['name']."</a><br></td>";
        echo "<td>";
        echo $pet['type']."<br></td>";
        echo "<td>";
        echo "<button id='".$pet['id']."' type='button' class= 'btn btn-primary petLink'>Adopt me!</button>";
        echo "<br></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
echo "</div>";
?>

<script>
    $(document).ready(function(){
        $(".petLink").click(function(){
            $("#petInfoModal").modal("show");
            $("#petInfo").html("<img src='img/loading.gif'>");
            $.ajax({
                type:"Get",
                url:"api/getPetInfo.php",
                dataType: "json",
                data: {"id":$(this).attr('id')},
                success:function(data, status){
                    console.log(data);//for debugging purposes
                    $("#petInfo").html("<img src='img/" + data.pictureURL +"'><br>"+
                                        "Age: "+data.age + "<br>"+
                                        "Breed: " + data.breed +"<br>"+
                                        data.description);
                    $("#petNameModalLabel").html(data.name);
                },
                //complete:function(data, status){
                  //  console.log("CHECKING!!");
                    //console.log(data);
                    
                    //debugging purposes 
                    //alert(status)
                //}
            });//ajax
        });//.petLink click
    });//document.ready
</script>

<!--Modal -->
<div class="modal fade" id="petInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="petNameModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="petInfo"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
<?php
include 'inc/footer.php';
?>
</html>