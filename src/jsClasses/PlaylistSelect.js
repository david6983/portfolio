/**
 * create options for a select with all the playlist names
 */
class PlaylistSelect {
    /**
     * initialization
     * 
     * @param {string} container id
     */
    constructor(container){
        this.requestPlaylist(this);
        this.container = container;
    }
    /**
     * request content from database
     * 
     * @param {object} object to call a method of the class
     */
    requestPlaylist(object){
        var request = getXMLHttpRequest();
        request.responseType = "json";
        request.onreadystatechange = function () {
            if(request.readyState === 4 && request.status === 200) {
                //dosplay data if ok
                object.displayData(request.response);
            }
        };
        //call the script to get the data
        request.open("GET","src/phpScripts/getPlaylistNames.php?",true);
        request.send();
    }
    /**
     * create options for the select from data
     * 
     * @param {json} data 
     */
    displayData(data){
        //get the container
        var container = document.getElementById(this.container);
        //if empty
        if( container.childElementCount === 0){
            //for all playlist names
            for(var i=0;i < Object.keys(data).length; i++){
                //create <option></option>
                var el = document.createElement("option");
                //set attributes
                el.setAttribute("value",data[i]["playlist_name"]);
                el.appendChild(document.createTextNode(data[i]["playlist_name"]));
                container.appendChild(el);
            }
        }
        
    }
}