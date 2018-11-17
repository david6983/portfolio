<?php 

/* import the playlist classes */
require "../phpClasses/playlist.php";
require "../phpClassesManagers/playlistsManager.php";

/* new manager for playlist because we need the id of the playlist */
$playlistMan = new playlistsManager("localhost","2key","root","");
$playlistMan->connect();

/* get the information about the playlist requested */
$playlist = $playlistMan->getPlaylist($_GET["playlist_name"]);

$playlist->setPlaylist_name($_GET["playlist_new_name"]);
$playlistMan->updatePlaylist($playlist);

/* give to the GUI the new number of track to display */
echo $playlist->getName();
?>