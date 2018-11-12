function hideControl(){
    let e = document.querySelectorAll(".hoverElement");
    e.forEach(function(e){
        e.setAttribute("style","display: none;");
    })
}
function showControl(){
    let e = document.querySelectorAll(".hoverElement");
    e.forEach(function(e){
        if(e.getAttribute("style") == "display: none;"){
            e.removeAttribute("style");
        }else{
            e.setAttribute("style","display: none;");
        }
    })
}
