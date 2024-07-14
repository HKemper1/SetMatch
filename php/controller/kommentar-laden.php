<?php
session_start();
require_once "../../path.php";
require_once $abs_path . "/php/controller/ForumPDOSQLite.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entry_id = $_POST['entry_id'];

    $forumDAO = ForumPDOSQLite::getInstance();
    try {
        $comments = $forumDAO->getKommentare($entry_id);
        echo json_encode($comments);
    } catch (InternerFehlerException $e) {
        echo json_encode([]);
    }
}
?>
