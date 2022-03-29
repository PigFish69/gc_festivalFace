<?php
require "header.php";
//require_once "../src/databaseFunctions.php";
require_once "../src/userFunctions.php";

//SELECT * FROM orders INNER JOIN tickets ON orders.ticketID = tickets.id WHERE userID = 19

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
            <h1>Uw bestellingen:</h1>
            <div class="ticketList">
                <?php if ($user !== "No user found" && $user !== null){
                while ($userData = $user->fetch_assoc()) {
                    $userId = $userData['id'];
                }
                ?>

                    <table class="orderOverview" border="1">
                        <tr>
                            <th>Ticket</th>
                            <th>Aantal</th>
                            <th>Prijs</th>
                        </tr>
                            <?php
                            $totalOrders = db_getData("SELECT * FROM orders INNER JOIN tickets ON orders.ticketID = tickets.id WHERE userID =".$userId);
                            while ($orderData = $totalOrders->fetch_assoc()) {
                                $prijs = $orderData['amount'] * $orderData['price'];
                                ?>
                                <tr>
                                    <td><?php echo "".$orderData['name'];//ticket?></td>
                                    <td><?php echo "".$orderData['amount'];?></td>  <!-- amount-->
                                    <td>€ <?php echo "".$prijs;//prijs ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                    </table>
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