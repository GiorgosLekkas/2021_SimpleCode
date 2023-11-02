<?php
    session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <title>SimpleCodeSignUp</title>
        <link rel="stylesheet" href="../styles/sign-up.css"/>
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
            <a class="active" href='sign-up.php'>Εγγραφή</a>
            <a href='login.php'>Σύνδεση</a>
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
            <form name="signin" method="post" action="reguser.php" enctype="multipart/form-data">
                <div class="container" >
                    <label for="name">Όνομα</label>
                    <?php if(isset($_GET['errorfname'])){?>
                            <label class="error"> <?php echo $_GET['errorfname']; ?> </label>
                    <?php }?>
                    <input class="in" type="text" name="firstname" placeholder="Name" required>
                    <label for="lastname">Επίθετο</label>
                    <?php if(isset($_GET['errorlname'])){?>
                            <label class="error"> <?php echo $_GET['errorlname']; ?> </label>
                    <?php }?>
                    <input class="in" type="text" name="lastname" placeholder="Last Name" required>
                    <label for="uname">Όνομα Χρήστη</label>
                    <?php if(isset($_GET['error'])){?>
                            <label class="error"> <?php echo $_GET['error']; ?> </label>
                    <?php }?>
                    <input class="in" type="text" name="username" placeholder="Username" required>
                    <label for="email">Email</label>
                    <?php if(isset($_GET['error1'])){?>
                            <label class="error"> <?php echo $_GET['error1']; ?> </label>
                    <?php }?>
                    <input class="in" type="email" name="email" placeholder="Email@" required>
                    <label for="date">Ημερομηνία Γέννησης</label>
                    <input class="in" type="date" name="bdate" required>
                    <label for="gender">Φύλο</label>
                    <ul class="genderlist">
                        <tr>
                            <input type="radio" id="male" name="gender" value="Άνδρας">
                            <label for="male">Άνδρας</label>
                        </tr>
                        <tr>
                            <input type="radio" id="female" name="gender" value="Γυναίκα">
                            <label for="female">Γυναίκα</label>
                        </tr>
                        <tr>
                            <input type="radio" id="other" name="gender" value="Άλλο">
                            <label for="other">Άλλο</label>
                        </tr>
                    </ul>
                    <label for="password">Κωδικός</label>
                    <input class="in" type="password" name="password" placeholder="Password" required>
                    <label for="pic">Εικόνα Προφίλ</label>
                    <input class="in" type="file" name="pic" required>
                    <input class="in" type="submit" value="Εγγραφή">
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
