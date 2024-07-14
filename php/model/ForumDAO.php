<?php

class InternerFehlerException extends Exception
{
}
class FehlenderEintragException extends Exception
{
}
interface ForumDAO
{
    public function neuerEintrag($ueberschrift, $text);

    public function getEintrag($id);

    public function loescheEintrag($id);

    public function getEintraege();
}

?>