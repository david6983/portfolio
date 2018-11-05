function pauseToPlayImg(){
    let img = document.getElementById("playpauseImg");
    const pause = "assets\\icons\\pause.png";
    const play = "assets\\icons\\play.png";
    if(img.getAttribute('src') === pause){
        img.setAttribute('src',play);
    }
    else{
        img.setAttribute('src',pause);
    }
}