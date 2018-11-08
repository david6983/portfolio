function tagsEditableTrue(){
    let editableElements = document.querySelectorAll("[contenteditable=false]");
    if( editableElements != null){
        for (let i = 0; i < editableElements.length; ++i) {
            editableElements[i].setAttribute("contentEditable", true);
        }
    }
}

function tagsEditableFalse(){
    let editableElements = document.querySelectorAll("[contenteditable=true]");
    for (let i = 0; i < editableElements.length; ++i) {
        editableElements[i].setAttribute("contentEditable", false);
    }
}