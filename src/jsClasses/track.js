class Track {
    constructor(id,name,artists,genre,localpath){
        this._id = id;
        this._name = name;
        this._artists = artists;
        this._genre = genre;
        this._localpath = localpath;
        this._bpm = null;
        this._lenght = "";
        this._key = "";
    }
    analyzeTrack(precision){
        this._bpm = this.findBPM(precision);
        this._key = this.findKey();
        this._lenght = this.findLenght();
    }
    findBPM(precision){
        // Create offline context
        var offlineContext = new OfflineAudioContext(1, buffer.length, buffer.sampleRate);
        // Create buffer source
        var source = offlineContext.createBufferSource();
        source.buffer = buffer;
        // Create filter
        var filter = offlineContext.createBiquadFilter();
        filter.type = "lowpass";
        source.connect(filter);
        filter.connect(offlineContext.destination);
        // Schedule the song to start playing at time:0
        source.start(0);
        // Render the song
        offlineContext.startRendering()
        // Act on the result
        offlineContext.oncomplete = function(e) {
            // Filtered buffer!
            var filteredBuffer = e.renderedBuffer;
            this._bpm = countIntervalsBetweenNearbyPeaks(groupNeighborsByTempo(filteredBuffer));
            console.log(this._bpm);
        };
    }
    groupNeighborsByTempo(intervalCounts) {
        var tempoCounts = []
        intervalCounts.forEach(function(intervalCount, i) {
          // Convert an interval to tempo
          var theoreticalTempo = 60 / (intervalCount.interval / 44100 );
      
          // Adjust the tempo to fit within the 90-180 BPM range
          while (theoreticalTempo < 90) theoreticalTempo *= 2;
          while (theoreticalTempo > 180) theoreticalTempo /= 2;
      
          var foundTempo = tempoCounts.some(function(tempoCount) {
            if (tempoCount.tempo === theoreticalTempo)
              return tempoCount.count += intervalCount.count;
          });
          if (!foundTempo) {
            tempoCounts.push({
              tempo: theoreticalTempo,
              count: intervalCount.count
            });
          }
        });
    }
    countIntervalsBetweenNearbyPeaks(peaks) {
        var intervalCounts = [];
        peaks.forEach(function(peak, index) {
          for(var i = 0; i < 10; i++) {
            var interval = peaks[index + i] - peak;
            var foundInterval = intervalCounts.some(function(intervalCount) {
              if (intervalCount.interval === interval)
                return intervalCount.count++;
            });
            if (!foundInterval) {
              intervalCounts.push({
                interval: interval,
                count: 1
              });
            }
          }
        });
        return intervalCounts;
    }
    getPeaksAtThreshold(data, threshold) {
        var peaksArray = [];
        var length = data.length;
        for(var i = 0; i < length;) {
            if (data[i] > threshold) {
            peaksArray.push(i);
            // Skip forward ~ 1/4s to get past this peak.
            i += 10000;
            }
            i++;
        }
        return peaksArray;
    }
      
    findKey(){
        let audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        let analyser = audioCtx.createAnalyser();
        let src = audioCtx.createMediaStreamSource(this.pathFromLocalToServer(localpath));
        src.connect(analyser);
        analyser.fftSize = 2048;
        let bufferLength = analyser.frequencyBinCount;
        let dataArray = new Uint8Array(bufferLength);
        analyser.getByteDomainData(dataArray);
        console.log(dataArray);
        this._key = dataArray[0];
    }
    findLenght(){
        let audioCtx = new AudioContext();
        this.pathFromLocalToServer();
        let src = audioCtx.createBufferSource();
        var audioBuffer;
        var request = new XMLHttpRequest();
        request.open("GET",this._localpath,true);
        request.responseType = "arraybuffer";
        request.onload = function(){
            audioCtx.decodeAudioData(
                request.response,
                function(buffer){
                    audioBuffer = buffer;
                    this._lenght = audioBuffer.duration;
                }
            );
        }
        request.send();
    }
    pathFromLocalToServer(){
        var vhostLibraryName = "musiques"; //ajax request
        var vhostLibraryPath = "d:/documents/musique/musiques/musique library wei"; //ajax request
        
        var serverPath = "http://"+vhostLibraryName+this.path.substring(vhostLibraryPath.length);
        this.newPath = serverPath.replace(" ","%20");
    }
    set bpm(bpm){
        this._bpm = bpm;
    }
    set key(key){
        this._key = key;
    }
    set genre(genre){
        this._genre = genre;
    }
    set lenght(lenght){
        this._lenght = lenght
    }
    set newPath(localpath){
        this._localpath = localpath
    }
    get id(){
        return this._id;
    }
    get name(){
        return this._name;
    }
    get artist(){
        return this._artists;
    }
    get genre(){
        return this._genre;
    }
    get path(){
        return this._localpath;
    }
    get bpm(){
        return this._bpm;   
    }    
    get lenght(){
        return this._lenght;
    }
    get key(){
    return this._key;   
    }
}