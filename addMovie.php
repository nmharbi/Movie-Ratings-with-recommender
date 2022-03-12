<?php 
    include 'DB_CONFIG.PHP';
    session_start();
    $username = $_SESSION['username'];
    $userQuerty = "SELECT * FROM users WHERE username = '$username'";
    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
    $userResult= mysqli_query($con,$userQuerty);
    $userId = -1;
    while($row = mysqli_fetch_array($userResult)){
        global $userId;
        $userId = $row['userId'];
    }
    $Title = $_POST['Title'];
    $Genres = $_POST['Genres'];
    $URL = $_POST['URL'];
    $tmdbId = $_POST['tmdbId'];
    $rating = $_POST['rating'];
    $query = "SELECT *  FROM waitingforapproval WHERE Title = '$Title'";
    $result= mysqli_query($con , $query);
    $num_rows = mysqli_num_rows($result);
    if(mysqli_num_rows($result) < 1) {
        $addQuery = "INSERT INTO waitingforapproval (title, genres  , rating ,userId ,tmdbId) VALUES('$Title','$Genres' ,'$rating','$userId' , '$tmdbId')";
        $adding = mysqli_query($con , $addQuery);
        header('location: homepage2.php?error = Movie has been added and wating for approval');
        
    }else
        header('location: homepage2.php?error = Movie is alrady in waiting list');
?>