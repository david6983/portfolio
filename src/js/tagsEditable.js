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
}

/**
 * disable tags edition based on html contenteditable attribute 
 */
function tagsEditableFalse(){
    var editableElements = document.querySelectorAll("[contenteditable=true]");
    for (var i = 0; i < editableElements.length; ++i) {
        editableElements[i].setAttribute("contentEditable", false);
    }
}