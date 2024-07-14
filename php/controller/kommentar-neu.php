<?php
session_start();
require_once "../../path.php";
require_once $abs_path . "/php/controller/ForumPDOSQLite.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entry_id = $_POST['entry_id'];
    $comment_text = $_POST['comment_text'];

    $forumDAO = ForumPDOSQLite::getInstance();
    try {
        // Debugging-Informationen
        error_log("Entry ID: $entry_id");
        error_log("Comment Text: $comment_text");

        $result = $forumDAO->neuerKommentar($entry_id, $comment_text);

        // Überprüfen, ob Kommentar-ID zurückgegeben wurde
        if ($result > 0) {
            echo json_encode(['success' => true, 'comment_id' => $result]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Kommentar konnte nicht hinzugefügt werden.']);
        }
    } catch (InternerFehlerException $e) {
        error_log("Fehler: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
?>
