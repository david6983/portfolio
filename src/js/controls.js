/**
 * on click , hide control of a playlist (or view all)
 * the checkbox row, plus or remove row and play button row
 */
function hideControl(){
    /* get array of all element where class is hoverElement */
    let e = document.querySelectorAll(".hoverElement");
    /* for each element  */
    e.forEach(function(e){
        /* hide it  */
        e.setAttribute("style","display: none;");
    })
}

function displayControlBar(){
    document.getElementById("controlBar").removeAttribute("style");
}
/**
 * on click , show control of a playlist (or view all) and the toolbar for check multiple tracks
 * the checkbox row, plus or remove row and play button row
 */
function showControl(){
    /* get array of all element where class is hoverElement */
    let e = document.querySelectorAll(".hoverElement");
    /* for each element  */
    e.forEach(function(e){
        /* if hiden  */
        if(e.getAttribute("style") == "display: none;"){
            /* display it */
            e.removeAttribute("style");
        }else{
            /* or hide if already displayed */
            e.setAttribute("style","display: none;");
        }
    })
    /* concerning the toolbar */

    /* get the element in the document */
    let cb = document.getElementById("controlBar");
    /* if hiden */
    if(document.getElementById("renderedPlaylist").childElementCount != 0){
        if(document.getElementById(e[3].getAttribute("id")).getAttribute("style") === "display: none;"){
            /* then display it */
            cb.setAttribute("style","display: none;");
        }else{
            /* or hide it */
            cb.removeAttribute("style");
        }
    }
}

/**
 * check all the checkbox in the document
 */
function check() {
    var checkboxes = document.querySelectorAll(".w3-check");
    //for each checkbox 
    for(var i = 0;i < checkboxes.length ;i++){
    	checkboxes[i].checked = true; /* check it */
    }
}

/**
 * uncheck all the checkbox in the document
 */
function uncheck() {
    var checkboxes = document.querySelectorAll(".w3-check");
    //for each checkbox
    for(var i = 0;i < checkboxes.length ;i++){
    	checkboxes[i].checked = false;
    }
}

/**
 * on click on a play button , create the player of the chosen track
 * or on click on a plus button , open the window to add the chosen track in the selected playlist
 * 
 * @param {string} id parent element identifier of the clicked button
 */
function execFunction(id){
    /* the id given is like "play12" or "plus3" in the shape of "functionId" */
    
    btn = id.substring(0,4); /* select the first substring => the function name */
    nb = id.substring(4,); /* select the second substring => the id of the track */

    /* according to the type of function requested : */
    if( btn === "play"){
        //createPlayerFromTrack(id);
        prepareToPlay(nb);
        //var player = new Player(document.getElementById("path"+nb).textContent);
    }else if( btn === "plus"){
        /* open the window to select the playlist */
        displayModal('addToPlaylistModal');
        /* do some stuff to be fixed */
        //var p = new PlaylistSelect("playlistSelected");
        document.getElementById("idTrackModal").textContent = nb;
    }else if( btn === "remo"){
        var playlist_name = document.getElementById("controlStatus").textContent;
        var row = document.getElementById("id"+nb).parentNode;
        var PlaylistBtn = document.getElementById(playlist_name);

        requestDeleteTrackFromPlaylist(playlist_name,row,PlaylistBtn,nb);
    }
}

function requestDeleteTrackFromPlaylist(playlist_name,rowObject,PlaylistBtnObject,track_id){
    var request = getXMLHttpRequest();
    request.open("GET","src/phpScripts/deleteTrackFromPlaylist.php?playlist_name="+playlist_name+"&track_id="+track_id,true);
    request.responseType = "text";
    request.onreadystatechange = function () {
        if(request.readyState === 4 && request.status === 200) {
            PlaylistBtnObject.innerHTML = request.response;
            rowObject.remove();
        }
    };
    request.send();
}

function deleteSelectedToPlaylist(){
    //create a request
    var request = getXMLHttpRequest();
    //create a new array to store the track ids
    var output = new Array();
    //get the name of the playlist from the select
    var playlist_name = document.getElementById("controlStatus").textContent;
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
    request.open("GET","src/phpScripts/deleteSelectedTracksFromPlaylist.php?playlist_name="+playlist_name+"&tracks_id="+JSON.stringify(output),true);
    /* we are going to get the total number of tracks in the playlist as text */
    request.responseType = "text";
    request.onreadystatechange = function () {
        //on success
        if(request.readyState === 4 && request.status === 200) {
            /* update the number of track in the appropriate playlist */
            document.getElementById(playlist_name).innerHTML = request.response;
            for (var i = 0; i < output.length; i++) {
                document.getElementById("id"+output[i]).parentNode.remove();
            }
        }
    }
    //send it
    request.send();
}

function prepareToPlay(nb){
    var localPath = document.getElementById("path"+nb).textContent;
    var name = document.getElementById("name"+nb).textContent;
    var track = new Track(nb,name,localPath);
    document.getElementById("player").removeAttribute("style");
    track.pathFromLocalToServer();
    wavesurfer.load(track.path);
    displayPlayerContentValues(nb);
}

function displayPlayerContentValues(id){
    document.getElementById("playerValueForName").innerHTML = document.getElementById("name"+nb).textContent;
    document.getElementById("playerValueForArtists").innerHTML = document.getElementById("artist"+nb).textContent;
    document.getElementById("playerValueForGenre").innerHTML = document.getElementById("genre"+nb).textContent;
    document.getElementById("playerValueForKey").innerHTML = document.getElementById("key"+nb).textContent;
    document.getElementById("playerValueForBPM").innerHTML = document.getElementById("bpm"+nb).textContent;
    document.getElementById("playerValueForLength").innerHTML = document.getElementById("length"+nb).textContent;
}

/**
 * on click on add selected to 
 */
function controlAddSelectedTo(){
    /* open the modal to select the playlist */
    displayModal('addAllToPlaylistModal');
    /* add the option in the select */
    var p = new PlaylistSelect("playlistSelectedAll");
}

function listennerOnClick(buttonId,callback){
    window.document.getElementById(buttonId).addEventListener("click",callback(callback));
}

function hidePlaylistOption(){
    document.getElementById("playlistOption").style = "display: none;";
}

function showPlaylistOption(){
    document.getElementById("playlistOption").removeAttribute("style");
}