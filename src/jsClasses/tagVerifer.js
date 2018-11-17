class tagVerifier {
    constructor(elementId){
        this.elementId = elementId;
        this.object = this;
        this.content = document.getElementById(this.elementId).textContent;
        this.sendTagToBDD();
    }
    returnMethod(){
        var method ="";
        switch(this.returnTagName()){
            case "name":
                method = "music_name";
                break;
            case "artist":
                method= "music_artists_names";                
                break;
            case "genre":
                method= "music_genre";        
                break;
            case "key":
                method= "music_key";        
                break;
            case "bpm":
                method= "music_bpm";        
                break;
            case "length":
                method= "music_length";        
                break;
        }
        return method;
    }
    verifyTag(){
        var bool = false;
        switch(this.returnTagName()){
            case "name":
                bool = this.verifyString(this.content,200);
                break;
            case "artist":
                bool = this.verifyString(this.content,200);                
                break;
            case "genre":
                bool = this.verifyString(this.content,40);       
                break;
            case "key":
                bool = this.verifyKey(this.content);         
                break;
            case "bpm":
                bool = this.verifyBPM(this.content);           
                break;
            case "length":
                bool = this.verifyLength(this.content);          
                break;
        }
        return bool;
    }
    returnTrackId(){
        return this.splitNumberAndLetter(this.elementId)[0];
    }
    returnTagName(){
        return this.splitNumberAndLetter(this.elementId)[1];
    }
    sendTagToBDD(){
        if(this.verifyTag() === true){
            var request = getXMLHttpRequest();
            var method = this.returnMethod();
            request.open("GET","src/phpScripts/editTag.php?track_content="+this.content+"&track_id="+this.elementId[1]+"&track_method_name="+method,true);
            request.send();
        }else{
            console.log("error tag");
        }
    }   
    splitNumberAndLetter(str){
        var nb = "";
        var name = "";
        for(i=0;i<str.length;i++){
            if(typeof str[i] === "number"){
                nb.concat(str[i]);
            }else{
                name.concat(str[i]);
            }
        }
        return [name,id];
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