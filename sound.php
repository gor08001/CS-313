<?php
    session_start();
    if ($_SESSION['sess_username'] == '')
   {
       header("Location: login.html");
   }
    $con = new mysqli("localhost", "usr", "php-pass","root");
    //Check Connection       
    if (mysqli_connect_errno())   
    { 
      echo "Failed to connect to MySQL: " . mysqli_connect_error();       
    }
    
    function getSound($con)
    {
   
    $user = $_SESSION['sess_username'];
    $sql = "SELECT s.* FROM sound AS s JOIN sound_vault AS sv ON s.sv_id = sv.sv_id JOIN library AS l ON sv.lib_id = l.lib_id JOIN user AS u ON l.user_id = u.user_id WHERE u.username = '$user'"; 
    $sou = mysqli_query($con,$sql);

    $souArray = array();
           
    while ($row = mysqli_fetch_array($sou))
    {  
        $souArray[] = $row;       
    }  
    return $souArray;  
    }
    
    $sound = getSound($con);

?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index.css"/>
        <title>Audio</title>      
    </head>
    <body>
        <header>
            <div id="topHat"> 
                <h1 id="title">
                    Audio Vault
                </h1>
            </div>
            <div id ='top-menu'>
                <ul>
                    <li><a href="homeVault.php" class="navagation">
                            Home</a></li>
                    <li><a href="pic.php" class="navagation" >
                            Pictures</a></li>
                    <li><a href="sound.php" class="navagation" id="selected">
                            Audio</a></li>
                    <li><a href="upload.php" class="navagation">
                            Upload</a></li>
                    <li><a href="logout.php" class="navagation">
                            Logout</a></li>
                </ul>
            </div>            
        </header>
        <div id="content">
            <div id="sound">
                <?php
                    $num = 0;
                    foreach($sound as $s)
                    {   
                        echo '<h4 style="color:white;">'.$s['name'].'</h4>';
                        echo '<audio controls>'
                        . '<source src="'.$s['url'].'" type="audio/mpeg">'
                                . '</audio>';
                        echo '<br/>';
                    }
                ?>
                
            </div>
            
        </div>
        <footer>
            &copy; 2014 Gorewicz     
        </footer>            
    </body>
</html>