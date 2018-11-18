/**
 * class to verify tags when the user decide to edit a contenteditable cell in the table
 */
class tagVerifier {
    /**
     * initialization
     * 
     * @param {string} elementId 
     */
    constructor(elementId){
        this.elementId = elementId;
        this.content = document.getElementById(this.elementId).textContent;
        /* verify tag and if the syntax is correct => send to the database */
        this.sendTagToBDD(this);
    }
    /**
     * return the method name based on the id of the ligne in the table
     */
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
    /**
     * call the appropriate verifier depending on the element
     */
    verifyTag(){
        switch(this.returnTagName()){
            case "name":
                return this.verifyString(this.content,200); //in the database => VARCHAR(200)
            case "artist":
                return this.verifyString(this.content,200); //in the database => VARCHAR(200)               
            case "genre":
                return this.verifyString(this.content,40); //in the database => VARCHAR(40)      
            case "key":
                return this.verifyKey(this.content);         
            case "bpm":
                return this.verifyBPM(this.content);           
            case "length":
                return this.verifyLength(this.content);          
        }
    }
    /**
     * return the number in the elementId
     * because the elementId is like "name1"
     */
    returnTrackId(){
        return this.splitNumberAndLetter(this.elementId)[1];
    }
    /**
     * return the name in the elementId
     * because the elementId is like "name1"
     */
    returnTagName(){
        return this.splitNumberAndLetter(this.elementId)[0];
    }
    /**
     * if the syntax is ok , we can send the new attribute to the database
     * 
     * @param {object} object 
     */
    sendTagToBDD(object){
        //if syntax ok
        if(this.verifyTag() === true){
            //create a request
            var request = getXMLHttpRequest();
            //get the moehtod name
            var method = this.returnMethod();
            //call the php script
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
    /**
     * split for exemple "name23" in ["name","23"]
     * 
     * @param {string} str 
     * @return {array}
     */
    splitNumberAndLetter(str){
        var reg = /\D/g;
        //test the regex and join the letters which match the regex
        var name = str.match(reg).join("");
        //the number is the second substring
        var nb = str.substring(name.length,)
        //return an array
        return [name,nb];
    }
    /**
     * verify that the key is like "2A" or "12B" for instance
     * 
     * @param {string} key 
     */
    verifyKey(key){
        const reg = /[1-9]{1}[A-B]{1}|[1]{1}[0-2]{1}[A-B]{1}/y;
        if(typeof key === "string" && reg.test(key) == true){
            return true;
        }else{
            return false;
        }
    }   
    /**
     * verify the length of a string based on the database VARCHAR length
     * 
     * @param {string} str 
     * @param {integer} lengthInBDD 
     */ 
    verifyString(str,lengthInBDD){
        if( typeof str === "string" && str.length <= lengthInBDD){
            return true;
        }else{
            return false;
        }
    }
    /**
     * verify that the bpm is a number with 3 digits max
     * 
     * @param {string} bpm 
     */
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
    /**
     * verify that the length is in the format of "mm:ss"
     * 
     * @param {string} length 
     */
    verifyLength(length){
        const reg = /[0-9]{2}:[0-9]{2}/g;
        if(typeof length === "string" && reg.test(length) === true){
            return true;
        }else{
            return false;
        }
    }
}