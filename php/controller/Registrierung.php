<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamname = $_POST['teamname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    if ($password == $password_repeat) {
        $db->beginTransaction();
        try {
            $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE teamname = :teamname OR email = :email");
            $stmt->execute(['teamname' => $teamname, 'email' => $email]);
            $count = $stmt->fetchColumn();

            if ($count == 0) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $db->prepare("INSERT INTO users (teamname, email, password) VALUES (:teamname, :email, :password)");
                $stmt->execute(['teamname' => $teamname, 'email' => $email, 'password' => $hashed_password]);
                $db->commit();

                // Benutzer nach erfolgreicher Registrierung anmelden
                $_SESSION['user_id'] = $db->lastInsertId();
                $_SESSION['teamname'] = $teamname;
                $_SESSION['email'] = $email;

                header('Location: index.php');
                exit();
            } else {
                $db->rollBack();
                echo "Teamname oder E-Mail bereits vergeben!";
            }
        } catch (Exception $e) {
            $db->rollBack();
            echo "Fehler: " . $e->getMessage();
        }
    } else {
        echo "Passwörter stimmen nicht überein!";
    }
}
?>