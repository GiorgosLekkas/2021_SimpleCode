<?php

    session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <title>SimpleCodeSignUp</title>
        <link rel="stylesheet" href="../styles/account.css"/>
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
            <a href='get_results.php'>Αποτελέσματα Quiz</a>
            <a class='active' href='account.php'>Λογαριασμός</a>
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
                <b>Δημιουργία Λογαριασμου</b>
            </p>
            <form name="change" method="post" action="php/change.php">
                <div class="container" >
                    <label for="name">Όνομα</label>
                    <input class="in" type="text" name="firstname" value="<?php echo $_SESSION['firstname'] ?>" required>
                    <label for='lastname'>Επίθετο</label>
                    <input class="in" type="text" name="lastname" value="<?php echo $_SESSION['lastname'] ?>"required>
                    <label for="uname">Όνομα Χρήστη</label>
                    <input class="in" type="text" name="username" value="<?php echo $_SESSION['username'] ?>" disabled >
                    <label for="email">Email</label>
                    <input class="in" type="email" name="email" value="<?php echo $_SESSION['email'] ?>"required>
                    <label for="date">Ημερομηνία Γέννησης</label>
                    <input class="in" type="text" name="bdate" value="<?php echo $_SESSION['date'] ?>"required>
                    <label for="gender">Φύλο</label><br>
                    <input class="in" type="text" name="gend" value="<?php echo $_SESSION['gender'] ?>"required>
                    <label for="password">Κωδικός</label>
                    <input class="in" type="password" name="password" value="<?php echo $_SESSION['password'] ?>"required>
                    <label for="pic">Εικόνα Προφίλ</label><br>
                    <img src="<?php echo $_SESSION['pic']; ?>" alt=" " class="prof_pic"/>
                    <button type="submit" class='btn'>Αλλαγή</button>
                </div>
            </form>
            <form name="logout" method="post" action="php/logout.php">
                <div class="container" >
                    <button type="submit" class="btn">Αποσύνδεση</button>
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
