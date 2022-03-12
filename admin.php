<?php
    session_start();
    $username = $_SESSION['username'];
    $admin = "admin";
    if(strcmp($username,$admin))
         header('Location:homepage.php');
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
            background-color: whitesmoke;
            position: relative;
            width: auto;
            height: auto;
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
        p{
            color: whitesmoke;
        }
        .RowsInfo {
            position: absolute;
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
            width: 5%;
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
        .add{
            width:auto;
            position: relative;
            top: -59px;
            left: 80px;
        }
    </style>
        <form method="post" action="http://localhost/nas_db/logout.php">
            <button  style="width:auto;" id="logout">logout</button>
        </form>
        </div>
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
                    <label for="rating"><b>rating</b></label>
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
</head>
<body>
    <div class="movieRow">
        <form action="http://localhost/nas_db/actionOnMovies.php" method="post" style="left: 900px;position: relative;color : lightskyblue;">
            <label for="MovieId"><b>Movie id :</b></label>
            <input type="text" placeholder="Enter Movie id" name="MovieId" id="MovieId" style="height: 20px; width: 80px;" required>
            <button type="submit">Submit</button>
            <label><br>Approve</label>
            <input name = "Action" type="radio" value="Approve" checked>
            <label>decline</label>
            <input name = "Action" type="radio" value="decline">
            <br>

        </form>
        <h1 style="text-align: center;">Movies waiting for approval : </h1>
        <table bordercolor="gray" border="1" style="left: 1100px;position: relative;font-size :25px ;color : lightskyblue;" >
        <thead> 
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>geners</td>
                <td>userID</td>
                <td>tmdbId</td>
                <td>Rating</td>

            </tr>
        </thead>
        <tbody>
        <?php
            include 'DB_CONFIG.PHP';
            $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
            $queryS = "SELECT * FROM waitingforapproval";
            $list = mysqli_query($con , $queryS);
            while($row = mysqli_fetch_array($list)){
                echo '<tr>';
                echo'<td>';
                echo $row['movieId'];
                echo'</td>';
                echo'<td>';
                echo $row['title'];
                echo'</td>';
                echo'<td>';
                echo $row['genres'];
                echo'</td>';
                echo'<td>';
                echo $row['userID'];
                echo'</td>';
                echo'<td>';
                echo $row['tmdbId'];
                echo'</td>';
                echo'<td>';
                echo $row['rating'];
                echo'</td>';
                echo'<tr>';
            }
        ?>
        </tbody>
    </table>    

    </div>
</body>

</html>