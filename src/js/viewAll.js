function viewAll(){
    let playlistRenderer = new Playlist("viewAll");
    var table = document.getElementById("renderedPlaylist");
    if( table.childElementCount === 0){
        playlistRenderer.createTable("renderedPlaylist");
        playlistRenderer.hideControl();
    }
}