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

/* get the information about the playlist requested */
$playlist = $playlistMan->getPlaylist($_GET["playlist_name"]);

/* delete in contient the track in the playlist */
$contientMan->deleteTrackFromPlaylist($_GET["track_id"],$playlist->getId());

/* set the new total number of music for the playlist based on
the 'contient' table : count all the music for a playlist
*/
$playlist->setPlaylist_nb_music($contientMan->getNumberOfTrackOfPlaylist($playlist->getId()));
$playlistMan->updatePlaylist($playlist);

/* give to the GUI the new number of track to display */
echo $playlist->getTotalNumberOfTracks();
?>