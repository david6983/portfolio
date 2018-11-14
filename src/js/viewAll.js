/**
 * 
 * @param {json} data 
 */
function viewAll(data){
    var playlistRenderer = new Playlist("viewAll",data);
    var table = document.getElementById("renderedPlaylist");
    if( table.childElementCount === 0){
        playlistRenderer.createTable("renderedPlaylist");
        hideControl();
    }
}

function requestViewAll(callback){
    var request = getXMLHttpRequest();
    request.responseType="json";
    request.onreadystatechange = function () {
        if(request.readyState === 4 && request.status === 200) {
            callback(request.response);
        }
    };
    request.open("GET","src/phpScripts/getMusicsFromUser.php",true);
    request.send();
}