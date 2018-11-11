=function requestNewCollection(callback,playlist_name){
    var request = getXMLHttpRequest();
    request.open("GET","src/phpScripts/newCollection.php?playlistName="+playlist_name,true);
    request.send();
}