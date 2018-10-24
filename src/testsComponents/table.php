
<!DOCTYPE html>
<html>
<head>
    <title>test table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
        <table class="w3-table w3-striped w3-bordered">
            <tr class="w3-blue" >
                <th>#</th>
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
                <td>recces</td>
                <td>Skrillex</td>
                <td>Dubstep</td>
                <td>11A</td>
                <td>96</td>
                <td>2:31</td>
                <td>G:\MUSIQUES</td>
            </tr>
            <tr>
                <td>3</td>
                <td>When I'm gone</td>
                <td>Brooks</td>
                <td>Future Bounce</td>
                <td>12B</td>
                <td>127</td>
                <td>3:31</td>
                <td>G:\MUSIQUES</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Get Lemon</td>
                <td>Disciple, all artists</td>
                <td>Dubstep</td>
                <td>5B</td>
                <td>150</td>
                <td>3:22</td>
                <td>G:\MUSIQUES</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Majenta Riddim</td>
                <td>DJ Snake</td>
                <td>Moombahton</td>
                <td>6A</td>
                <td>101</td>
                <td>2:56</td>
                <td>G:\MUSIQUES\Electro</td>
            </tr>
        </table> 
        <p id="result"></p>
        <script>
            function update(id){
                var str = document.getElementById(id).textContent;
                document.getElementById(id).innerHTML = str;
                console.log(document.getElementById(id).textContent);
            }
        </script>
</body>
</html>