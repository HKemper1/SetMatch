<?php
session_start();
session_unset();
session_destroy();
header("Location: anmeldung.php");
exit();
?>
