<?php
    include 'php/connection.php';
    session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <title>SimpleCodeQuiz</title>
        <link rel="stylesheet" href="../styles/quiz.css"/>
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
                <b>Quiz</b>
            </p>
            <p class="p2"> <b>Σωστό-Λάθος</b> </p>
            <form class="truefalse" name="quiz_easy" id="quiz_easy" method="post" action="php/results.php">
                <ul class="list1">
                    <?php
                        //include 'php/connection.php';
                        $con = opencon();
                        //$con = mysqli_connect("localhost","root","");
                        mysqli_select_db($con,"quiz");

                        if(!$con)
                            echo "Connection failed!";

                        $sql = "SELECT * FROM tf_hard ORDER BY rand()";
                        $result = mysqli_query($con,$sql);
                    ?>
                    <?php if($row = $result->fetch_assoc()){ ?>
                    <li>
                        <?php echo $row['question']; ?><br>
                        <input type='radio' id='true' name='tf1' value='true'>
                        <label for='true'>Σωστό</label><br>
                        <input type='radio' id='false' name='tf1' value='false'>
                        <label for='false'>Λάθος</label><br>

                        <input type="hidden" name='ans1' value='<?php echo $row['answer']; ?>' >

                    </li>
                    <?php
                        }
                        if($row = $result->fetch_assoc()){ ?>
                    <li>
                        <?php echo $row['question']; ?><br>
                        <input type='radio' id='true' name='tf2' value='true'>
                        <label for='true'>Σωστό</label><br>
                        <input type='radio' id='false' name='tf2' value='false'>
                        <label for='false'>Λάθος</label><br>

                        <input type="hidden" name='ans2' value='<?php echo $row['answer']; ?>' >

                    </li>
                  <?php }
                      closecon($con);
                  ?>
                </ul>
                <p class="p3"> <b>Επέλεξε τη/τις σωστή/ες απάντηση/εις</b></p>
                <ul class="list2">
                    <?php
                        //include 'connection.php';
                        $con = opencon();
                        //$con = mysqli_connect("localhost","root","");
                        mysqli_select_db($con,"quiz");

                        if(!$con)
                            echo "Connection failed!";

                        $sql = "SELECT * FROM mc_hard ORDER BY rand()";
                        $result = mysqli_query($con,$sql);
                    ?>
                    <?php if($row = $result->fetch_assoc()){ ?>
                    <li>
                        <?php echo $row['question']; ?><br>
                        <input type="checkbox" id="mc1a" name="mc1a" value="a">
                        <label for="a"> <?php echo $row['a']; ?> </label><br>
                        <input type="checkbox" id="mc1b" name="mc1b" value="b">
                        <label for="b"> <?php echo $row['b']; ?> </label><br>
                        <input type="checkbox" id="mc1c" name="mc1c" value="c">
                        <label for="c"> <?php echo $row['c']; ?> </label><br>
                        <input type="checkbox" id="mc1d" name="mc1d" value="d">
                        <label for="d"> <?php echo $row['d']; ?> </label><br>

                        <input type="hidden" name='mc1ansa' value='<?php echo $row['an1']; ?>' >
                        <input type="hidden" name='mc1ansb' value='<?php echo $row['an2']; ?>' >
                        <input type="hidden" name='mc1ansc' value='<?php echo $row['an3']; ?>' >
                        <input type="hidden" name='mc1ansd' value='<?php echo $row['an4']; ?>' >

                    </li>
                    <?php } ?>
                    <?php if($row = $result->fetch_assoc()){ ?>
                    <li>
                        <?php echo $row['question']; ?><br>
                        <input type="checkbox" id="mc2a" name="mc2a" value="a">
                        <label for="a"> <?php echo $row['a']; ?> </label><br>
                        <input type="checkbox" id="mc2b" name="mc2b" value="b">
                        <label for="b"> <?php echo $row['b']; ?> </label><br>
                        <input type="checkbox" id="mc2c" name="mc2c" value="c">
                        <label for="c"> <?php echo $row['c']; ?> </label><br>
                        <input type="checkbox" id="mc2d" name="mc2d" value="d">
                        <label for="d"> <?php echo $row['d']; ?> </label><br>

                        <input type="hidden" name='mc2ansa' value='<?php echo $row['an1']; ?>' >
                        <input type="hidden" name='mc2ansb' value='<?php echo $row['an2']; ?>' >
                        <input type="hidden" name='mc2ansc' value='<?php echo $row['an3']; ?>' >
                        <input type="hidden" name='mc2ansd' value='<?php echo $row['an4']; ?>' >

                    </li>
                    <?php } ?>
                    <?php if($row = $result->fetch_assoc()){ ?>
                    <li>
                      <?php echo $row['question']; ?><br>
                      <input type="checkbox" id="mc3a" name="mc3a" value="a">
                      <label for="a"> <?php echo $row['a']; ?> </label><br>
                      <input type="checkbox" id="mc3b" name="mc3b" value="b">
                      <label for="b"> <?php echo $row['b']; ?> </label><br>
                      <input type="checkbox" id="mc3c" name="mc3c" value="c">
                      <label for="c"> <?php echo $row['c']; ?> </label><br>
                      <input type="checkbox" id="mc3d" name="mc3d" value="d">
                      <label for="d"> <?php echo $row['d']; ?> </label><br>

                      <input type="hidden" name='mc3ansa' value='<?php echo $row['an1']; ?>' >
                      <input type="hidden" name='mc3ansb' value='<?php echo $row['an2']; ?>' >
                      <input type="hidden" name='mc3ansc' value='<?php echo $row['an3']; ?>' >
                      <input type="hidden" name='mc3ansd' value='<?php echo $row['an4']; ?>' >


                      <input type="hidden" id="res" name='result' value=' ' >
                      <input type="hidden" id="res" name='level' value='hard' >
                    </li>
                    <?php }
                        closecon($con);
                    ?>
                </ul>
                <input type="submit" value="Υποβολή" onclick="results_easy()">
            </form>
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

        <script>
            function results_easy(){

                let q1 = document.quiz_easy.tf1.value;
                let q1ans= document.quiz_easy.ans1.value;

                let q2 = document.quiz_easy.tf2.value;
                let q2ans = document.quiz_easy.ans2.value;

                let q3a = document.getElementById("mc1a");
                let q3b = document.getElementById("mc1b");
                let q3c = document.getElementById("mc1c");
                let q3d = document.getElementById("mc1d");
                let q3aans = document.quiz_easy.mc1ansa.value;
                let q3bans = document.quiz_easy.mc1ansb.value;
                let q3cans = document.quiz_easy.mc1ansc.value;
                let q3dans = document.quiz_easy.mc1ansd.value;

                let q4a = document.getElementById("mc2a");
                let q4b = document.getElementById("mc2b");
                let q4c = document.getElementById("mc2c");
                let q4d = document.getElementById("mc2d");
                let q4aans = document.quiz_easy.mc2ansa.value;
                let q4bans = document.quiz_easy.mc2ansb.value;
                let q4cans = document.quiz_easy.mc2ansc.value;
                let q4dans = document.quiz_easy.mc2ansd.value;

                let q5a = document.getElementById("mc3a");
                let q5b = document.getElementById("mc3b");
                let q5c = document.getElementById("mc3c");
                let q5d = document.getElementById("mc3d");
                let q5aans = document.quiz_easy.mc3ansa.value;
                let q5bans = document.quiz_easy.mc3ansb.value;
                let q5cans = document.quiz_easy.mc3ansc.value;
                let q5dans = document.quiz_easy.mc3ansd.value;

                let score = 0;

                if(q1==q1ans) score++;
                if(q2==q2ans) score++;

                if(q3a.checked) qa = "true";
                else qa = "false";

                if(q3b.checked) qb = "true";
                else  qb = "false";

                if(q3c.checked) qc = "true";
                else  qc = "false";

                if(q3d.checked) qd = "true";
                else qd = "false";

                if(qa.localeCompare(q3aans)==0 && qb.localeCompare(q3bans)==0 && qc.localeCompare(q3cans)==0 && qd.localeCompare(q3dans)==0)
                    score++;

//----------------------------------------------------------------------------------------------------------------//

                if(q4a.checked) qa = "true";
                    else qa = "false";

                if(q4b.checked) qb = "true";
                    else  qb = "false";

                if(q4c.checked) qc = "true";
                    else  qc = "false";

                if(q4d.checked) qd = "true";
                    else qd = "false";

                if(qa.localeCompare(q4aans)==0 && qb.localeCompare(q4bans)==0 && qc.localeCompare(q4cans)==0 && qd.localeCompare(q4dans)==0)
                    score++;
//----------------------------------------------------------------------------------------------------------------//

                if(q5a.checked) qa = "true";
                    else qa = "false";

                if(q5b.checked) qb = "true";
                    else  qb = "false";

                if(q5c.checked) qc = "true";
                    else  qc = "false";

                if(q5d.checked) qd = "true";
                    else qd = "false";

                if(qa.localeCompare(q5aans)==0 && qb.localeCompare(q5bans)==0 && qc.localeCompare(q5cans)==0 && qd.localeCompare(q5dans)==0)
                    score++;

                alert('Το αποτέλεσμα του quiz είναι: ' + score + '/5');
                document.getElementById('res').value = score;

            }
        </script>

    </body>
</html>
