class Playlist {
    constructor(type,data){
        /* ajax request for fill up the playlist */
        this.type = type;
        this.tracks = data; /* json format */
        this.changeToolbarButton();
    }
    createTable(id){
        /* create the header */
        let h = this.createHeader();
        let table = document.getElementById(id);
        table.appendChild(h);
        /* add the lignes */
        this.createAllLignes(table);
    }
    setNewAttribute(element,attribut,value){
        let att = document.createAttribute(attribut);
        att.value = value;
        element.setAttributeNode(att);
    }
    createHeaderColumn(content,classAttribut){
        let column = document.createElement("th");
        if( classAttribut != ""){
            column.setAttribute("class",classAttribut);
        }
        column.appendChild(document.createTextNode(content));
        return column;
    }
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
    createLigne(track){
        let index = track["music_id"]; /* auto increment start from 1 */
        let l = document.createElement("tr");
        
        let idCol = document.createElement("td");
        idCol.setAttribute("id","id"+index);
        idCol.appendChild(document.createTextNode(index));
        l.appendChild(idCol);

        l.appendChild(this.createHoverCheckbox(index));
        l.appendChild(this.createHoverButton("play",index,"..\\..\\..\\assets\\icons\\play.png","play"));
        if(this.type === "playlist"){
            l.appendChild(this.createHoverButton("remove",index,"..\\..\\..\\assets\\icons\\remove.png","remove"));
        }else if(this.type === "viewAll"){
            l.appendChild(this.createHoverButton("plus",index,"..\\..\\..\\assets\\icons\\plus.png","plus"));
        }
        l.appendChild(this.createSimpleColumn("name",index,track["music_name"]));
        l.appendChild(this.createSimpleColumn("artist",index,track["music_artists_names"]));
        l.appendChild(this.createSimpleColumn("genre",index,track["music_genre"]));
        l.appendChild(this.createSimpleColumn("key",index,track["music_key"]));
        l.appendChild(this.createSimpleColumn("bpm",index,track["music_bpm"]));
        l.appendChild(this.createSimpleColumn("length",index,track["music_length"]));
        l.appendChild(this.createSimpleColumn("path",index,track["music_path"]));
        return l;
    }
    createSimpleColumn(id,index,content){
        let c = document.createElement("td");
        c.setAttribute("id",id+index);
        c.setAttribute("contentEditable","false");
        c.appendChild(document.createTextNode(content));
        return c;
    }
    createHoverButton(id,index,imgPath,alt){
        let b = document.createElement("td");
        b.setAttribute("id",id+index);
        b.setAttribute("class","hoverElement");
        let btn = document.createElement("button");
        btn.setAttribute("class","w3-button");
        btn.setAttribute("onclick","execFunction(\""+b.getAttribute("id")+"\")");
        let img = document.createElement("img");
        img.setAttribute("src",imgPath);
        img.setAttribute("alt",alt);
        img.setAttribute("style","width:25px;");
        btn.appendChild(img);
        b.appendChild(btn);

        return b;
    }
    createHoverCheckbox(index){
        let c = document.createElement("td");
        c.setAttribute("id","checkbox"+index);
        c.setAttribute("class","hoverElement");

        let i = document.createElement("input");
        i.setAttribute("type","checkbox");
        i.setAttribute("class","w3-check");
        i.setAttribute("name","selected");
        i.setAttribute("value",index);

        c.appendChild(i);

        return c;
    }
    createAllLignes(table){
        for(let i = 0; i < this.tracks.length; i++) {
            table.appendChild(this.createLigne(this.tracks[i]));        
        }
    }
    changeToolbarButton(){
        if( this.type === "playlist"){
            var Img = document.getElementById("ActiontoolbarButtonImg");
            var text = document.getElementById("ActiontoolbarButtonText");

            Img.setAttribute("src","..\\..\\..\\assets\\icons\\remove.png");
            text.innerHTML = "Remove Selected";

            var btn = document.getElementById("ActiontoolbarButton");
            btn.setAttribute("onclick","controlRemoveSelectedTo()");
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