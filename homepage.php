<?php
    session_start();
    if(isset($_SESSION['username']))
         header('Location:homepage2.php');
?>
<!DOCTYPE html>
<html>
<head id="Head1">
    <meta charset="utf-8">
    <title>NAS</title>
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
            width: 1200px;
            height: 120px;
            border-radius: 80px;
        }
        .movieRow {
            background-color: lightgray;
            position: relative;
            width: 2500px;
            height: 750px;
            margin-top: 20px;
            margin-left: 25px;
            border-radius: 40px;
        }
        .imagesizes {
            width: 450px;
            height: 660px;
            position: static;
            border-radius: 40px;
            padding: auto;

        }
        .imagesizes:hover {
            zoom: 101%;
            opacity: 0.7;
        }
        .form2{
            position: relative;
            display: inline;
            padding: auto;
            margin-left: 40px;
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
            top: -118px;
            left: 80px;
        }
        .btn{
            width: 420px;
            height: 620px;
            border-radius: 40px;
            margin-left: 25px;
            /* border-width: 0px; */
        }
        .reco{
            position: relative;
            left : 190px;
            top : -59px
        }

    </style>
    <span id = "btt"></span>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
    <div id="id01" class="modal">
        <form class="modal-content animate" action="http://localhost/nas_db/login.php" method="post">
            <div class="container">
              <h1>login</h1>
                <p>Please fill in this form to login.</p>
                <hr>
                <label for="username"><b>username</b></label>
                <input type="text" placeholder="Enter username" name="username" id="username" required>
                <label for="password"><b>password</b></label>
                <input type="password" placeholder="Enter password" name="password" id="password" required>
                <span class="psw">Forgot <a href="http://localhost/nas_db/resetPassword.html">password?</a></span>
                <button type="submit" class="registerbtn">Login</button>
            </div>
    </form>
    </div>
    </script>
    <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Register</button>
    <div id="id02" class="modal">
        <form class="modal-content animate" action="http://localhost/nas_db/register.php" method="post">
            <div class="container">
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <label for="Username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" id="Username" required>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="psw" required>
                <label for="secretq"><b>What is your favourite color ?</b></label>
                <input type="text" placeholder="Enter your answer" name="secretq" id="secretq" required>
                <hr>
                <button type="submit" class="registerbtn">Register</button>
            </div>
        </form>
    </div>
    <script>
        var modal = document.getElementById('id02');
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <img id="BTT" st yle="position: relative; top: 0px; left: 0px; ">
</head>

<body>
    <div class="webHeader">
    <h1 style="margin-left: 200px;">Welcome to NAS movies and TV series rating website</h1>
    </div>
    <div class="movieRow" id="fourth">
        <h1 class "RowsInfo">Crime movies :</h1>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Twist (2021)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/29dCusd9PwHrbDqzxNG35WcpZpS.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="The Little Things (2021)">
            <button style="background-color: lightgray; " class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/c7VlGCCgM9GZivKSzBgzuOVxQn7.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Below Zero (2021)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/dWSnsAGTfc8U27bWsy2RfwZs0Bs.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Vanguard (2020)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/mKvw1Ic9enfFlCPBNJGiejRPMUO.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Bad Boys for Life (2020)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/y95lQLnuNKdPAzw9F9Ab8kJ80c3.jpg"></button>
        </form>
    </div>

    <div class="movieRow" id="third">
        <h1 class "RowsInfo">Comedy movies :</h1>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="The Croods: A New Age">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/279yOM4OQREL36B3SECnRxoB4MZ.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="The Croods: A New Age (2020)">
            <button style="background-color: lightgray; " class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/tbVZ3Sq88dZaCANlUcewQuHQOaE.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="(The SpongeBob Movie: Sponge on the Run (2020))">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/jlJ8nDhMhCYJuzOw3f52CP1W8MW.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Shazam! (2019)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/xnopI5Xtky18MPhK40cZAGAOVeV.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="The Wedding Unplanner (2020)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/bkz7ZoqJMFziqF8yQzkmfMRUEG.jpg"></button>
        </form>
    </div>

    <div class="movieRow" id="scound">
        <h1 class "RowsInfo">Drama movies :</h1>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Evangelion: 3.0+1.0 Thrice Upon a Time (2021)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500//jDwZavHo99JtGsCyRzp4epeeBHx.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Joker (2019)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Demon Slayer - Kimetsu no Yaiba - The Movie: Mugen Train (2020)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500//qfLpiXGV93x8EnZIjmuyO6qXBMx.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Soul (2020)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/hm58Jw4Lw8OIeECIq5qyPYhAeRJ.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Alone (2020)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/n9OzZmPMnVrV0cMQ7amX0DtBkQH.jpg"></button>
        </form>
    </div>

    <div class="movieRow" id="first">
        <h1 class "RowsInfo">Action movies :</h1>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Godzilla vs. Kong">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/pgqgaUx1cJb5oZQQ5v0tNARCeBp.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Zack Snyders Justice ">
            <button style="background-color: lightgray; " class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/tnAuB8q5vv7Ax9UAEje5Xi4BXik.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Chaos Walking (2021)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/9kg73Mg8WJKlB9Y2SAJzeDKAnuB.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Monster Hunter">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/1UCOF11QCw8kcqvce8LKOO6pimh.jpg"></button>
        </form>
        <form  method="post" action="http://localhost/nas_db/movieInformation2.php" class="form2">
            <input type="text" style="display: none;" name="title" value="Outside the Wire (2021)">
            <button style="background-color: lightgray;" class="btn"><img  class="imagesizes" src="https://image.tmdb.org/t/p/w500/6XYLiMxHAaCsoyrVo38LBWMw2p8.jpg"></button>
        </form>
    </div>


 <a href="#login">
        <div class="cRidus">
            <p class="BackTotop">Back to top</p>
        </div>
    </a>
</body>

</html>