<?php
session_start();
if ($_SESSION['sess_username'] == '')
   {
       header("Location: login.html");
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            UPLOAD
        </title>
        <link rel="stylesheet" type="text/css" href="index.css"/>
    </head>
    <body>
        <header>
            <div id="topHat"> 
                <h1 id="title">
                    UPLOAD
                </h1>
            </div>
            <div id ='top-menu'>
                <ul>
                    <li><a href="homeVault.php" class="navagation">
                            Home</a></li>
                    <li><a href="pic.php" class="navagation" >
                            Pictures</a></li>
                    <li><a href="sound.php" class="navagation">
                            Audio</a></li>
                    <li><a href="upload.html" class="navagation" id="selected">
                            Upload</a></li>
                    <li><a href="logout.php" class="navagation">
                            Logout</a></li>
                </ul>
            </div>            
        </header>
        <div id="content">
            <div id="info">
                <form action="upload_file.php" method="post"
                      enctype="multipart/form-data">
                    <label for="file">Filename:</label>
                    <input type="file" name="file" id="file"><br>
                    <label for="vault">Vault:</label>
                    <select name="vault">
                        <option value="1">Picture Vault</option>
                        <option value="2">Sound Vault</option>
                        <option value="3">Video Vault</option>
                    </select>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
        <footer>
            &copy; 2014 Gorewicz     
        </footer> 
    </body>
</html>