<?php 
    session_start();

    require "getAllFilesInDir.php";

    echo getAllFilesInDir($_SESSION["libraryPath"]);
?>