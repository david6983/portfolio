class Playlist {
    constructor(type,data){
        /* ajax request for fill up the playlist */
        this.nbOfTracks = data.length;
        this.type = type;
        this.tracks = data;
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
        h.appendChild(this.createHeaderColumn("Lenght",""));
        h.appendChild(this.createHeaderColumn("Path",""));
        
        return h;
    }
    createLigne(track){
        let index = track.track_id;
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
        l.appendChild(this.createSimpleColumn("name",index,track.track_name));
        l.appendChild(this.createSimpleColumn("artist",index,track.track_artists));
        l.appendChild(this.createSimpleColumn("genre",index,track.track_genre));
        l.appendChild(this.createSimpleColumn("key",index,track.track_key));
        l.appendChild(this.createSimpleColumn("bpm",index,track.track_bpm));
        l.appendChild(this.createSimpleColumn("lenght",index,track.track_lenght));
        l.appendChild(this.createSimpleColumn("path",index,track.track_path));
        return l;
    }
    createLigneViewAll(track,id){
        let index = id;
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
        let parts = track.split("\\");
        l.appendChild(this.createSimpleColumn("name",index,parts[parts.length-1].split(".")[0]));
        l.appendChild(this.createSimpleColumn("artist",index," "));
        l.appendChild(this.createSimpleColumn("genre",index," "));
        l.appendChild(this.createSimpleColumn("key",index," "));
        l.appendChild(this.createSimpleColumn("bpm",index,0));
        l.appendChild(this.createSimpleColumn("lenght",index," "));
        l.appendChild(this.createSimpleColumn("path",index,track));
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
        for(let i = 0; i < this.nbOfTracks; i++) {
            if(this.type === "playlist"){
                table.appendChild(this.createLigne(this.tracks[i]));
            }else if(this.type === "viewAll"){
                table.appendChild(this.createLigneViewAll(this.tracks[i],i));
            }        
        }
    }
}