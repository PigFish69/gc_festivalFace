<?php
require "header.php";
require_once "../src/userFunctions.php";

//check for order
$newOrder =null;

if (isset($_POST['order'])) {

    $userID = $_POST['userID'];
    $user = getUserById($userID);

    while ($regel = $user->fetch_assoc()) {
//    while ($regel = $user->fetch()) {

        $id = $regel['id'];
        $ticketID = $_POST['ticketSelect'];
        $amount = $_POST['amount'];


        $inputQuery = "INSERT INTO orders (userID, ticketID, amount)
                                        VALUES ('$id', '$ticketID', '$amount')";
        $order = db_insertData($inputQuery);
    }
    $newOrder = db_getData("SELECT * FROM orders INNER JOIN tickets ON orders.ticketID = tickets.id WHERE orders.id = ".$order);
}
?>
    <div class="page orderConfirmation">
        <div class="container">
            <h1>Bedankt voor de bestelling!</h1>
            <table class="orderOverview" border="1">
                <tr>
                    <th>Ticket</th>
                    <th>Aantal</th>
                    <th>Prijs</th>
                </tr>
                <tr>
                    <?php
                    while ($orderData = $newOrder->fetch_assoc()) {
                        $prijs = $orderData['amount'] * $orderData['price'];
                        ?>
                        <td><?php echo "".$orderData['name'];//ticket?></td>
                        <td><?php echo "".$orderData['amount'];?></td>  <!-- amount-->
                        <td>€ <?php echo "".$prijs;//prijs ?></td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
       </div>
    </div>
<?php
require "footer.php";
?>