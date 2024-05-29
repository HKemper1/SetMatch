<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../path.php";
}

require_once $abs_path . "/php/model/Eintrag.php";
require_once $abs_path . "/php/model/Forum.php";

// Ueberpruefung der Parameter
if (!isset($_POST["ueberschrift"]) || !isset($_POST["text"]) || !isset($_POST["submit"])) {
    $_SESSION["message"] = "missing_parameters";
    header("Location: ../../index.php");
    exit;
}

if (!empty($_POST["ueberschrift"]) {
    try {
        // Aufbereitung der Daten fuer die Kontaktierung des Models
        // Hinweis: hier nichts zu tun

        // Kontaktierung des Models (Geschaeftslogik)
        $forum = Forum::getInstance();
        $forum->neuerEintrag($_POST["ueberschrift"], $_POST["email"], $_POST["text"]);
    } catch (InternerFehlerException $exc) {
        // Behandlung von potentiellen Fehlern der Geschaeftslogik
        $_SESSION["message"] = "internal_error";
        header("Location: ../../index.php");
        exit;
    }

// Aufbereitung der Daten fuer die Ausgabe (View)
    $_SESSION["message"] = "new_entry";

// die Ausgabe des HTML-Codes kann erfolgen
    header("Location: ../../index.php");
    exit;
} else {
    $_SESSION["message"] = "missing_required_parameters";
    $_SESSION["ueberschrift"] = $_POST["ueberschrift"];
    $_SESSION["text"] = $_POST["text"];
    header("Location: ../../index.php");
    exit;
}


?>