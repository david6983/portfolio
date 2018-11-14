class PlaylistSelect {
    constructor(container){
        this.requestPlaylist(this);
        this.container = container;
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
        var container = document.getElementById(this.container);
        if( container.childElementCount === 0){
            for(var i=0;i < Object.keys(data).length; i++){
                var el = document.createElement("option");
                el.setAttribute("value",data[i]["playlist_name"]);
                el.appendChild(document.createTextNode(data[i]["playlist_name"]));
                container.appendChild(el);
            }
        }
        
    }
}