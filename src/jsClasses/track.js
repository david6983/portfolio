/**
 * /!\ this class is only used to transform a localpath to serverpath
 * because the key detection and the path detection aren't working at all
 * /!\ the length is ok
 * 
 * this class is just here to analyze a track
 * when the user click on analyze track
 * for each track , new track object , analyze length,(bpm,key)
 * and then update the database
 * this class isn't for the display because the display is always from the
 * database
 */
class Track {
    /**
     * initailisation
     * 
     * @param {string} id 
     * @param {string} name 
     * @param {string} localpath 
     */
    constructor(id,name,localpath){
        this._id = id;
        this._name = name;
        this._localpath = localpath;
        this._bpm = null;
        this._length = 0;
        this._key = "";
    }
    /**
     * 
     * @param {integer} precision 
     */
    analyzeTrack(precision){        
        this.pathFromLocalToServer();
        this._length = this.findlength();
        this._key = this.findKey();
        //this._bpm = this.findBPM(precision,this);
    }
    /**
     * 
     * @param {integer} precision 
     * @param {object} object 
     */
    findBPM(precision,object){    
        let audioCtx = new AudioContext();
        var request = getXMLHttpRequest();
        request.responseType = "arraybuffer";
        request.onreadystatechange = function () {
            if(request.readyState === 4 && request.status === 200) {
                audioCtx.decodeAudioData(
                    request.response,
                    function(output){
                        // Create offline context
                        var offlineContext = new OfflineAudioContext(1, output.length, output.sampleRate);
                        // Create buffer source
                        var source = offlineContext.createBufferSource();
                        // Create filter
                        var filter = offlineContext.createBiquadFilter();
                        filter.type = "lowpass";
                        source.connect(filter);
                        filter.connect(offlineContext.destination);

                        source.buffer = output;
                        // Schedule the song to start playing at time:0
                        source.start(0);
                        // Render the song
                        offlineContext.startRendering()
                        // Act on the result
                        offlineContext.oncomplete = function(e) {
                            // Filtered buffer!
                            var filteredBuffer = e.renderedBuffer;
                            /*
                            object.bpm = object.groupNeighborsByTempo(
                                object.countIntervalsBetweenNearbyPeaks(
                                    object.getPeaksAtThreshold(filteredBuffer.getChannelData(0), .98)
                                )
                            );
                            */
                            var peaks = object.getPeaksAtThreshold(filteredBuffer.getChannelData(0), .98);
                            var intervalCounts = object.countIntervalsBetweenNearbyPeaks(peaks);
                            var tempoCount = object.groupNeighborsByTempo(intervalCounts);
                            console.log(tempoCount);
                        };
                    }
                );
            }
        };
        request.open("GET",this._localpath,true);
        request.send();
    }
    /**
     * 
     * @param {} intervalCounts 
     */
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
    /**
     * 
     * @param {} peaks 
     */
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
    /**
     * 
     * @param {*} data 
     * @param {*} threshold 
     */
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
    /**
     * 
     */
    findKey(){
        this.requestFreq(this.updateKey,this);
    }
    /**
     * 
     * @param {*} freq 
     */
    updateKey(freq){
        console.log(freq);
    }
    /**
     * 
     * @param {*} callback 
     * @param {*} object 
     */
    requestFreq(callback,object){
        let audioCtx = new AudioContext();
        let analyser = audioCtx.createAnalyser();
        analyser.fftSize = 2048;
        let src = audioCtx.createBufferSource();
        let bufferLength = analyser.frequencyBinCount;
        let dataArray = new Uint8Array(bufferLength);
        /*
        console.log(Math.round(dataArray[0]);
        */
        var request = getXMLHttpRequest();
        request.responseType = "arraybuffer";
        request.onreadystatechange = function () {
            if(request.readyState === 4 && request.status === 200) {
                audioCtx.decodeAudioData(
                    request.response,
                    function(buffer){
                        src.buffer = buffer;
                        src.connect(analyser);

                        analyser.getByteTimeDomainData(dataArray);
                        console.log(dataArray);  
                    }
                );
            }
        };
        request.open("GET",this._localpath,true);
        request.send();
    }
    /**
     * 
     */
    findlength(){
        this.requestlength(this.updatelength,this);
    }
    /**
     * 
     * @param {*} length 
     * @param {*} object 
     */
    updatelength(length,object){
        object.length = object.lengthToHHMMSS(length);
    }
    /**
     * 
     * @param {*} secs 
     */
    lengthToHHMMSS(secs){
        var sec_num = parseInt(secs, 10)    
        var hours   = Math.floor(sec_num / 3600) % 24
        var minutes = Math.floor(sec_num / 60) % 60
        var seconds = sec_num % 60    
        return [hours,minutes,seconds]
            .map(v => v < 10 ? "0" + v : v)
            .filter((v,i) => v !== "00" || i > 0)
            .join(":")
    }
    /**
     * 
     * @param {*} callback 
     * @param {*} object 
     */
    requestlength(callback,object){
        let audioCtx = new AudioContext();
        var audioBuffer;
        var request = getXMLHttpRequest();
        request.responseType = "arraybuffer";
        request.onreadystatechange = function () {
            if(request.readyState === 4 && request.status === 200) {
                audioCtx.decodeAudioData(
                    request.response,
                    function(buffer){
                        audioBuffer = buffer;
                        callback(Math.round(audioBuffer.duration),object);    
                    }
                );
            }
        };
        request.open("GET",this._localpath,true);
        request.send();
    }
    /**
     * 
     */
    pathFromLocalToServer(){
        var vhostLibraryName = "musiques"; //ajax request
        var vhostLibraryPath = "d:/documents/musique/musiques/MUSIQUES LIBRARY 2KEY"; //ajax request
        var serverPath = "http://"+vhostLibraryName+this.path.substring(vhostLibraryPath.length);
        this.newPath = serverPath;
    }
    /**
     * 
     */
    set bpm(bpm){
        const reg = /[0-9]{3}|[0-9]{2}/g;
        if(typeof bpm === "number"){
            if(reg.test(bpm) == true && bpm.toString().length < 4){
                this._bpm = bpm;
            }else{
                console.log("error syntax : expected 2 digits or 3 digits");
            }
        }else{
            console.log("the new BPM is not a number")
        }
    }
    /**
     * 
     */
    set key(key){
        const reg = /[1-9]{1}[A-B]{1}|[1]{1}[0-2]{1}[A-B]{1}/y;
        if(typeof key === "string" && reg.test(key) == true){
            this._key = key;
        }else{
            console.log("error expected a string like [a number between 1 and 12][A or B] (camelot wheel)");
        }
    }
    /**
     * 
     */
    set genre(genre){
        if(typeof genre === "string"){
            this._genre = genre;
        }else{
            console.log("error expected a string");
        }
    }
    /**
     * 
     */
    set length(length){
        this._length = length;
    }  
    /**
     *  
     * */  
    set newPath(localpath){
        const reg = /[A-Z]:|http:[//][//]/y;
        if(typeof localpath === "string" && reg.test(localpath) === true){
            this._localpath = localpath;
        }else{
            console.log("error : expected a correct path like D:/ or C:/ ");
        }    
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
    get length(){
        return this._length;
    }
    get key(){
        return this._key;   
    }
}