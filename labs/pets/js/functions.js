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

//print_r($pets);
?>
