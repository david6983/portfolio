<?php 

session_start();

/* import the playlist classes */
require "../phpClasses/playlist.php";
require "../phpClassesManagers/playlistsManager.php";
require "../phpClasses/track.php";
require "../phpClassesManagers/tracksManager.php";
require "../phpClasses/user.php";
require "../phpClassesManagers/usersManager.php";
require "../phpClassesManagers/contientManager.php";

/* new playlists manager */
$playlistMan = new playlistsManager("localhost","2key","root","");
$playlistMan->connect();
/* new contient manager */
$contientMan = new contientManager("localhost","2key","root","");
$contientMan->connect();
/* new users manager */
$userMan = new usersManager("localhost","2key","root","");
$userMan->connect();
/* new tracks manager */
$tracksMan = new TracksManager("localhost","2key","root","");
$tracksMan->connect();
//get the user
$user = $userMan->getUser($_SESSION["user_name"]);
//the result will be a json string
header('Content-Type: application/json');
//create an array
$all = array();
//push inside the user attributes
array_push($all,$userMan->exportUser($_SESSION["user_name"]));
//for all playlist
for($i=0;$i < $user->getNbPlaylists() ; $i++ ){
    //create a temporary array
    $tmp = array();
    //add it the playlist attributes
    array_push($tmp,$playlistMan->exportPlaylist($i));
    //and all the track caracteristics
    array_push($tmp,$contientMan->exportTracksFromPlaylist($i));
    //push the temporary array into the big array
    array_push($all,$tmp);
}
//encode as json
echo json_encode($all);

?>