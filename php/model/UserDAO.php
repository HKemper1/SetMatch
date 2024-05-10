<?php
class InternerFehlerException extends Exception
{
}
class FehlenderEintragException extends Exception
{
}
interface UserDAO {
    //TODO implement functions (setTeamname, getTeamname , setMail, getMail, setPasswort, getPasswort, loescheUser)
    public function setTeamname();
    public function getTeamname();

    public function setMail();
    public function getMail();

    public function setPasswort();
    public function getPasswort();

    public function loescheUser();

}
?>