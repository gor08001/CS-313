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
    
    function getPics($con)
    {
   
    $user = $_SESSION['sess_username'];
    $sql = "SELECT p.* FROM picture AS p JOIN picture_vault AS pv ON p.pv_id = pv.pv_id JOIN library AS l ON pv.lib_id = l.lib_id JOIN user AS u ON l.user_id = u.user_id WHERE u.username = '$user'"; 
    $pics = mysqli_query($con,$sql);

    $picsArray = array();
           
    while ($row = mysqli_fetch_array($pics))
    {  
        $picsArray[] = $row;       
    }  
    return $picsArray;  
    }
    
    $picture = getPics($con);

?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index.css"/>
        <title>Pics</title>      
    </head>
    <body>
        <header>
            <div id="topHat"> 
                <h1 id="title">
                    Picture Vault
                </h1>
            </div>
            <div id ='top-menu'>
                <ul>
                    <li><a href="homeVault.php" class="navagation">
                            Home</a></li>
                    <li><a href="pic.php" class="navagation" id="selected">
                            Pictures</a></li>
                    <li><a href="sound.php" class="navagation">
                            Audio</a></li>
                    <li><a href="upload.php" class="navagation">
                            Upload</a></li>
                    <li><a href="logout.php" class="navagation">
                            Logout</a></li>
                </ul>
            </div>            
        </header>
        <div id="content">
            <div id="viewer">
                <?php
                    $num = 0;
                    foreach($picture as $p)
                    {
                        echo '<img src="'.$p['url'].'" alt="'.$p['picName'].'" '
                                . ' class="picView">';
                        $num++;
                        
                        if ($num > 4)
                        {
                            echo '<br/>';
                            $num = 0;
                        }
                    }
                ?>
            </div>
            
        </div>
        <footer>
            &copy; 2014 Gorewicz     
        </footer>            
    </body>
</html>