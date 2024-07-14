<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../path.php";
}

require_once $abs_path . "/php/model/Eintrag.php";
require_once $abs_path . "/php/model/Forum.php";


try {

    $forum = Forum::getInstance();
    $eintraege = $forum->getEintraege();

} catch (InternerFehlerException $exc) {
    $_SESSION["message"] = "internal_error";
}
?>