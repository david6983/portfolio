<?php 
    /**
     * this script add a new playlist to the data base and output it name and it number of track as JSON
     */

    /* get session variables */
    session_start();

    /* import the playlist classes */
    require "../phpClasses/playlist.php";
    require "../phpClassesManagers/playlistsManager.php";

    /* import user classes */
    require "../phpClasses/user.php";
    require "../phpClassesManagers/usersManager.php";

    /* new manager */
    $playlistMan = new playlistsManager("localhost","2key","root","");
    $playlistMan->connect();

    /* new manager */
    $userMan = new usersManager("localhost","2key","root","");
    $userMan->connect();

    /* add to the database */
    $playlistMan->addPlaylist($_GET["playlistName"],$_SESSION["user_id"]);

    /* update number of playlist */
    $user = $userMan->getUser($_SESSION["user_name"]);
    $user->setUser_nb_playlists($playlistMan->getNbPlaylist());
    $userMan->updateUser($user);
    
    /* set the output as json format */
    header('Content-Type: application/json');
    /* send the new playlist to javascript to display in the sidebar */
    echo $playlistMan->getThePlaylistNameOf($_GET["playlistName"]);
?>