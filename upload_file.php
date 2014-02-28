<?php
    session_start();
    $con = new mysqli("localhost", "usr", "php-pass","root");
    //Check Connection       
    if (mysqli_connect_errno())   
    { 
      echo "Failed to connect to MySQL: " . mysqli_connect_error();       
    }

     
$allowedExts = array("gif", "jpeg", "jpg", "png","mp3","mpeg");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/mpeg"))
&& ($_FILES["file"]["size"] < 100000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("images" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
     // echo $_SESSION["sess_username"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  
  $b = $_SESSION['sess_username'];
  $sql = "SELECT l.lib_id FROM library AS l"
         ." JOIN user AS u ON l.user_id = u.user_id"
         ." WHERE u.username = '$b'";

  $libId = mysqli_query($con,$sql);            
  $result = array();
  while($row = mysqli_fetch_array($libId))   
  {    
           $result[] = $row['lib_id'];
  }
echo gettype($result[0]);
 
$media = $_POST['vault'];
 
       if ($media === '1') 
       {
          $psql = "SELECT pv.pv_id FROM picture_vault AS pv"
                  . " JOIN library AS l on pv.lib_id = l.lib_id"
                  . " WHERE l.lib_id = '$result[0]'";
          echo '</br>';
          $pvId = mysqli_query($con,$psql);
          $pvResult = array();       
          while($rows = mysqli_fetch_array($pvId))
          {   
           $pvResult[] = $rows['pv_id'];
          }

          $url = "upload/".$_FILES["file"]["name"];
          $name = $_FILES["file"]["name"];
          mysqli_query($con,"INSERT INTO picture (picName,pv_id,url)"
                  . " VALUES ('$name','$pvResult[0]','$url')");
       } 
       elseif ($media === '2')
       {
          $ssql = "SELECT sv.sv_id FROM sound_vault AS sv"
                  . " JOIN library AS l on sv.lib_id = l.lib_id"
                  . " WHERE l.lib_id = '$result[0]'";
          echo '</br>';
          $svId = mysqli_query($con,$ssql);
          $svResult = array();       
          while($rows = mysqli_fetch_array($svId))
          {   
           $svResult[] = $rows['sv_id'];
          }
          
          $url = "upload/".$_FILES["file"]["name"];
          $name = $_FILES["file"]["name"];
          mysqli_query($con,"INSERT INTO sound (name,sv_id,url)"
                  . " VALUES ('$name','$svResult[0]','$url')");
       }
       elseif($media === '3')
       { 
           header('Location: upload_video.php');   
       }
     mysqli_close($con);
     header("Location: upload.php");
?>