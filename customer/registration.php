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
    <title>CUSTOMER REGISTRATION</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        section
        {
            margin-top: 50px;
        }
            .box2
{
    height: 560px;
    width: 450px;
    background-color:black;  
    margin: 0px auto ;
	opacity: .7; 
	color:aliceblue;
    padding: 5px;
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
       <?php
           if (isset($_SESSION['login_user']))
           {?>
             <ul class="nav navbar-nav navbar-right">
             <li> <a href=""> 
            <div style="color: white">
               <?php
           echo "Welcome ".$_SESSION['login_user'];
           ?>
           </div>  
            </a> </li>          
             <li><a href="logout.php">
             <span class="glyphicon glyphicon-log-in" 
             style="color:aliceblue;"> LOG-OUT</span></a></li> 
           </ul>
             <?php
           }
           else
           {?>
            <ul class="nav navbar-nav navbar-right">

            <li><a href="customer_login.php"><span 
            class="glyphicon glyphicon-log-in" 
            style="color:aliceblue;"> LOG-IN</span></a></li> 
           <li><a href="registration.php"><span
            class="glyphicon glyphicon-log-out" 
            style="color:aliceblue;"> SIGN-UP</span></a></li> 
           
      </ul>
      <?php
           }
       ?>
   <!-- <ul class="nav navbar-nav navbar-right">

         <li><a href="customer_login.php"><span class="glyphicon glyphicon-log-in" style="color:aliceblue;"> LOG-IN</span></a></li> 
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out" style="color:aliceblue;"> SIGN-OUT</span></a></li> 
        
   </ul> -->
       </div>
       </nav> 
    
   
            <section>
                
                <div class="reg_img">
                    
                    <div class =" box2" style="text-align:center;">
                        
                        <h1 style="text-align: center;font-size: 35px;color:aliceblue; text-decoration: underline; font-family: Lucida Console;">
                        Car-rental Management System</h1><br>
                        <h1 style = "text-align: center;font-size: 25px; text-decoration: underline;">User Registration Form</h1>
                    <form name="Registration" action="" method="post">
                        
                        <div class="login">
                        
                        <input class="form-control" id="name" placeholder="NAME" type="text"  pattern="[a-zA-Z][a-zA-Z ]{2,}" name="name" title="Number Not Allowed" required=""><br>
                        <input  class="form-control" type="phone" id="phone" name="phone" pattern="\d{10}" min="0" max="9" placeholder="Phone Number" title="Enter Valid Number" required=""><br>
                        <input name="email" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control" placeholder="Email_ID" title="Enter Valid Email_id" id="email" required=""><br>  
                        <input  class="form-control" type="text" name="dl" placeholder="DL_Number" required=""> <br>
                        <input class="form-control"  type="text" name="address" placeholder="Address" required=""><br> 
                       
                        <input class="form-control" type="number" name="pin" placeholder="Pin_Code" required=""><br>
                        <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
                        <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
                        <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px;"></div>
                    </form>
                   
                    </div>
                   
                </div> 
                

                 
            </section>  
            
            <?php
            //check whether the querry is submitted or not
            if(isset($_POST['submit']))
            {
                $count=0;
                $sql="SELECT username FROM customer_details";
                $res=mysqli_query($db,$sql);
                while($row=mysqli_fetch_assoc($res))
                {
                    if($row['username'] ==$_POST['username'])
                    {
                        $count=$count+1;
                    }
                }
                if($count==0)
               {mysqli_query($db,"INSERT INTO `customer_details` Values('$_POST[name]',
               '$_POST[phone]','$_POST[email]','$_POST[dl]','$_POST[address]','$_POST[pin]',
               '$_POST[username]','$_POST[password]');");
             ?>
            <script type="text/javascript">
                alert("Registration successful");
            </script>
            <?php
               }
               else
               {
                   ?>
                <script type="text/javascript">
                alert("The username already exists.");
            </script> 
            <!-- <div class="alert alert-danger" style="text-align:center; width: 700px; margin-left: 300px; 
            background-color:red; color:aliceblue; ">
               <strong>The username already exists. </strong>
           </div> -->
            <?php
               }
            }

            ?>
    <!-- </div> -->
    </body>
    </html>
    