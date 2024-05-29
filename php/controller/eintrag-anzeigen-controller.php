<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../path.php";
}

require_once $abs_path . "/php/model/Eintrag.php";
require_once $abs_path . "/php/model/Forum.php";

// Ueberpruefung der Parameter
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    $_SESSION["message"] = "invalid_entry_id";
    header("Location: index.php");
    exit;
}

try {
    // Aufbereitung der Daten fuer die Kontaktierung des Models
    $id = intval($_GET["id"]);

    // Kontaktierung des Models (Geschaeftslogik)
    $forum = Forum::getInstance();
    $eintrag = $forum->getEintrag($id);
} catch (FehlenderEintragException $exc) {
    // Behandlung von potentiellen Fehlern der Geschaeftslogik
    $_SESSION["message"] = "invalid_entry_id";
    header("Location: index.php");
    exit;
} catch (InternerFehlerException $exc) {
    // Behandlung von potentiellen Fehlern der Geschaeftslogik
    $_SESSION["message"] = "internal_error";
    header("Location: index.php");
    exit;
}

// Aufbereitung der Daten fuer die Ausgabe (View)
// Hinweis: in diesem Fall nichts zu tun

// zum Schluss: die Ausgabe des HTML-Codes kann erfolgen: eintrag-anzeigen.php
?>