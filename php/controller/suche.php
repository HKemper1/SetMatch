<?php
try {
    $db = new PDO('sqlite:Users.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['search'])) {
        $searchTerm = $_GET['search'];

        $stmt = $db->prepare("SELECT * FROM users WHERE teamname LIKE :searchTerm OR beschreibung LIKE :searchTerm");
        $stmt->execute(['searchTerm' => "%$searchTerm%"]);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($results)) {
            foreach($results as $result) {
                echo "Teamname: " . $result['teamname'] . "<br>";
                echo "Beschreibung: " . $result['beschreibung'] . "<br><br>";
            }
        } else {
            echo "Keine Ergebnisse gefunden.";
        }
    }
} catch(PDOException $e) {
    echo "Verbindung fehlgeschlagen: " . $e->getMessage();
    exit();
}
?>
