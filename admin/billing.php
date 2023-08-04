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
    <title>BILLING INFORMATION</title>
    
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
       
    <h2 style="text-align: center;font-size: 35px;color:black; text-decoration: underline; ">
    List of Bills:-</h2>
    <?php
       
       if(isset($_POST['submit']))
       {
        
           $q=mysqli_query($db,"CALL `getBill`;");
      
        
          if(mysqli_num_rows($q)==0)
          {
            echo "Sorry!! No Customer found with that username.
             Try searching again.";
          }
          else
          {
             
              echo "<table class='table table-bordered table-hover' >";
              echo "<tr style='background-color: #6db6b9e6;'>";

            echo "<th>"; echo "Bill_id"; echo "</th>";
            echo "<th>"; echo "Bill_date"; echo "</th>";
           
            echo "<th>"; echo "DL_Number"; echo "</th>";
            echo "<th>"; echo "Total_amount"; echo "</th>";
            echo "<th>"; echo "Transaction_id"; echo "</th>";
            echo "<th>"; echo "Registration_number"; echo "</th>";
          
           
            echo "</tr>";

            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";

                
                echo "<td>"; echo $row['bill_id']; echo "</td>";
                echo "<td>"; echo $row['bill_date']; echo "</td>";
                echo "<td>"; echo $row['dl']; echo "</td>";
                echo "<td>"; echo $row['total_amount']; echo "</td>";
                echo "<td>"; echo $row['transaction_id']; echo "</td>";
                echo "<td>"; echo $row['reg']; echo "</td>";
               
               
                
                echo "</tr>";
            }
        echo "</table>";
          }
      
        }
      // if button is not pressed.
        else
      {
         $res=mysqli_query($db,"CALL `getBill`;"); //stored procedure
            
            
            echo "<table class='table table-bordered table-hover' >";
            echo "<tr style='background-color: #6db6b9e6;'>";
    
           
            echo "<th>"; echo "Bill_id"; echo "</th>";
            echo "<th>"; echo "Bill_date"; echo "</th>";
           
            echo "<th>"; echo "DL_Number"; echo "</th>";
            echo "<th>"; echo "Total_amount"; echo "</th>";
            echo "<th>"; echo "Transaction_id"; echo "</th>";
            echo "<th>"; echo "Registration_number"; echo "</th>";
          
          
           
            echo "</tr>";
    
             while($row=mysqli_fetch_assoc($res))
            
                {
                    echo "<tr>";

                    echo "<td>"; echo $row['bill_id']; echo "</td>";
                    echo "<td>"; echo $row['bill_date']; echo "</td>";
                    echo "<td>"; echo $row['dl']; echo "</td>";
                    echo "<td>"; echo $row['total_amount']; echo "</td>";
                    echo "<td>"; echo $row['transaction_id']; echo "</td>";
                    echo "<td>"; echo $row['reg']; echo "</td>";
                   
                
                echo "</tr>";
                }
            echo "</table>";
        }
       

        
       
   
       
   ?>

       
   
             
</body>
</html>