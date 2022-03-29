<?php
require "header.php";
require "../src/userFunctions.php";
//require "../config/database.php";
if (isset($_POST['register']))
{
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (strlen($fname) > 0 && strlen($lname) > 0 && strlen($email) > 0 && strlen($pass) > 0) {
        registerUser($fname, $lname, $email, $pass);
    }
//    echo $email.$pass."<br>";


}
?>
    <div class="page registreren">
        <div class="container">
            <h1>Registreren</h1>
            <div class="inputRow">
                <form action="#" method="post">
                    <label for="firstName">Voornaam</label>
                    <input type="text" name="firstName"><br><br>
                    <label for="lastName">Achternaam</label>
                    <input type="text" name ="lastName"><br><br>
                    <label for="email">Email</label>
                    <input type="email" name ="email"><br><br>
                    <label for="password">Password</label>
                    <input type="password" name="password"><br><br>
                    <input type="submit" name ="register" value="Registreer">
                </form>
            </div>
        </div>
    </div>
<?php
require "footer.php";
?>