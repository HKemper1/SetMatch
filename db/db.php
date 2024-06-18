<?php
try {
    $db = new PDO('sqlite:User.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Überprüfen, ob die Tabelle 'users' existiert, und sie erstellen, falls nicht
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        teamname TEXT,
        email TEXT,
        password TEXT,
        beschreibung TEXT,
        bild TEXT,
        spieler TEXT
    )");

    // Spalten hinzufügen, falls sie nicht existieren
    $columns = $db->query("PRAGMA table_info(users)")->fetchAll(PDO::FETCH_COLUMN, 1);
    if (!in_array('beschreibung', $columns)) {
        $db->exec("ALTER TABLE users ADD COLUMN beschreibung TEXT");
    }
    if (!in_array('bild', $columns)) {
        $db->exec("ALTER TABLE users ADD COLUMN bild TEXT");
    }
    if (!in_array('spieler', $columns)) {
        $db->exec("ALTER TABLE users ADD COLUMN spieler TEXT");
    }

    // Testdaten einfügen, falls keine existieren
    $result = $db->query("SELECT COUNT(*) FROM users");
    $count = $result->fetchColumn();
    if ($count == 0) {
        $testData = [
            ['teamname' => 'testteam1', 'email' => 'test1@example.com', 'password' => password_hash('password1', PASSWORD_DEFAULT), 'vorname' => 'Test', 'nachname' => 'Team1', 'beschreibung' => 'Beschreibung Team1', 'bild' => 'bild1.jpg', 'spieler' => json_encode([['name' => 'Spieler1', 'bild' => 'spieler1.jpg']])],
            ['teamname' => 'testteam2', 'email' => 'test2@example.com', 'password' => password_hash('password2', PASSWORD_DEFAULT), 'vorname' => 'Test', 'nachname' => 'Team2', 'beschreibung' => 'Beschreibung Team2', 'bild' => 'bild2.jpg', 'spieler' => json_encode([['name' => 'Spieler2', 'bild' => 'spieler2.jpg']])],
            ['teamname' => 'test', 'email' => 'test@example.com', 'password' => password_hash('12345678', PASSWORD_DEFAULT), 'vorname' => 'Test', 'nachname' => 'User', 'beschreibung' => 'Beschreibung User', 'bild' => 'bild3.jpg', 'spieler' => json_encode([['name' => 'Spieler3', 'bild' => 'spieler3.jpg']])]
        ];
        $stmt = $db->prepare("INSERT INTO users (teamname, email, password, vorname, nachname, beschreibung, bild, spieler) VALUES (:teamname, :email, :password, :vorname, :nachname, :beschreibung, :bild, :spieler)");
        foreach ($testData as $data) {
            $stmt->execute($data);
        }
    }

    // Tabelle für Kommentare erstellen
    $db->exec("CREATE TABLE IF NOT EXISTS comments (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        entry_id INTEGER NOT NULL,
        comment_text TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (entry_id) REFERENCES users(id)
    )");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Suchfunktion
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $stmt = $db->prepare("SELECT * FROM users WHERE teamname LIKE :searchTerm OR beschreibung LIKE :searchTerm");
    $stmt->execute(['searchTerm' => "%$searchTerm%"]);
    $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Hier könnten Sie den gefundenen Teams entsprechend ausgeben
}

?>
