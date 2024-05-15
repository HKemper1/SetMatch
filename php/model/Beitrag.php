<?php
class Beitrag
{
    private $id;
    private $ueberschrift;
    private $email;
    private $text;

    public function __construct($id, $ueberschrift, $email, $text)
    {
        $this->id = $id;
        $this->ueberschrift = $ueberschrift;
        $this->email = $email;
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


    public function getEMail()
    {
        return $this->email;
    }

    public function getText()
    {
        return $this->text;
    }
}
?>