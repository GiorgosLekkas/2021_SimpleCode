<?php
    session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <title>SimpleCodeLogin</title>
        <link rel="stylesheet" href="../styles/login.css"/>
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
            <a href='sign-up.php'>Εγγραφή</a>
            <a class="active" href='login.php'>Σύνδεση</a>
            <div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <div class="men">Menu</div>
                </a>
            </div>
        </div>
        <article class="board">
            <p class="p1">
                <b>Σύνδεση σε Λογαριασμο</b>
            </p>
            <form name="login" method="post" action="php/loginuser.php">
                <div class="container">
                    <label for="uname">Όνομα Χρήστη  </label>
                    <input type="text" name="username" placeholder="Username" required>
                    <label for="pass">Κωδικός</label>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Σύνδεση">
                    <?php if(isset($_GET['error'])){?>
                        <label class="error"> <?php echo $_GET['error']; ?> </label>
                    <?php }?>
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
