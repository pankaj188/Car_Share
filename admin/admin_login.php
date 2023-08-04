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
    <title>ADMIN LOGIN</title>
    
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
<!-- 
                 <li><a href="customer_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>  -->
                 <li><a href="index.php"><span class="glyphicon glyphicon-log-out" style="color:aliceblue"> LOG-OUT</span></a></li>
                 <li><a href="registration.php"><span class="glyphicon glyphicon-user" style="color:aliceblue"> SIGN-UP</span></a></li>
            </ul>
                </div>
                </nav> 
   
     
    
    
            <section>
                
                <div class="log_img">
                    <br><br>
                    <div class ="box1">
                        
                        <h1 style="text-align: center;font-size: 35px;color:aliceblue; text-decoration: underline; font-family: Lucida Console;">
                        Car-rental Management System</h1><br>
                        <h1 style = "text-align: center;font-size: 25px; text-decoration: underline;">User Login Form</h1><br>
                    <form name="login" action="" method="post">
                        
                        <div class="login" style="text-align:center;">
                        <input  class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                        <input   class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
                        <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px;"></div>
                    <!-- </form> -->
                    <p style="color:aliceblue; padding-left: 15px;">
                        <br>
                        <a style="color:aliceblue; text-decoration: underline;" href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                        
                        New to this website? &nbsp <a style="color: aliceblue; text-decoration: underline;" href="registration.php">Sign Up</a>
                    </p>
                    </form>
                    </div>
                   
                </div>
                 
            </section>    
     <?php
       
       if(isset($_POST['submit']))
       {
           $count=0;
           $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' 
           && password ='$_POST[password]';");
           $count=mysqli_num_rows($res);

           if($count==0)
           {
               ?>
              <script type="text/javascript">
               alert("The username and password doesn't match.");
               </script> 
                 <!--<div class="alert alert-danger" style="width:
               700px; margin-left: 300px">
               <strong>The username and password doesn't match </strong>
           </div>-->
               <?php
           }
           else
           {
               $_SESSION['login_user'] = $_POST['username'];
               ?>
               <script type="text/javascript">
                   window.location="index.php"
               </script> 
               <!-- <div class="alert alert-danger" style="width: 700px; margin-left: 300px; background-color:red; color:aliceblue;">
               <strong>The username and password doesn't match </strong>
           </div> -->
        <?php
           }
       }
              
     ?>       
    <!-- </div> -->
</body>
</html>