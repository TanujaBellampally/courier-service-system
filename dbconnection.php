<?php 
$host = 'localhost';  
$user = ' root';  
$pass = '';  
	$conn = mysqli_connect($host, $user, $pass, 'mydb1');
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}
    // else{
    //     echo "connected";
    // }

?>