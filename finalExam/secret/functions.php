<?php
include 'dbConnection.php';
$conn=getDatabaseConnection("final");

function getData()
{
    global $conn;
    $sql = "SELECT * from fe_login";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $userData = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $userData;
   // print_r($realNames);
    //echo json_encode($realNames);
    
}
/*function checkLock($id)
{
    global $conn;
    $sql = "SELECT studentId from fe_lock WHERE studentId=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $locked = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $locked;
}*/

?>