<?php
   session_start();   
   if ($_SESSION['sess_username'] == '')
   {
       header("Location: login.html");
   }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index.css"/>
        <title><?php echo $_SESSION["sess_username"]."'s Vault"?></title>      
    </head>
    <body>
        <header>
            <div id="topHat"> 
                <h1 id="title">
                    <?php echo $_SESSION["sess_username"]."'s Vault"?>
                </h1>
            </div>
            <div id ='top-menu'>
                <ul>
                    <li><a href="homeVault.php" class="navagation" id="selected">
                            Home</a></li>
                    <li><a href="pic.php" class="navagation">
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
            <div id="brief">
                <pre>Welcome User,
 This site is for educational purposes 
 only. Please refrain from uploading 
 any copyrighted material. To get 
 started click on the Upload tab. 
 Once their select a file to upload 
 and then select the media type. Most 
 image formats are supported, however 
 only mp3 files can currently be loaded 
 into the audio section.The Picture and 
 dio tabs will take you to the content 
 you have loaded. We cannot support 
 downloads at this time. 
                </pre>
            </div>
        </div>
        <footer>
            &copy; 2014 Gorewicz     
        </footer>            
    </body>
</html>