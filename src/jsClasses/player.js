/**
 * this class generate the player for a track based on the wavesurfer api
 * https://wavesurfer-js.org/
 */
class Player {
    /**
     * according to the server link of the music, create the wavesurfer player
     * exemple of music link : http://foo.mp3
     * 
     * @param {string} musicLink 
     */
    constructor(musicLink){
        /* source link */
        this.src = musicLink;
        /* waveform displayed */
        this.wavesurfer = WaveSurfer.create({
            container: '#waveform',
            waveColor: 'lightblue',
            barWidth: 3 /* looks like the soundcloud player */
        });
    }
    /**
     * load the source link into the wavesurfer player
     */
    load(){
        this.wavesurfer.load(this.src);
    }
    /**
     * function called to skip backward into the music
     */
    skipBackward(){
        this.wavesurfer.skipBackward()
    }
    /**
     * function called to skip forward into the music
     */
    skipForward(){
        this.wavesurfer.skipForward()
    }
    /**
     * function called to play or pause the music
     */
    playPause(){
        this.wavesurfer.playPause()
    }
    /**
     * to change rapidly the source file link
     * 
     * @param {string} url 
     */
    setSrc(url){
        this.src = url;
    }
    /**
     * get the link of the song played
     */
    getUrl(){
        return this.src;
    }
}

