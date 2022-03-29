<?php
require "header.php";
require "../config/database.php";
// Create connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($mysqli->connect_error)
{
    die("Connection failed: " . $mysqli->connect_error);
}
$lineup = $mysqli->query("SELECT * FROM lineup");
?>
    <link rel="stylesheet" href="<?php echo (CSS_FOLDER);?>/style.css">
    <div class="page lineup">
        <div class="container">
            <h1>Line-up</h1>
            <div class="artists">
        <?php
                if ($lineup -> num_rows > 0)
                {
                    while($artist = $lineup->fetch_assoc())
                    {
        ?>

                    <div class="artist">
                        <img src="<?php echo IMAGE_FOLDER . "/" . $artist['artistImage']; ?>" alt="">
                        <h2><?php echo $artist['artistName']; ?></h2>
                    </div>

        <?php
                    }
                }
        ?>

            </div>
        </div>
    </div>
<?php
require "footer.php";
?>