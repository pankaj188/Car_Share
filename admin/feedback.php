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
    <title>FEEDBACK</title>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body
        {
           background-image: url("images/6.jpg") ;
        }
        .wrapper
        {
            padding: 10px;
            margin: 20px auto;
           width:900px;
           height:600px;
           background-color: black;
           opacity: .8;
           color:white;
        }
        .form-control
        {
            height: 70px;
            width: 60%

        }
        .scroll
        {
            width: 100%;
            height: 300px;
            overflow: auto;
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
           <ul class="nav navbar-nav ">
           <li><a  href="customer_details.php">
             Customer-Information
           </a></li>
           </ul>   
               
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

            <li><a href="admin_login.php"><span 
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
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out" style="color:aliceblue;"> SIGN-IN</span></a></li>  -->
        <!-- <li><a href="registration.html"><span class="glyphicon glyphicon-user"> SIGN-UP</span></a></li>  -->
   </ul>
       </div>
       </nav> 
   <div class="wrapper">
       <h4>If you have any suggestions or questions please 
           comment below. </h4>
           <form style="text-align:center;" action="" method="post" >
               <input class="form-control" type="text" 
               name="comment" placeholder="Write something..." required=""><br><br>
               <input class="btn btn-default" type="submit" name="submit"
                value="Comment" style ="width: 100px; height: 35px;">
           </form>
           <br><br>
   
            <div class="scroll">
                <?php
                if(isset($_POST['submit']))
                {
                    $sql= "INSERT INTO `comment` VALUES('','Admin','$_POST[comment]');";
                   if(mysqli_query($db,$sql))
                   {
                       $q="SELECT * FROM `comment` ORDER BY
                       `comment`.`id` DESC";
                       $res=mysqli_query($db,$q);

                       echo "<table class= 'table table-bordered'>";
                       while ($row=mysqli_fetch_assoc($res))
                       {
                           echo "<tr>" ;
                           echo "<td>"; echo $row['username']; echo"</td>";
                                echo "<td>"; echo $row['comment']; echo"</td>";
                           echo "</tr>";
                       }
                   }
                
                else 
                {
                    
                       $q="SELECT * FROM `comment` ORDER BY `comment`.`id` DESC";
                       $res=mysqli_query($db,$q);

                       echo "<table class= 'table table-bordered'>";
                       while ($row=mysqli_fetch_assoc($res))
                       {
                           echo "<tr>" ;
                           echo "<td>"; echo $row['username']; echo"</td>";
                                echo "<td>"; echo $row['comment']; echo"</td>";
                           echo "</tr>";
                       }
                   }
                
                }
                
                
            ?>
        </div> 
         </div>
</body>
</html>
