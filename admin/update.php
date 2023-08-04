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
    <title>UPDATE CARS</title>
    
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
        body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.h:hover
{
    color:white;
    width:350px;
    height:50px;
    background-color:black;
}
.book
{
    width: 400px;
    margin: 0px auto;
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
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out" style="color:aliceblue;"> SIGN-IN</span></a></li> 
        
   </ul> -->
       </div>
       </nav> 
       <!-- _____________________sidenav_________________-->
       <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="h"> <a  style="color:aliceblue; text-decoration: underline;" href="cars.php">LIST OF CARS</a></div> 
      
       
       <div class="h">  <a style="color:aliceblue; text-decoration: underline;" href="#">ISSUE INFORMATION</a></div>
      

          </div>

<div id="main">
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "350px";
  document.getElementById("main").style.marginLeft = "350px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}

</script>
<ul class="nav navbar-nav navbar-right">
<form class="navbar-form" method="post" name="form1">
                
                <input class="form-control" type="text" name="name" placeholder="CAR NAME" required=""><br>
                <input class="form-control" type="text" name="reg" placeholder="New Registration Number" required="">
                <input class="btn btn-default" type="submit" name="submit1" value="UPDATE" style="background-color: black;
    color: aliceblue; width: 80px; height: 30px;">
                </button>
            
       </form>
</ul>
  <span style="font-size:30px;cursor:pointer" 
  onclick="openNav()">&#9776; open</span>
  <div class="container" style="text-align:center;">
  <h2 style="text-align: center;font-size: 35px;color:black; text-decoration: underline; ">
    Update Cars:-</h2>
    <form class="book" action="" method="post">
    <!-- <input class="form-control" type="text" name="reg" placeholder="Old_registration_number" required=""> -->
    <input class="form-control" type="text" name="reg" placeholder="Registration_number" required="">
     <input class="form-control" type="text" name="name" placeholder="Car_name" required="">
     <input class="form-control" type="text" name="cat_name" placeholder="Category_Name" required="">
    <input class="form-control" type="year" name="year" placeholder="Model_Year" required="">
    <input class="form-control" type="text" name="person" placeholder="Accommodation" required="">
    <input class="form-control" type="text" name="mileage" placeholder="Mileage" required="">
    <input class="form-control" type="text" name="status" placeholder="Availability" required="">
    <input class="form-control" type="number" name="quantity" placeholder="Quantity" required="">
    <input class="form-control" type="text" name="cost" placeholder="Cost_per_day" required="">
    <input class="form-control" type="text" name="latefee" placeholder="Late_fee_hour" required=""><br>  
    <input class="btn btn-default" type="submit" name="submit" value="UPDATE" style="background-color: black;
    color: aliceblue; width: 80px; height: 30px;">
    </form>

  </div>
<?php
  if(isset($_POST['submit']))
  {
      if(isset($_SESSION['login_user']))
      {
          mysqli_query($db, "UPDATE `car` SET `name` = '$_POST[name]',`cat_name` = '$_POST[cat_name]' ,
          `year` = '$_POST[year]', `person` = '$_POST[person]', `mileage` = '$_POST[mileage]', `status` = '$_POST[status]',
           `quantity` = '$_POST[quantity]',`cost` = '$_POST[cost]',`latefee` = '$_POST[latefee]'   
           where reg = '$_POST[reg]';");
    ?>
    <script type="text/javascript">
        alert("Car Updated Successfully!!");

    </script>
    <?php
    }
    else
    {
  ?>
  <script type="text/javascript">
        alert("You need to login first.");
        </script>
        <?php
    }
  }
    if(isset($_POST['submit1']))
        {
            if(isset($_SESSION['login_user']))
            {
            mysqli_query($db,"UPDATE  `car` SET `reg` = '$_POST[reg]' WHERE `name`='$_POST[name]';");
            ?>
            <script type="text/javascript">
        alert("Registration Number Updated Successfully!!");

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
        </div>

</body>
</html>