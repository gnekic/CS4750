<!DOCTYPE html>
<html lang="en">
<html>
    <body>
        <h1>
        <?php
            include_once("./library.php");
            $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
            
            if (mysqli_connect_errno()) {
                echo("Can't connect to MySQL Server.");
                return null;
            }
        
            $sql="SELECT Title from Movies WHERE Genre = 'Comedy'";
            $result = mysqli_query($con, $sql);
            
            while($titles = mysqli_fetch_array($result)){
                $movies[] = $titles;
            }
            
            foreach($movies as $titles){
                $title = $titles['Title']; ?>
                <a href="index.html">
            <img src="./images/<?php echo($title); ?>.jpg" style="width:304px;height:228px;"></a>
                <?php
            }
        ?>
        </h1>

    </body>
</html>
