class Playlist {
    constructor(containerId){
        /* ajax request for fill up the playlist */
        this.id = 0;
        this.name = "test";
        this.nbOfTracks = 3;
        this.tracks = [
            {
                track_id:"1",
                track_name:"Like I do",
                track_artists:"David Guetta,Brooks",
                track_genre:"Future Bounce",
                track_bpm:"126",
                track_key:"2A",
                track_lenght:"2:31",
                track_path:"D:/musiques"
            },
            {
                track_id:"1",
                track_name:"Like I do",
                track_artists:"David Guetta,Brooks",
                track_genre:"Future Bounce",
                track_bpm:"126",
                track_key:"2A",
                track_lenght:"2:31",
                track_path:"D:/musiques"
            },
            {
                track_id:"1",
                track_name:"Like I do",
                track_artists:"David Guetta,Brooks",
                track_genre:"Future Bounce",
                track_bpm:"126",
                track_key:"2A",
                track_lenght:"2:31",
                track_path:"D:/musiques"
            },
        ];
        this.containerId = containerId;
    }
    createTable(){
        /* create the header */
        let h = this.createHeader();
        var table = document.getElementById("renderedPlaylist");
        table.appendChild(h);
        /* add the lignes */
        this.createAllLignes(table);
    }
    setNewAttribute(element,attribut,value){
        var att = document.createAttribute(attribut);
        att.value = value;
        element.setAttributeNode(att);
    }
    createHeaderColumn(content,classAttribut){
        var column = document.createElement("th");
        if( classAttribut != ""){
            column.setAttribute("class",classAttribut);
        }
        column.appendChild(document.createTextNode(content));
        return column;
    }
    createHeader(){
        /* create a ligne */
        var h = document.createElement("tr");
        h.setAttribute("class","w3-blue");
        h.appendChild(this.createHeaderColumn("#",""));
        h.appendChild(this.createHeaderColumn("","hoverButton"));
        h.appendChild(this.createHeaderColumn("","hoverButton"));
        h.appendChild(this.createHeaderColumn("","hoverButton"));
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
        var l = document.createElement("tr");
        
        var idCol = document.createElement("td");
        idCol.setAttribute("id","id"+index);
        idCol.appendChild(document.createTextNode(index));
        l.appendChild(idCol);

        l.appendChild(this.createHoverCheckbox(index));
        l.appendChild(this.createHoverButton("play",index,"..\\..\\..\\assets\\icons\\play.png","play"))
        l.appendChild(this.createHoverButton("add",index,"..\\..\\..\\assets\\icons\\plus.png","add"))
        
        l.appendChild(this.createSimpleColumn("name",index,track.track_name));
        l.appendChild(this.createSimpleColumn("artist",index,track.track_artists));
        l.appendChild(this.createSimpleColumn("genre",index,track.track_genre));
        l.appendChild(this.createSimpleColumn("key",index,track.track_key));
        l.appendChild(this.createSimpleColumn("bpm",index,track.track_bpm));
        l.appendChild(this.createSimpleColumn("lenght",index,track.track_lenght));
        l.appendChild(this.createSimpleColumn("path",index,track.track_path));
        return l;
    }
    createSimpleColumn(id,index,content){
        var c = document.createElement("td");
        c.setAttribute("id",id+index);
        c.setAttribute("contentEditable","true");
        c.appendChild(document.createTextNode(content));
        return c;
    }
    createHoverButton(id,index,imgPath,alt){
        var b = document.createElement("td");
        b.setAttribute("id",id+index);
        b.setAttribute("class","hoverElement");
        
        var btn = document.createElement("button");
        btn.setAttribute("class","w3-button");
        
        var img = document.createElement("img");
        img.setAttribute("src",imgPath);
        img.setAttribute("alt",alt);
        img.setAttribute("style","width:25px;");
        btn.appendChild(img);
        b.appendChild(btn);

        return b;
    }
    createHoverCheckbox(index){
        var c = document.createElement("td");
        c.setAttribute("id","checkbox"+index);
        c.setAttribute("class","hoverElement");

        var i = document.createElement("input");
        i.setAttribute("type","checkbox");
        i.setAttribute("class","w3-check");
        c.appendChild(i);

        return c;
    }
    createAllLignes(table){
        for(var i = 0; i < this.nbOfTracks; i++) {
            table.appendChild(this.createLigne(this.tracks[i]));           
        }
    }
    
}