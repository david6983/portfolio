<?php 

/* import the playlist classes */
require "../phpClasses/playlist.php";
require "../phpClassesManagers/playlistsManager.php";
require "../phpClassesManagers/contientManager.php";

/* new manager for playlist because we need the id of the playlist */
$playlistMan = new playlistsManager("localhost","2key","root","");
$playlistMan->connect();
/* new contient manager */
$contientMan = new contientManager("localhost","2key","root","");
$contientMan->connect();

$playlist = $playlistMan->getPlaylist($_GET["playlist_name"]);

$contientMan->addTrackToPlaylist($_GET["track_id"],$playlist->getId());

$playlist->setPlaylist_nb_music($contientMan->getNumberOfTrackOfPlaylist($playlist->getId()));
$playlistMan->updatePlaylist($playlist);

echo $playlist->getTotalNumberOfTracks();
?>