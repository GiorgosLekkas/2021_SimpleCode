<?php
    include 'php/connection.php';
  //  $con = opencon();
    session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <title>SimpleCodeLogin</title>
        <link rel="stylesheet" href="../styles/users.css"/>
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
                if(isset($_SESSION['username'])){
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
                        echo "<a class='active' href='users.php'>Χρήστες</a>";
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
                <b>Λογαριασμοί Χρηστών</b>
            </p>
            <div class="usr">
                <div class="container">
                    <table class="users">
                        <tr>
                            <th>Όνομα Χρήστη</th>
                            <th>Ρόλος</th>
                            <th>Επιλογή</th>
                            <th>Αλλαγή ρόλου</th>
                        </tr>
                        <?php
                            //include 'php/connection.php';
                            $con = opencon();
                            //$con = mysqli_connect("localhost","root","");
                            mysqli_select_db($con,"signup");
                            $sql = "SELECT * FROM users";
                            $db = mysqli_query($con, $sql);

                            if(!$con||!$db){
                                echo 'aaaaaaaaa';
                            }

                            while($row = mysqli_fetch_array($db)){
                                $uname = $row['username'];
                                $role = $row['type'];
                        ?>
                            <form name='usrs' method='post' action="php/delete.php">
                                <tr>
                                    <td>
                                        <label> <?php echo $uname ?> </label>
                                        <input type="hidden" name='username' value='<?php echo $uname ?>'>
                                    </td>
                                    <td> <input type="text" name='type' value='<?php echo $role ?>' > </td>
                                    <td> <input type='submit' class='btn' name="delete" value='Διαγραφή'></td>
                                    <td> <input type='submit' class='btn' name="changerole" value='Αλλαγή ρόλου χρήστη'></td>
                                </tr>
                            </form>
                        <?php }
                            if(isset($_GET['errorrole'])){?>
                                <label class="error"> <?php echo $_GET['errorrole']; ?> </label>
                        <?php
                            }
                            closecon($con);
                        ?>
                    </table>
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
