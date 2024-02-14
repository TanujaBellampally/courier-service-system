<?php
    include("dbconnection.php");
    $tid = '';
    $error = '';
    $logistics='';
    $status = array('Dispatched' => '','Shipped' => '', 'Out_for_delivery' => '', 'Delivered' => '', );
    $hide = 'hidden';
    session_start();
    $trackid = '';
    if(isset($_POST['track'])){
        if(empty($_POST['tid'])){
            $error = "*Required";
        }else{
            $tid = $_POST['tid'];
            $_SESSION['track_tid'] = $tid;
            $query="SELECT * FROM parcel WHERE TrackingID='$tid'";
            $res=mysqli_query($conn,$query);
            if(mysqli_num_rows($res) > 0){
                $s = mysqli_fetch_assoc($res);
                if($s['S_City']==$s['R_City']){
                    $logistics="via BIKE";
                }
                else if($s['S_State']==$s['R_State']){
                    $logistics="via BUS";
                }
                else{
                    $logistics="via TRAIN";
                }
                
                
            }
            if(empty($error)){
                $hide = '';
                $trackid = $_SESSION['track_tid'];
                $sql = "SELECT * FROM status WHERE TrackingID='$tid'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    $status = mysqli_fetch_assoc($result);
                    // $active = array();
                    // if(! is_null($status['Delivered'])){
                    //     $active['Delivered'] = $active['Out_for_delivery'] = $active['Shipped'] = 'active';
                    // }elseif(! is_null($status['Out_for_delivery'])){
                    //     $active['Delivered'] = '';
                    //     $active['Out_for_delivery'] = $active['Shipped'] = 'active';
                    // }elseif(! is_null($status['Shipped'])){
                    //     $active['Delivered'] = $active['Out_for_delivery'] = '';
                    //     $active['Shipped'] = 'active';
                    // }
                }else{
                    $error = "Invalid Tracking ID";
                }
            }
        }
    }
    $tkid=$_SESSION['track_tid'];
    $sql = "SELECT * FROM parcel ORDER BY TrackingID DESC LIMIT 1";
    // $sql = "SELECT * FROM parcel WHERE TrackingID=$tkid";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $order = mysqli_fetch_assoc($result);
    }else{
        echo 'Data fetch Error : '.mysqli_error($conn);
    }
    // $hidden = 'hidden';
    // if(isset($_POST['view'])){
    //     $trackid = $_SESSION['track_tid'];
    //     $hidden = $hide = '';
    // } 
    // $name = $add = $contact = '';
    // $errors = array('name' => '', 'add' => '', 'cont' => '');
    // if(isset($_POST['update'])){
    //     $hidden = $hide = '';
    //     $trackid = $_SESSION['track_tid'];
    //     if(empty($_POST['fname'])){
    //         $errors['name'] = "*Required";
    //     }else{
    //         $name = $_POST['fname'];
    //     }
    //     if(empty($_POST['fadd'])){
    //         $errors['add'] = "*Required";
    //     }else{
    //         $add = $_POST['fadd'];
    //     }
    //     if(empty($_POST['fcontact'])){
    //         $errors['cont'] = "*Required";
    //     }else{
    //         $contact = $_POST['fcontact'];
    //     }
    //     if(! array_filter($errors)){
    //         $trackid = $_SESSION['track_tid'];
    //         $sql = "UPDATE parcel SET R_Name = '$name', R_Add = '$add', R_Contact = $contact WHERE TrackingID = $trackid";
    //         if(mysqli_query($conn, $sql)){
    //             echo '<script type="text/javascript">';
    //             echo "setTimeout(function () { swal('Address Updated', 'Receiver address updated successfully !!', 'success');";
    //             echo '}, 1000);</script>';
    //             $hide  = $hidden =  'hidden';
    //             $trackid = '';
    //         }else{
    //             echo 'Update Error : '.mysqli_error($conn);
    //         }
    //     }
    // }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CC Couriers</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style/index_styles.css">
        <link rel="icon" type="image/png" sizes="32x32" href="Images/favicon-32x32.png">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="font-family: Arial, Helvetica, sans-serif;background-image:url('SEImages/4img.png')">

        <div class="background"></div> 
        <nav class="navbar navbar-toggleable-md navbar-expand-lg navbar-default navbar-light mb-10" style="background-color: lightblue; margin-top:10px !important;">
            <div class="container">
                <button class="navbar-toggler text-dark" data-toggle="collapse" data-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <div class="navbar-nav  " style="margin: 0 auto; font-size: large; ">
                        <a class="nav-item nav-link text-dark mr-5" href=" customer.php">Profile</a>
                        <a class="nav-item nav-link text-dark mr-5" href="#">Tracking</a>
                        <a class="nav-item nav-link text-dark mr-5" href="custlogin.php">Logout</a>
                
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-10">
            <div class="row">
                <div class="col-md-4 p-4 text-center pt-0" style="background-color: lightblue; margin-top: 20px;">
                    <!-- <img src="Images/track3.png" style="margin:0 auto; height: 250px;"> -->
                    <form action="" method="POST" class="form">
                        <div class="form-group">
                            <label style="font-size: 20px;">Tracking ID : </label>
                            <input type="text" style="border-radius: 8px;" name="tid" value="<?php echo $tid; ?>">
                            <label class="text-danger"><?php echo $error; ?></label>
                        </div>
                        <input type="submit" name="track" class="btn btn-light text-center" value="Track" style="font-size: 20px;">
                    </form>
                </div>
                <div class="col-md-8 p-4 " style="background-color: lightblue; margin-top: 20px;">
                    <h3 class="display-6 text-center pb-2 mb-3" style="border-bottom: 2px solid black;">Delivery Status</h3>
                    <label>Tracking ID : <?php echo $trackid; ?></label><br>
                    <!-- <div class="track bg-info"> -->
                    <span class="text font-weight-bold"> place</span><span><?php echo $status['currplace'];?></span></br>
                    <span class="text font-weight-bold">logistics</span><span><?php echo "  ".$logistics;?></span></br>
                        <!-- <div class="step active"> <span class="icon"> <i class="fa fa-map-marker"></i> </span> <span class="text font-weight-bold"> Received </span><span><?php echo $status['Dispatched'];?></span> </div> -->
                        <span class="text font-weight-bold"> Received </span><span><?php echo $status['Dispatched'];?></span> </br>
                        <!-- <div class="step <?php echo $active['Shipped']; ?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text font-weight-bold"> On the way </span><span><?php echo $status['Shipped'];?></span> </div> -->
                        <!-- <span class="text font-weight-bold"> On the way </span><span><?php echo $status['Shipped'];?></span></br> -->
                        <span class="text font-weight-bold"><?php if ( is_null($status['Shipped'])){ }  else{echo "Shipped  : " .$status['Shipped'];}?>   </span>             </br>
                        <!-- <div class="step <?php echo $active['Out_for_delivery']; ?>"> <span class="icon"> <i class="fa fa-cubes"></i> </span> <span class="text font-weight-bold"> Out for delivery </span><span><?php echo $status['Out_for_delivery'];?></span> </div> -->
                        <!-- <span class="text font-weight-bold"> Out for delivery </span><span><?php echo $status['Out_for_delivery'];?></span></br> -->
                        <span class="text font-weight-bold"><?php if ( is_null($status['Out_for_delivery'])){ }  else{echo "Out_for_delivery  :" .$status['Out_for_delivery'];}?>   </span>             </br>
                      
      <span class="text font-weight-bold"><?php if ( is_null($status['Delivered'])){}  else{echo "Delivered  :" .$status['Delivered'];}?>   </span>             </br>

                    <!-- </div> -->
                    
                    <h3 class="display-6 text-center pb-2 mb-3" style="border-bottom: 2px solid black;">Receipt</h3>
                    <!-- <h6 class="display-4 text-center" style="border-bottom: 2px solid black; margin-bottom:15px !important;">Receipt</h6><span> -->
            <!-- <p><span class="font-weight-bold">Date-Time : </span><?php echo $date.'  '.$time; ?> </p> -->
            <p><span class="font-weight-bold">Tracking ID : </span><?php echo $order['TrackingID']; ?> </p>
            <p> <span class="font-weight-bold">Manager ID : </span> <?php echo $order['StaffID']; ?> </p>
            <p><span class="font-weight-bold">Sender : </span> <?php echo $order['S_Name'].', '.$order['S_Add'].', '.$order['S_City'].', '.$order['S_State'].' - '.$order['S_Contact']; ?> </p>
            <p><span class="font-weight-bold">Receiver : </span><?php echo $order['R_Name'].', '.$order['R_Add'].', '.$order['R_City'].', '.$order['R_State'].' - '.$order['R_Contact']; ?></p>
            <p><span class="font-weight-bold">Weight : </span><?php echo $order['Weight_Kg'].' KG'; ?> </p>
            <p><span class="font-weight-bold">Price : </span><?php echo 'Rs '.$order['Price']; ?> </p></span>

                    <!-- <div <?php echo $hide; ?>>
                        <br>
                        <label>Unable to receive on the expected date?</label>
                        <form action="tracking.php" method="POST">
                            <label>Drop to a friend nearby in the your city.</label>
                            <input type="submit" name="view" value="Update Delivery Address" class="btn btn-info">
                        </form>
                        <form action="tracking.php" method="POST" <?php echo $hidden; ?>>
                            <label>Friend's Details</label>
                            <div class="form-group text-left">
                                <label>Name : </label>
                                <input type="text" name="fname" style="border-radius: 8px;">
                                <label class="text-danger"><?php echo $errors['name'];?></label>
                            </div>
                            <div class="form-group text-left">
                                <label>Address : </label>
                                <input type="text" name="fadd" style="border-radius: 8px;">
                                <label class="text-danger"><?php echo $errors['add'];?></label>
                            </div>
                            <div class="form-group text-left">
                                <label>Contact : </label>
                                <input type="text" name="fcontact" style="border-radius: 8px;" >
                                <label class="text-danger"><?php echo $errors['cont'];?></label>
                            </div>
                            <input type="submit" name="update" value="Update">
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
     
    </body>
</html>