<?php

include 'connection.php';
$con = opencon();
    $question = $_POST['question'];
    $level = $_POST['level'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $an1 = $_POST['ans_a'];
    $an2 = $_POST['ans_b'];
    $an3 = $_POST['ans_c'];
    $an4 = $_POST['ans_d'];


    //$con = mysqli_connect("localhost","root","");
    mysqli_select_db($con,"quiz");

    if('hard'!=strtolower($level)&&'medium'!=strtolower($level)&&'easy'!=strtolower($level)){
        header("location: ../reg_quiz_tf.php?error_lvl_tf=Invalid level!!!");
        exit();
    }
    $level = strtolower($level);

    if('true'!=strtolower($an1)&&'false'!=strtolower($an1)){
        header("location: ../reg_quiz_tf.php?error_ans1=Invalid answer!!!");
        exit();
    }
    $an1 = strtolower($an1);
    if('true'!=strtolower($an2)&&'false'!=strtolower($an2)){
        header("location: ../reg_quiz_tf.php?error_ans2=Invalid answer!!!");
        exit();
    }
    $an2 = strtolower($an2);
    if('true'!=strtolower($an3)&&'false'!=strtolower($an3)){
        header("location: ../reg_quiz_tf.php?error_ans3=Invalid answer!!!");
        exit();
    }
    $an3 = strtolower($an3);
    if('true'!=strtolower($an4)&&'false'!=strtolower($an4)){
        header("location: ../reg_quiz_tf.php?error_ans4=Invalid answer!!!");
        exit();
    }
    $an4 = strtolower($an4);

    $sql = "INSERT INTO regmultiplechoise (question, level, a, b, c, d, an1, an2, an3, an4) VALUES ('$question','$level','$a','$b','$c','$d','$an1','$an2','$an3','$an4')";
    $db = mysqli_query($con,$sql);

    if(!$db){
        echo 'connection failed';
    }
    header("Location:../quiz-lvl.php");

    closecon($con);

?>
