/**
 * function called on click of a "plus" button inside the table
 * send an ajax request to add the current track in the requested playlist thanks to a php script
 */
function addToPlaylist(){
    //create a request
    var request = getXMLHttpRequest();
    //get playlist_name on document
    var playlist_name = document.getElementById("playlistSelected");
    //get track_id on document
    var track_id = document.getElementById("idTrackModal");
    //open the request 
    request.open("GET","src/phpScripts/addToPlaylist.php?",true);
    //send it
    request.send();
}