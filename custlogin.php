<?php 
    include("dbconnection.php");

     $id = $pwd = '';
    $errors = array('id' => '', 'pwd' => '', 'login' => '');

    if(isset($_POST['submit'])){
        if(empty($_POST['id'])){
            $errors['id'] = "*Required";
        }else{
            $id = $_POST['id'];
        }
        if(empty($_POST["pwd"])){
            $errors['pwd'] = "*Required";
        }else{
            $pwd = $_POST['pwd'];
        }
        if(array_filter($errors)){
            //echo errors
        }else{
            $id = mysqli_real_escape_string($conn, $id);
            $pwd = mysqli_real_escape_string($conn, $pwd);

            $sql = "SELECT * FROM clogin WHERE email='$id' AND  Cpassword='$pwd'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                $user = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['email'] = $user['u_id'];
                header("Location: customer.php");
            }else{
                $sql = "SELECT * FROM clogin WHERE email='$id'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) == 0){
                    $errors['login'] = 'Enter valid Staff ID';
                }else{
                    $user = mysqli_fetch_assoc($result);
                    if($pwd != $user['Pwd']){
                        $errors['login'] = 'Incorrect Password';
                    }
                }
            }
        }
        
    }
    mysqli_close($conn);

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Here Is UR COURIER GUYZZ</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style/bootstrap.css"> 
    </head>
    <body style="font-family: Arial, Helvetica, sans-serif;background-image:url('SEImages/4img.png')">
        <div class="background" ></div> 
        <nav class="navbar navbar-toggleable-md navbar-expand-lg navbar-default navbar-light mb-10" style="background-color: lightblue;  margin-top:10px !important;">
            <div class="container" >
                <button class="navbar-toggler text-dark" data-toggle="collapse" data-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav" >
                    <div class="navbar-nav  " style="margin: 0 auto;  font-size: large; ">
                        <a class="nav-item nav-link text-dark mr-5 " href="home.php" style="color:white;" >Home</a>
                       <a class="nav-item nav-link text-dark active" href="login.php">Manager Login</a>
                        <!-- <a class="nav-item nav-link text-dark mr-5" href="tracking.php">Tracking</a> -->
                        <a class="nav-item nav-link text-dark" href="#">Customer Login</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container text-center p-3" style="background-color: lightblue; margin-top: 20px; border-radius: 15px; width: 35%;">
        
            <img src="Images/userlogo.png" style="margin:0 auto; height: 140px; width: 140px; margin-bottom: 15px;">
            <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group" >
                    <label style="font-size: 20px;">Email ID : </label>
                    <input type="text" style="border-radius: 8px;" name="id" value="<?php echo htmlspecialchars($id)?>" >
                    <label class="text-danger"><?php echo $errors['id'];?></label>
                </div>
                <div class="form-group">
                    <label style="font-size: 20px;">Password : </label>
                    <input type="password" style="border-radius: 8px;" name="pwd" value="<?php echo htmlspecialchars($pwd)?>" >
                    <label class="text-danger"><?php echo $errors['pwd'];?></label>
                </div>
                <label class="text-danger"><?php echo $errors['login'];?></label>
                <!-- <input type="submit" name="submit" class="btn btn-light text-center" value="Sign In" style="font-size: 20px;"> -->
                <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Sign In" />
                        <!-- <button onclick="window.location.href='resetpswd.php'" class="btn btn-danger" style="cursor:pointer">Reset Password</button> -->
                    </div>
                    <p style="color: #e84118;">Don't have an account?⮞➤ <a href="register.php">Register here</a>.</p>
            </form>
        </div>
                   <p class="credit" style="font-size: 20px; font-stretch: 3px; text-align: center; color: black; padding:300px;">Here Is UR COURIER GUYZZ</p>
        </div> 