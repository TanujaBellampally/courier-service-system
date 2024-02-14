<?php 
include("dbconnection.php");
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['msg'];
    echo $name;
    $sql="INSERT INTO `feedback`( `Cust_name`,`Cust_mail`,`Cust_msg` )  VALUES ( '$name','$email','$message' )";
    $result= mysqli_query($conn,$sql);
    
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
                        <a class="nav-item nav-link text-dark mr-5 active" href="home.php" >Home</a>
                        <a class="nav-item nav-link text-dark" href="login.php">Manager Login</a>
                        <!-- <a class="nav-item nav-link text-dark mr-5" href="tracking.php">Tracking</a> -->
                        <a class="nav-item nav-link text-dark" href="custlogin.php">Customer Login</a>
                      
                                        
                    </div>
                </div>
            </div>
        </nav>
      
         <div class="container" id="about" style="margin-top: 100px; width: 85%; ">
             <div class="row">
                <div class="col-md-6 p-5" style="background-color:lightblue; color: black; border-radius: 15px; ">
                    <h2 class="display-5 text-center mb-3 pb-2" style="border-bottom: 2px solid white;">COURIER SERVICE SYSTEM</h2>
                    <p>In this website you can simply perform the operations to manage the courier.Customer can use this website for tracking. </p>
                    <p class="pb-3" style="border-bottom: 2px solid white;">"Here Is UR COURIER GUYZZ" will be started on 02-05-2023 .
                 </p>
                 <div style="text-align: center;">
               <h3 >CONTACT US </h3><br>
                 <P> EMAIL: secourier@gmail.com  </P>  
                   <P> Phone no:9848649231</p>
                   </div>
                </div>
                <div class="col-md-6">
                    <img src="Images/abt3.jpg" style="height: 500px; width: 100%; padding-top: 5%;" >
                </div>
             </div>
         </div><br><br><br>
         <div  style="background-color:lightblue; color: black; border-radius: 15px; margin-left: 150px;margin-right: 150px; ">
            <h3 style="text-decoration: underline; margin-left: 400px;">GIVE UR FEEDBACK:</h3>
            <div style="margin-left: 400px;" >
            <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name = "name" value="your name" size="30"><br>
            <br>
            <input type="text"  name="email" value="your email" size="30"><br>
            <br>
            <textarea rows="10" cols="30" name="msg"  >Your Message</textarea><br>
            <br>
            <input type="submit" name="submit">
        </div>
        </form>
        </div>
         <div class="container-fluid text-center mt-5" style="background-color: rgba(255, 255, 255, 0.7); padding: 20px; position: relative; ">
          
            <p class="credit" style="font-size: 20px; font-stretch: 3px; text-align: center; color: black;">Here Is UR COURIER GUYZZ</p>
        </div>
    </body>
</html>