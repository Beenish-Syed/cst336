<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
    	<style>
        @import url("styles.css");
        </style>
        
    </head>
    <body>
        <div class="jumbotron">
            <h1 id="heading">Login</h1>
        </div>
        <form>
            <input id='username' name="username" type='text' placeholder='enter username' />
            <br><br>
            
            <input id='password' name="password" type='password' placeholder='password' />
        </form>
        <br />
				<br />
				<input id='submit' type='button' value='Login!' />
				<br />
				<br />
		 <div id="accountLocked">
            
        </div>
        <div id="daysLeftPwdChange">
            
        </div>
        <script>
        $(document).ready(function()
            {
                var name;
                $("#username").on('change paste keyup',function()
                {
                    name=$(this).val();
                    $.ajax({
                    type:"Get",
                    url:"checkDaysLeft.php",
                    dataType: "json",
                    data: {"username": name},
                    success:function(data, status)
                                            {
                                                if(data.daysLeftPwdChange>0)
                                                {
                                                $("#daysLeftPwdChange").html("You have "
                                                +data.daysLeftPwdChange+" days left to change your password");
                                                console.log(data,status);}
                                                else if(data.daysLeftPwdChange==0)
                                                {
                                                    $("#daysLeftPwdChange").html("You have to change your password now!");
                                                }
                                            }
                });//ajax
                });//onchange
           
           
            $("#submit").click(function()
                            {
                                var name = $("#username").val();
                                var password = $("#password").val();
                                $.ajax({
                    type:"Post",
                    url:"checkUnamePwd.php",
                    dataType: "json",
                    data: {"username": name, "password":password},
                    success:function(data, status)
                                            {
                                                if(data.lock.length>0)
                                                {
                                                    $("#accountLocked").html("This account is Locked!!");
                                                }
                                                else if(data.result==1)
                                                {
                                                    window.location.href='welcome.php';
                                                }
                                                else if(data.result==0)
                                                {
                                                    $("#accountLocked").html("Incorrect!!");
                                                }
                                                console.log("length of lock="+data.lock.length);
                                                console.log(data);
                                            }
                            });//ajax
                            });  //onclick
                                            // 
                    
            });//document ready
        
        </script>
        
        <table class="table table-bordrered table table-condensed">
        <thead>
        <tr>
            <th>Student Id</th>
            <th>username</th>
            <th>failedAttempts</th>
            <th>daysLeftPwdChange</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'functions.php';
        $info = getData();

        foreach($info as $user)
        {
            echo "<tr>";
            //studentid
            echo "<td>";
            echo $user['studentId'];
            echo "</td>";
            
            //username
            echo "<td>";
            echo $user['username'];
            echo "</td>";
            
            //failed attempts
            echo "<td>";
            echo $user['failedAttempts'];
            echo "</td>";
            
            //days left password change
            echo "<td>";
            echo $user['daysLeftPwdChange'];
            echo "</td>";
        }
        echo "</tbody>";
        echo "</table>";
        ?>
        
    </body>
    
       
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
     <tr style="background-color:green">
      <td>1</td>
      <td>The data from the fe_login table is displayed below the Login form  </td>
      <td width="20" align="center">5</td>
    </tr>
     <tr style="background-color:#FFC0C0">
      <td>2</td>
      <td>The locked Student ids (from the fe_lock table) are displayed  </td>
      <td width="20" align="center">5</td>
    </tr>   
     <tr style="background-color:green">
      <td>3</td>
      <td>The welcome.php file is shown when the user enters the right credentials AND the account is NOT locked.</td>
      <td width="20" align="center">5</td>
    </tr>    
     <tr style="background-color:green">
      <td>4</td>
      <td>After typing the username, the number of days left to change the password is shown in red if the value of daysLeftPwdChange is between 1 and 15</td>
      <td width="20" align="center">10</td>
    </tr>     
     <tr style="background-color:green">
      <td>5</td>
      <td>After typing the username, "You must change your Password NOW" is displayed in red if the value of daysLeftPwdChange is 0</td>
      <td width="20" align="center">10</td>
    </tr>      
     <tr style="background-color:green">
      <td>6</td>
      <td>If the account is NOT locked, the "failedAttempts" field is reset to 0 when the user enters the right credentials.</td>
      <td width="20" align="center">15</td>
    </tr>      
    <tr style="background-color:green">
      <td>7</td>
      <td>The "failedAttempts" field is increased by 1 when entering the wrong password</td>
      <td width="20" align="center">15</td>
    </tr> 
    <tr style="background-color:green">
      <td>8</td>
      <td>A new record is inserted in the "fe_lock" table when the "failedAttempts" field has a value of 3.</td>
      <td width="20" align="center">15</td>
    </tr>  
     <tr style="background-color:green">
      <td>9</td>
      <td>The message "This account is locked" is displayed when the account is locked and entering the right username/password</td>
      <td width="20" align="center">10</td>
    </tr> 
     <tr style="background-color:#99E999">
      <td>10</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>
</html>