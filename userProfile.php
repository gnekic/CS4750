<?php
    include_once("./library.php"); 
    $db = DbUtil::loginConnection();
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    
    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server.");
        return null;
    }
    
    
    //Find current user's favorite genre
    $username = $_SESSION['username']
    $getGenre = "SELECT fav_genre FROM Users WHERE user_name = $username"
    $genre = mysqli_Query($con, $getGenre)
    
    //Join TVShows & Movies, select Titles of those that are from the same preferred genre of the logged in user
    $sql="SELECT Title, Genre FROM Movies WHERE Genre='$genre' UNION ALL Title, Genre FROM TVShows WHERE Genre='$genre'";
    $result = mysqli_query($con,$sql);
    
    //Write HTML that allows users to see titles of the returned movies/tvshows 
?>
