/**
 * enable tags edition based on html contenteditable attribute 
 */
function tagsEditableTrue(){
    //get all cells where contenteditable is false
    var editableElements = document.querySelectorAll("[contenteditable=false]");
    if( editableElements != null){
        //for each cells
        for (var i = 0; i < editableElements.length; ++i) {
            //set the cells as editable
            editableElements[i].setAttribute("contentEditable", true);
        }
    }
    //update controlMessage
    var cm = document.getElementById("controlMessage");
    cm.innerHTML = "Tags edition enabled";
    cm.setAttribute("style","color: lawngreen; font-weight: bolder;");
}

/**
 * disable tags edition based on html contenteditable attribute 
 */
function tagsEditableFalse(){
    var editableElements = document.querySelectorAll("[contenteditable=true]");
    //for each cells set it no editable
    for (var i = 0; i < editableElements.length; ++i) {
        editableElements[i].setAttribute("contentEditable", false);
    }
    //update control message
    var cm = document.getElementById("controlMessage");
    cm.innerHTML = "Tags edition disabled (click on TAGS to enable) !";
    cm.setAttribute("style","color: black; font-weight: bolder;");
}

function changePlaylistName(){
    //get the new name of the playlist
    var newName = document.getElementById("playlistNewName").value;
    //get the old name of the playlist in the control status
    var oldName = document.getElementById("controlStatus").textContent;
    //with the old name, we can acces to button in the sidebar
    var btn = document.getElementById(oldName);
    //and then get the parent of the button , so the name and the button
    var parent = btn.parentNode;
    //new ajax request
    var request = getXMLHttpRequest();
    /* the playlist_name is passed as a string by using the GET method (PHP and AJAX) */
    request.open("GET","src/phpScripts/changePlaylistName.php?playlist_new_name="+newName+"&playlist_name="+oldName,true);
    request.onreadystatechange = function () {
        //if ready
        if(request.readyState === 4 && request.status === 200) {
            //update the name in the control status
            document.getElementById("controlStatus").innerHTML = request.responseText;
            //clear the sidebar playlist name
            parent.innerHTML = "";
            //add the new name
            parent.appendChild(document.createTextNode(request.response));
            //and add the button
            parent.appendChild(btn);
        }
    };
    request.send();
    //close the menu to change the name
    closeModal('playlistOptionModal'); 
}

/**
 * delete a playlist 
 */
function deletePlaylist(){
    //get the name
    var playlist_name = document.getElementById("controlStatus").textContent;
    //get the select when we want to create a playlist
    var selectViewAll = document.getElementById("playlistSelected");
    //get the section of the playlist in the sidebar
    var btn = document.getElementById(playlist_name);
    var parent = btn.parentNode; /* to remove it from the sidebar */
    //new ajax request
    var request = getXMLHttpRequest();
    /* the playlist_name is passed as a string by using the GET method (PHP and AJAX) */
    request.open("GET","src/phpScripts/deletePlaylist.php?playlist_name="+playlist_name,true);
    request.onreadystatechange = function () {
        //on ready
        if(request.readyState === 4 && request.status === 200) {
            //remove the element in the sidebar
            parent.remove();
            //the user is redirected to view all
            requestViewAll(viewAll);
            //remove the name of the playlist in the new collection menu
            for(var i=0;i<selectViewAll.children.length;i++){
                if(selectViewAll.children[i].textContent === playlist_name){
                    selectViewAll.children[i].remove();
                }
            }
        }
    };
    request.send();
    //close the menu
    closeModal('playlistOptionModal');
}

