<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ZOOM CARS</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
    nav
    {
        float: right;
        word-spacing: 30px;
        padding: 40px;  
    }
    nav li 
    {
        display: inline-block;
        line-height: 80px;  
    }
     section img
{   height:430px;
    width:1535px;
    margin-top: 0px;
     background-image: url("images/M.jpg") ; 
}     
</style>
</head>

<body>
    <div class="wrapper">
            <header>
                <div class="logo">
                <img src="images/images.png">
                <h1 style="color:aliceblue; font-size: 20px; text-align: center;text-decoration: underline;">
                Online Car-rental Management System </h1>
            </div>     
                
            <?php
              if (isset($_SESSION['login_user']))
              {
                ?>
                <nav>
                    
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="cars.php">CARS</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                     
                    <li><a href="feedback.php">FEEDBACK</a></li>
                    
                </ul>
            </nav>
            <?php
              }
              else
              {
                  ?>
               <nav>
                    
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="cars.php">CARS</a></li>
                        <li><a href="customer_login.php">CUSTOMER-LOGIN</a></li>
                        <li><a href="registration.php">REGISTRATION</a></li> 
                        <li><a href="feedback.php">FEEDBACK</a></li>
                        
                    </ul>
                </nav>

              <?php
              }
              ?>

                <!-- <nav>
                    
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="cars.php">CARS</a></li>
                        <li><a href="customer_login.php">CUSTOMER-LOGIN</a></li>
                        <li><a href="registration.php">REGISTRATION</a></li> 
                        <li><a href="feedback.php">FEEDBACK</a></li>
                        
                    </ul>
                </nav> -->
                
            </header>
            <section>
        
                <div class="sec_img">
                <div class="box">
                    <br>
                    <h1 style="text-align: center; font-size: 35px;color:black;">Welcome to ZOOM Cars</h1><br>
                    <img src="Images/M.jpg">
                </div>
             </div>   
            </section>    
            <footer>
              <P style="color: black;text-align: center; font-size: 20px;margin-top:0px; text-decoration: underline; ">
                  <br>
                  Email:&nbsp Zoomcars@gmail.com<br>
                  Mobile:&nbsp 9876543210<br>
              </P>
            </footer>
    </div>
</body>
</html>