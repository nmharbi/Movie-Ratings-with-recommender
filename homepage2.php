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
    <script src="https://kit.fontawesome.com/50be164558.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        body {
            background-color: darkgray;
        }
        .webHeader {
            background-color: whitesmoke;
            position: relative;
            top: 1em;
            left: 40em;
            width: 1200px;
            height: 120px;
            border-radius: 80px;
        }
        .movieRow {
            background-color: lightgray;
            position: relative;
            width: 2500px;
            height: 740px;
            margin-top: 20px;
            margin-left: 25px;
            border-radius: 40px;
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
        .imagesizes:hover {
            zoom: 101%;
            opacity: 0.7;
            margin-right: 0px;
        }
        h1 {
            position: relative;
            left: 10px;
            top: 10px;
            color: lightskyblue;
        }
        .RowsInfo {
            position: absolute;
        }
        .cRidus {
            background-color: lightskyblue;
            color: black;
            height: 110px;
            width: 110px;
            border-radius: 50%;
            display: inline-block;
            font-size-adjust: unset;
            background-attachment: fixed;
            bottom: 50px;
            right: 10px;
            background-image: none;
            position: fixed;
        }
        .BackTotop {
            text-decoration: none;
            color: whitesmoke;
            position: absolute;
            position: inherit;
            bottom: 80px;
            right: 25px;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid whitesmoke;
            box-sizing: border-box;
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
        .add{
            width:auto;
            position: relative;
            top: -59px;
            left: 80px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .container {
            padding: 16px;
        }

        .modal-content {
            background-color: whitesmoke;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
            width: 80%;
            border-radius: 40px;

        }

        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }
        
        .searchbox {
        position: absolute;
        top: 5px;
        right: 20px;
        height: 50px;
        font-family: 'fontawesome';
        border-radius: 40px;
        }
        .search {
        top: 5px;
        height: 50px;
        border-radius: 40px;
        }
        .searchrbtn {
            width: 50px;
            height: 50px;
            position: inherit;
            top: 0px;
            right: 0px;
        }
        .add{
            width:auto;
            position: relative;
            top: -59px;
            left: 80px;
        }
    </style>
            <form class="searchbox" method="post" action="http://localhost/nas_db/movieInformation.php">
                <input class="search" type="text" placeholder="search..." name="title" id="title" required>
                <button type="submit" class="searchrbtn"><i class='fas fa-search'></i></button>
            </form>
       </div>
        <form method="post" action="http://localhost/nas_db/logout.php">
            <button  style="width:auto;" id="logout">logout</button>
        </form>
        <button onclick="document.getElementById('id01').style.display='block'" class="add" style="width:auto;">Add movie</button>
        <div id="id01" class="modal">
            <form class="modal-content animate" action="http://localhost/nas_db/addmovie.php" method="post">
                <div class="container">
                    <h1>Add movie</h1>
                    <p>Please fill in this form to add an movie.</p>
                    <hr>
                    <label for="Title"><b>Title</b></label>
                    <input type="text" placeholder="Enter Title" name="Title" id="Title" required>
                    <label for="Genres"><b>Genres</b></label>
                    <input type="text" placeholder="Enter Genres" name="Genres" id="Genres" required>
                    <label for="URL"><b>TmdbId code</b></label>
                    <input type="text" placeholder="Enter tmdbId code" name="tmdbId" id="tmdbId">
                    <label for="rating"><b>rating (0 to 5 only)</b></label>
                    <input type="text" placeholder="Enter rating" name="rating" id="rating" required>
                    <button type="submit" class="registerbtn">Add movie</button>
                </div>
            </form>
        </div>
        <script>
        var modal = document.getElementById('id01');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>

        <img id="BTT" style="position: relative; top: 0px; left: 0px; ">
</head>
<body>
    <div class="webHeader">
        <h1 style="margin-left: 200px;">Welcome to NAS movies and TV series rating website</h1>
    </div>
    <div class="movieRow" id="first">
        <h1 class "RowsInfo">Recomended :</h1>
        <span><img class="imagesizes" src="one.jpg"><span style ="z-index: 1; color : red;" >asdsa</span></span>
        <img class="imagesizes" src="tow.jpg">
        <img class="imagesizes" src="three.jpg">
        <img class="imagesizes" src="four.jpg">
        <img class="imagesizes" src="one.jpg">
    </div>
    <div class="movieRow" id="first">
        <h1 class "RowsInfo">test</h1>
        <img class="imagesizes" src="one.jpg">
        <img class="imagesizes" src="tow.jpg">
        <img class="imagesizes" src="three.jpg">
        <img class="imagesizes" src="four.jpg">
        <img class="imagesizes" src="one.jpg">
    </div>
    <div class="movieRow" id="first">
        <h1 class "RowsInfo">test</h1>
        <img class="imagesizes" src="one.jpg">
        <img class="imagesizes" src="tow.jpg">
        <img class="imagesizes" src="three.jpg">
        <img class="imagesizes" src="four.jpg">
        <img class="imagesizes" src="one.jpg">
    </div>
    <div class="movieRow" id="first">
        <h1 class "RowsInfo">test</h1>
        <img class="imagesizes" src="one.jpg">
        <img class="imagesizes" src="tow.jpg">
        <img class="imagesizes" src="three.jpg">
        <img class="imagesizes" src="four.jpg">
        <img class="imagesizes" src="one.jpg">
    </div>
    <div class="movieRow" id="first">
        <h1 class "RowsInfo">test</h1>
        <img class="imagesizes" src="one.jpg">
        <img class="imagesizes" src="tow.jpg">
        <img class="imagesizes" src="three.jpg">
        <img class="imagesizes" src="four.jpg">
        <img class="imagesizes" src="one.jpg">
    </div>
    <div class="movieRow" id="first">
        <h1 class "RowsInfo">test</h1>
        <img class="imagesizes" src="one.jpg">
        <img class="imagesizes" src="tow.jpg">
        <img class="imagesizes" src="three.jpg">
        <img class="imagesizes" src="four.jpg">
        <img class="imagesizes" src="one.jpg">
    </div>

    <div class="movieRow" id="first">
        <h1 class "RowsInfo">test</h1>
        <img class="imagesizes" src="one.jpg">
        <img class="imagesizes" src="tow.jpg">
        <img class="imagesizes" src="three.jpg">
        <img class="imagesizes" src="four.jpg">
        <img class="imagesizes" src="one.jpg">
    </div>
    <div class="movieRow" id="first">
        <h1 class "RowsInfo">test</h1>
        <img class="imagesizes" src="one.jpg">
        <img class="imagesizes" src="tow.jpg">
        <img class="imagesizes" src="three.jpg">
        <img class="imagesizes" src="four.jpg">
        <img class="imagesizes" src="one.jpg">
    </div>
    <a href="#BTT">
        <div class="cRidus">
            <p class="BackTotop">Back to top</p>
        </div>
    </a>
</body>

</html>