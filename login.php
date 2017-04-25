<?php
    ob_start();
    session_start();
   	include("./connect_to_db.php");
    $db = DbUtil::loginConnection();
    
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $name = $_POST["username"];
    $pword = md5($_POST["password"]);
    $login = false;
    
    $stmt = $db->stmt_init();
    if ($stmt = $db->prepare("select username, password from Users where username = ? and password = ?")) {
        $stmt->bind_param('ss', $name, $pword);
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
	$stmt->close();
    $db->close();
?>
