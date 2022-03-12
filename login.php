<?php
    include 'DB_CONFIG.PHP';
    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
    $user = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT *  FROM users WHERE username = '$user' AND password = '$password'";
    $result= mysqli_query($con , $query);
    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['username'] = $user;
        header('location:homepage2.php');
    }else {
      echo 'Incorrect User name or Password';
      header('location: homepage.php?error = User has not been registerd');
    }
?>