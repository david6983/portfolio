<?php 

require "../phpClasses/track.php";
require "../phpClassesManagers/tracksManager.php";

$trackMan = new TracksManager("localhost","2key","root","");
$trackMan->connect();

$track = $trackMan->getTrackById($_GET["track_id"]);


$method = 'set'.ucfirst($_GET["track_method_name"]);

if(method_exists($track,$method)){
    $track->$method($_GET["track_content"]);
}
$trackMan->updateTrack($track);

?>