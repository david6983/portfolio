/**
 * open the sidebar on mobile version
 */
function openSideBar(){
    var x = document.getElementById("sidebar");
    
    if (x.classList.contains("w3-collapse") ) {
        x.classList.remove("w3-collapse");
    } else { 
        x.classList.add("w3-collapse");
    }
}

/**
 * display a generic w3.css modal in the document
 * @param {string} id 
 */
function displayModal(id){
    document.getElementById(id).style.display = "block";
}

/**
 * close a generic w3.css modal in the document
 * @param {string} id 
 */
function closeModal(id){
    document.getElementById(id).style.display = "none";
}

