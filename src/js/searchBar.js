/**
 * collapse the search input on the document
 */
function collapseSearchInput(){
    var x = document.getElementById("searchInput");
    //if hiden
    if (x.classList.contains("w3-hide") ) {
        //show it
        x.classList.replace("w3-hide","w3-show");
    } else { 
        //or hide
        x.classList.replace("w3-show","w3-hide");
    }

}

/**
 * this function is based on :
 * https://www.w3schools.com/w3css/w3css_filters.asp
 */
function filter() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("renderedPlaylist");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[4]; //search for a name
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
}