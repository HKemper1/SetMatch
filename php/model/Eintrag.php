<?php
class Eintrag
{
    private $id;
    private $ueberschrift;
    private $text;

    public function __construct($id, $ueberschrift, $text)
    {
        $this->id = $id;
        $this->ueberschrift = $ueberschrift;
        $this->text = $text;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUeberschrift()
    {
        return $this->ueberschrift;
    }

    public function getText()
    {
        return $this->text;
    }
}
?>