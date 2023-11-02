<?php
    include 'php/connection.php';
    $con = opencon();
    session_start();

?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <title>SimpleCodeQuiz</title>
        <link rel="stylesheet" href="../styles/questions.css"/>
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
                    echo "<a href='quiz-lvl.php'>Quiz</a>";
                else
                    echo "<a href='quiz.php'>Quiz</a>";
            ?>
            <?php
                if(isset($_SESSION["username"])){
                    echo "<a class='active' href='get_results.php'>Αποτελέσματα Quiz</a>";
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
                <b>Πολλαπλής επιλογής</b>
            </p>
                <div class="container">
                    <table class="results">
                            <tr>
                                <th> Όνομα Χρήστη  </th>
                                <th> Επίπεδο  </th>
                                <th> Αποτέλεσμα </th>
                                <th> Ώρα και ημερομηνία </th>
                            </tr>
                            <?php
                                //$con = mysqli_connect("localhost","root","");
                                mysqli_select_db($con,"quiz");
                                $uname = $_SESSION['username'];
                                $sql = "SELECT * FROM results WHERE username='$uname'";
                                $db = mysqli_query($con, $sql);

                                if(!$con||!$db){
                                    echo 'CONNECTION LOST';
                                }

                                while($row = mysqli_fetch_array($db)){
                            ?>
                            <tr>
                                <td> <?php echo $row['username']; ?> </td>
                                <td> <?php echo $row['level']; ?> </td>
                                <td> <?php echo $row['score']; ?> </td>
                                <td> <?php echo $row['datetime']; ?> </td>
                            </tr>
                            <?php
                                }

                                closecon($con);
                            ?>
                      </table>
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
