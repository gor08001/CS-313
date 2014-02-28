<?php
$con = new mysqli("localhost", "usr", "php-pass","root");
//Check Connection       
if (mysqli_connect_errno())   
    { echo "Failed to connect to MySQL: " . mysqli_connect_error();
        
    }
 
    function getUser($con,$table)
    {
      $sql = mysqli_query($con,"SELECT * FROM $table");
       $result = array();  
       while($row = mysqli_fetch_array($sql))
       {
           $result[] = $row;
       }
       return $result;
    }
    
    function getLibrary($con,$username)
    {
      $sql = mysqli_query($con,"SELECT * FROM user AS u "
              . "join library AS l on u.user_id = l.user_id "
              . "WHERE u.user_id = ".$username);
      
      $result = array();
       
       while($row = mysqli_fetch_array($sql))
       {
           $result[] = $row;
       }
       
       return $result;
    }
    
    function getPic($con)
    {
        $pic = mysqli_query($con,"SELECT * FROM picture");             
        $result = array();
        while($row = mysqli_fetch_array($pic))
       {
           $result[] = $row;
       }
       return $result;
    }
    
    function getVideo($con)
    {
       $vid = mysqli_query($con,"SELECT * FROM video");
        $result = array();
        while($row = mysqli_fetch_array($vid))
       {
           $result[] = $row;
       }
       return $result;      
    }
    
    function getSound($con)
    {
       $sou = mysqli_query($con,"SELECT * FROM sound");
        $result = array();
        while($row = mysqli_fetch_array($sou))
       {
           $result[] = $row;
       }
        return $result;
    }
    
    $username = $_POST['user'];
    $library = $_POST['library'];

    
    $users = getUser($con,'user');
    $lib   = getLibrary($con,$username);
    $pics  = getPic($con);
    $vid   = getVideo($con);
    $sou   = getSound($con);
    $val   = $_POST['vaults'];
?>
<!doctype html>
<html>
    <head>       
        <title> Database Search </title>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>
        <header>
            <div id="topHat"> 
                <h1 id="title">Media Vault Search</h1>
            </div>
            <div id ='top-menu'>
                <ul>
                    <li><a href="index.html" class="navagation">
                            HOME</a></li>
                    <li><a href="assignments.html" class="navagation">
                            CS 313 ASSIGNMENTS</a></li>
                </ul>
            </div>            
        </header>
        <div id="content">
            <form action="search.php" method="POST">
                <div id="datauser">
                  <?php
                    
                   echo '<select name="user">';
                    
                    foreach ($users as $us)
                    {
                        echo '<option value="'.$us['user_id'].'">'.$us['username'].'</option>';
                    }

                    echo '</select>';    
                    ?>
                 </div>
                <div>
                    <?php
                    echo '<select name="library">';
                        
                    foreach ($lib as $l)
                    {
                        echo '<option value="'.$l['lib_id'].'">'.$l['name'].'</option>';
                    }
                        
                    echo '</select>';                        
                    ?>  
                </div>
                <div>
                    <select name="vaults">
                        <option value="1">Picture Vault</option>
                        <option value="2">Sound Vault</option>
                        <option value="3">Video Vault</option>
                    </select>
                </div>
                <div>
                <?php
                if ($val == '1')
                {
                    echo '<select name="picture">';
                    foreach ($pics as $p)
                    {
                        echo '<option value="'.$p['p_id'].'">'.$p['picName'].'</option>';                                        
                    }
                    echo '</select>';
                }
                elseif ($val == '3')
                {
                    echo '<select name="video">';
                    foreach ($vid as $v)
                    {
                        echo '<option value="'.$v['v_id'].'">'.$v['name'].'</option>';                                        
                    }
                    echo '</select>';
                }
                elseif ($val == '2')
                {
                    echo '<select name="video">';
                    foreach ($sou as $s)
                    {
                        echo '<option value="'.$s['s_id'].'">'.$s['name'].'</option>';                                        
                    }
                    echo '</select>';
                }
                ?>                    
                </div>
                <input type="submit"/>
            </form>
        </div>
        <footer>
            &copy; 2014 Gorewicz     
        </footer>
    </body>   
</html>