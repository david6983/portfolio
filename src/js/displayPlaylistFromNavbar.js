/**
 * display a playlist if the number of track is not 0
 * if the container is not empty we can't add the playlist
 * So we have to remove the children of the container
 * 
 * @param {string} id id of the playlist
 */
function displayPlaylistFromNavbar(data,id){
    /* if the number of track is not 0 we can display the playlist */
    if( window.document.getElementById(id).textContent != 0){
        removeContainerContent("renderedPlaylist");
        //create a Playlist object of type "playlist"
        var playlistRenderer = new Playlist("playlist",data);
        //get the container
        var table = document.getElementById("renderedPlaylist");
        //the container have to be empty
        if( table.childElementCount === 0){
            //if ok , display the table 
            playlistRenderer.createTable("renderedPlaylist");
            //hide the control in the table 
            hideControl();
        }
    }
}

function requestPlaylistFromBDD(name){
    //create a request
    var request = getXMLHttpRequest();
    //store the response as JSON
    request.responseType="json";
    request.onreadystatechange = function () {
        if(request.readyState === 4 && request.status === 200) {
            if(document.getElementById(name).textContent != 0){
                //call the viewAll function
                displayPlaylistFromNavbar(request.response,name);
                //add the name in the controlBar
                document.getElementById("controlStatus").innerHTML = name;
            }
        }
    };
    //open the PHP script to get the tracks
    request.open("GET","src/phpScripts/getMusicsFromPlaylist.php?playlist_name="+name,true);
    request.send();
}

/**
 * remove all "tr" in a table
 * 
 * @param {string} containerId 
 */
function removeContainerContent(containerId){
    var c = document.getElementById(containerId);
    var el = c.querySelectorAll("tr");
    el.forEach(element => {
        element.remove();
    });
}