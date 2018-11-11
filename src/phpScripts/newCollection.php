<?php 
    function chargeClasse($classe){
        require $classe.'.php';
    }
    spl_autoload_register('chargeClasse');  
    chargeClasse("../phpClasses/playlist");
    chargeClasse("../phpClassesManagers/playlistsManager");

    $playlistMan = new playlistManager();
    $playlistMan->connect();

    $playlistMan->addPlaylist($_GET["playlistName"],$_SESSION["user_id"]);

    $playlist = $playlistMan->getPlaylist($_GET["playlistName"]);

    $send = $_GET["playlistName"]."|".$playlist->getTotalNumberOfTracks();
    header("content-type: text");
    echo $send;
?>