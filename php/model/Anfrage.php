<?php
class Anfrage 
{
    private $id;
    private $teamname;
    private $email;
    private $empfaenger;

    /* Konstruktor Anfrage */
    public function __construct($id, $teamname, $email, $empfaenger){
        $this->id = $id;
        $this->teamname = $teamname;
        $this->email = $email;
        $this->empfaenger = $empfaenger;
    }

    /* Getter und Setter */
    public function getId()
    {
        return $this->id;
    }

    public function getTeamname()
    {
        return $this->teamname;
    }


    public function getEMail()
    {
        return $this->email;
    }

    public function getEmpfaenger()
    {
        return $this->empfaenger;
    }
}
?>