<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: index.php");
}

require "header.php";

?>
<main>
    <form id="register" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-inline">
            <label for="formUsername">Indtast brugernavn:</label>
            <input type="text" name="formUsername" id="formUsername" placeholder="Indtast brugernavn" required>
        </div>
        <div>
            <label for="formEmail">Indtast email:</label>
            <input type="email" name="formEmail" id="FormEmail" placeholder="Indtast email">
        </div>
        <div>
            <label for="formPassword1">Indtast password:</label>
            <input type="password" name="formPassword1" id="formPassword1" placeholder="Indtast password" required>
        </div>
        <div>
            <label for="formPassword2">Indtast password igen:</label>
            <input type="password" name="formPassword2" id="formPassword1" placeholder="Indtast password igen" required>
        </div>
        <input type="submit" value="Opret bruger">
    </form>
</main>

<?php require "footer.php" ?>

