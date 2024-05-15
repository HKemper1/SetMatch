<?php
session_start();
$login_error = "";

if (isset($_GET['error'])) {
    $login_error = $_GET['error'];
}

// Test Nutzer
$users = array(
    "team1" => "password1",
    "team2" => "password2",
    "team3" => "password3"
);

// Anmelden
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $teamname = $_POST['teamname'];
    $password = $_POST['password'];
    $Anmelde_Error = $_POST['Anmelde_Error'];

    if (isset($users[$teamname])) {
        if ($users[$teamname] == $password) {
            $_SESSION['teamname'] = $teamname;
            header("Location: index.php");
            exit;
        } else {
            $login_error = "Ungültiges Passwort";
        }
    } else {
        $login_error = "Benutzer existiert nicht";
    }
    header("Location: anmeldung.php?error=" . urlencode($login_error));
    exit;
}
?>




