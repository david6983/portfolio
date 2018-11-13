/**
 * get a XMLHttpRequest by using AJAX
 * 
 * @return xhr the request object
 */
function getXMLHttpRequest(){
    var xhr=null; //initialisation
    if(window.XMLHttpRequest || window.ActiveXObject){
        /* internet explorer */
        if(window.ActiveXObject){
            try{
                xhr= new ActiveXObject("Msxml2.XMLHTTP");
            }catch(e){
                xhr= new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        else{
            /* creation of the request */
            xhr= new XMLHttpRequest();
        }
    }else{
        alert("error");
        return null;
    }
    return xhr;
}

