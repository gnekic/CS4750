<?php
    require("connect_to_db.php");
    $db = DbUtil::loginConnection();
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    
    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
             mysqli_connect_error());
        return null;
    }
    
    $title = $_POST['title']
    //need to join TVShows with Movies table 
    $sql="SELECT * FROM TVShows WHERE Title = ('title')";
    $result = mysqli_query($con,$sql);
    
?>
