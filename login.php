<?php
   	include("connect_to_db.php");
	$db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);	
    if ($db->connect_error):
       die ("Could not connect to db " . $db->connect_error);
    endif;
	
    session_start();
    $name = $_POST["username"];
    $pword = md5($_POST["password"]);
    $found = 0;
    $login = false;
    if ($stmt = $db->prepare("select username, password from Users where username = ? and password = ?")) {
        $stmt->bind_param('ss', $name, $pword);
        $stmt->execute();
        $stmt->bind_result($name, $pass);
        if ($stmt->fetch()) {
            $found = 5;
            $_SESSION["login"] = true;
            $_SESSION["username"] = $name;
            header("Location: profile.php");
        }
		else{
			//$_SESSION["wrong"] = 1;
			header("Location: login.html");
		}
	}
	$stmt->close();
    $db->close();
?>
