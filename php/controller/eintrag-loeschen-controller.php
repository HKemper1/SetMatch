<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../path.php";
}

require_once $abs_path . "/php/model/Eintrag.php";
require_once $abs_path . "/php/model/Forum.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    $_SESSION["message"] = "invalid_entry_id";
    header("Location: ../../index.php");
    exit;
}

try {
    $forum = FORUM::getInstance();
    $forum->loescheEintrag($_GET["id"]);
} catch (FehlenderEintragException $exc) {
    $_SESSION["message"] = "invalid_entry_id";
    header("Location: ../../index.php");
    exit;
} catch (InternerFehlerException $exc) {
    $_SESSION["message"] = "internal_error";
    header("Location: ../../index.php");
    exit;
}

$_SESSION["message"] = "delete_entry";

header("Location: ../../index.php");
exit;
?>