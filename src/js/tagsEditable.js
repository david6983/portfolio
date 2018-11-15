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