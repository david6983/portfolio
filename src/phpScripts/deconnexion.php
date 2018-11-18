<?php 
session_start();

//clear session array
$_SESSION = array();
//destroy the session
session_destroy();

//redirect to connexion
header("location: ../../index.php");

?>