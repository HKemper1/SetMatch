<?php
require_once "Eintrag.php";
require_once "ForumDAO.php";
class ForumFix implements ForumDAO
{
    private static $instance = null;
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ForumFix();
        }

        return self::$instance;
    }
    private $eintraege = array();

    private function __construct()
    {
        $this->eintraege[0] = new Eintrag(0, "Sommer Turnier in Oldenburg", "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
           ");
        $this->eintraege[1] = new Eintrag(1, "TVC sucht neue Mitspieler", "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
           ");
        $this->eintraege[2] = new Eintrag(2, "Testspiel gegener im August gesucht", "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.");
    }

    public function neuerEintrag($ueberschrift, $text)
    {
        // nur dummy
        // throw new InternerFehlerException(); // zum Testen
    }
    public function getEintrag($id)
    {
        if ($id < 0 || $id >= count($this->eintraege)) {
            throw new FehlenderEintragException();
        }
        return $this->eintraege[$id];
        // throw new InternerFehlerException(); // zum Testen
    }
    public function loescheEintrag($id)
    {
        // nur dummy
        // throw new FehlenderEintragException(); // zum Testen
        // throw new InternerFehlerException(); // zum Testen
    }

    public function getEintraege()
    {
        return $this->eintraege;
        // throw new InternerFehlerException(); // zum Testen
    }
}
?>