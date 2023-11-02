<?php
include 'php./connection.php';
$con = opencon();

    //$con = mysqli_connect("localhost","root","");
    mysqli_select_db($con,"signup");

    $uname = $_POST['username'];
    $type = $_POST['type'];

    if($type == 'Admin'){
        header("location:../users.php");
    }else{
        if(isset($_POST['delete'])){
            $sql = "DELETE FROM users WHERE username='$uname'";
            mysqli_query($con, $sql);

            if(!mysqli_query($con, $sql))
                echo 'e';
            else
                header("location:../users.php");
        }else if(isset($_POST['changerole'])){
            $newrole = $_POST['type'];
            if($_POST['type']!='Admin'&&$_POST['type']!='Moderator'&&$_POST['type']!='User'){
                header("location: ../users.php?errorrole=This Role is invalid!(Admin,Moderator,User)");
            }else{
                $sql = "UPDATE users SET type='$newrole' WHERE username='$uname' ";
                mysqli_query($con, $sql);
                header("location:../users.php");
            }
        }
    }

    closecon($con);

?>
