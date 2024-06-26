<?php
try {
    $db = new PDO('sqlite:User.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Überprüfen und Tabelle 'users' erstellen, falls nicht vorhanden
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        teamname TEXT,
        email TEXT,
        password TEXT,
        beschreibung TEXT,
        bild_path TEXT, -- Pfad zum Bild, statt direkt den Dateinamen zu speichern
        spieler JSON -- JSON für Spielerdaten
    )");

    // Testdaten einfügen, falls keine existieren
    $result = $db->query("SELECT COUNT(*) FROM users");
    $count = $result->fetchColumn();
    if ($count == 0) {
        $testData = [
            ['teamname' => 'testteam1', 'email' => 'test1@example.com', 'password' => password_hash('password1', PASSWORD_DEFAULT), 'beschreibung' => 'Beschreibung Team1', 'bild_path' => 'uploads/bild1.jpg', 'spieler' => json_encode([['name' => 'Spieler1', 'bild' => 'uploads/spieler1.jpg']])],
            ['teamname' => 'testteam2', 'email' => 'test2@example.com', 'password' => password_hash('password2', PASSWORD_DEFAULT), 'beschreibung' => 'Beschreibung Team2', 'bild_path' => 'uploads/bild2.jpg', 'spieler' => json_encode([['name' => 'Spieler2', 'bild' => 'uploads/spieler2.jpg']])],
            ['teamname' => 'test', 'email' => 'test@example.com', 'password' => password_hash('12345678', PASSWORD_DEFAULT), 'beschreibung' => 'Beschreibung User', 'bild_path' => 'uploads/bild3.jpg', 'spieler' => json_encode([['name' => 'Spieler3', 'bild' => 'uploads/spieler3.jpg']])]
        ];
        $stmt = $db->prepare("INSERT INTO users (teamname, email, password, beschreibung, bild_path, spieler) VALUES (:teamname, :email, :password, :beschreibung, :bild_path, :spieler)");
        foreach ($testData as $data) {
            $stmt->execute($data);
        }
    }

    // Tabelle für Kommentare erstellen, wenn nicht vorhanden
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

// Suchfunktion (Beispielcode, wie sie verwendet werden könnte)
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $stmt = $db->prepare("SELECT * FROM users WHERE teamname LIKE :searchTerm OR beschreibung LIKE :searchTerm");
    $stmt->execute(['searchTerm' => "%$searchTerm%"]);
    $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Beispiel: Ausgabe der gefundenen Teams
    foreach ($teams as $team) {
        echo "Teamname: " . htmlspecialchars($team['teamname']) . "<br>";
        echo "Beschreibung: " . htmlspecialchars($team['beschreibung']) . "<br><br>";
    }
}

?>
