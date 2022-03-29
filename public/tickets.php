<?php
require "header.php";
//require_once "../src/databaseFunctions.php";
require_once "../src/userFunctions.php";


//check user's login
$user = null;
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $user = getUser($email, $pass);

}
$ticketQuery = "SELECT id, name
FROM tickets";
$tickets = db_getData($ticketQuery);
?>
    <div class="page tickets">
        <div class="container">
            <h1>Tickets bestellen</h1>
            <div class="ticketList">
                <?php if ($user !== "No user found" && $user !== null){?>

                <form method="post" action="orderConfirmation.php">
                    <div class="inputRow">
                        <?php
                        while ($userData = $user->fetch_assoc()) {
//                        while ($userData = $user->fetch()) {
                            ?>
                                <label for="userID" > Gebruiker ID </label >
                                <input type = "number" name = "userID" value="<?php echo $userData['id']; ?>" readonly>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="inputRow">
                        <label for="ticketSelect">Tickets</label>
                        <select name="ticketSelect">
                            <?php
                            while ($ticket = $tickets->fetch_assoc()) {
//                            while ($ticket = $tickets->fetch()) {
                                ?>
                                <option value="<?php echo $ticket['id']; ?>"><?php echo $ticket['name']; ?></option>
                                <?php
                            }
                           ?>
                        </select>
                    </div>
                    <div class="inputRow">
                        <label for="amount">Hoeveelheid</label>
                        <input name="amount" type="number">
                    </div>
                    <div class="inputRow">
                        <input name="order" type="submit" value="Bestellen">        <!-- bestel knop -->

                    </div>
                </form>
            <?php }else{ ?>
<!--                login face-->
                <form method="post" action="#">
                    <div class="inputRow">
                        <label for="email">Email</label>
                        <input type="email" name="email"
                    </div>
                    <div class="inputRow">
                        <label for="password">Password</label>
                        <input type="password" name="password">
                    </div>
                    <div class="inputRow">
                        <input type="submit" name ="login" value="Login">
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>

<?php
require "footer.php";
?>