<!-- <?php
    include("dbconnection.php");
    session_start();
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM staff WHERE StaffID='$id'";
    $result = mysqli_query($conn, $sql);
    $staff = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CC Couriers</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style/bootstrap.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style/index_styles.css">
        <link rel="icon" type="image/png" sizes="32x32" href="Images/favicon-32x32.png">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="font-family: Arial, Helvetica, sans-serif;">
        <div ><img src="Images/logo.png" id="logo" style="height: 100px !important; margin-top: 10px !important;"  ></div>
        <nav class="navbar navbar-toggleable-md navbar-expand-lg navbar-default navbar-light mb-10" style="background-color: rgba(255, 255, 255, 0.8);">
            <div class="container">
                <button class="navbar-toggler text-dark" data-toggle="collapse" data-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <div class="navbar-nav  " style="margin: 0 auto; font-size: large;">
                        <a class="nav-item nav-link text-dark mr-5  " href="staff.php">Back</a>
                        <a class="nav-item nav-link text-dark" href="logout.php" >Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="background"></div>    
        <div class="container text-center" style="width : 50%; background-color: rgba(255, 255, 255, 0.7); margin-top: 10px; border-radius:15px; padding: 5px;">
            <h3 >Account Details</h3>
            <img src="Images/userlogo2.png" style="margin:0 auto; height: 140px; width: 140px; margin-bottom: 15px;">
            <table class="text-left table table-bordered table-striped" >
                <tr><td style="font-weight:bold;">Name</td><td><?php echo $staff['Name']; ?></td></tr>
                <tr><td style="font-weight:bold;">Staff ID</td><td><?php echo $staff['StaffID']; ?></td></tr>
                <tr><td style="font-weight:bold;">Designation</td><td><?php echo $staff['Designation']; ?></td></tr>
                <tr><td style="font-weight:bold;">Gender</td><td><?php echo $staff['Gender']; ?></td></tr>
                <tr><td style="font-weight:bold;">DOB</td><td><?php echo $staff['DOB']; ?></td></tr>
                <tr><td style="font-weight:bold;">DOJ</td><td><?php echo $staff['DOJ']; ?></td></tr>
                <tr><td style="font-weight:bold;">Email</td><td><?php echo $staff['Email']; ?></td></tr>
                <tr><td style="font-weight:bold;">Mobile</td><td><?php echo $staff['Mobile']; ?></td></tr>
                <tr><td style="font-weight:bold;">Credits</td><td><?php echo $staff['Credits']; ?></td></tr>
            </table>
        </div>
        <div class="container-fluid text-center mt-5" style="background-color: rgba(255, 255, 255, 0.7); padding: 20px; position: relative;">
            <div class="i-bar" style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content:center; margin-bottom: 2em;">
                <a class="fa fa-facebook " href="#" style="border: none; text-decoration: none;  margin: 0em 1em; color:black; font-size: xx-large;"></a>
                <a class="fa fa-instagram" href="#" style="border: none; text-decoration: none;  margin: 0em 1em; color:black; font-size: xx-large;"></a>
                <a class="fa fa-envelope " href="#" style="border: none; text-decoration: none;  margin: 0em 1em; color:black; font-size: xx-large;"></a>
            </div>
            <p class="credit" style="font-size: 20px; font-stretch: 3px; text-align: center; color: black;">© CC COURIERS</p>
        </div>
    </body>
</html> -->





<?php  
//  include('custlogin.php');
 include('dbconnection.php');
//  $cust  = array('name' => '', 'email' => '', 'pnumber' => '');
 
 session_start();
 $id = $_SESSION['id'];
$sql = "SELECT * FROM staff WHERE StaffID='$id'";
    // $result = mysqli_query($conn, $sql);
    // $staff = mysqli_fetch_assoc($result);
    // $name = $staff['Name'];
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
    $staff = mysqli_fetch_assoc($result);
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
                        <!-- <a class="nav-item nav-link text-dark mr-5" href=" #">Profile</a>
                        <a class="nav-item nav-link text-dark mr-5" href="tracking.php">Tracking</a> -->
                        <a class="nav-item nav-link text-dark mr-5" href="login.php">Logout</a>
                                        
                    </div>
                </div>
            </div>
        </nav>
        <div>
            <div  style="background-color:lightblue; color: black; border-radius: 15px; margin-left: 450px;margin-right: 450px; margin-bottom:200px; text-align:center;" >
            <img src="Images/userlogo.png" style="margin:0 auto; height: 140px; width: 140px; margin-bottom: 15px;">
         
            <p style="font-size:bold">Name:<?php echo $staff['Name']; ?></p>
            <p>Staff ID : <?php echo $staff['StaffID']; ?></p>
            <p>Designation  :<?php echo $staff['Designation']; ?></p>
            <p>Gender :<?php echo $staff['Gender']; ?></p>
            <p>DOB :<?php echo $staff['DOB']; ?></p>
           <p>DOJ :<?php echo $staff['DOJ']; ?></p>
            <p>Email :<?php echo $staff['Email']; ?></p>
            <p>Mobile :<?php echo $staff['Mobile']; ?></p>
            <p>Credits :<?php echo $staff['Credits']; ?></p>
            
         
            </div>
        </div>

      
      
       
    </body>
</html>   