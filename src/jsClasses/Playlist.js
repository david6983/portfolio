/**
 * playlist class to create a playlist from a database
 */
class Playlist {
    /**
     * create the playlist and get the type : "viewAll" or "playlist"
     * 
     * @param {string} type 
     * @param {json} data from the database
     */
    constructor(type,data){
        /* ajax request for fill up the playlist */
        this.type = type;
        this.tracks = data; /* json format */
        this.changeToolbarButton();
    }
    /**
     * create the table of tracks
     * 
     * @param {string} id container id
     */
    createTable(id){
        /* create the header */
        let h = this.createHeader();
        //get the container
        let table = document.getElementById(id);
        table.appendChild(h);
        /* add the lignes */
        this.createAllLignes(table);
    }
    /**
     * set a attribute of a html element
     * 
     * @param {html element} element 
     * @param {string} attribut 
     * @param {string} value 
     */
    setNewAttribute(element,attribut,value){
        let att = document.createAttribute(attribut);
        att.value = value;
        element.setAttributeNode(att);
    }
    /**
     * create a header row
     * 
     * @param {string} content 
     * @param {string} classAttribut 
     */
    createHeaderColumn(content,classAttribut){
        //create a <th></th>
        let column = document.createElement("th");
        //set attributes
        if( classAttribut != ""){
            column.setAttribute("class",classAttribut);
        }
        column.appendChild(document.createTextNode(content));
        return column;
    }
    /**
     * create the header of the table
     */
    createHeader(){
        /* create a ligne */
        let h = document.createElement("tr");
        h.setAttribute("class","w3-blue");
        h.appendChild(this.createHeaderColumn("#",""));
        h.appendChild(this.createHeaderColumn("","hoverElement"));
        h.appendChild(this.createHeaderColumn("","hoverElement"));
        h.appendChild(this.createHeaderColumn("","hoverElement"));
        h.appendChild(this.createHeaderColumn("Name",""));
        h.appendChild(this.createHeaderColumn("Artists",""));
        h.appendChild(this.createHeaderColumn("Genre",""));
        h.appendChild(this.createHeaderColumn("Key",""));
        h.appendChild(this.createHeaderColumn("BPM",""));
        h.appendChild(this.createHeaderColumn("length",""));
        h.appendChild(this.createHeaderColumn("Path",""));
        
        return h;
    }
    /**
     * create a ligne from a track
     * 
     * @param {json} track 
     */
    createLigne(track){
        let index = track["music_id"]; /* auto increment start from 1 */
        let l = document.createElement("tr");
        
        /* create the ligne */
        let idCol = document.createElement("td");
        idCol.setAttribute("id","id"+index);
        idCol.appendChild(document.createTextNode(index));
        l.appendChild(idCol);
        /* create the controls */
        l.appendChild(this.createHoverCheckbox(index));
        l.appendChild(this.createHoverButton("play",index,"..\\..\\..\\assets\\icons\\play.png","play"));
        if(this.type === "playlist"){
            //remove button if playlist
            l.appendChild(this.createHoverButton("remo",index,"..\\..\\..\\assets\\icons\\remove.png","remove"));
        }else if(this.type === "viewAll"){
            //add button if view all
            l.appendChild(this.createHoverButton("plus",index,"..\\..\\..\\assets\\icons\\plus.png","plus"));
        }
        /* create a colum in the ligne for each categories */
        l.appendChild(this.createSimpleColumn("name",index,track["music_name"]));
        l.appendChild(this.createSimpleColumn("artist",index,track["music_artists_names"]));
        l.appendChild(this.createSimpleColumn("genre",index,track["music_genre"]));
        l.appendChild(this.createSimpleColumn("key",index,track["music_key"]));
        l.appendChild(this.createSimpleColumn("bpm",index,track["music_bpm"]));
        l.appendChild(this.createSimpleColumn("length",index,track["music_length"]));
        l.appendChild(this.createSimpleColumn("path",index,track["music_path"]));
        return l;
    }
    /**
     * create a simple column
     * 
     * @param {string} id for exemple : "name"
     * @param {string} index i.e : 200
     * @param {string} content 
     */
    createSimpleColumn(id,index,content){
        let c = document.createElement("td");
        c.setAttribute("id",id+index);
        //not editable as default
        c.setAttribute("contentEditable","false");
        //update the database on blur
        c.setAttribute("onblur","var tgv = new tagVerifier(this.id);");
        //add content
        c.appendChild(document.createTextNode(content));
        return c;
    }
    /**
     * create a button which can be hiden or displayed
     * 
     * @param {string} id i.e : "checkbox"
     * @param {string} index 
     * @param {string} imgPath 
     * @param {string} alt 
     */
    createHoverButton(id,index,imgPath,alt){
        //create a <td></td>
        let b = document.createElement("td");
        b.setAttribute("id",id+index);
        b.setAttribute("class","hoverElement");
        //create a button
        let btn = document.createElement("button");
        btn.setAttribute("class","w3-button");
        btn.setAttribute("onclick","execFunction(\""+b.getAttribute("id")+"\")");
        //add the image
        let img = document.createElement("img");
        img.setAttribute("src",imgPath);
        img.setAttribute("alt",alt);
        img.setAttribute("style","width:25px;");
        btn.appendChild(img);
        b.appendChild(btn);

        return b;
    }
    /**
     * create a column with a checkbox inside which can be hiden or displayed
     * 
     * @param {string} index 
     */
    createHoverCheckbox(index){
        //create a <td></td>
        let c = document.createElement("td");
        c.setAttribute("id","checkbox"+index);
        c.setAttribute("class","hoverElement");
        //create a <input>
        let i = document.createElement("input");
        i.setAttribute("type","checkbox");
        i.setAttribute("class","w3-check");
        i.setAttribute("name","selected");
        i.setAttribute("value",index);

        c.appendChild(i);

        return c;
    }
    /**
     * creata all the ligne for all tracks
     * 
     * @param {string} table container
     */
    createAllLignes(table){
        //for each tracks
        for(let i = 0; i < this.tracks.length; i++) {
            //append to the container the ligne created from the BDD
            table.appendChild(this.createLigne(this.tracks[i]));        
        }
    }
    /**
     * in the toolbar you have two kind of buttons :
     * -remove (when you are in the playlist)
     * -add (in the view all section)
     */
    changeToolbarButton(){
        //in the playlist view
        if( this.type === "playlist"){
            var Img = document.getElementById("ActiontoolbarButtonImg");
            var text = document.getElementById("ActiontoolbarButtonText");

            Img.setAttribute("src","..\\..\\..\\assets\\icons\\remove.png");
            text.innerHTML = "Remove Selected";

            var btn = document.getElementById("ActiontoolbarButton");
            btn.setAttribute("onclick","deleteSelectedToPlaylist()");
        }else if( this.type === "viewAll"){
            var Img = document.getElementById("ActiontoolbarButtonImg");
            var text = document.getElementById("ActiontoolbarButtonText");

            Img.setAttribute("src","..\\..\\..\\assets\\icons\\add.png");
            text.innerHTML = "Add selected to";

            var btn = document.getElementById("ActiontoolbarButton");
            btn.setAttribute("onclick","controlAddSelectedTo()");
        }
    }
}