function displayPlaylistOnSideBar(data){
    document.getElementById("waveform").innerHTML = data;
}

function requestNewCollection(callback,playlist_name){
    var request = getXMLHttpRequest();
    request.onreadystatechange = function () {
        if(request.readyState === 4 && request.status === 200) {
            callback(request.responseText);
        }
    };
    request.open("GET","src/phpScripts/newCollection.php?playlistName="+playlist_name,true);
    request.send();
}