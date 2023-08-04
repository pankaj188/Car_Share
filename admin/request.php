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
    <title>CAR REQUEST</title>
    
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
        .srch1
        {
            padding-left:1170px;
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

@media screen and (max-height: 450px) 
{
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
             style="color:aliceblue;"> LOG-OUT</span></a></li> </ul>
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

         <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in" style="color:aliceblue;"> LOG-IN</span></a></li> 
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out" style="color:aliceblue;"> SIGN-IN</span></a></li> 
        
   </ul>  -->
       </div>
       </nav> 
       <!-- ___________sidenav____________--->
       <div id="mySidenav" class="sidenav">
  <a  href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

   <div class="h"> <a style="color:aliceblue; text-decoration: underline;"href="cars.php">CAR </a></div>
   <div class="h"> <a  style="color:aliceblue; text-decoration: underline;" href="add.php">ADD CAR</a></div>
       
       <div class="h"><a style="color:aliceblue; text-decoration: underline;" href="expired.php">EXPIRED LIST</a></div>
       
       <div class="h">  <a style="color:aliceblue; text-decoration: underline;" href="issue_info.php">ISSUE INFORMATION</a></div>
  

   

</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


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

<div class="srch" style="text-align:left;">
    <form method="post" action="" name="form1">
        <input type="text" name="username" class="form-control" placeholder="Customer Username" required="">
       
        <input type="text" name="reg" class="form-control" placeholder="Car Registration Number" required="">
        <button style="background-color:  #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                    Submit
    </form>
</div>
<h2 style="text-align: center;font-size: 35px;color:black; text-decoration: underline; ">
    Request of Cars:-</h2>
<?php
if(isset($_SESSION['login_user']))
{
    $sql= "SELECT  customer_details.username,dl, car.reg, 
    car.name,year,status FROM customer_details 
    inner join issue_car ON 
    customer_details.username=issue_car.username 
    inner join car ON 
    issue_car.reg=car.reg WHERE issue_car.approve=''";
    $res= mysqli_query($db,$sql);
    if(mysqli_num_rows($res)==0)
    {
        echo "</br></br>";
        echo "<h2><b>";
      echo "There's no pending request";
      echo "</b></h2>";
    }
    else
    {
        echo "<table class='table table-bordered table-hover' >";
        echo "<tr style='background-color: #6db6b9e6;'>";

      echo "<th>"; echo "Customer Username"; echo "</th>";
      echo "<th>"; echo "Customer DL_Number"; echo "</th>";
      echo "<th>"; echo " Car Registration Number"; echo "</th>";
      echo "<th>"; echo " Car Name"; echo "</th>";
      echo "<th>"; echo " Car Year"; echo "</th>";
      echo "<th>"; echo " Car Status "; echo "</th>";
      
      echo "</tr>";
      
      while($row=mysqli_fetch_assoc($res))
      {
          echo "<tr>";

          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['dl']; echo "</td>";
          echo "<td>"; echo $row['reg']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['year']; echo "</td>";
          echo "<td>"; echo $row['status']; echo "</td>";
          
          
          
          echo "</tr>";
      }
  echo "</table>";
    }

    }
    else
    {
        ?>
       
        <script type="text/javascript">
            alert("You need to login to see the request.");

        </script>

        <?php
    }
    if(isset($_POST['submit']))
    {
        $_SESSION['name']=$_POST['username'];
        $_SESSION['reg']=$_POST['reg'];

        ?>
        <script type="text/javascript">
           window.location="approve.php"

        </script>

        <?php



    }



        ?>
        </div>
</div>
</body>
</html>