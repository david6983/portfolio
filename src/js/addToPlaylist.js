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

/**
 * add the tracks selected by the checkboxes into the corresponding playlist
 */
function addSelectedToPlaylist(){
    //create a request
    var request = getXMLHttpRequest();
    //create a new array to store the track ids
    var output = new Array();
    //get the name of the playlist from the select
    var playlist_name = document.getElementById("playlistSelectedAll").value;
    //select all the checkbox
    var checkboxes = document.querySelectorAll(".w3-check");
    //and for all of it
    for(var i = 0;i < checkboxes.length ;i++){
        //if the checkbox is checked
    	if(checkboxes[i].checked === true){
            //add it value in the output array
            output.push(checkboxes[i].value);
        }
    }
    
    //open a request and send the array as a JSON string
    request.open("GET","src/phpScripts/addSelectedToPlaylist.php?playlist_name="+playlist_name+"&tracks_id="+JSON.stringify(output),true);
    /* we are going to get the total number of tracks in the playlist as text */
    request.responseType = "text";
    request.onreadystatechange = function () {
        //on success
        if(request.readyState === 4 && request.status === 200) {
            /* close the modal if finished */
            closeModal('addAllToPlaylistModal');
            /* update the number of track in the appropriate playlist */
            document.getElementById(playlist_name).innerHTML = request.response;
        }
    }
    //send it
    request.send();
}