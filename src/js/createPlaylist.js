/**
 * send a request to the server asynchronously to add a new collection to the dataBase
 * and close the window to add a new collection
 * 
 * @param {string} playlist_name the name of the playlist chosen
 */
function requestNewCollection(playlist_name){
    var request = getXMLHttpRequest();
    /* the playlist_name is passed as a string by using the GET method (PHP and AJAX) */
    request.open("GET","src/phpScripts/newCollection.php?playlistName="+playlist_name,true);
    request.send();
    /* close the window to create a collection */
    closeModal('newCollectionMenu');
    //var list = new PlaylistsList();
}