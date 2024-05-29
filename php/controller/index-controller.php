<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../path.php";
}

require_once $abs_path . "/php/model/Eintrag.php";
require_once $abs_path . "/php/model/Forum.php";

// Ueberpruefung der Parameter
// Hinweis: Es gibt keine Parameter

try {

    // Aufbereitung der Daten fuer die Kontaktierung des Models
    // Hinweis: Es werden keine Daten benoetigt

    // Kontaktierung des Models (Geschaeftslogik)
    $forum = Forum::getInstance();
    $eintraege = $forum->getEintraege();

} catch (InternerFehlerException $exc) {
    // Behandlung von potentiellen Fehlern der Geschaeftslogik
    $_SESSION["message"] = "internal_error";
}

// Aufbereitung der Daten fuer die Ausgabe (View)
// Hinweis: in diesem Fall nichts zu tun

// zum Schluss: die Ausgabe des HTML-Codes kann erfolgen: index.php
?>