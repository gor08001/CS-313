<?php
    session_start();
    $timeout = 600;

    if(isset($_SESSION['timeout'])) {
        $duration = time() - (int)$_SESSION['timeout'];
        if($duration > $timeout) {
            session_destroy();
            session_start();
        }
                else {
                        echo '<script type="text/javascript" language="javascript">window.open("submit.php","_self");</script>';
                }
    }

    $_SESSION['timeout'] = time();



ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            PHP Survey
        </title>
        <link rel="stylesheet" type="text/css" href="index.css"/>
        
    </head>
    <body>
        <header>
          <div id="topHat">
            <h1 id="title">Survey</h1>
          </div>
          <div id ="top-menu">
              <ul>
                  <li><a href="index.html" class="navagation">
                          HOME</a></li>
                  <li><a href="assignments.html" class="navagation">
                  CS 313 ASSIGNMENTS</a></li>
              </ul>
          </div>
        </header>
        <div id="content">
            <a href="submit.php" class="link">Survey Results</a>
            <form id ="survey" action="submit.php" method="post">
                Do you like going to the pool?
                <input type="radio" name="pool" value="yes">Yes
                <input type="radio" name="pool" value="No">No<br/>
                Do you like Pizza?
                <input type="radio" name="pizza" value="yes">Yes
                <input type="radio" name="pizza" value="No">No<br/>
                Can you ride a unicycle?
                <input type="radio" name="uni" value="yes">Yes
                <input type="radio" name="uni" value="No">No<br/>   
                Have you served a mission?
                <input type="radio" name="mission" value="yes">Yes
                <input type="radio" name="mission" value="No">No<br/>
                <input type="submit" value="Submit Poll">
            </form>
        </div>
        <footer>
            &copy; 2014 Gorewicz  
        </footer>
    </body>
</html>