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
                        echo "<a class='active' href='questions.php'>Ερωτήσεις προς υποβολή</a>";
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
                    <table class="questions">
                        <form name="reg_quiz" method="post" action="php/confirm_question.php">
                            <tr>
                                <th> Ερώτηση  </th>
                                <th> Επίπεδο  </th>
                                <th> Α </th>
                                <th> Β </th>
                                <th> C </th>
                                <th> D </th>
                                <th> Απάντηση A </th>
                                <th> Απάντηση B </th>
                                <th> Απάντηση C </th>
                                <th> Απάντηση D </th>
                                <th> Επιβεβαίωση </th>
                                <th> Απόρριψη </th>
                            </tr>
                            <?php
                                //$con = mysqli_connect("localhost","root","");
                                mysqli_select_db($con,"quiz");
                                $sql = "SELECT * FROM regmultiplechoise";
                                $db = mysqli_query($con, $sql);

                                if(!$con||!$db){
                                    echo 'aaaaaaaaa';
                                }

                                while($row = mysqli_fetch_array($db)){
                            ?>
                            <tr>
                                <td>
                                    <input type="hidden" name='question' value='<?php echo $row['question']; ?>'>
                                    <?php echo $row['question']; ?>
                                </td>
                                <td>
                                    <input type="hidden" name='level' value='<?php echo $row['level']; ?>'>
                                    <?php echo $row['level']; ?>
                                </td>
                                <td> <?php echo $row['a']; ?> </td>
                                <td> <?php echo $row['b']; ?> </td>
                                <td> <?php echo $row['c']; ?> </td>
                                <td> <?php echo $row['d']; ?> </td>
                                <td> <?php echo $row['an1']; ?> </td>
                                <td> <?php echo $row['an2']; ?> </td>
                                <td> <?php echo $row['an3']; ?> </td>
                                <td> <?php echo $row['an4']; ?> </td>
                                <td> <input type='submit' class='btn' name="confirm_mc" value='OK'> </td>
                                <td> <input type='submit' class='btn' name="reject_mc" value='CANCEL'> </td>
                            </tr>
                            <?php
                                }
                                closecon($con);
                            ?>
                      </table>
                  </form>
                  <p class="p1">
                      <b>Σωστό-Λάθος</b>
                  </p>
                  <div class="container">
                      <table class="questions">
                          <form name="reg_quiz" method="post" action="php/confirm_question.php">
                              <tr>
                                  <th> Ερώτηση  </th>
                                  <th> Επίπεδο  </th>
                                  <th> Απάντηση </th>
                                  <th> Επιβεβαίωση </th>
                                  <th> Απόρριψη </th>
                              </tr>
                              <?php
                                  //$con = mysqli_connect("localhost","root","");
                                  //include 'php/connection.php';
                                  $con = opencon();
                                  mysqli_select_db($con,"quiz");
                                  $sql = "SELECT * FROM regtruefalse";
                                  $db = mysqli_query($con, $sql);

                                  if(!$con||!$db){
                                      echo 'aaaaaaaaa';
                                  }

                                  while($row = mysqli_fetch_array($db)){
                            ?>
                            <tr>
                                <td>
                                    <input type="hidden" name='question' value='<?php echo $row['question']; ?>'>
                                    <?php echo $row['question']; ?>
                                </td>
                                <td>
                                    <input type="hidden" name='level' value='<?php echo $row['level']; ?>'>
                                    <?php echo $row['level']; ?>
                                </td>
                                <td> <?php echo $row['answer']; ?> </td>
                                <td> <input type='submit' class='btn' name="confirm_tf" value='Επιβεβαίωση'> </td>
                                <td> <input type='submit' class='btn' name="reject_tf" value='Διαγραφή'> </td>
                            </tr>
                            <?php
                                }
                                //mysqli_close($con);
                                closecon($con);
                            ?>
                          </form>
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
