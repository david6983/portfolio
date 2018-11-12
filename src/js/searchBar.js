function collapseSearchInput(){
    var x = document.getElementById("searchInput");
    
    if (x.classList.contains("w3-hide") ) {
        x.classList.replace("w3-hide","w3-show");
    } else { 
        x.classList.replace("w3-show","w3-hide");
    }

}

function filter(inputId,tableId) {
    var input, filter, table, tr, td, i;
    input = document.getElementById(inputId);
    filter = input.value.toUpperCase();
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
}