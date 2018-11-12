class PlaylistSelect {
    constructor(){
        this.requestPlaylist(this);
    }
    requestPlaylist(object){
        var request = getXMLHttpRequest();
        request.responseType = "json";
        request.onreadystatechange = function () {
            if(request.readyState === 4 && request.status === 200) {
                object.displayData(request.response);
            }
        };
        request.open("GET","src/phpScripts/getPlaylistNames.php?",true);
        request.send();
    }
    displayData(data){
        var container = document.getElementById("playlistSelected");
        
        for(var i=0;i < Object.keys(data).length; i++){
            var el = document.createElement("option");
            el.setAttribute("value",i);
            el.appendChild(document.createTextNode(data[i]["playlist_name"]));
            container.appendChild(el);
        }
        
        
    }
}