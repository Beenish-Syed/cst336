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
                if(isset($_SESSION) && $_SESSION['incorrect'])
                {
                    echo "<p class='lead' id='error' style='color:red'>";
                    echo "<strong>Incorrect Username or Password!</strong></p>";
                }
            ?>
        </form>
    </body>
</html>