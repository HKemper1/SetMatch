<?php
require_once "ForumPDOSQLite.php";

class Forum
{
    public static function getInstance()
    {
        return ForumPDOSQLite::getInstance();
    }
}
?>