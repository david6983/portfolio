/**
 * open the sidebar on mobile version
 */
function openSideBar(){
    var x = document.getElementById("sidebar");
    
    if (x.classList.contains("w3-collapse") ) {
        x.classList.remove("w3-collapse");
    } else { 
        x.classList.add("w3-collapse");
    }
}

/**
 * display a generic w3.css modal in the document
 * @param {string} id 
 */
function displayModal(id){
    document.getElementById(id).style.display = "block";
}

/**
 * close a generic w3.css modal in the document
 * @param {string} id 
 */
function closeModal(id){
    document.getElementById(id).style.display = "none";
}

function exportPlaylists(){
    var request = getXMLHttpRequest();
    var btn = document.getElementById("exportCollectionButton");
    /* the playlist_name is passed as a string by using the GET method (PHP and AJAX) */
    request.open("GET","src/phpScripts/export.php?",true);
    request.responseType = "json";
    request.onreadystatechange = function () {
        if(request.readyState === 4 && request.status === 200) {
            var data = "text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(request.response));
            btn.innerHTML = '<a style="text-decoration: none;" href="data:' + data + '" download="playlists.json">download your file</a>'
        }
    };
    request.send();
}