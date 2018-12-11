<?php
include 'dbConnection.php';
$dbconn=getDatabaseConnection("final");
$username=$_GET['username'];

$sql = "SELECT daysLeftPwdChange from fe_login WHERE username = '$username'";

$stmt=$dbconn->prepare($sql);
$stmt->execute($np);
$resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultSet);
?>