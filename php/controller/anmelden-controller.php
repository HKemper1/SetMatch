<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../path.php";
}
require_once $abs_path . "/php/model/User.php";

// Abfragen aus der Musterlösung 
if (!isset($_POST["email"]) || !isset($_POST["kennwort"]) || !isset($_POST["submit"])) {
    $_SESSION["message"] = "missing_parameters";
    header("Location: ../../index.php");
    exit;
}
if (empty($_POST["email"]) || empty($_POST["kennwort"])) {
    $_SESSION["message"] = "missing_required_parameters";
    $_SESSION["email"] = $_POST["email"];
    header("Location: ../../anmeldung.php");
    exit;
}

try {
    $useraccount = User :: getEmail()
}
?>