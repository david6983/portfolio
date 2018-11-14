class PlaylistsList {
    constructor(){
        this.requestPlaylist(this);
        console.log("test");
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
        //exemple
        //<p class="textSideBar playlistName textSideBarMargin w3-large">Name<button id="Name" onclick="displayPlaylistFromNavbar(this.id);" class="w3-button w3-round-xlarge lightblue playlistButton">0</button></p>
        var container = document.getElementById("playlistNameContainer");
        
        for(var i=0;i < Object.keys(data).length; i++){
            var el = document.createElement("p");
            el.setAttribute("class","textSideBar playlistName textSideBarMargin w3-large");
            el.appendChild(document.createTextNode(data[i]["playlist_name"]));
            var btn = document.createElement("button");
            btn.setAttribute("id",data[i]["playlist_name"]);
            btn.setAttribute("onclick","displayPlaylistFromNavbar(this.id);");
            btn.setAttribute("class","w3-button w3-round-xlarge lightblue playlistButton");
            btn.appendChild(document.createTextNode(data[i]["playlist_nb_music"]));
            el.appendChild(btn);
            container.appendChild(el);
        }
        
        
    }
}