<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHANGE PASSWORD</title>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
    section
    {
        margin-top: 50px;
    }
</style>
</head>

<body>

    
             <nav class="navbar navbar-inverse">
                 <div class="container-fluid">
                     <div class="navbar-header">
               
                
                <a class="navbar-brand active" style="color:aliceblue;">Online Car-rental Management System </a>
            
            </div>    
                <ul class="nav navbar-nav ">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="cars.php">CARS</a></li>
                  
                    <li><a href="feedback.php">FEEDBACK</a></li>
                </ul> 
            <ul class="nav navbar-nav navbar-right" >

                 <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in" style="color:aliceblue" > LOG-IN</span></a></li>  -->
                 <!-- <li><a href="index.php"><span class="glyphicon glyphicon-log-out" style="color:aliceblue"> LOG-OUT</span></a></li> -->
                 <li><a href="registration.php"><span class="glyphicon glyphicon-user" style="color:aliceblue"> SIGN-UP</span></a></li>
            </ul>
                </div>
                </nav> 
   
     
    
    
            <section>
                
                <div class="log_img">
                    <br><br>
                    <div class ="box1">
                        
                        <h1 style="text-align: center;font-size: 35px;color:aliceblue; text-decoration: underline; font-family: Lucida Console;">
                        Change your password</h1><br>
                        
                    <form name="login" action="" method="post">
                        
                        <div class="login">
                        <input  class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                        <input  class="form-control" type="text" name="email" placeholder="Email_ID" required=""> <br>
                        <input   class="form-control" type="text" name="password" placeholder="New Password" required=""> <br>
                        <button class="btn btn-default" type="submit" name="submit" value="Submit" style="color: black; width: 70px; height: 30px;">
                        Update</button>
                    
                    
                     
                    
                    </form>
                    </div>
                    </div>
                    <?php
                    if(isset($_POST['submit']))
                    {
                       if ($sql=mysqli_query($db,"UPDATE `admin` SET password = '$_POST[password]' 
                        WHERE username='$_POST[username]' AND email ='$_POST[email]';"))
                        {
                       ?>
                   <script type="text/javascript">
               alert("The Password updated Sucessfully.");
               </script> 
               <?php
                
                    }
                
                    
                    }
                

                    
                    
                   ?>
                </div>
                 
            </section>     
  
</body>
</html>