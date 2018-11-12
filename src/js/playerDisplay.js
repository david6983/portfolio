/**
 * change the icon inside
 */
function pauseToPlayImg(){
    /* get the image on the document */
    let img = document.getElementById("playpauseImg");
    /* pause image */
    const pause = "assets\\icons\\pause.png";
    /* play image */
    const play = "assets\\icons\\play.png"; /* to fix !! */
    /* switch images */
    if(img.getAttribute('src') === pause){
        img.setAttribute('src',play);
    }
    else{
        img.setAttribute('src',pause);
    }
}