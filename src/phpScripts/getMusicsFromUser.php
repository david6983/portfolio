<?php 
    session_start();

    require "../phpClasses/track.php";
    require "../phpClassesManagers/tracksManager.php";

    $trackMan = new TracksManager("localhost","2key","root","");
    $trackMan->connect();

    header('Content-Type: application/json');
    echo $trackMan->getAllTrackFromUser($_SESSION["user_id"]);
?>