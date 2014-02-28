<?php
ob_start();
session_start();

$username = mysql_real_escape_string($_POST['username']);
$userPassword = $_POST['password'];
 
$con = new mysqli("localhost", "usr", "php-pass","root");
//Check Connection       
if (mysqli_connect_errno())   
    { 
      echo "Failed to connect to MySQL: " . mysqli_connect_error();       
    }
   
    $pass = mysqli_query($con,"SELECT password FROM user "
            . "WHERE username = '$username'");
    $result = array();
    while($row = mysqli_fetch_array($pass))
       {
           $result[] = $row['password'];
       }
  
       $passW = (string) $result[0];
     
       if ($userPassword != $passW)
       { 
           header('Location: login.html');
       }
       else 
       {      
           session_regenerate_id();         
           $_SESSION['sess_username'] = $username;
           session_write_close();
           header("Location: homeVault.php");  
       }
?>
