<?php 
    session_start();

    require "../phpClasses/playlist.php";
    require "../phpClassesManagers/playlistsManager.php";

    $playlistMan = new playlistsManager("localhost","2key","root","");
    $playlistMan->connect();

    $playlistMan->addPlaylist($_GET["playlistName"],$_SESSION["user_id"]);
?>