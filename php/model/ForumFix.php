<?php
require_once "php/model/Beitrag.php";
require_once "php/model/ForumDAO.php";
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
    private $beitraege = array();

    private function __construct()
    {
        $this->beitraege[0] = new Beitrag(0, "Meister Feier", "email1@test.de", "Wir laden herzlich zu unserer Meisterfeier ein am 12.12.24 um 12 Uhr");
        $this->beitraege[1] = new Beitrag(1, "Freunschaftsturnier Mitglieder", "email2@test.de", "Wir suchgen noch Mannschaften für unser Vorbereitungsturnier am 12.06.24, gerne melden");
        $this->beitraege[2] = new Beitrag(2, "Probetraining", "email3@test.de", "Interessierte Sieler sind zu unserem Probetraining am 6.06.24 eingeladen, Mitzubringen: Spaß am Spiel ");
    }

    public function neuerBeitrag($ueberschrift, $email, $text)
    {
        // nur dummy
        // throw new InternerFehlerException(); // zum Testen
    }
    public function getBeitrag($id)
    {
        if ($id < 0 || $id >= count($this->beitraege)) {
            throw new FehlenderBeitragException();
        }
        return $this->beitraege[$id];
        // throw new InternerFehlerException(); // zum Testen
    }
    public function loescheBeitrag($id)
    {
        // nur dummy
        // throw new FehlenderEintragException(); // zum Testen
        // throw new InternerFehlerException(); // zum Testen
    }

    public function getBeitraege()
    {
        return $this->beitraege;
        // throw new InternerFehlerException(); // zum Testen
    }
}
?>