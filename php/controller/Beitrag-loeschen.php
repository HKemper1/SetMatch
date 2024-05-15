<?php
session_start();
if (!isset($abs_path)) {
    require_once "path.php";
}

require_once $abs_path . "php/model/Beitrag.php";
require_once $abs_path . "php/model/Forum.php";

// Ueberpruefung der Parameter
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    $_SESSION["message"] = "invalid_entry_id";
    header("Location: ../../index.php");
    exit;
}

try {
    // Aufbereitung der Daten fuer die Kontaktierung des Models
    // Hinweis: hier nichts zu tun

    // Kontaktierung des Models (Geschaeftslogik)
    $forum = Forum::getInstance();
    $forum->loescheBeitrag($_GET["id"]);
} catch (FehlenderBeitragException $exc) {
    // Behandlung von potentiellen Fehlern der Geschaeftslogik
    $_SESSION["message"] = "invalid_entry_id";
    header("Location: ../../index.php");
    exit;
} catch (InternerFehlerException $exc) {
    // Behandlung von potentiellen Fehlern der Geschaeftslogik
    $_SESSION["message"] = "internal_error";
    header("Location: ../../index.php");
    exit;
}

// Aufbereitung der Daten fuer die Ausgabe (View)
$_SESSION["message"] = "delete_entry";

// die Ausgabe des HTML-Codes kann erfolgen
header("Location: ../../index.php");
exit;
?>