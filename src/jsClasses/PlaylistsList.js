class PlaylistsList {
    constructor(containerName){
        /* get the container to add the html elements */
        this.container = document.getElementById(containerName);
    }
    /**
     * request all the playlist names
     * 
     * @param {function} callback function to call
     */
    requestPlaylistsNames(object){
        /* new AJAX request */
        var request = getXMLHttpRequest();
        /* response expected : json format */
        request.responseType = "json";
        request.onreadystatechange = function () {
            if(request.readyState === 4 && request.status === 200) {
                object.displayPlaylistsNames(request.response); /* call the callback function */
            }
        };
        /* call the PHP script */
        request.open("GET","src/phpScripts/getPlaylistNames.php?",true);
        request.send();
    }

    /**
     * display all the playlist names in the sidebar
     * 
     * @param {json} data playlist names
     */
    displayPlaylistsNames(data){
        /* for all the playlist */
        for(var i=0;i < Object.keys(data).length; i++){
            this.addPlaylistName(data[i]);
        }
        
        
    }

    /**
     * create a paragraph in the sidebar for a playlist 
     * (name and number of music in a button)
     * 
     * @param {json} data name and nb of music of 1 playlist
     */
    addPlaylistName(data){
        /* create a paragraph element */
        var el = document.createElement("p");
        /* set class attributs */
        el.setAttribute("class","textSideBar playlistName textSideBarMargin w3-large");
        /* add to the element the name of the playlist */
        el.appendChild(document.createTextNode(data["playlist_name"]));
        /* creata a clickable button */
        var btn = document.createElement("button");
        /* set an id which is the playlist name */
        btn.setAttribute("id",data["playlist_name"]);
        /* add the callback function on click */
        btn.setAttribute("onclick","requestPlaylistFromBDD(this.id); showPlaylistOption();");
        /* set class attributs */
        btn.setAttribute("class","w3-button w3-round-xlarge lightblue playlistButton");
        /* add the number of music inside */
        btn.appendChild(document.createTextNode(data["playlist_nb_music"]));
        /* add the button following the paragraph */
        el.appendChild(btn);
        /* add the paragraph following the sidebar */
        this.container.appendChild(el);
    }
}