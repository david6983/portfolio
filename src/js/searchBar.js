function collapseSearchInput(){
    var x = document.getElementById("searchInput");
    
    if (x.classList.contains("w3-hide") ) {
        x.classList.replace("w3-hide","w3-show");
    } else { 
        x.classList.replace("w3-show","w3-hide");
    }
}