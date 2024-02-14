<?php
require_once "dbconnection.php";
// require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $fullname = $_POST['name'];
    $phn = $_POST['ph'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if($password==$confirm_password){

    $qry = "INSERT INTO `users` (`email`, `name`, `pnumber`) VALUES ('$email', '$fullname', '$phn')";
    $run = mysqli_query($conn,$qry);
    
    if($run==true){

        $psqry = "INSERT INTO `clogin` (`email`, `Cpassword`, `u_id`) VALUES ('$email', '$password',LAST_INSERT_ID() )";
        $psrun = mysqli_query($conn,$psqry);
        ?>  <script>
            alert('Registration Successfully :)'); 
            window.open('custlogin.php','_self');
            </script>
        <?php
    }
    }else{
        ?>  <script>
            alert('Password mismatched!!'); 
            </script>
        <?php
    }

}   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style>
        body
        {
        background-image:url('images/brr.png');
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>
    </head>
    <body   style="background-image:url('SEImages/4img.png');text-align:center"><br>
        <div class="container"  style="background-color:lightblue; color: black; border-radius: 15px; margin-left: 350px;margin-right: 350px; margin-bottom: 500px;; ">
            <div class="row">
                <div class="col-md-12">
                    <h2 style=" text-align:center">Register</h2>
                    <p>Please fill this form to create an account.</p>
                    <!-- <?php echo $success; ?>
                    <?php echo $error; ?> -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" style="border-radius: 8px;font-size: 20px;" required>
                        </div><br>
                        <div class="form-group">
                            <label>Phone Num.</label>
                            <input type="text" name="ph" class="form-control"style="border-radius: 8px;font-size: 20px;" required>
                        </div> <br>   
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" style="border-radius: 8px;font-size: 20px;"required /><br>
                        </div>    <br>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" style="border-radius: 8px;font-size: 20px;" required><br>
                        </div><br>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" style="border-radius: 8px;font-size: 20px;" required><br>
                        </div><br>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-danger" value="Register" >
                        </div>
                        <!-- <p>Already have an account? <a href="index.php" style="color: red;">Login here</a>.</p> -->
                    </form>
                </div>
            </div>
            <!-- <hr><p>Notice: If the email Id is registered before, it will not respond.</p>
            <p>In this case, reset your password or register with different email Id....</p> -->
        </div>    
    </body>
</html>