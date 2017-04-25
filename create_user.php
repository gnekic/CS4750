<?php
	session_start();
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
	
	//Check if username is unique
	$sql="SELECT username FROM Users";
	$result = $db->query($sql);
	while($row = $result->fetch_assoc()){
		if($row["username"] == $username){ ?>
			<script type = "text/javascript">
				document.cookie = "usernametaken=taken";
				window.location.replace("create_account.html");
			</script>
			<?php
		}
	}
	
    $sql = "INSERT INTO Users Values
        ('$username', '$first_name', '$last_name', '$email', '$password', '$fav_genre')";
    //if error:
    if (!mysqli_query($db,$sql))
    {
        die('Error: ' . mysqli_error($db));
    }
	//successful creation of account:
    else
    {
        $_SESSION["username"] = $username;
		$_SESSION["login"] = true;
		?>
		<script type = "text/javascript">
				document.cookie = "usernametaken=valid";
				window.location.replace("profile.php");
			</script>
		<?php
    }
    mysqli_close($db);
?>
