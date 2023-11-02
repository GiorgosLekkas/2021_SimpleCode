<?php
include 'connection.php';
$con = opencon();
    $question = $_POST['question'];
    $level = $_POST['level'];
    $answer = $_POST['answer'];

    //$con = mysqli_connect("localhost","root","");
    mysqli_select_db($con,"quiz");

    if('hard'!=strtolower($level)&&'medium'!=strtolower($level)&&'easy'!=strtolower($level)){
        header("location: ../reg_quiz_tf.php?error_lvl_tf=Invalid level!!!");
        exit();
    }
    $level = strtolower($level);

    if('true'!=strtolower($answer)&&'false'!=strtolower($answer)){
        header("location: ../reg_quiz_tf.php?error_ans_tf=Invalid answer!!!");
        exit();
    }
    $answer = strtolower($answer);

    $sql = "INSERT INTO regtruefalse (question, level, answer) VALUES ('$question','$level','$answer')";
    $db = mysqli_query($con,$sql);

    if(!$db){
        echo 'connection failed';
    }
    header("Location:../quiz-lvl.php");

    closecon($con);

?>
