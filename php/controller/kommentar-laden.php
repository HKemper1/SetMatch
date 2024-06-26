<?php
require_once 'php/model/ForumPDOSQLite.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['entry_id'])) {
    $entryId = intval($_POST['entry_id']);
    $forum = ForumPDOSQLite::getInstance();

    try {
        $comments = $forum->getKommentare($entryId);
        echo json_encode($comments);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Ungültige Anfrage.']);
}
?>

