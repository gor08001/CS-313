<?php

  $con = new mysqli("localhost", "usr", "php-pass","root");
  //Check Connection       

  if (mysqli_connect_errno())   
 
      { 
      echo "Failed to connect to MySQL: " . mysqli_connect_error();        
      }
      
      $username = mysql_real_escape_string($_POST['username']);
      $password = mysql_real_escape_string($_POST['password']);
      
      $sql = "INSERT INTO user (username,password)"
              . "VALUES ('$username','$password')";
      if (!mysqli_query($con,$sql))
      {
          die('Error: ' . mysqli_error($con));
      }     
//      echo "alert('1 record added')";
       
      $ssql = mysqli_query($con,"SELECT user_id FROM user WHERE username = '$username'");
        
      $result = array();
      while($rows = mysqli_fetch_array($ssql))
      {
          $result[] = $rows['user_id'];       
      }
    
//      echo '</br>'.$result[0].'</br>';
      $lsql = "INSERT INTO library (user_id,name)"
              . "VALUES ('$result[0]','Media')";
     
      if (!mysqli_query($con,$lsql))
      {
          die('Error: ' . mysqli_error($con));
      }     
 //     echo "alert('1 record added')";
      
      $a = $result[0];
 //     echo $a;
      
      $vsql = mysqli_query($con,"SELECT lib_id FROM library "
              . "WHERE user_id = '$a'");
       
      $libs = array();
      while($ows = mysqli_fetch_array($vsql))
      {
 //         echo "hear";
          $libs[] = $ows['lib_id'];       
      }
  //    echo $libs[0];
      if(!mysqli_query($con,"INSERT INTO picture_vault (name,lib_id)"
              . "VALUES ('pics','$libs[0]')"))      
      {     
          die('Error: ' . mysqli_error($con));
      }       
 //     echo "alert('1 record added')";
      if(mysqli_query($con,"INSERT INTO sound_vault (name,lib_id)"
              . "VALUES ('sound','$libs[0]')"))
      {     
   //      die('Error: ' . mysqli_error($con));
      }       
    // echo "alert('1 record added')";
    
      /*
     if(mysqli_query($con,"INSERT INTO videoa_vault (name,lib_id)"
              . "VALUES ('video','$libs[0]')"))
      {
        die('Error: ' . mysqli_error($con));
      }
//      echo "alert('1 record added')";
//*/      
                
      
      mysqli_close($con);
      header("Location: login.html");
?>
