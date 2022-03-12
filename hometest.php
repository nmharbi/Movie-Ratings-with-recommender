
<!DOCTYPE html>
<html>
<head id="Head1">
    <meta charset="utf-8">
    <title>NAS</title>
    <script src="https://kit.fontawesome.com/50be164558.js" crossorigin="anonymous"></script>
    <style>
        body{
            width: auto;
        }
    </style>
</style>


</head>

<body>
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
        echo '<p> ';
        echo $userId;
        echo'</p>';
    }
?>
</body>

</html>