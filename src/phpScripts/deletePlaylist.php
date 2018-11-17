<?php 

session_start();

/* import the playlist classes */
require "../phpClasses/playlist.php";
require "../phpClassesManagers/playlistsManager.php";
require "../phpClassesManagers/contientManager.php";
require "../phpClasses/user.php";
require "../phpClassesManagers/usersManager.php";

/* new playlist manager */
$playlistMan = new playlistsManager("localhost","2key","root","");
$playlistMan->connect();
/* new contient manager */
$contientMan = new contientManager("localhost","2key","root","");
$contientMan->connect();

/* new user manager */
$userMan = new usersManager("localhost","2key","root","");
$userMan->connect();


/* get the playlist to get the id */
$playlist = $playlistMan->getPlaylist($_GET["playlist_name"]);
/* delete all tracks inside */
$contientMan->deleteAllTrackFromPlaylist($playlist->getId());
/* delete the playlist */
$playlistMan->deletePlaylist($_GET["playlist_name"]);
/* update the number of playlist for the user */
$user = $userMan->getUser($_SESSION["user_name"]);
$user->setUser_nb_playlists($playlistMan->getNbPlaylist());
$userMan->updateUser($user);


?>