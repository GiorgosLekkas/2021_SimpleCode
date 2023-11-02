<?php
    session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <title>SimpleCodeQuiz</title>
        <link rel="stylesheet" href="../styles/quiz-lvl.css"/>
    </head>
    <body>
        <div class="header">
          <img src="media/logo.png" alt="logo" />
          <h1>SimpleCode</h1>
        </div>
        <div class="menu" id="myMenu">
            <a href="index.php">Αρχική</a>
            <a href="basics.php">Το θέμα μου</a>
            <a href="more.php">Περισσότερα</a>
            <?php
                if(isset($_SESSION["username"]))
                    echo "<a class='active' href='quiz-lvl.php'>Quiz</a>";
                else
                    echo "<a class='active' href='quiz.php'>Quiz</a>";
            ?>
            <?php
                if(isset($_SESSION["username"])){
                    echo "<a href='get_results.php'>Αποτελέσματα Quiz</a>";
                    echo "<a href='account.php'>Λογαριασμός</a>";
                }else{
                    echo "<a href='sign-up.php'>Εγγραφή</a>";
                    echo "<a href='login.php'>Σύνδεση</a>";
                }
            ?>
            <?php
                if(isset($_SESSION['type'])){
                    if($_SESSION['type']=="Admin"){
                        echo "<a href='users.php'>Χρήστες</a>";
                    }
                    if($_SESSION['type']!="User"){
                        echo "<a href='questions.php'>Ερωτήσεις προς υποβολή</a>";
                    }
                }
            ?>
            <div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <div class="men">Menu</div>
                </a>
            </div>
        </div>
            <article class="board">
                <p class="p1">
                    <b>Επιλογή Επιπέδου Δυσκολίας</b>
                </p>

                <div class="dropdown" >
      					   <button class="dropbtn">Επιλογή επιπέδου δυσκολίας</button>
      						    <div class="dropdown-content">
      								    <a href="quiz_easy.php">Easy</a>
      								    <a href="quiz_medium.php">Medium</a>
      								    <a href="quiz_hard.php">Hard</a>
      						  	</div>
      						</div>

                  <div class="dropdown">
      						  <button class="dropbtn">Υποβάλεται μια ερώτηση για το Quiz</button>
      						  	<div class="dropdown-content">
      								    <a href="reg_quiz_mc.php">Πολλαπλής Επιλογής</a>
      								    <a href="reg_quiz_tf.php">Σωστό Λάθος</a>
      						  	</div>
      						</div>
            </article>
        <script>
            function myFunction() {
              var x = document.getElementById("myMenu");
              if (x.className === "menu") {
                x.className += " responsive";
              } else {
                x.className = "menu";
              }
            }
        </script>


    </body>
</html>
