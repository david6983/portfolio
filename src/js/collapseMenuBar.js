/**
 * collapse the menu bar "collection tags settings search_icon and user_icon"
 * mobile version only
 */
function collapseMenuBar() {
    //get the menuBAr
    var x = document.getElementById("navItems");
    
    /* if hiden */
    if (x.classList.contains("w3-hide-small") ) {
        /* then display it */
        x.classList.remove("w3-hide-small");
    } else { 
        /* or hide it if already displayed */
        x.classList.add("w3-hide-small");
    }
}