<?php
    include 'DB_CONFIG.PHP';
    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
    $MovieId = $_POST['MovieId'];
    $Action = $_POST['Action'];
    $Approve = 'Approve';
    $title;
    $genres;
    $userID;
    $rating;
    $tmdbId;
    if(!strcmp($Action,$Approve)){
        $query = "SELECT *  FROM waitingforapproval WHERE movieId = $MovieId";
        $result= mysqli_query($con , $query);
        while($row = mysqli_fetch_array($result)){
           global $title,$genres,$userID,$tmdbId,$rating;
           $title=$row['title'];
           $genres=$row['genres'];
           $userID=$row['userID'];
           $tmdbId=$row['tmdbId'];
           $rating=$row['rating'];
        }
        if(true){
            $addQueryMovies = "INSERT INTO movies (title,genres) VALUES('$title','$genres')";
            $add = mysqli_query($con , $addQueryMovies);
            $findNewId = "SELECT *  FROM movies WHERE title ='$title'";
            $find = mysqli_query($con , $findNewId);
            while($row = mysqli_fetch_array($find)){
                global $movieId;
                $movieId = $row['movieId'];
            }
            $addQueryRating = "INSERT INTO ratings (userId,movieId,rating) VALUES('$userID','$movieId' ,'$rating')";
            $addRating = mysqli_query($con , $addQueryRating);
            global $tmdbId;
            $addToLinks = "INSERT INTO links (movieId,tmdbId) VALUES('$movieId','$tmdbId')";
            $addLink = mysqli_query($con , $addToLinks);
      }
    }
    $deleteQuery = "DELETE FROM waitingforapproval WHERE movieId = '$MovieId'";
    $deletig = mysqli_query($con , $deleteQuery);
    header('location: admin.php');
?>