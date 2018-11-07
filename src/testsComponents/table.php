
<!DOCTYPE html>
<html>
<head>
    <title>test table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
        <style>
            input,select {
                border: none;
            }
            .hoverButton {
                display: none !important;
            }
        </style>
        <table class="w3-table w3-striped w3-bordered">
            <tr class="w3-blue" >
                <th>#</th>
                <th class="hoverButton"></th>
                <th>Name</th>
                <th>Artists</th>
                <th>Genre</th>
                <th>Key</th>
                <th>BPM</th>
                <th>Lenght</th>
                <th>Path</th>
            </tr>
            <tr>
                <td contenteditable="true">1</td>
                <td class="hoverButton"></td>
                <td contenteditable="true">Like I Do</td>
                <td contenteditable="true" id="1" onblur="update('1')">David Guetta, Brooks</td>              
                <td contenteditable="true">Future Bounce</td>
                <td contenteditable="true">2A</td>
                <td contenteditable="true">126</td>
                <td contenteditable="true">2:31</td>
                <td contenteditable="true">G:\MUSIQUES</td>
            </tr>
            <tr>
                <td>2</td>
                <td class="hoverButton"></td>
                <td><input type="text" value="recces" ></td>
                <td><input type="text" value="Skrillex" ></td>
                <td><input type="text" value="Dubstep" ></td>
                <td>
                    <select>
                        <option value="1A">1A</option>
                        <option value="2A">2A</option>
                        <option value="3A">3A</option>
                        <option value="4A">4A</option>
                    <select>
                </td>
                <td><input type="number" value="96" ></td>
                <td><input type="number" min="00" max="60" value="2" > : <input type="number" min="00" max="60" value="31" ></td>
                <td><input type="text" value="G:\MUSIQUES" ></td>
            </tr>
            <tr>
                <td contenteditable="true">3</td>
                <td class="hoverButton"></td>
                <td contenteditable="true">When I'm gone</td>
                <td contenteditable="true">Brooks</td>
                <td contenteditable="true">Future Bounce</td>
                <td contenteditable="true">12B</td>
                <td contenteditable="true">127</td>
                <td contenteditable="true">3:31</td>
                <td contenteditable="true">G:\MUSIQUES</td>
            </tr>
            <tr>
                <td contenteditable="true">4</td>
                <td class="hoverButton"></td>
                <td contenteditable="true">Get Lemon</td>
                <td contenteditable="true">Disciple, all artists</td>
                <td contenteditable="true">Dubstep</td>
                <td contenteditable="true">5B</td>
                <td contenteditable="true">150</td>
                <td contenteditable="true">3:22</td>
                <td contenteditable="true">G:\MUSIQUES</td>
            </tr>
            <tr onmouseover="console.log(1)" onmouseout="console.log(0)">
                <td >5</td>
                <td class="hoverButton"></td>
                <td ><div>Majenta Riddim</div>
                    <div>
                        <button class="w3-button">
                            <img style="width: 24px" src="../../assets/icons/add.png" alt="add">
                        </button>
                        <button class="w3-button">
                            <img style="width: 24px" src="../../assets/icons/add.png" alt="play">
                        </button>
                    </div>
                </td>
                <td >DJ Snake</td>
                <td >Moombahton</td>
                <td >6A</td>
                <td >101</td>
                <td >2:56</td>
                <td >G:\MUSIQUES\Electro</td>
            </tr>
        </table> 
        <p id="result"></p>
        <script>
            function update(id){
                var str = document.getElementById(id).textContent;
                document.getElementById(id).innerHTML = str;
                console.log(document.getElementById(id).textContent);
            }
            //<input type="checkbox" class="w3-check">
            
            

        </script>
</body>
</html>
