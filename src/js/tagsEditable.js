/**
 * enable tags edition based on html contenteditable attribute 
 */
function tagsEditableTrue(){
    var editableElements = document.querySelectorAll("[contenteditable=false]");
    if( editableElements != null){
        for (var i = 0; i < editableElements.length; ++i) {
            editableElements[i].setAttribute("contentEditable", true);
        }
    }
    //update controlMessage
    var cm = document.getElementById("controlMessage");
    cm.innerHTML = "Tags edition enabled (don't forget to click on COLLECTION to save !";
    cm.setAttribute("style","color: lawngreen; font-weight: bolder;");
}

/**
 * disable tags edition based on html contenteditable attribute 
 */
function tagsEditableFalse(){
    var editableElements = document.querySelectorAll("[contenteditable=true]");
    for (var i = 0; i < editableElements.length; ++i) {
        editableElements[i].setAttribute("contentEditable", false);
    }
    var cm = document.getElementById("controlMessage");
    cm.innerHTML = "Tags edition disabled (click on TAGS to enable) !";
    cm.setAttribute("style","color: black; font-weight: bolder;");
}

function changePlaylistName(){
    var newName = document.getElementById("playlistNewName").value;
    var oldName = document.getElementById("controlStatus").textContent;
    var btn = document.getElementById(oldName);
    var parent = btn.parentNode;
    var request = getXMLHttpRequest();
    /* the playlist_name is passed as a string by using the GET method (PHP and AJAX) */
    request.open("GET","src/phpScripts/changePlaylistName.php?playlist_new_name="+newName+"&playlist_name="+oldName,true);
    request.onreadystatechange = function () {
        if(request.readyState === 4 && request.status === 200) {
            document.getElementById("controlStatus").innerHTML = request.responseText;
            parent.innerHTML = "";
            parent.appendChild(document.createTextNode(request.response));
            parent.appendChild(btn);
        }
    };
    request.send();

    closeModal('playlistOptionModal'); 
}

function deletePlaylist(){
    var playlist_name = document.getElementById("controlStatus").textContent;
    var selectViewAll = document.getElementById("playlistSelected");
    var btn = document.getElementById(playlist_name);
    var parent = btn.parentNode; /* to remove it from the sidebar */
    var request = getXMLHttpRequest();
    /* the playlist_name is passed as a string by using the GET method (PHP and AJAX) */
    request.open("GET","src/phpScripts/deletePlaylist.php?playlist_name="+playlist_name,true);
    request.onreadystatechange = function () {
        if(request.readyState === 4 && request.status === 200) {
            parent.remove();
            requestViewAll(viewAll);
            for(var i=0;i<selectViewAll.children.length;i++){
                if(selectViewAll.children[i].textContent === playlist_name){
                    selectViewAll.children[i].remove();
                }
            }
        }
    };
    request.send();

    closeModal('playlistOptionModal');
}