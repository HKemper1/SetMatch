<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../path.php";
}
require_once $abs_path . "/php/model/User.php";

// Abfragen aus der Musterlösung 
if (!isset($_POST["teamname"]) || !isset($_POST["password"]) || !isset($_POST["submit"])) {
    $_SESSION["message"] = "missing_parameters";
    header("Location: ../../index.php");
    exit;
}
if (empty($_POST["teamname"]) || empty($_POST["password"])) {
    $_SESSION["message"] = "missing_required_parameters";
    $_SESSION["email"] = $_POST["email"];
    header("Location: ../../anmeldung.php");
    exit;
}
try{
    $userDatenbank = UserDatenbank::getInstance();
    $user = $userDatenbank -> getUserByEmailAndPassword($teamname, $password);
}catch (FehlenderEintragException $exc) {
    // Behandlung von potentiellen Fehlern der Geschaeftslogik
    $_SESSION["message"] = "invalid_entry_id";
    header("Location: index.php");
    exit;
}
?>