<?php 
    /**
     * get the playlist names and number of music from database
     */

    session_start();

    require "../phpClasses/playlist.php";
    require "../phpClassesManagers/playlistsManager.php";

    $playlistMan = new playlistsManager("localhost","2key","root","");
    $playlistMan->connect();

    header('Content-Type: application/json');
    echo $playlistMan->getPlaylistNames($_SESSION["user_id"]);
?>