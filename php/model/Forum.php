<?php
require_once "ForumFix.php";
require_once "ForumPDOSQLite.php";

/*
 * je nachdem ob die Webanwendung mit der Dummy-Fix- oder der Datenbank-Implementierung laufen soll,
 * ist die Implementierung der Methode getInstance die einzige Stelle im gesamten Code, an der eine
 * Änderung erfolgen muss
 */
class Forum
{
    public static function getInstance()
    {
        //return GaestebuchFix::getInstance(); // Dummy-Fix-Implementierung
        return ForumPDOSQLite::getInstance(); // Datenbank-Implementierung
    }
}
?>