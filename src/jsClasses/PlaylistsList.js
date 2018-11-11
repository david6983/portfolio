class PlaylistsList {
    constructor(){
        this.requestPlaylist();
    }
    requestPlaylist(){
        var request = getXMLHttpRequest();
        request.responseType = "json";
        request.onreadystatechange = function () {
            if(request.readyState === 4 && request.status === 200) {
                this.data = request.response;
                console.log(this.data);
            }
        };
        request.open("GET","src/phpScripts/getPlaylistNames.php?",true);
        request.send();
    }
    displayData(){
        
    }
}