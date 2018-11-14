<?php 
    session_start();

    require "../phpClasses/playlist.php";
    require "../phpClassesManagers/playlistsManager.php";
    require "../phpClassesManagers/contientManager.php";

    /* new contient manager */
    $contientMan = new contientManager("localhost","2key","root","");
    $contientMan->connect();

    /* new manager for playlist because we need the id of the playlist */
    $playlistMan = new playlistsManager("localhost","2key","root","");
    $playlistMan->connect();

    /* get the information about the playlist requested */
    $playlist = $playlistMan->getPlaylist($_GET["playlist_name"]);

    header('Content-Type: application/json');
    echo $contientMan->getAllTrackOfPlaylist($playlist->getId());
?>