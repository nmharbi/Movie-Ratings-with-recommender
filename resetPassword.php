<?php
    include 'DB_CONFIG.PHP';
    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
    $username = $_POST['username'];
    $secretq = $_POST['secretq'];
    $password = $_POST['password'];
    $query = "SELECT *  FROM users WHERE username = '$username' AND secretq = '$secretq'";
    $result= mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $update = "UPDATE users SET password = '$password' WHERE username='$username'";
        mysqli_query($con ,$update );
        header('location:homepage.php?error=password has been reset');
    }else       
         header('location:homepage.php?error=password has not been reset');
?>