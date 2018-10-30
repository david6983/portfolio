function tagsEditableTrue(){
    var editableElements = document.querySelectorAll("[contenteditable=false]");
    if( editableElements != null){
        for (var i = 0; i < editableElements.length; ++i) {
            editableElements[i].setAttribute("contentEditable", true);
        }
    }
}

function tagsEditableFalse(){
    var editableElements = document.querySelectorAll("[contenteditable=true]");
    for (var i = 0; i < editableElements.length; ++i) {
        editableElements[i].setAttribute("contentEditable", false);
    }
}