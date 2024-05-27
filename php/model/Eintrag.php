<?php
class Eintrag
{
    private $id;
    private $username;
    private $ueberschrift;
    private $email;
    private $text;

    public function __construct($id, $username, $ueberschrift, $email, $text)
    {
        $this->id = $id;
        $this->username = $username;
        $this->ueberschrift = $ueberschrift;
        $this->email = $email;
        $this->text = $text;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getUeberschrift() {
        return $this->ueberschrift;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getText() {
        return $this->text;
    }
}
?>