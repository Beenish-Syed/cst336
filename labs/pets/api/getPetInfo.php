<?php
//retreives all the data from the database for  a specific pet. 
include '../dbConnection.php';
$dbconn = getDatabaseConnection("pets");
$sql = "SELECT *, YEAR(CURDATE()) - yob age FROM pets WHERE id = :id";
$stmt=$dbconn->prepare($sql);
$stmt->execute(array("id"=>$_GET['id']));
$resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultSet);
?>