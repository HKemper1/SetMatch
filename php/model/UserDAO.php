<?php
class InternerFehlerException extends Exception
{
}
class FehlenderEintragException extends Exception
{
}
interface UserDAO {
    //TODO implement functions (setTeamname, getTeamname , setMail, getMail, setPasswort, getPasswort, loescheUser)
    public function setTeamname($teamname);
    public function getTeamname();

    public function setMail($email);
    public function getMail();

    public function setPasswort($kennwort);
    public function getPasswort();

    public function loescheUser($id);

}
?>