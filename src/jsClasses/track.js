class Track {
    constructor(id,name,artists,genre,localpath){
        this.id = id;
        this.name = name;
        this.artists = artists;
        this.genre = genre;
        this.localpath = localpath;
        this.bpm = null;
        this.lenght = "";
        this.key = "";
    }
    analyzeTrack(precision){
        this.bpm = this.findBPM(precision);
        this.key = this.findKey();
        this.lenght = this.findLenght();
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
        // Pipe the song into the filter, and the filter into the offline context
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
        this.key = dataArray[0];
    }
    findLenght(){
        let audio = new Audio();
        audio.src = this.pathFromLocalToServer(this.path);
        let floatLenght = audio.duration;
        console.log(floatLenght);
    }
    pathFromLocalToServer(localpath){
        /* ex : D:\Documents\Musique\MUSIQUES\MUSIQUE LIBRARY WEI\FUTURE BOUNCE\caca.mp3 */
        /* virtualhost settings :
            -musiques
            -d:/documents/musique/musiques/musique library wei

        
       var libraryname = "musiques";
       var httppath = "http://"+libraryname+localpath;
        */
    }
    set newBPM(bpm){
        this.bpm = bpm;
    }
    set newKey(key){
        this.key = key;
    }
    set genre(genre){
        this.genre = genre;
    }
    set newLenght(lenght){
        this.lenght = lenght
    }
    set newPath(localpath){
        this.localpath = localpath
    }
    get id(){
        return this.id;
    }
}