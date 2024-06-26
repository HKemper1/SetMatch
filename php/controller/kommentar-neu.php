<?php
require_once 'php/model/ForumPDOSQLite.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['entry_id']) && isset($_POST['comment_text'])) {
    $entryId = intval($_POST['entry_id']);
    $commentText = trim($_POST['comment_text']);
    $forum = ForumPDOSQLite::getInstance();

    try {
        $forum->neuerKommentar($entryId, $commentText);
        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Ungültige Anfrage.']);
}
?>
