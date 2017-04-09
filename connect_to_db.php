<?PHP
    $host="stardock.cs.virginia.edu";
    $username="cs4750s17ek4wy";
    $password="spring2017";
    $db_name="cs4750s17ek4wy";
    $tbl_name="Users";
    
    // Connect to server
    mysql_connect("$host", "$username", "$password")or die("cannot connect");
    mysql_select_db("$db_name")or die("cannot select DB");
    
    $myusername=$_POST['myusername'];
    $mypassword=md5($_POST['mypassword']);
    
    // Selecting all users from table
    $sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
    $result=mysql_query($sql);
    
    // need to check if given name and password match one in table
?>
