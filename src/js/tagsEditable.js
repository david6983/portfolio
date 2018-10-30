function tagsEditableTrue(){
    var editableElements = document.querySelectorAll("[contenteditable=true]");
    if( editableElements != null){
        for (var i = 0; i < editableElements.length; ++i) {
            editableElements[i].setAttribute("contentEditable", false);
        }
    }
}

function tagsEditableFalse(){
    var editableElements = document.querySelectorAll("[contenteditable=false]");
    for (var i = 0; i < editableElements.length; ++i) {
        editableElements[i].setAttribute("contentEditable", true);
    }
}