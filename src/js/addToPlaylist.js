/**
 * function called on click of a "plus" button inside the table
 * send an ajax request to add the current track in the requested playlist thanks to a php script
 */
function addToPlaylist(){
    //create a request
    var request = getXMLHttpRequest();
    //get playlist_name on document
    var playlist_name = document.getElementById("playlistSelected").value;
    //get track_id on document
    var track_id = document.getElementById("idTrackModal").textContent;
    console.log(track_id);
    //open the request 
    request.open("GET","src/phpScripts/addToPlaylist.php?playlist_name="+playlist_name+"&track_id="+track_id,true);
    /* close the modal if finished */
    request.responseType = "text";
    request.onreadystatechange = function () {
        if(request.readyState === 4 && request.status === 200) {
            closeModal('addToPlaylistModal');
            /* update the number of track in the appropriate playlist */
            document.getElementById(playlist_name).innerHTML = request.response;
        }
    }
    //send it
    request.send();
}