// like an insert?
<?php
    require("connect_to_db.php")
    $db = DbUtil::loginConnection();
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    session_start();
    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
             mysqli_connect_error());
        return null;
    }
    
    $username = $_POST['username']
    $first_name = $_POST['first_name']
    $last_name = $_POST['last_name']
    $email = $_POST['email']
    $password = $_POST['password']
    $fav_genre = $_POST['fav_genre']
    
    $sql = "INSERT INTO Users Values
        ('$username', '$first_name', '$last_name', '$email', '$password', '#fav_genre')";
    
    if (!mysqli_query($con,$sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        echo "Welcome $username!";
        header("Location:index.html")
    }
    mysqli_close($con);
?>
