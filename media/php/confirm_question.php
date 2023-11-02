<?php

include 'connection.php';
$con = opencon();
    $question = $_POST['question'];
    $level = $_POST['level'];

    //$con = mysqli_connect("localhost","root","");
    mysqli_select_db($con,"quiz");


    if(isset($_POST['reject_mc'])){
        $sql = "DELETE * FROM regmultiplechoise WHERE question='$question'";
        if(mysqli_query($con,$sql)){
            echo "1";
        }
    }else if(isset($_POST['confirm_mc'])){
        $sql = "SELECT * FROM regmultiplechoise WHERE question='$question'";
        $db = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($db);

        if(!$sql && !$db && !$row){
            header("Location: ../index.php");
        }

        $question = $row['question'];
        $level = $row['level'];
        $a = $row['a'];
        $b = $row['b'];
        $c = $row['c'];
        $d = $row['d'];
        $an1 = $row['an1'];
        $an2 = $row['an2'];
        $an3 = $row['an3'];
        $an4 = $row['an4'];

        if($level=='easy'){
            $sql1 = "INSERT INTO mc_easy (question, a, b, c, d, an1, an2, an3, an4) VALUES ('$question','$a','$b','$c','$d','$an1','$an2','$an3','$an4')";
            if(!mysqli_query($con,$sql1)){
                echo "3";
            }
        }else if($level=='medium'){
            $sql1 = "INSERT INTO mc_medium (question, a, b, c, d, an1, an2, an3, an4) VALUES ('$question','$a','$b','$c','$d','$an1','$an2','$an3','$an4')";
            if(!mysqli_query($con,$sql1)){
                echo "4";
            }
        }else if($level=='hard'){
            $sql1 = "INSERT INTO mc_hard (question, a, b, c, d, an1, an2, an3, an4) VALUES ('$question','$a','$b','$c','$d','$an1','$an2','$an3','$an4')";
            if(!mysqli_query($con,$sql1)){
                echo "5";
            }
        }
        $sql2 = "DELETE FROM regmultiplechoise WHERE question='$question'";
        mysqli_query($con, $sql2);
    }
    if(isset($_POST['reject_tf'])){
        $sql2 = "DELETE FROM regtruefalse WHERE question='$question'";
        mysqli_query($con, $sql2);
    }else if(isset($_POST['confirm_tf'])){
        $sql = "SELECT * FROM regtruefalse WHERE question='$question'";
        $db = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($db);

        if($sql){
            header("Location: ../index.php");
            echo 'good1';
        }
        if($db){
            header("Location: ../index.php");
            echo 'good2';
        }
        if($row){
            header("Location: ../index.php");
        }

        $answer = $row['answer'];
        $level = $row['level'];
        echo $answer;
        echo $level;

        if($level=='easy'){
            $sql1 = "INSERT INTO tf_easy (question, answer) VALUES ('$question','$answer')";
            if(!mysqli_query($con,$sql1)){
                echo "3";
            }
        }else if($level=='medium'){
            $sql1 = "INSERT INTO tf_medium (question, answer) VALUES ('$question','$answer')";
            if(!mysqli_query($con,$sql1)){
                echo "3";
            }
        }else if($level=='hard'){
            $sql1 = "INSERT INTO tf_hard (question, answer) VALUES ('$question','$answer')";
            if(!mysqli_query($con,$sql1)){
                echo "3";
            }
        }
        $sql2 = "DELETE FROM regtruefalse WHERE question='$question'";
        mysqli_query($con, $sql2);
    }

    header("Location: ../questions.php");

    closecon($con);

?>
