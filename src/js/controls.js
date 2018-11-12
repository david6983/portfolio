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
    let cb = document.getElementById("controlBar");
    if(cb.getAttribute("style") == "display: none;"){
        cb.removeAttribute("style");
    }else{
        cb.setAttribute("style","display: none;");
    }
}

function execFunction(id){
    let btn = id.substring(0,4);
    let nb = id.substring(4,5);

    if( btn === "play"){
        //var player = new Player(document.getElementById("path"+nb).textContent);
    }else if( btn === "plus"){
        displayModal('addToPlaylistModal');
        var p = new PlaylistSelect();
        document.getElementById("idTrackModal").textContent = nb;
    }
}
