<?php
    class InternerFehlerException extends Exception
    {
    }
    class FehlenderEintragException extends Exception
    {
    }

    interface AnfrageDAO
    {
	    //TODO implements (neueAnfrage, getAnfrage, loescheAnfrage, getAnfrage)
	    public function neueAnfrage();
	    public function getAnfragen();
	    public function loescheAnfrage();
	    public function getAnfrage();
    }
?>