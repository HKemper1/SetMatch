<?php
session_start(); // Session starten

// Überprüfen, ob der Benutzer angemeldet ist
$angemeldet = isset($_SESSION['teamname']);
?>

<header class="header">
    <nav class="nav normalerText">
        <img src="./images/basis_images/logo-80x80.png"
             alt="SetMatch"
             width="80"
             height="80">
        <a href="index.php">Startseite</a>
        <?php if (!$angemeldet): ?>
            <a href="anmeldung.php">Anmeldung</a>
            <a href="registrierung.php">Registrierung</a>
        <?php else: ?>
            <a href="teamseite.php">Teamseite</a>
            <a href="logout.php">Abmelden</a>
        <?php endif; ?>
        <a><img src="../SetMatch/images/basis_images/glocke.png" alt="Post"
                width="16" height="16"></a>
    </nav>
</header>
