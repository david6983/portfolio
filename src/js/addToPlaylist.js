function addToPlaylist(){
    var request = getXMLHttpRequest();
    var playlist_name = document.getElementById("playlistSelected");
    var track_id = document.getElementById("idTrackModal");
    request.open("GET","src/phpScripts/addToPlaylist.php?",true);
    request.send();
}