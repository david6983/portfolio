/**
 * on click , hide control of a playlist (or view all)
 * the checkbox row, plus or remove row and play button row
 */
function hideControl(){
    /* get array of all element where class is hoverElement */
    let e = document.querySelectorAll(".hoverElement");
    /* for each element  */
    e.forEach(function(e){
        /* hide it  */
        e.setAttribute("style","display: none;");
    })
}
/**
 * on click , show control of a playlist (or view all) and the toolbar for check multiple tracks
 * the checkbox row, plus or remove row and play button row
 */
function showControl(){
    /* get array of all element where class is hoverElement */
    let e = document.querySelectorAll(".hoverElement");
    /* for each element  */
    e.forEach(function(e){
        /* if hiden  */
        if(e.getAttribute("style") == "display: none;"){
            /* display it */
            e.removeAttribute("style");
        }else{
            /* or hide if already displayed */
            e.setAttribute("style","display: none;");
        }
    })
    /* concerning the toolbar */

    /* get the element in the docuement */
    let cb = document.getElementById("controlBar");
    /* if hiden */
    if(cb.getAttribute("style") == "display: none;"){
        /* then display it */
        cb.removeAttribute("style");
    }else{
        /* or hide it */
        cb.setAttribute("style","display: none;");
    }
}

/**
 * on click on a play button , create the player of the chosen track
 * or on click on a plus button , open the window to add the chosen track in the selected playlist
 * 
 * @param {string} id parent element identifier of the clicked button
 */
function execFunction(id){
    /* the id given is like "play12" or "plus3" in the shape of "functionId" */
    let btn = id.substring(0,4); /* select the first substring => the function name */
    let nb = id.substring(4,5); /* select the second substring => the id of the track */

    /* according to the type of function requested : */
    if( btn === "play"){
        //var player = new Player(document.getElementById("path"+nb).textContent);
    }else if( btn === "plus"){
        /* open the window to select the playlist */
        displayModal('addToPlaylistModal');
        /* do some stuff to be fixed */
        var p = new PlaylistSelect();
        document.getElementById("idTrackModal").textContent = nb;
    }
}
