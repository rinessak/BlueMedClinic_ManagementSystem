<?php
include 'inc/functions.php';
if (isset($_POST['signup'])) {
    signUp($_POST['emri'],$_POST['mbiemri'],$_POST['email'],$_POST['telefoni'],$_POST['nrpersonal'],$_POST['adresa'], $_POST['fjalekalimi']);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body id="signUpForm">
        <div class="container">
            <form action="" method="POST">
                <h2>Sign Up</h2>
                <div class="form-group">
                    <label for="emri">Emri:</label>
                    <input type="text" id="emri" name="emri" required>
                </div>
                <div class="form-group">
                    <label for="mbiemri">Mbiemri:</label>
                    <input type="text" id="mbiemri" name="mbiemri" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telefoni">Telefoni:</label>
                    <input type="text" id="telefoni" name="telefoni" required>
                </div>
                <div class="form-group">
                    <label for="nrpersonal">Numri personal:</label>
                    <input type="text" id="nrpersonal" name="nrpersonal" required>
                </div>
                <div class="form-group">
                    <label for="adresa">Adresa:</label>
                    <input type="text" id="adresa" name="adresa" required>
                </div>
                <div class="form-group">
                    <label for="password">Fjalekalimi:</label>
                    <input type="password" id="password" name="fjalekalimi" required>
                </div>
                <div class="form-group">
                    <button name="signup" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>

