<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
    <title>Login page</title>
    <body>
        <form  method="POST" action="loginProcess.php">
            Username: <input type="text" name="username"/><br/><br>
            Password: <input type="password" name="password"/><br/><br>
            <input type="submit" name="submitForm" value="Login!"/>
            <br><br>
            <?php
                //echo "this is the username:".$_POST['username'];
                //echo "this is the password:" .$_POST['password'];
                //print_r($_SESSION['incorrect']);
                //echo "correct session: ". $_SESSION['correct'];
                if($_SESSION['incorrect'])
                {
                    echo "<p class='lead' id='error' style='color:red'>";
                    echo "<strong>Incorrect Username or Password!</strong></p>";
                }
            ?>
        </form>
    </body>
</html>