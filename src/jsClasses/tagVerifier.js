class tagVerifier {
    constructor(elementId){
        this.elementId = elementId;
        this.content = document.getElementById(this.elementId).textContent;
        this.sendTagToBDD(this);
    }
    returnMethod(){
        switch(this.returnTagName()){
            case "name":
                return "music_name";
            case "artist":
                return "music_artists_names";                
            case "genre":
                return "music_genre";        
            case "key":
                return "music_key";        
            case "bpm":
                return "music_bpm";        
            case "length":
                return "music_length";        
        }
    }
    verifyTag(){
        switch(this.returnTagName()){
            case "name":
                return this.verifyString(this.content,200);
            case "artist":
                return this.verifyString(this.content,200);                
            case "genre":
                return this.verifyString(this.content,40);       
            case "key":
                return this.verifyKey(this.content);         
            case "bpm":
                return this.verifyBPM(this.content);           
            case "length":
                return this.verifyLength(this.content);          
        }
    }
    returnTrackId(){
        return this.splitNumberAndLetter(this.elementId)[1];
    }
    returnTagName(){
        return this.splitNumberAndLetter(this.elementId)[0];
    }
    sendTagToBDD(object){
        if(this.verifyTag() === true){
            var request = getXMLHttpRequest();
            var method = this.returnMethod();
            request.open("GET","src/phpScripts/editTag.php?track_content="+encodeURIComponent(object.content)+"&track_id="+encodeURIComponent(object.returnTrackId())+"&track_method_name="+method,true);
            request.onreadystatechange = function () {
                if(request.readyState === 4 && request.status === 200) {
                    console.log(request.response);
                }
            };
            request.send();
            console.log("sent");
        }else{
            console.log("error tag");
        }
    }   
    splitNumberAndLetter(str){
        var reg = /\D/g;
        var name = str.match(reg).join("");
        var nb = str.substring(name.length,)
        return [name,nb];
    }
    verifyKey(key){
        const reg = /[1-9]{1}[A-B]{1}|[1]{1}[0-2]{1}[A-B]{1}/y;
        if(typeof key === "string" && reg.test(key) == true){
            return true;
        }else{
            return false;
        }
    }    
    verifyString(str,lengthInBDD){
        console.log(str);
        if( typeof str === "string" && str.length <= lengthInBDD){
            return true;
        }else{
            return false;
        }
    }
    verifyBPM(bpm){
        const reg = /[0-9]{3}|[0-9]{2}/g;
        if(typeof bpm === "string"){
            if(reg.test(bpm) == true && bpm.toString().length < 4){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    verifyLength(length){
        const reg = /[0-9]{2}:[0-9]{2}/g;
        if(typeof length === "string" && reg.test(length) === true){
            return true;
        }else{
            return false;
        }
    }
}