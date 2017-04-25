<?php
    ob_start();
    session_start();
    include_once("./library.php"); // To connect to the database
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); //Encrypt Password
    $fav_genre = $_POST['fav_genre'];
    
    $_SESSION["username"] = $username;
    
    //Check if username is unique
//    $sql="SELECT username FROM Users";
//    $result = $db->query($sql);
//    while($row = $result->fetch_assoc()){
//        if($row["username"] = $username){
//            header('Location: create_account.html');
//        }
//    }
    
    // Form the SQL query (an INSERT query)
    $sql = "INSERT INTO Users (username, first_name, last_name, email, password, fav_genre) VALUES
            ('$username', '$first_name', '$last_name', '$email', '$password', '$fav_genre')";
    
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;
        header('Location : profile.html');
        exit();
    }
    
    mysqli_close($con);
    ?>
