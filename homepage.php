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
            font-family: Arial, Helvetica, sans-serif;
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
        
        .search-box {
            position: absolute;
            top: 1px;
            right: 20px;
            transform: translate(5%, 5%);
            background: lightskyblue;
            height: 40px;
            border-radius: 40px;
            padding: 10px;
            content: \f002;
            font-family: 'fontawesome';
        }
        .search-box:hover {
            background: lightblue;

        }

        .search-box:hover > .search-txt {
        width: 200px;
        padding: 0 6px;
        }

        .search-box:hover > .search-btn {
        background: white;
        color: lightskyblue;
        }
        .search-box:hover > .search-btn:hover {
        color: lightblue;
        }

        .search-btn {
        color: lightskyblue;
        float: left;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: whitesmoke;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.4s;
        color: lightskyblue;
        cursor: pointer;
        }
        .search-btn:hover {
        color: lightblue;
        }

        .search-btn > i {
        font-size: 30px;
        }

        .search-txt {
        border: none;
        background: none;
        outline: none;
        float: left;
        padding: 0;
        color: white;
        font-size: 16px;
        transition: 0.4s;
        line-height: 40px;
        width: 0px;
        font-weight: bold;
        }
    </style>
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
    <div class="movieRow" id="first">
        <h1 class "RowsInfo">Recomended :</h1>
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