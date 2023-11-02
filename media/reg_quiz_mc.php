<?php
    session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <title>SimpleCodeQuiz</title>
        <link rel="stylesheet" href="../styles/reg_quiz_tf.css"/>
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
                <b>Επιλογή απάντησης/εων</b>
            </p>

            <form name="reg_quiz" method="post" action="php/reg_mc.php">
                <div class="container">
                    <label for="name">Ερώτηση</label>
                    <input class="in" type="text" name="question" placeholder="Enter question" required>
                    <label for="name">Επίπεδο</label>
                    <?php if(isset($_GET['error_lvl_mc'])){?>
                            <label class="error"> <?php echo $_GET['error_lvl_mc']; ?> </label>
                    <?php }?>
                    <input class="in" type="text" name="level" placeholder="Enter level" required>
                    <label for="name">Επιλογή Α</label>
                    <input class="in" type="text" name="a" placeholder="Enter choice A" required>
                    <label for="name">Επιλογή Β</label>
                    <input class="in" type="text" name="b" placeholder="Enter choice B" required>
                    <label for="name">Επιλογή C</label>
                    <input class="in" type="text" name="c" placeholder="Enter choice C" required>
                    <label for="name">Επιλογή D</label>
                    <input class="in" type="text" name="d" placeholder="Enter choice D" required>
                    <label for="name">Απάντηση A</label>
                    <?php if(isset($_GET['error_ans1'])){?>
                            <label class="error"> <?php echo $_GET['error_ans1']; ?> </label>
                    <?php }?>
                    <input class="in" type="text" name="ans_a" placeholder="Is choise A correct?(Enter true or false)" required>
                    <label for="name">Απάντηση B</label>
                    <?php if(isset($_GET['error_ans2'])){?>
                            <label class="error"> <?php echo $_GET['error_ans2']; ?> </label>
                    <?php }?>
                    <input class="in" type="text" name="ans_b" placeholder="Is choise B correct?(Enter true or false)" required>
                    <label for="name">Απάντηση C</label>
                    <?php if(isset($_GET['error_ans3'])){?>
                            <label class="error"> <?php echo $_GET['error_ans3']; ?> </label>
                    <?php }?>
                    <input class="in" type="text" name="ans_c" placeholder="Is choise C correct?(Enter true or false)" required>
                    <label for="name">Απάντηση D</label>
                    <?php if(isset($_GET['error_ans4'])){?>
                            <label class="error"> <?php echo $_GET['error_ans4']; ?> </label>
                    <?php }?>
                    <input class="in" type="text" name="ans_d" placeholder="Is choise D correct?(Enter true or false)" required>
                    <input class="in" type="submit" value="Υποβολή">
                </div>
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

    </body>
</html>
