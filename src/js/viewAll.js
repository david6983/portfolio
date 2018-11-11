function viewAll(){
    let playlistRenderer = new Playlist("viewAll");
    playlistRenderer.createTable("renderedPlaylist");
    playlistRenderer.hideControl();
}