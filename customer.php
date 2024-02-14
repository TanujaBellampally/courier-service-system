
 <?php  
//  include('custlogin.php');
 include('dbconnection.php');
//  $cust  = array('name' => '', 'email' => '', 'pnumber' => '');
 
 session_start();
 $email_ID= $_SESSION['email'];
 echo $email_ID;
 $sql="SELECT * FROM users WHERE u_id='$email_ID'";
//  $result = mysqli_query($conn, $qry);
 
 $result = mysqli_query($conn, $sql);
//  if(mysqli_num_rows($result) > 0){
//      $user = mysqli_fetch_assoc($result);
//      echo "hai";
//     //  session_start();
//     //  $_SESSION['id'] = $user['StaffID'];
//     //  header("Location: staff.php");
    
//  }
 if(mysqli_num_rows($result) > 0){
    $cust = mysqli_fetch_assoc($result);
}else{
    echo 'Data fetch Error : '.mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Here Is UR COURIER GUYZZ</title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="style/bootstrap.css">
        <style>
            .carousel-inner img {
              width: 100%;
              height: 100%;
            }
        </style>
    </head>
    <body style="font-family: Arial, Helvetica, sans-serif;background-image:url('SEImages/4img.png')">

        <div class="background"></div> 
        <nav class="navbar navbar-toggleable-md navbar-expand-lg navbar-default navbar-light mb-10" style="background-color:lightblue; margin-bottom: 20px; margin-top:10px !important;">
            <div class="container">
                <button class="navbar-toggler text-dark" data-toggle="collapse" data-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <div class="navbar-nav  " style="margin: 0 auto; font-size: large;">
                        <!-- <a class="nav-item nav-link text-dark mr-5 active" href="home.html" >Home</a> -->
                        <!-- <a class="nav-item nav-link text-dark" href="login.php">Manager Login</a> -->
              
                        <!-- <a class="nav-item nav-link text-dark" href="custlogin.php">Customer Login</a> -->
                        <a class="nav-item nav-link text-dark mr-5" href=" #">Profile</a>
                        <a class="nav-item nav-link text-dark mr-5" href="tracking.php">Tracking</a>
                        <a class="nav-item nav-link text-dark mr-5" href="custlogin.php">Logout</a>
                                        
                    </div>
                </div>
            </div>
        </nav>
        <div>
            <div  style="background-color:lightblue; color: black; border-radius: 15px; margin-left: 450px;margin-right: 450px; margin-bottom:200px; text-align:center;" >
            <img src="Images/userlogo.png" style="margin:0 auto; height: 140px; width: 140px; margin-bottom: 15px;">
         
            <p style="font-size:bold">Name:<?php   echo $cust['name']; ?></p>
            <p>Email:<?php echo $cust['email']; ?></p>
            <p>phone number:<?php echo $cust["pnumber"]; ?></p>
         
            </div>
        </div>

      
      
       
    </body>
</html>   