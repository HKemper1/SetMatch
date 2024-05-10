<?php
require_once "User.php";
require_once "GaestebuchDAO.php";
class UserFix 
{
    private static $instance = null;
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new UserFix();
        }

        return self::$instance;
    }
    private $users = array();

    private function __construct()
    {
        $this->users[0] = new User(0, "Team 2", "email1@test.de", "passwort1");
        $this->users[1] = new User(1, "Team 2", "email2@test.de", "passwort2");
        $this->users[2] = new User(2, "Team 3", "email3@test.de", "passwort3");
    }

    
    public function neuerUser($team, $email, $text)
    {
        // nur dummy
        // throw new InternerFehlerException(); // zum Testen
    }
    public function getUser($id)
    {
        if ($id < 0 || $id >= count($this->users)) {
            throw new FehlenderEintragException();
        }
        return $this->users[$id];
        // throw new InternerFehlerException(); // zum Testen
    }
    public function loescheUser($id)
    {
        // nur dummy
        // throw new FehlenderEintragException(); // zum Testen
        // throw new InternerFehlerException(); // zum Testen
    }

    public function getUserByEmailAndPassword($teamname, $password) {
        // Durchsuche die Benutzerliste nach einem Benutzer mit der angegebenen teamname
        foreach ($this->users as $user) {
            if ($user->getTeamname() === $teamname) {
                // Wenn die teamname übereinstimmt, überprüfe das Passwort
                if ($user->getPassword() === $password) {
                    // Wenn das Passwort übereinstimmt, gib den Benutzer zurück
                    return $user;
                } else {
                    // Wenn das Passwort nicht übereinstimmt, gib null zurück (falsches Passwort)
                    return null;
                }
            }
        }
        // Wenn der Benutzer nicht gefunden wird, gib ebenfalls null zurück (Benutzer nicht gefunden)
        return null;
    }
}
?>