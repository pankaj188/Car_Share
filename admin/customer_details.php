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
    <title>CUSTOMER INFORMATION</title>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .srch
        {
            padding-left:1200px;
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
  
       </div>
       </nav> 
       <!-- ____________________search bar________________-->
       <div class="srch">
           <form class="navbar-form" method="post" name="form1">
                
                    <input class="form-control" type="text" name="search" placeholder="Customer username.." required="">
                    <button style="background-color:  #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                
           </form>
           <form class="navbar-form" method="post" name="form1">
                
                <input class="form-control" type="text" name="dl" placeholder="Customer DL Number" required="">
                <button style="background-color:  #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">
                Delete
                    
                </button>
            
       </form>
       </div>
    <h2 style="text-align: center;font-size: 35px;color:black; text-decoration: underline; ">
    List of Customers:-</h2>
    <?php
       
       if(isset($_POST['submit']))
       {
          $q=mysqli_query($db,"SELECT name, phone, email, dl, address, pin, username FROM `customer_details` 
         WHERE username LIKE '%$_POST[search]%' ");
        
          if(mysqli_num_rows($q)==0)
          {
            echo "Sorry!! No Customer found with that username.
             Try searching again.";
          }
          else
          {
             
              echo "<table class='table table-bordered table-hover' >";
              echo "<tr style='background-color: #6db6b9e6;'>";

            echo "<th>"; echo "Name"; echo "</th>";
            echo "<th>"; echo "Phone Number"; echo "</th>";
            echo "<th>"; echo "Email_ID"; echo "</th>";
            echo "<th>"; echo "DL_Number"; echo "</th>";
            echo "<th>"; echo "Address"; echo "</th>";
            echo "<th>"; echo "Pin_Code"; echo "</th>";
            echo "<th>"; echo "Username"; echo "</th>";
          
           
            echo "</tr>";

            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";

                
                echo "<td>"; echo $row['name']; echo "</td>";
                echo "<td>"; echo $row['phone']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['dl']; echo "</td>";
                echo "<td>"; echo $row['address']; echo "</td>";
                echo "<td>"; echo $row['pin']; echo "</td>";
                echo "<td>"; echo $row['username']; echo "</td>";
               
                
                echo "</tr>";
            }
        echo "</table>";
          }
      
        }
      // if button is not pressed.
        else
        {
        //  $res=mysqli_query($db,"SELECT name, phone, email, dl, address, pin, username FROM `customer_details` ;");
            
            $res=mysqli_query( $db,"CALL `getCustomer`;"); // stored procedure
            
            echo "<table class='table table-bordered table-hover' >";
            echo "<tr style='background-color: #6db6b9e6;'>";
    
            echo "<th>"; echo "Name"; echo "</th>";
            echo "<th>"; echo "Phone Number"; echo "</th>";
            echo "<th>"; echo "Email_ID"; echo "</th>";
            echo "<th>"; echo "DL_Number"; echo "</th>";
            echo "<th>"; echo "Address"; echo "</th>";
            echo "<th>"; echo "Pin_Code"; echo "</th>";
            echo "<th>"; echo "Username"; echo "</th>";
          
           
            echo "</tr>";
    
             while($row=mysqli_fetch_assoc($res))
            
                {
                    echo "<tr>";

                
                echo "<td>"; echo $row['name']; echo "</td>";
                echo "<td>"; echo $row['phone']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['dl']; echo "</td>";
                echo "<td>"; echo $row['address']; echo "</td>";
                echo "<td>"; echo $row['pin']; echo "</td>";
                echo "<td>"; echo $row['username']; echo "</td>";
               
                
                echo "</tr>";
                }
            echo "</table>";
        }
        if(isset($_POST['submit1']))
        {
            if(isset($_SESSION['login_user']))
            {
            mysqli_query($db,"DELETE FROM `customer_details` WHERE dl='$_POST[dl]';");
            ?>
            <script type="text/javascript">
        alert("Customer Details is deleted Successfully!!");

    </script>
    <?php

        }
        else
        {
            ?>
                <script type="text/javascript">
            alert("Please Login first!!");
    
        </script>
        <?php
        }
    }
   
       
   ?>

       
   
             
</body>
</html>