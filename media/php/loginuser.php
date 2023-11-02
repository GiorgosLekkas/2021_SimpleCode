<?php
include 'connection.php';
$con = opencon();

    //$con = mysqli_connect("localhost","root","");
    mysqli_select_db($con,"signup");

    $uname = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT id FROM users WHERE username = '$uname' and password = '$pass'";
    $result = mysqli_query($con,$sql);

    $db = "SELECT * FROM users";
    $res = mysqli_query($con, $db);


    if(mysqli_num_rows($result) == 1) {
        session_start();
        while($row = mysqli_fetch_array($res)){
            if($row['username'] == $uname && $row['password'] == $pass){
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['username'] = $uname;
                $_SESSION['password'] = $pass;
                $_SESSION['date'] = $row['date'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['pic'] = $row['pic'];
                header("location:../index.php");
            }
        }
    }else {
        header("location: ../login.php?error=This Username doesn't exists or wrong Password!!!");
        exit();
    }
    closecon($con);

?>
