<?php
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
$pets = getPetList();
//print_r($pets);
foreach($pets as $pet)
{
    echo "Name: ";
    echo "<a href='#' class='petLink' id='".$pet['id']."'>" .$pet['name']."</a><br>";
    echo "Type: ". $pet['type']."<br>";
    echo "<button id='".$pet['id']."' type='button class= 'btn btn-primary petlink'>Adopt me!</button>";
    echo "<hr><br>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                    console.log(data);
                    console.log("hello!!");
                    $("#petInfo").html("img src='img/" + data.pictureURL +"'><br>"+
                                        "Age: "+data.age + "<br>"+
                                        "Breed: " + data.breed +"<br>"+
                                        data.description);
                    $("#petNameModalLabel").html(data.name);
                },
                complete:function(data, status){
                    //debugging purposes 
                    //alert(status)
                }
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
                <button type="button" class="close" data-dismiss="modal" ara-label="close">
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




