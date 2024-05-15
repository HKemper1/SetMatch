<?php
session_start();

// Test Nutzer
$users = array(
    "team1" => "password1",
    "team2" => "password2",
    "team3" => "password3"
);

// Registrierung
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $teamname = $_POST['teamname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_repeat = $_POST['password_repeat'];

        if (!isset($users[$teamname])) {
            if ($password === $password_repeat) {
                // Hier können Sie weitere Validierungen für die E-Mail-Adresse hinzufügen
                $users[$teamname] = $password;
                $_SESSION['teamname'] = $teamname;
                header("Location: index.php");
                exit;
            } else {
                $register_error = "Passwort und Passwort-Wiederholung stimmen nicht überein";
            }
        } else {
            $register_error = "Benutzername bereits vergeben";
        }
    }
}
?>
>