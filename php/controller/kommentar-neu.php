<?php
require 'db/db.php';
require 'php/controller/kommentar.php';

$entryId = $_POST['entry_id'];
$commentText = $_POST['comment_text'];

if (!empty($entryId) && !empty($commentText)) {
    $stmt = $db->prepare("INSERT INTO comments (entry_id, comment_text, created_at) VALUES (?, ?, datetime('now'))");
    $stmt->execute([$entryId, $commentText]);
}

echo json_encode(['success' => true]);
?>
