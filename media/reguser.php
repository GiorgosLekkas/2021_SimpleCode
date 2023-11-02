<?php

include 'php/connection.php';
$con = opencon();

    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $date = $_POST["bdate"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];

    $targetDir = "uploads/";
    if( is_dir($targetDir) === false ){
        mkdir($targetDir);
    }
    $fileName = basename($_FILES["pic"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


    //$con = mysqli_connect("localhost","root","");
    mysqli_select_db($con,"signup");

    $u = "SELECT username FROM users WHERE username='$username' ";
    $uname = mysqli_query($con,$u);
    $e = "SELECT email FROM users WHERE email='$email' ";
    $emaill = mysqli_query($con,$e);

    if(mysqli_num_rows($uname)>0 || mysqli_num_rows($emaill)>0){
        if(mysqli_num_rows($uname)>0){
            header("location: sign-up.php?error=This Username already exists!");
        }else if(mysqli_num_rows($emaill)>0){
            header("location: sign-up.php?error1=This Email already exists!");
        }
    }else if(!preg_match("/^[a-zA-Z\p{Greek}]+$/u",$fname)){
        header("location: sign-up.php?errorfname=Invalid first name!");
    }else if(!preg_match("/^[a-zA-Z\p{Greek}]+$/u",$lname)){
        header("location: sign-up.php?errorlname=Invalid last name!");
    }else if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)){
        header("location: sign-up.php?errorlname=Invalid email!");
    }else{
        $s = "SELECT COUNT(id) AS total FROM users";
        $result = mysqli_query($con, $s);
        $values = mysqli_fetch_assoc($result);
        $num = $values['total'];

        $allowTypes = array('jpg','png','jpeg','pdf');
        if(in_array($fileType, $allowTypes)){
        // Upload file to server
            if(move_uploaded_file($_FILES["pic"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
        if($num == 0){
            $sql = "INSERT INTO users (firstname, lastname, username, email, date, gender, password, pic, type) VALUES ('$fname','$lname','$username','$email','$date','$gender','$password','$targetFilePath','Admin')";
            session_start();
            $_SESSION['firstname'] = $fname;
            $_SESSION['lastname'] = $lname;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['date'] = $date;
            $_SESSION['email'] = $email;
            $_SESSION['gender'] = $gender;
            $_SESSION['type'] = "Admin";
            $_SESSION['pic'] = $targetFilePath;
        }else{

            $sql = "INSERT INTO users (firstname, lastname, username, email, date, gender, password, pic, type) VALUES ('$fname','$lname','$username','$email','$date','$gender','$password','$targetFilePath','User')";
            session_start();
            $_SESSION['firstname'] = $fname;
            $_SESSION['lastname'] = $lname;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['date'] = $date;
            $_SESSION['email'] = $email;
            $_SESSION['gender'] = $gender;
            $_SESSION['type'] = "User";
            $_SESSION['pic'] = $targetFilePath;
        }
        header("location:index.php");
        mysqli_query($con, $sql);
    }
    closecon($con);



?>
