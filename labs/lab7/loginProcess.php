<?php
session_start();
include 'dbConnection.php';

$conn=getDatabaseConnection("ottermart");
$username=$_POST['username'];
$password=sha1($_POST['password']);


//Using double quotes prevents injection
$sql="SELECT * FROM om_admin 
    WHERE username = :username 
    AND password = :password";
    
    $np = array();
    $np[":username"] = $username;
    $np[":password"] = $password;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //checks to see if the admin record exists
    if(empty($record))
    {
        $_SESSION['incorrect']=true;
        header("Location:login.php");
    }
    else
    {
        $_SESSION['incorrect']=false;
        $_SESSION['adminName']=$_SESSION['firstName']." ".$_SESSION['lastName'];
        header("Location:admin.php");
    }
    
?>