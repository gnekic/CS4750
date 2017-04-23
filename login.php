<?php
   	include("connect_to_db.php");
	$db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);	
    if ($db->connect_error):
       die ("Could not connect to db " . $db->connect_error);
    endif;
	
    session_start();
    $stmt = $db->stmt_init();
    $name = $_GET["username"];
    $pword = md5($_GET["password"]);
    $found = 0;
    $login = false;
    if ($stmt->prepare("select * from Users where username = ? and password = ?")) {
        mysqli_stmt_bind_param($stmt, "ss", $name, $pword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $usr, $pass);
        if (mysqli_stmt_fetch($stmt)) {
            $found = 5;
            $_SESSION["login"] = true;
            $_SESSION["username"] = $name;
            header(Location:"profile.html");
        }
        $stmt->close();
    }
    echo $found;
    $db->close();
?>
