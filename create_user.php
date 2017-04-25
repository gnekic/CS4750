<?php
    ob_start();
    session_start();
   	include("./connect_to_db.php");
    include_once("./library.php");
    $db = DbUtil::loginConnection();
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
    
    //Check if username is unique
    //FIXME: uncommenting this i can't create any users.
//    $sql="SELECT username FROM Users";
//    $result = $db->query($sql);
//    while($row = $result->fetch_assoc()){
//        if($row["username"] = $username){
//            header('Location: create_account.html');
//        }
//    }
    
    // Form the SQL query (an INSERT query)
    $stmt = $db->stmt_init();
    if ($stmt = $db->prepare("INSERT INTO Users (username, first_name, last_name, email, password, fav_genre) VALUES(?, ?, ?, ?, ?, ?)") {
        $stmt->bind_param('ss', $username, $first_name, $last_name, $email, $password, $fav_genre);
        $stmt->execute();
        $stmt->bind_result($name, $pass);
        if ($stmt->fetch()) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $name;
            header('Location: ./profile.html');
            exit();
        }
        else{
            //$_SESSION["wrong"] = 1;
            header('Location: ./login.html');
            exit();
        }
    }
        
    mysqli_close($con);
?>
