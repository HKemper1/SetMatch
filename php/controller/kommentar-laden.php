<?php
require 'db/db.php';
require 'php/controller/kommentar.php';

$entryId = $_POST['entry_id'];

if (!empty($entryId)) {
    $stmt = $db->prepare("SELECT * FROM comments WHERE entry_id = ? ORDER BY created_at DESC");
    $stmt->execute([$entryId]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($comments);
}
?>
