<?php
include 'dbConnection.php';

$conn=getDatabaseConnection("final");
$username=$_POST['username'];
$password=sha1($_POST['password']);


$sql="SELECT * FROM fe_login WHERE username = :username"; //AND password = :password";
    $np = array();
    $np[":username"] =$username;
   // $np[":password"] =$password;
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
  
    
    
    $id=$record['studentId'];
    
    if($record['password']!=$password)
    {
        
       //print_r("WRONG PASSWORD");
        $sqlu="UPDATE fe_login SET failedAttempts=failedAttempts+1 WHERE studentId=$id";
        $stmtu = $conn->prepare($sqlu);
        $stmtu->execute();
        
        $checkFail ="SELECT failedAttempts FROM fe_login WHERE studentId=$id";
        $st = $conn->prepare($checkFail);
        $st->execute();
        $failedAttemps = $st->fetch(PDO::FETCH_ASSOC);
       // print_r($failedAttemps);
        //print_r($failedAttemps['failedAttempts']);
        if($failedAttemps['failedAttempts']>3)
        {
            $setAttempts ="INSERT INTO fe_lock VALUES ($id, NULL)";
            $st = $conn->prepare($setAttempts);
            $st->execute();
        }
        $record+=array("result"=>0);
    }
    else{
        $sqlupdate="UPDATE fe_login SET failedAttempts=0 
                WHERE studentId=$id";
        $stmtupdate = $conn->prepare($sqlupdate);
        $stmtupdate->execute();
        $record+=array("result"=>1);
    }

    //}

$sqll="SELECT studentId FROM fe_lock WHERE studentId=$id";
$stmtt = $conn->prepare($sqll);
$stmtt->execute();
$lock=$stmtt->fetchALL(PDO::FETCH_ASSOC);
$record+=array("lock"=>$lock);


echo json_encode($record);
    
?>