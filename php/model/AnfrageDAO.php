<?php
    class InternerFehlerException extends Exception
    {
    }
    class FehlenderEintragException extends Exception
    {
    }

    interface AnfrageDAO
    {
	//TODO implements (neuerEintrag, getEintrag, loescheEintrag, getEintraege)
	public function neuerEintrag($ueberschrift, $email, $text);
	public function getEintrag($id);
	public function loescheEintrag($id);
	public function getEintraege();
    }
?>