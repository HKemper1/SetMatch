<?php
class User

{
    private $id;
    private $teamname;
    private $email;
    private $password;

    public function __construct($id, $teamname, $email, $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->teamname = $teamname;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getTeamname() {
        return $this->teamname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getpassword() {
        return $this->password;
    }
}

?>