<?php
session_start();
if (!isset($_SESSION['teamname'])) {
    header("Location: anmeldung.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Willkommen</title>
</head>
<body>
<h1>Willkommen, <?php echo htmlspecialchars($_SESSION['teamname']); ?>!</h1>
<p>Sie sind erfolgreich angemeldet.</p>
<a href="logout.php">Abmelden</a>
</body>
</html>
