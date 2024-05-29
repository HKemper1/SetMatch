<?php
try {
    $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tabelle erstellen, falls sie nicht existiert
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        teamname TEXT NOT NULL,
        email TEXT NOT NULL,
        password TEXT NOT NULL
    )");

    // Testdaten einfügen, falls keine existieren
    $result = $db->query("SELECT COUNT(*) FROM users");
    $count = $result->fetchColumn();
    if ($count == 0) {
        $testData = [
            ['teamname' => 'testteam1', 'email' => 'test1@example.com', 'password' => password_hash('password1', PASSWORD_DEFAULT)],
            ['teamname' => 'testteam2', 'email' => 'test2@example.com', 'password' => password_hash('password2', PASSWORD_DEFAULT)],
            ['teamname' => 'test', 'email' => 'test2@example.com', 'password' => password_hash('12345678', PASSWORD_DEFAULT)],
        ];
        $stmt = $db->prepare("INSERT INTO users (teamname, email, password) VALUES (:teamname, :email, :password)");
        foreach ($testData as $data) {
            $stmt->execute($data);
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
