
<html>
    <head>
        <title>Results</title> 
        <link rel="stylesheet" type="text/css" href="index.css"/>
    </head>
    <body>
        <header>
          <div id="topHat">
            <h1 id="title">Survey Results</h1>
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
        <div id="survey">
        <?php
        $fname="/var/www/html/results.txt";
        $lines=file($fname, FILE_IGNORE_NEW_LINES);
        $newVal=array_values($_POST);
        $qu = 0;
        for($i = 0; $i < 4; $i++)
        {
            if($newVal[$i] == "No")
                $lines[$qu + 1] += 1;
            else if($newVal[$i] =="yes")
                $lines[$qu] += 1;
            $qu +=2;       
            }
          $fp=fopen($fname, "w+");
            foreach($lines as $key => $value)              
            {
                fwrite($fp,$value."\r\n");               
            }
            fclose($file);
            echo("<h3>Here are the results!</h3><br/>");

            $q = 1;
            for($j = 0; $j < 7; $j)
            { 
                echo("Question " . $q . ":<br/>Yes: " .
                        $lines[$j++] . " No: " . $lines[$j++] 
                        . "<br/>");
                $q++;            
            }
            ?>
        </div>
    </body>
</html>