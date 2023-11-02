<?php

function opencon(){
     $dbhost = "localhost";
     $dbuser = "root";
     $dbpass = "";
     $con = mysqli_connect($dbhost, $dbuser, $dbpass);

     return $con;
 }

function closecon($con){
      $con -> close();
 }

?>
