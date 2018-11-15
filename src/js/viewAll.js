/**
 * creat a ful table of the tracks got from the request
 * 
 * @param {json} data 
 */
function viewAll(data){
    //create a Playlist object of type "viewAll"
    var playlistRenderer = new Playlist("viewAll",data);
    //get the container
    var table = document.getElementById("renderedPlaylist");
    //the container have to be empty
    removeContainerContent("renderedPlaylist");
    if( table.childElementCount === 0){
        //if ok , display the table 
        playlistRenderer.createTable("renderedPlaylist");
        //hide the control in the table 
        hideControl();
        //update controlStatus
        document.getElementById("controlStatus").innerHTML = "View All";
    }
}

/**
 * get musics from the user in the database
 * send an AJAX request to PHP
 * 
 * @param {function} callback viewAll
 */
function requestViewAll(callback){
    //create a request
    var request = getXMLHttpRequest();
    //store the response as JSON
    request.responseType="json";
    request.onreadystatechange = function () {
        if(request.readyState === 4 && request.status === 200) {
            //call the viewAll function
            callback(request.response);
        }
    };
    //open the PHP script to get the tracks
    request.open("GET","src/phpScripts/getMusicsFromUser.php",true);
    request.send();
}