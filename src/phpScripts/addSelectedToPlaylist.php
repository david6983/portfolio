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

/* add in contient the all tracks in the playlist */

/* decode the JSON array given in JS */
$tracks = json_decode($_GET["tracks_id"]);
/* put the playlist id to not call every itme the function  */
$playlist_id = $playlist->getId();
/* for each track_id add it to the playlist */
for($i=0; $i < count($tracks); $i++) { 
    $contientMan->addTrackToPlaylist($tracks[$i],$playlist_id);
}

/* set the new total number of music for the playlist based on
the 'contient' table : count all the music for a playlist
*/
$playlist->setPlaylist_nb_music($contientMan->getNumberOfTrackOfPlaylist($playlist->getId()));
$playlistMan->updatePlaylist($playlist);

/* give to the GUI the new number of track to display */
echo $playlist->getTotalNumberOfTracks();
?>