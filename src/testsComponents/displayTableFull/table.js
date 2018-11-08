class Playlist {
    constructor(){
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
                track_id:"2",
                track_name:"Like I do",
                track_artists:"David Guetta,Brooks",
                track_genre:"Future Bounce",
                track_bpm:"126",
                track_key:"2A",
                track_lenght:"2:31",
                track_path:"D:/musiques"
            },
            {
                track_id:"3",
                track_name:"Like I do",
                track_artists:"David Guetta,Brooks",
                track_genre:"Future Bounce",
                track_bpm:"126",
                track_key:"2A",
                track_lenght:"2:31",
                track_path:"D:/musiques"
            },
        ];
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
        l.appendChild(this.createHoverButton("play",index,"..\\..\\..\\assets\\icons\\play.png","play"))
        l.appendChild(this.createHoverButton("remove",index,"..\\..\\..\\assets\\icons\\remove.png","remove"))
        
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
        let c = document.createElement("td");
        c.setAttribute("id",id+index);
        c.setAttribute("contentEditable","true");
        c.appendChild(document.createTextNode(content));
        return c;
    }
    createHoverButton(id,index,imgPath,alt){
        let b = document.createElement("td");
        b.setAttribute("id",id+index);
        b.setAttribute("class","hoverElement");
        
        let btn = document.createElement("button");
        btn.setAttribute("class","w3-button");
        
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
            table.appendChild(this.createLigne(this.tracks[i]));           
        }
    }
    hideControl(){
        let e = document.querySelectorAll(".hoverElement");
        e.forEach(function(e){
            e.setAttribute("style","display: none;");
        })
    }
    hideControlExcept(id){
        let e = document.querySelectorAll(".hoverElement");
        e.forEach(function(e){
            if( e.getAttribute("id") !== null){
                if( e.querySelector("input") !== null){
                    e.querySelector("input").setAttribute("style","display: none;");
                }else{
                    e.querySelector("button").setAttribute("style","display: none;");
                }
                if(e.getAttribute("id") === "checkbox"+id){
                    e.querySelector("input").removeAttribute("style");
                }
                else if(e.getAttribute("id") === "remove"+id || e.getAttribute("id") === "play"+id  ){
                    e.querySelector("button").removeAttribute("style");
                }
            }
        })
    }
    showControl(){
        let e = document.querySelectorAll(".hoverElement");
        e.forEach(function(e){
            e.removeAttribute("style");
        })
    }
    showAllCheckBoxes(){
        let e = document.querySelectorAll(".hoverElement");
        e.forEach(function(e){
            if( e.querySelector("input") !== null){
                e.querySelector("input").removeAttribute("style");
            }
        })
    }

}