<?php
    session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <title>SimpleCodeMore</title>
        <link rel="stylesheet" href="../styles/more.css"/>
    </head>

    <body>
        <div class="header">
          <img src="media/logo.png" alt="logo" />
          <h1>SimpleCode</h1>
        </div>
        <div class="menu" id="myMenu">
            <a href="index.php">Αρχική</a>
            <a href="basics.php">Το θέμα μου</a>
            <a class="active" href="more.php">Περισσότερα</a>
            <?php
                if(isset($_SESSION["username"]))
                    echo "<a href='quiz-lvl.php'>Quiz</a>";
                else
                    echo "<a href='quiz.php'>Quiz</a>";
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
                <b>Περισσότερα παραδείγματα και πληροφορίες για αυτά που έχουμε πει</b>
            </p>
            <p class="p2"><b>Βιντεάκια σχετικά με τις ενότητες που έχουμε ασχοληθεί</b></p>
            <ul class="list1">
                <li>
                    Τύποι μεταβλητών<br>
                    <video class="vvar" controls>
                        <source src="media/videos/variables.mp4" type="video/mp4">
                    </video>
                    <br>
                </li>
                <li>
                    Printf<br>
                    <video class="vprintf" controls>
                        <source src="media/videos/printf.mp4" type="video/mp4">
                    </video>
                    <br>
                </li>
                <li>
                    Scanf<br>
                    <video class="vscanf" controls>
                        <source src="media/videos/scanf.mp4" type="video/mp4">
                    </video>
                    <br>
                </li>
            </ul>
            <p class="p3">
                <b>Περισσότερο υλικό online</b>
            </p>
            <ul class="list2">
                <li>
                    <a class="ytvideo" href="https://www.youtube.com/watch?v=KJgsSFOSQv0"> YouTude Video </a>
                </li>
                <li>
                    <a class="c_pdf" href="media/pdf/cprogramming_tutorial.pdf"> Περισσότερα για την C </a>
                </li>
                <li>
                    <a class="var_pdf" href="media/pdf/variables.pdf"> Περισσότερα για τις μεταβλητές </a>
                </li>
                <li>
                    <a class="printf_pdf" href="media/pdf/printf.pdf"> Περισσότερα για την εντολή printf </a>
                </li>
                <li>
                    <a class="scanf_pdf" href="media/pdf/scanf.pdf"> Περισσότερα για την εντολή scanf </a>
                </li>
            </ul>
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
