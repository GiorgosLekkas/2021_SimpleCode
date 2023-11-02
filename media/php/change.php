<?php

    include 'connection.php';
    $con = opencon();

    session_start();

    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $uname = $_SESSION['username'];
    $email = $_POST["email"];
    $date = $_POST["bdate"];
    $gender = $_POST["gend"];
    $password = $_POST["password"];

    //$con = mysqli_connect("localhost","root","");
    mysqli_select_db($con,"signup");
    $sql = "UPDATE users SET firstname='$fname',lastname='$lname',email='$email',gender='$gender',password='$password' WHERE username='$uname' ";
    mysqli_query($con, $sql);
    if(!$con || !mysqli_query($con, $sql)){
      echo 'Connection failed';
    }

    $result = mysqli_query($con,"SELECT id FROM users WHERE username = '$uname'");
    $db = "SELECT * FROM users";
    $res = mysqli_query($con, $db);

    if(mysqli_num_rows($result) == 1) {
        session_start();
        while($row = mysqli_fetch_array($res)){
            if($row['username'] == $uname){
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['username'] = $uname;
                $_SESSION['password'] = $password;
                $_SESSION['date'] = $row['date'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['type'] = $row['type'];
            }
        }
    }
    header("Location:../account.php");

    closecon($con);

?>
