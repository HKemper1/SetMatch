<?php

class InternerFehlerException extends Exception
{
}
class FehlenderEintragException extends Exception
{
}
interface ForumDAO
{
    /*
     * Einfügen eines neuen Eintrags mit Überschrift, EMail-Adresse und Text
     * return: die ID des neuen Eintrags
     * mögliche Exceptions:
     * InternerFehlerException, wenn es einen internen Fehler gibt (bspw. beim Zugriff auf eine Datenbank)
     */
    public function neuerEintrag($ueberschrift, $text);

    /*
     * ermitteln und liefern des Eintrags mit der angegebenen ID
     * return: Objekt der Klasse Eintrag
     * mögliche Exceptions:
     * FehlenderEintragException, wenn es keinen Eintrag mit der angegebenen ID gibt
     * InternerFehlerException, wenn es einen internen Fehler gibt (bspw. beim Zugriff auf eine Datenbank)
     */
    public function getEintrag($id);

    /*
     * löschen des Eintrags mit der angegebenen ID
     * return: void
     * mögliche Exceptions:
     * FehlenderEintragException, wenn es keinen Eintrag mit der angegebenen ID gibt
     * InternerFehlerException, wenn es einen internen Fehler gibt (bspw. beim Zugriff auf eine Datenbank)
     */
    public function loescheEintrag($id);

    /*
     * ermitteln und liefern aller Einträge
     * return: Array mit Objekten der Klasse Eintrag; kann auch leer sein
     * mögliche Exceptions:
     * InternerFehlerException, wenn es einen internen Fehler gibt (bspw. beim Zugriff auf eine Datenbank)
     */
    public function getEintraege();
}

?>