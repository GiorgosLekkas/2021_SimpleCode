<?php
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
                <form class="general_quiz" name="quiz" id="quiz">
                    <ul class="list1">
                        <li>
                            Σε ένα πρόγραμμα C μπορείς να εμφανίσεις δεδομένα χώρις να ενσωματώσεις το αρχείο stdio.h<br>
                            <input type="radio" id="true" name="true_false1" value="1t">
                            <label for="true">Σωστό</label><br>
                            <input type="radio" id="false" name="true_false1" value="1f">
                            <label for="false">Λάθος</label><br>
                        </li>
                        <li>
                            Η παρακάτω δήλωση int a = 3.1; είναι σωστή<br>
                            <input type="radio" id="true" name="true_false2" value="2t">
                            <label for="true">Σωστό</label><br>
                            <input type="radio" id="false" name="true_false2" value="2f">
                            <label for="false">Λάθος</label><br>
                        </li>
                        <li>
                            Η παρακάτω δήλωση double a = 3; είναι σωστή<br>
                            <input type="radio" id="true" name="true_false3" value="3t">
                            <label for="true">Σωστό</label><br>
                            <input type="radio" id="false" name="true_false3" value="3f">
                            <label for="false">Λάθος</label><br>
                        </li>
                        <li>
                            Η εντολή scanf("%f",&a); χρησημοποιείται για να διαβάσει το πρόγραμμα έναν double a απο το πληκτρολόγιο<br>
                            <input type="radio" id="true" name="true_false4" value="4t">
                            <label for="true">Σωστό</label><br>
                            <input type="radio" id="false" name="true_false4" value="4f">
                            <label for="false">Λάθος</label><br>
                        </li>
                    </ul>
                <p class="p3"> <b>Επέλεξε τη σωστή απάντηση</b></p>
                    <ul class="list2">
                        <li>
                            Ποια είναι η μεγαλύτερη τιμή που μπορεί να έχει μια μεταβλητή τύπου int;
                            <br>
                            <input type="radio" id="a" name="mc1" value="mc1a">
                            <label for="a">127</label><br>
                            <input type="radio" id="b" name="mc1" value="mc1b">
                            <label for="b">65535</label><br>
                            <input type="radio" id="c" name="mc1" value="mc1c">
                            <label for="c">2.147.483.647</label><br>
                            <input type="radio" id="d" name="mc1" value="mc1d">
                            <label for="d">32.767</label><br>
                        </li>
                        <li>
                            Πόσα bytes είναι μια μεταβλητή τύπου double;<br>
                            <input type="radio" id="a" name="mc2" value="mc2a">
                            <label for="a">1</label><br>
                            <input type="radio" id="b" name="mc2" value="mc2b">
                            <label for="b">2</label><br>
                            <input type="radio" id="c" name="mc2" value="mc2c">
                            <label for="trcue">4</label><br>
                            <input type="radio" id="d" name="mc2" value="mc2d">
                            <label for="d">8</label><br>
                        </li>
                        <li>
                            Για να εκτυπώσουμε ένα αλφαριθμητικό ποιο από τα παρακάτω χρησιμοποιούμε;<br>
                            <input type="radio" id="a" name="mc3" value="mc3a">
                            <label for="a">%e</label><br>
                            <input type="radio" id="b" name="mc3" value="mc3b">
                            <label for="b">%c</label><br>
                            <input type="radio" id="c" name="mc3" value="mc3c">
                            <label for="c">%f</label><br>
                            <input type="radio" id="d" name="mc3" value="mc3d">
                            <label for="d">%d</label><br>
                            <input type="radio" id="d" name="mc3" value="mc3e">
                            <label for="e">Κανένα από τα παραπάνω</label><br>
                        </li>
                    </ul>
                <p class="p4"> <b>Επέλεξε τη/τις σωστή/ες απάντηση/εις</b></p>
                    <ul class="list3">
                        <li>
                            Ποιο/α από τα παρακάτω χρησιμοποιούνται για τη δήλωση ενός πραγματικού αριθμού;
                            <br>
                            <input type="checkbox" id="mc8a" name="mc8a" value="8a">
                            <label for="a">int</label><br>
                            <input type="checkbox" id="mc8b" name="mc8b" value="8b">
                            <label for="b">double</label><br>
                            <input type="checkbox" id="mc8c" name="mc8c" value="8c">
                            <label for="c">char</label><br>
                            <input type="checkbox" id="mc8d" name="mc8d" value="8d">
                            <label for="d">float</label><br>
                            <input type="checkbox" id="mc8e" name="mc8e" value="8e">
                            <label for="e">Κανένα από τα παραπάνω</label><br>
                        </li>
                        <li>
                            Πόσα bytes είναι μια μεταβλητή τύπου long double;<br>
                            <input type="checkbox" id="mc9a" name="mc9a" value="9a">
                            <label for="a">8</label><br>
                            <input type="checkbox" id="mc9b" name="mc9b" value="9b">
                            <label for="b">10</label><br>
                            <input type="checkbox" id="mc9c" name="mc9c" value="9c">
                            <label for="c">12</label><br>
                            <input type="checkbox" id="mc9d" name="mc9d" value="9d">
                            <label for="d">16</label><br>
                            <input type="checkbox" id="mc9e" name="mc9e" value="9e">
                            <label for="d">32</label><br>
                        </li>
                    </ul>
                    <p class="p5"><b>Συμπληρώστε το κενό</b></p>
                    <ul class="list4">
                        <li>
                            int a;<br>
                            <p class="a1">
                                scanf(<input type="text" name="ans1" placeholder="Fill the gap" >);
                            </p>
                        </li>
                        <li>
                            <p class="a2"><input type="text" name="ans2" placeholder="Fill the gap" > b = 8.4564;</p>
                        </li>
                        <li>
                            char c = 'g';
                            <p class="a3">
                                printf(<input type="text" name="ans3" placeholder="Fill the gap" >);
                            </p>
                        </li>
                    </ul>
                    <br><br>
                    <input class="in" type="submit" value="Υποβολή" onclick="results()">
                </form>
            </article>
        <script>
            function results(){

                let q1 = document.quiz.true_false1.value;
                let q2 = document.quiz.true_false2.value;
                let q3 = document.quiz.true_false3.value;
                let q4 = document.quiz.true_false4.value;
                let q5 = document.quiz.mc1.value;
                let q6 = document.quiz.mc2.value;
                let q7 = document.quiz.mc3.value;
                let q8a = document.getElementById("mc8a");
                let q8b = document.getElementById("mc8b");
                let q8c = document.getElementById("mc8c");
                let q8d = document.getElementById("mc8d");
                let q8e = document.getElementById("mc8e");
                let q9a = document.getElementById("mc9a");
                let q9b = document.getElementById("mc9b");
                let q9c = document.getElementById("mc9c");
                let q9d = document.getElementById("mc9d");
                let q9e = document.getElementById("mc9e");
                let q10 = document.quiz.ans1.value;
                let q11 = document.quiz.ans2.value;
                let q12 = document.quiz.ans3.value;
                let c = 0;

                if(q1 == "1f"){
                  c++;
                }
                if(q2 == "2f"){
                  c++;
                }
                if(q3 == "3t"){
                  c++;
                }
                if(q4 == "4f"){
                  c++;
                }
                if(q5 == "mc1c"){
                  c++;
                }
                if(q6 == "mc2d"){
                  c++;
                }
                if(q7 == "mc3e"){
                  c++;
                }
                if(q8a.checked == false && q8b.checked == true && q8c.checked == false && q8d.checked == true && q8e.checked == false){
                  c++;
                }
                if(q9a.checked == true && q9b.checked == true && q9c.checked == true && q9d.checked == true && q9e.checked == false){
                  c++;
                }
                if(q10 == "%d,&a"){
                  c++;
                }
                if(q11 == "double" || q11 == "DOUBLE" || q11 == "float" || q11 == "FLOAT"){
                  c++;
                }
                if(q12 == "%c,c"){
                  c++;
                }

                alert('Το αποτέλεσμα του quiz είναι: ' + score + "/12");

              }
        </script>

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
