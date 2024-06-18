<?php
session_start();
require_once 'path.php';
require_once $abs_path . '/db/db.php';

if (!isset($_SESSION['teamname'])) {
    header("Location: anmeldung.php");
    exit();
}

$teamname = $_SESSION['teamname'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $beschreibung = $_POST['beschreibung'];
    $spieler = json_encode($_POST['spieler']);

    // Bild hochladen, wenn vorhanden
    if (isset($_FILES['bild']) && $_FILES['bild']['error'] == UPLOAD_ERR_OK) {
        $bildName = basename($_FILES['bild']['name']);
        $bildPfad = $abs_path . '/uploads/' . $bildName;
        move_uploaded_file($_FILES['bild']['tmp_name'], $bildPfad);
    } else {
        $bildName = $_POST['current_bild'];
    }

    // Spieler Bilder hochladen, wenn vorhanden
    foreach ($_FILES as $key => $file) {
        if (strpos($key, 'spieler_bild_') === 0 && $file['error'] == UPLOAD_ERR_OK) {
            $index = str_replace('spieler_bild_', '', $key);
            $spielerBildName = basename($file['name']);
            $spielerBildPfad = $abs_path . '/uploads/' . $spielerBildName;
            move_uploaded_file($file['tmp_name'], $spielerBildPfad);
            $_POST['spieler'][$index]['bild'] = $spielerBildName;
        }
    }

    try {
        $stmt = $db->prepare("UPDATE users SET beschreibung = :beschreibung, bild = :bild, spieler = :spieler WHERE teamname = :teamname");
        $stmt->execute(['beschreibung' => $beschreibung, 'bild' => $bildName, 'spieler' => $spieler, 'teamname' => $teamname]);
        echo "Profil aktualisiert!";
    } catch (Exception $e) {
        echo "Fehler: " . $e->getMessage();
    }
}

$stmt = $db->prepare("SELECT * FROM users WHERE teamname = :teamname");
$stmt->execute(['teamname' => $teamname]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$spieler = json_decode($user['spieler'], true) ?? [];

?>