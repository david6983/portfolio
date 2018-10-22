function collapseMenuBar() {
    var x = document.getElementById("navItems");
    
    if (x.classList.contains("w3-hide-small") ) {
        x.classList.remove("w3-hide-small");
    } else { 
        x.classList.add("w3-hide-small");
    }
}