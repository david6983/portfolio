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

$user = $userMan->getUser($_SESSION["user_name"]);

header('Content-Type: application/json');

$all = array();

array_push($all,$userMan->exportUser($_SESSION["user_name"]));
for($i=0;$i < $user->getNbPlaylists() ; $i++ ){
    $tmp = array();
    array_push($tmp,$playlistMan->exportPlaylist($i));
    array_push($tmp,$contientMan->exportTracksFromPlaylist($i));
    array_push($all,$tmp);
}
echo json_encode($all);

?>