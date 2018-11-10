class Player {
    constructor(musicLink){
        this.src = musicLink;
        this.wavesurfer = WaveSurfer.create({
            container: '#waveform',
            waveColor: 'lightblue',
            barWidth: 3
        });
    }
    load(){
        this.wavesurfer.load(this.src);
    }
    skipBackward(){
        this.wavesurfer.skipBackward()
    }
    skipForward(){
        this.wavesurfer.skipForward()
    }
    playPause(){
        this.wavesurfer.playPause()
    }
    setSrc(url){
        this.src = url;
    }
    getUrl(){
        return this.src;
    }
}

