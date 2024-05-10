<?php
require_once "UserFix.php";

/*
 * je nachdem ob die Webanwendung mit der Dummy-Fix- oder der Datenbank-Implementierung laufen soll,
 * ist die Implementierung der Methode getInstance die einzige Stelle im gesamten Code, an der eine
 * Änderung erfolgen muss
 */
class UserDatenbank
{
    public static function getInstance()
    {
        return UserFix::getInstance(); // Dummy-Fix-Implementierung
    }
}
?>