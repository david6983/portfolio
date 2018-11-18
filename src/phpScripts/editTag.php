<?php 
/**
 * update a tag in the database
 */

//get classe to manage tracks
require "../phpClasses/track.php";
require "../phpClassesManagers/tracksManager.php";

//new manager
$trackMan = new TracksManager("localhost","2key","root","");
$trackMan->connect();

//get the track by it id
$track = $trackMan->getTrackById($_GET["track_id"]);
//get the method requested
$method = 'set'.ucfirst($_GET["track_method_name"]);

//if exists
if(method_exists($track,$method)){
    //call it
    $track->$method($_GET["track_content"]);
}
//update the new attribute
$trackMan->updateTrack($track);

?>