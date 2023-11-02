<?php

    include 'connection.php';
    $con = opencon();
    session_start();

    $uname = $_SESSION['username'];
    $level = $_POST['level'];
    $result = $_POST['result'];
    $date = date('m/d/Y h:i:s', time());
    //$con = mysqli_connect("localhost","root","");
    mysqli_select_db($con,"quiz");
    $sql = "INSERT INTO results (username, level, score, datetime) VALUES ('$uname','$level','$result',NOW())";
    $db = mysqli_query($con, $sql);
    if(!$db){
        echo "CONNECTION LOST";
    }else{
        header("Location: ../quiz-lvl.php");
    }

    closecon($con);

?>
