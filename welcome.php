<html>
    <body>
        Name: <?php echo htmlspecialchars($_POST["name"]); ?><br/>
        Mail to: <?php echo htmlspecialchars($_POST["email"]); ?><br/>
        Major: <?php echo $_POST["major"]; ?><br/>
        
        Places visited: <?php 
        $array = $_POST["visted"];
        foreach ($array as $value)
        {
            echo "<li>$value</li>";
        } 
        ?><br/>
        Comments: <br/> <?php echo htmlspecialchars($_POST["comments"]); ?><br/>
    </body>
</html>