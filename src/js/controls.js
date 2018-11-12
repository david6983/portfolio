function hideControl(){
    let e = document.querySelectorAll(".hoverElement");
    e.forEach(function(e){
        e.setAttribute("style","display: none;");
    })
}
function showControl(){
    let e = document.querySelectorAll(".hoverElement");
    e.forEach(function(e){
        e.removeAttribute("style");
    })
}
