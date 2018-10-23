function openSideBar(){
    var x = document.getElementById("sidebar");
    
    if (x.classList.contains("w3-collapse") ) {
        x.classList.remove("w3-collapse");
    } else { 
        x.classList.add("w3-collapse");
    }
}
