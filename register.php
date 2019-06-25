<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: index.php");
}

require "header.php";

?>
<main>
    <form id="register" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-group">
            <label for="formUsername">Indtast brugernavn:</label>
            <input type="text" name="formUsername" id="formUsername" placeholder="Indtast brugernavn" required>
        </div>
        <div class="form-group">
            <label for="formEmail">Indtast email:</label>
            <input type="email" name="formEmail" id="FormEmail" placeholder="Indtast email">
        </div>
        <div class="form-group">
            <label for="formPassword1">Indtast password:</label>
            <input type="password" name="formPassword1" id="formPassword1" placeholder="Indtast password" required>
        </div>
        <div class="form-group">
            <label for="formPassword2">Indtast password igen:</label>
            <input type="password" name="formPassword2" id="formPassword1" placeholder="Indtast password igen" required>
        </div>
        <input type="submit" value="Opret bruger">
    </form>
</main>

<?php
    // https://www.sitepoint.com/form-validation-with-php/

    // define variables and initialize with empty values
    // $nameErr = $emailErr = $passwordErr = "";
    // $formUsername = $formEmail = $formPassword1 = $formPassword2 = "";

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     if (empty($_POST["formUsername"])) {
    //         $nameErr = "Missing";
    //     }
    //     else {
    //         $formUsername = $_POST["formUsername"];
    //     }
    // }

    if (isset($_POST['formUsername'])) {
        $formUsername = $_POST['formUsername'];
        $formEmail =$_POST['formEmail'];
        $formPassword1 = $_POST['formPassword1'];
        $formPassword2 = $_POST['formPassword2'];

        require "assets/connect.php";

        $statement = $dbh->prepare("SELECT * FROM users WHERE dbUsername = ?");
        $statement->bindParam(1, $formUsername);
        $statement->execute();

        if ($row = $statement->fetch()) {
            echo "<p>Fejl - der findes allerede en bruger med samme navn?</p>";

        } elseif ($formPassword1 != $formPassword2) {
            echo "<p>Fejl - adgangskoden er ikke den samme?</p>";

        } else {
            echo "<p>Du er nu oprettet</p>";
            $statement = $dbh->prepare("INSERT INTO users(dbUsername, dbEmail, dbPassword) VALUES(?, ?, ?)");
            $statement->bindParam(1, $formUsername);
            $statement->bindParam(2, $formEmail);
            $statement->bindParam(3, $formPassword1);
            $statement->execute();


        }
   }
?>

<?php require "footer.php" ?>

