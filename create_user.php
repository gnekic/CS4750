<?php
    include("connect_to_db.php");
	$db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);	
    if ($db->connect_error):
       die ("Could not connect to db " . $db->connect_error);
    endif;
    
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); //Encrypt Password
    $fav_genre = $_POST['fav_genre'];
    
    $sql = "INSERT INTO Users Values
        ('$username', '$first_name', '$last_name', '$email', '$password', '#fav_genre')";
    
    if (!mysqli_query($db,$sql))
    {
        die('Error: ' . mysqli_error($db));
    }
    else
    {
        echo "Welcome $username!";
    }
    mysqli_close($db);
?>
