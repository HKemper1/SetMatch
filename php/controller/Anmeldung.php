<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamname = $_POST['teamname'];
    $password = $_POST['password'];

    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE teamname = :teamname");
        $stmt->execute(['teamname' => $teamname]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['teamname'] = $teamname;
            header("Location: index.php");
            exit();
        } else {
            echo "Teamname oder Passwort falsch!";
        }
    } catch (Exception $e) {
        echo "Fehler: " . $e->getMessage();
    }
}
?>