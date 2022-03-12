<?php
    session_start();
    $username = $_SESSION['username'];
    $admin = "admin";
    if(!strcmp($username,$admin))
         header('Location:admin.php');
    if(!isset($_SESSION['username']))
         header('Location:homepage.php?Please login');
?>
<!DOCTYPE html>
<html>
<head id="Head1">
    <meta charset="utf-8">
    <title>NAS</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://kit.fontawesome.com/50be164558.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: darkgray;
        }
        .webHeader {
            background-color: whitesmoke;
            position: relative;
            top: 1em;
            left: 40em;
            width: 1000px;
            height: 120px;
            border-radius: 80px;
        }
        .movieRow {
            position: relative;
            width: 2480px;
            height: auto;
            margin-top: 20px;
            margin-left: 25px;
            border-radius: 40px;
        }
        .movieRowimg {
            box-sizing: content-box;
            position:fixed ;
            width: 2480px;
            height: 1000px;
            border-radius: 40px;
            opacity: 0.4;
            filter: blur(10px);
            -webkit-filter: blur(12px);
        }

        .imagesizes {
            width: 450px;
            height: 660px;
            position: relative;
            top: 10px;
            left: 105px;
            margin-right: 10px;
            border-radius: 40px;
        }
        h1 {
            position: relative;
            left: 10px;
            top: 10px;
            color: whitesmoke;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            height: auto;
            width: auto;
        }
        button {
            background-color: lightskyblue;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 40px;
        }
        button:hover {
            background-color: lightblue;
        }
        .searchbox {
        position: relative;
        top: 1px;
        left: 1000px;
        height: 80px;
        font-family: 'fontawesome';
        border-radius: 40px;
        }
        .search {
        position: relative;
        height: 80px;
        width: 300px;
        border-radius: 40px;
        font-size : 30px;
        }
        .searchrbtn {
            width: 81px;
            height: 81px;
            position: relative;
            top: -5px;
            right: 85px;
        }
        span{
            color : whitesmoke;
            font-weight: bold;
        }
        .rating{
            position: relative;
            left :600px;
            top: 450px;
            z-index: 5;
            color: whitesmoke;

        }
        .ratingbtn{
            width: auto;
            height: auto;
        }
        .rating2{
            border-radius: 40px;
        }
        .ratingDrob{
            border-radius: 40px;
            background-color: whitesmoke;
        }
    </style>
       <form method="post" action="http://localhost/nas_db/logout.php">
           <button  style="width:auto;" id="logout">logout</button>
       </form>
       <form style="position: relative; left: 80px;top: -59px;" action="http://localhost/nas_db/homepage.php">
        <button  style="width:auto;" id="logout">homepage</button>
       </form>
       </style>
            <form class="searchbox" method="post" action="http://localhost/nas_db/movieinformation.php">
                <input class="search" type="text" placeholder="search..." name="title" id="title" required>
                <button type="submit" class="searchrbtn"><i class='fas fa-search'></i></button>
            </form>
       </div>
</head>
<?php
    include 'DB_CONFIG.PHP';
    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
    $title = $_POST['title'];
    $movieId;
    $tmdbId;
    $query = "SELECT * FROM movies WHERE title like '%".$title."%'";
    $result= mysqli_query($con , $query);
    if (mysqli_num_rows($result) > 0 && $row = mysqli_fetch_array($result)) {
        global $movieId,$tmdbId ;
        $movieId =  $row['movieId'];
        $query2 = "SELECT * FROM links WHERE movieId = '$movieId'";
        $result2= mysqli_query($con , $query2);
        if (mysqli_num_rows($result2) > 0 && $row = mysqli_fetch_array($result2) ) {
            global $tmdbId;
            $tmdbId = $row['tmdbId'];
        }
    }
    if(!isset($tmdbId)){
        header('Location:homepage2.php?error=movie was not found');
    }
    ?>
<body>  

    <div class="container">
    <form class="rating">
            <label>Rating :</label>
            <select name="rating" class="ratingDrob">
                <option>0.5</option>
                <option>1</option>
                <option>1.5</option>
                <option>2</option>
                <option>2.5</option>
                <option>3</option>
                <option>3.5</option>
                <option>4</option>
                <option>4.2</option>
                <option selected>5</option>
            </select>
            <button type="submit" class="ratingbtn">rate </button>
    </form>

        <div class="movieRow" style="font-size:20px;">
        <img class="movieRowimg" id="myMovieRow" src="" alt="">
            <h1 id="mypanel"></h1>
            <img  class="imagesizes"id="myImg" src="" alt="">
            <p style="opacity: 0;" id = "link">https://api.themoviedb.org/3/movie/<span id="tmdbId"><?php echo $tmdbId;?></span>?api_key=1ccbec14a1b9284fdc403e1d397db81b</p>
            <form action="http://localhost/nas_db/rateMovie.php" method="post" >
        </form>
        
        </div>
        <script>
            var link = document.getElementById("link").innerText;
            $.getJSON(link, function(data) {
            var text =  `<span>Title </span>: ${data.title}<br>
            <span>Overview </span>: ${data.overview}<br>
            <span>Original language </span>: ${data.original_language}<br>
            <span>Imdb id </span> : ${data.imdb_id}<br>
            <span>Genres </span> : `
            var x = `${data.genres.length}`;
            for(var i = 0 ; i < x-1 ; ++i)
                text += `${data.genres[i].name} ,`;
            text += `${data.genres[i].name} `;
            $("#mypanel").html(text);
            document.getElementById("myImg").src = "https://image.tmdb.org/t/p/w500/"+data.poster_path;
            document.getElementById("myMovieRow").src = "https://image.tmdb.org/t/p/w500/"+data.backdrop_path;
            });
        </script>
</body>
</html>