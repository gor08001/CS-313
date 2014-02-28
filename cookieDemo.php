<?php

$key = "visits";
$visits = 0;

if (isset($_COOKIE[$key]))
{
    $visits = $_COOKIE[$key];
}
else 
    {
    
     $visits = 0;

    }
    $visits++;
    setcookie($key,$visits,time()+600);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            cookies
        </title>
    </head>
    <body>
        Cookies
        <br/>
        <?php
        echo "You have visited the page $visits times";
        ?>
    </body>
</html>
        