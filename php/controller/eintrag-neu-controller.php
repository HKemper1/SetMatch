<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../path.php";
}

require_once $abs_path . "/php/model/Eintrag.php";
require_once $abs_path . "/php/model/Forum.php";

// Überprüfung der Parameter
if (!isset($_POST["ueberschrift"]) || !isset($_POST["text"]) || !isset($_POST["submit"])) {
    $_SESSION["message"] = "missing_parameters";
    header("Location: ../../index.php");
    exit;
}

if (!empty($_POST["ueberschrift"])) {
    try {
        // Aufbereitung der Daten für die Kontaktierung des Models
        // Hinweis: hier nichts zu tun

        // Kontaktierung des Models (Geschäftslogik)
        $forum = Forum::getInstance();
        $forum->neuerEintrag($_POST["ueberschrift"], $_POST["text"]);
    } catch (InternerFehlerException $exc) {
        // Behandlung von potentiellen Fehlern der Geschäftslogik
        $_SESSION["message"] = "internal_error";
        header("Location: ../../index.php");
        exit;
    }

    // Weiterleitung mit Erfolgsmeldung und den eingegebenen Daten
    header("Location: ../../index.php?message=new_entry&ueberschrift=" . urlencode($_POST["ueberschrift"]) . "&text=" . urlencode($_POST["text"]));
    exit;
} else {
    // Weiterleitung mit Fehlermeldung und den eingegebenen Daten
    header("Location: ../../index.php?message=missing_required_parameters&ueberschrift=" . urlencode($_POST["ueberschrift"]) . "&text=" . urlencode($_POST["text"]));
    exit;
}


?>