<?php
/*
 * je nachdem ob die Webanwendung mit der Dummy-Fix- oder der Datenbank-Implementierung laufen soll,
 * ist die Implementierung der Methode getInstance die einzige Stelle im gesamten Code, an der eine
 * Änderung erfolgen muss
 */
class Benutzerdatenbank
{
    public static function getInstance()
    {
        return BenutzerdatenbankFix::getInstance(); // Dummy-Fix-Implementierung
    }
}
?>