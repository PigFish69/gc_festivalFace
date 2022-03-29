<!doctype html>
<html lang="en">
<?php
include "../config/config.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GraafschapCollege Festival</title>
    <link rel="stylesheet" href="<?php echo (CSS_FOLDER);?>/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<!-- Start navigation -->
<nav>
    <div class="container">
        <div class="logo">
            <h3>GC Festival</h3>
        </div>
        <ul class="menu">
            <li><a href="<?php echo (PUBLIC_PATH);?>/">Home</a></li>
            <li><a href="<?php echo (PUBLIC_PATH);?>/tickets.php">Tickets</a></li>
            <li><a href="<?php echo (PUBLIC_PATH);?>/lineup.php">Lineup</a></li>
            <li><a href="<?php echo (PUBLIC_PATH);?>/registreren.php">Registreren</a></li>
            <li><a href="<?php echo (PUBLIC_PATH);?>/bestelhistorie.php">Bestelhistorie</a></li>
        </ul>
    </div>
</nav>
<!-- End navigation -->
<!-- Start hero image -->
<section class="hero">
    <div class="content">
        <h1>Welkom op het GC Festival!</h1>
        <p>Bestel tickets of bekijk de line-up van het festival</p>
        <div class="btn-group">
            <a href="tickets.php" class="btn-primary">Ticket kopen</a>
            <a href="lineup.php" class="btn-secondary">Bekijk Line-up</a>
        </div>
    </div>

</section>
<!-- End hero image -->