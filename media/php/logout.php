<?php

    session_start();

    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['date']);
    unset($_SESSION['email']);
    unset($_SESSION['gender']);
    unset($_SESSION['type']);
    unset($_SESSION['pic']);

    //echo isset($_SESSION['firstname']);

    header("Location:../index.php");

?>
